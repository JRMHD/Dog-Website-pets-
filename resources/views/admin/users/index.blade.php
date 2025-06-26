@extends('layouts.app')

@section('content')
    <div
        style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh; position: relative; overflow: hidden;">
        <!-- Floating Elements -->
        <div
            style="position: absolute; width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); top: 10%; left: 10%; animation: float 6s ease-in-out infinite;">
        </div>
        <div
            style="position: absolute; width: 150px; height: 150px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); top: 60%; right: 10%; animation: float 6s ease-in-out infinite; animation-delay: 2s;">
        </div>
        <div
            style="position: absolute; width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1)); bottom: 20%; left: 15%; animation: float 6s ease-in-out infinite; animation-delay: 4s;">
        </div>

        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                        <div>
                            <h2 style="font-size: 2rem; font-weight: 700; color: #374151; margin-bottom: 8px;">
                                <svg style="width: 32px; height: 32px; display: inline-block; margin-right: 12px; color: #5260DE;"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                    </path>
                                </svg>
                                User Management
                            </h2>
                            <p style="color: #6B7280; font-size: 1rem;">Manage your users with style and efficiency</p>
                        </div>
                        <a href="{{ route('admin.users.create') }}"
                            style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(82, 96, 222, 0.3);"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(82, 96, 222, 0.4)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(82, 96, 222, 0.3)'">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create New User
                        </a>
                    </div>
                </div>

                <!-- Messages -->
                @if (session('success'))
                    <div
                        style="background: linear-gradient(135deg, #10B981, #34D399); color: white; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                        <svg style="width: 24px; height: 24px; flex-shrink: 0;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div
                        style="background: linear-gradient(135deg, #EF4444, #F87171); color: white; padding: 16px 20px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);">
                        <svg style="width: 24px; height: 24px; flex-shrink: 0;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Search and Filter Section -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; margin-bottom: 24px;">
                    <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col lg:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search by name, email, or phone..."
                                style="width: 100%; background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease;"
                                onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <select name="role"
                                style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; min-width: 120px;"
                                onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                <option value="all" {{ request('role') == 'all' ? 'selected' : '' }}>All Roles</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>

                            <select name="status"
                                style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; min-width: 120px;"
                                onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'">
                                <option value="" {{ request('status') == '' ? 'selected' : '' }}>All Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="frozen" {{ request('status') == 'frozen' ? 'selected' : '' }}>Frozen
                                </option>
                            </select>

                            <button type="submit"
                                style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; border: none; cursor: pointer; transition: all 0.3s ease; white-space: nowrap;"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 20px rgba(82, 96, 222, 0.3)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                Search
                            </button>

                            <a href="{{ route('admin.users.index') }}"
                                style="background-color: #F0F5F4; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; border: 2px solid #e5e7eb; white-space: nowrap;"
                                onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-1px)'"
                                onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                                Clear
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Users Table -->
                <div
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; overflow: hidden;">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white;">
                                <tr>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Name</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Email</th>
                                    <th style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; display: none;"
                                        class="hidden sm:table-cell">Phone</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Role</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Status</th>
                                    <th style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em; display: none;"
                                        class="hidden lg:table-cell">Created</th>
                                    <th
                                        style="padding: 16px; text-align: left; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody style="background: white;">
                                @forelse($users as $user)
                                    <tr style="border-bottom: 1px solid #f3f4f6; transition: all 0.3s ease;"
                                        onmouseover="this.style.backgroundColor='#f9fafb'; this.style.transform='scale(1.01)'"
                                        onmouseout="this.style.backgroundColor='white'; this.style.transform='scale(1)'">
                                        <td style="padding: 16px;">
                                            <div class="flex items-center">
                                                <div
                                                    style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #5260DE, #FFD700); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; margin-right: 12px;">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600; color: #374151; font-size: 14px;">
                                                        {{ $user->name }}</div>
                                                    @if ($user->id === auth()->id())
                                                        <div style="color: #5260DE; font-size: 12px; font-weight: 500;">
                                                            (You)</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td style="padding: 16px; color: #6B7280; font-size: 14px;">
                                            <div class="truncate max-w-xs">{{ $user->email }}</div>
                                        </td>
                                        <td style="padding: 16px; color: #6B7280; font-size: 14px; display: none;"
                                            class="hidden sm:table-cell">{{ $user->phone_number }}</td>
                                        <td style="padding: 16px;">
                                            <span
                                                style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; 
                                                     {{ $user->role === 'admin' ? 'background: linear-gradient(135deg, #EF4444, #F87171); color: white;' : 'background: linear-gradient(135deg, #10B981, #34D399); color: white;' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td style="padding: 16px;">
                                            <span
                                                style="padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;
                                                     {{ $user->status === 'active' ? 'background: linear-gradient(135deg, #10B981, #34D399); color: white;' : 'background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white;' }}">
                                                {{ ucfirst($user->status) }}
                                            </span>
                                        </td>
                                        <td style="padding: 16px; color: #6B7280; font-size: 14px; display: none;"
                                            class="hidden lg:table-cell">
                                            {{ $user->created_at->format('M d, Y') }}
                                        </td>
                                        <td style="padding: 16px;">
                                            <div class="flex flex-wrap gap-2">
                                                <a href="{{ route('admin.users.show', $user) }}"
                                                    style="padding: 6px 12px; background: linear-gradient(135deg, #3B82F6, #60A5FA); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59, 130, 246, 0.3)'"
                                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                    <svg style="width: 14px; height: 14px;" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg>
                                                    View
                                                </a>

                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                    style="padding: 6px 12px; background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; text-decoration: none; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(245, 158, 11, 0.3)'"
                                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                    <svg style="width: 14px; height: 14px;" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                    Edit
                                                </a>

                                                @if (!$user->isFrozen())
                                                    <form method="POST"
                                                        action="{{ route('admin.users.freeze', $user) }}" class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            style="padding: 6px 12px; background: linear-gradient(135deg, #F97316, #FB923C); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                            @if ($user->id === auth()->id()) disabled title="Cannot freeze yourself" @endif
                                                            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(249, 115, 22, 0.3)'"
                                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                            onclick="return confirm('Are you sure you want to freeze this user?')">
                                                            <svg style="width: 14px; height: 14px;" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L5.636 5.636">
                                                                </path>
                                                            </svg>
                                                            Freeze
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST"
                                                        action="{{ route('admin.users.unfreeze', $user) }}"
                                                        class="inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            style="padding: 6px 12px; background: linear-gradient(135deg, #10B981, #34D399); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(16, 185, 129, 0.3)'"
                                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                            onclick="return confirm('Are you sure you want to unfreeze this user?')">
                                                            <svg style="width: 14px; height: 14px;" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                            Unfreeze
                                                        </button>
                                                    </form>
                                                @endif

                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="padding: 6px 12px; background: linear-gradient(135deg, #EF4444, #F87171); color: white; border-radius: 8px; font-size: 12px; font-weight: 500; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 4px;"
                                                        @if ($user->id === auth()->id() || $user->isFrozen()) disabled style="opacity: 0.5; cursor: not-allowed;" @endif
                                                        @if ($user->id === auth()->id()) title="Cannot delete yourself" @endif
                                                        @if ($user->isFrozen()) title="Cannot delete frozen user" @endif
                                                        onmouseover="if(!this.disabled) { this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)' }"
                                                        onmouseout="if(!this.disabled) { this.style.transform='translateY(0)'; this.style.boxShadow='none' }"
                                                        onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                                        <svg style="width: 14px; height: 14px;" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="padding: 48px; text-align: center; color: #6B7280;">
                                            <div
                                                style="display: flex; flex-direction: column; align-items: center; gap: 16px;">
                                                <svg style="width: 64px; height: 64px; color: #D1D5DB;" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    <p
                                                        style="font-size: 18px; font-weight: 600; color: #374151; margin-bottom: 8px;">
                                                        No users found</p>
                                                    <p style="color: #6B7280;">Try adjusting your search filters or create
                                                        a new user.</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($users->hasPages())
                        <div style="padding: 24px; border-top: 1px solid #f3f4f6; background: #f9fafb;">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @media (max-width: 640px) {
            .floating-element {
                display: none;
            }
        }
    </style>
@endsection
