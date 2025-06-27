<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::active()->latest();

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by category (for products)
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by size (for dogs)
        if ($request->filled('size')) {
            $query->where('size', $request->size);
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('breed', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('color', 'like', "%{$search}%");
            });
        }

        $listings = $query->paginate(12);

        // Get filter options
        $categories = Listing::active()->products()
            ->distinct()
            ->pluck('category')
            ->filter()
            ->sort();

        $sizes = ['Small', 'Medium', 'Large'];

        return view('shop', compact('listings', 'categories', 'sizes'));
    }

    public function show($slug)
    {
        $listing = Listing::active()->where('slug', $slug)->firstOrFail();

        // Get related listings (same type, excluding current)
        $relatedListings = Listing::active()
            ->where('type', $listing->type)
            ->where('id', '!=', $listing->id)
            ->latest()
            ->limit(4)
            ->get();

        return view('shopdetails', compact('listing', 'relatedListings'));
    }
}
