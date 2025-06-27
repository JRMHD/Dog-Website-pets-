<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;  // Add this import
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::with('user')->latest();

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('breed', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $listings = $query->paginate(20);

        return view('admin.listings.index', compact('listings'));
    }

    public function create()
    {
        return view('admin.listings.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'type' => 'required|in:dog,product',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Add dog-specific validation
        if ($request->type === 'dog') {
            $rules = array_merge($rules, [
                'breed' => 'required|string|max:255',
                'age_months' => 'required|integer|min:1',
                'gender' => 'required|in:Male,Female',
                'size' => 'required|in:Small,Medium,Large',
                'color' => 'required|string|max:255',
                'vaccinated' => 'required|boolean',
                'health_status' => 'required|string|max:255',
                'microchipped' => 'required|boolean',
                'temperament' => 'nullable|string',
                'available_from' => 'nullable|date',
            ]);
        }

        // Add product-specific validation
        if ($request->type === 'product') {
            $rules = array_merge($rules, [
                'category' => 'required|string|max:255',
                'subcategory' => 'nullable|string|max:255',
                'brand' => 'nullable|string|max:255',
                'suitable_for' => 'nullable|string|max:255',
                'stock_quantity' => 'required|integer|min:0',
                'weight_or_size' => 'nullable|string|max:255',
                'ingredients' => 'nullable|string',
                'expiry_date' => 'nullable|date|after:today',
            ]);
        }

        $validatedData = $request->validate($rules);

        // Handle image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('listings', 'public');
                $imagePaths[] = $path;
            }
        }
        $validatedData['images'] = $imagePaths;

        // METHOD 1: Using Auth facade (recommended)
        $validatedData['user_id'] = Auth::id();

        // METHOD 2: Alternative using Auth::user()
        // $validatedData['user_id'] = Auth::user()->id;

        // METHOD 3: Alternative using request user
        // $validatedData['user_id'] = $request->user()->id;

        $listing = Listing::create($validatedData);

        return redirect()->route('admin.listings.show', $listing)
            ->with('success', 'Listing created successfully!');
    }

    public function show(Listing $listing)
    {
        return view('admin.listings.show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        return view('admin.listings.edit', compact('listing'));
    }

    public function update(Request $request, Listing $listing)
    {
        $rules = [
            'type' => 'required|in:dog,product',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ];

        // Add type-specific validation
        if ($request->type === 'dog') {
            $rules = array_merge($rules, [
                'breed' => 'required|string|max:255',
                'age_months' => 'required|integer|min:1',
                'gender' => 'required|in:Male,Female',
                'size' => 'required|in:Small,Medium,Large',
                'color' => 'required|string|max:255',
                'vaccinated' => 'required|boolean',
                'health_status' => 'required|string|max:255',
                'microchipped' => 'required|boolean',
                'temperament' => 'nullable|string',
                'available_from' => 'nullable|date',
            ]);
        }

        if ($request->type === 'product') {
            $rules = array_merge($rules, [
                'category' => 'required|string|max:255',
                'subcategory' => 'nullable|string|max:255',
                'brand' => 'nullable|string|max:255',
                'suitable_for' => 'nullable|string|max:255',
                'stock_quantity' => 'required|integer|min:0',
                'weight_or_size' => 'nullable|string|max:255',
                'ingredients' => 'nullable|string',
                'expiry_date' => 'nullable|date|after:today',
            ]);
        }

        $validatedData = $request->validate($rules);

        // Handle image uploads
        if ($request->hasFile('images')) {
            // Delete old images
            if ($listing->images) {
                foreach ($listing->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('listings', 'public');
                $imagePaths[] = $path;
            }
            $validatedData['images'] = $imagePaths;
        }

        $listing->update($validatedData);

        return redirect()->route('admin.listings.show', $listing)
            ->with('success', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing)
    {
        // Delete associated images
        if ($listing->images) {
            foreach ($listing->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $listing->delete();

        return redirect()->route('admin.listings.index')
            ->with('success', 'Listing deleted successfully!');
    }
}
