<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\UserCreatedMail;

class UserController extends Controller
{
    /**
     * Display a listing of users with search, filter, and pagination
     */
    public function index(Request $request): View
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role') && $request->get('role') !== 'all') {
            $query->where('role', $request->get('role'));
        }

        if ($request->filled('status')) {
            if ($request->get('status') === 'active') {
                $query->whereNull('frozen_at');
            } elseif ($request->get('status') === 'frozen') {
                $query->whereNotNull('frozen_at');
            }
        }

        $users = $query->orderByRaw("CASE WHEN role = 'admin' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user and send welcome email with temp login
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => ['required', 'string', 'regex:/^(\+254|0)[17]\d{8}$/', 'unique:' . User::class],
            'role' => ['required', 'in:user,admin'],
        ]);

        // Generate temp password
        $temporaryPassword = Str::random(10);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($temporaryPassword),
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        // Send welcome email with temp credentials
        Mail::to($user->email)->send(new UserCreatedMail($user, $temporaryPassword));

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully and email sent.');
    }

    /**
     * Display the specified user
     */
    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class . ',email,' . $user->id],
            'phone_number' => ['required', 'string', 'regex:/^(\+254|0)[17]\d{8}$/', 'unique:' . User::class . ',phone_number,' . $user->id],
            'role' => ['required', 'in:user,admin'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        if ($user->isFrozen()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Cannot delete frozen user. Unfreeze first.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Freeze a user account
     */
    public function freeze(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot freeze your own account.');
        }

        $user->update(['frozen_at' => now()]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User account frozen successfully.');
    }

    /**
     * Unfreeze a user account
     */
    public function unfreeze(User $user): RedirectResponse
    {
        $user->update(['frozen_at' => null]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User account unfrozen successfully.');
    }
}
