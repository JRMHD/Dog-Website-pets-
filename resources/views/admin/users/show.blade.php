@extends('layouts.app')

@section('content')
    <div
        style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh; padding: 24px 0;">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
                    <div>
                        <h2
                            style="font-size: 2rem; font-weight: 700; color: #374151; margin-bottom: 8px; display: flex; align-items: center; gap: 12px;">
                            <div
                                style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #5260DE, #FFD700); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 20px;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            {{ $user->name }}
                        </h2>
                        <p style="color: #6B7280; font-size: 1rem;">Complete user profile and account information</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('admin.users.edit', $user) }}"
                            style="background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; justify-content: center;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(245, 158, 11, 0.3)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit User
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                            style="background-color: #F0F5F4; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; border: 2px solid #e5e7eb; justify-content: center;"
                            onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-1px)'"
                            onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Users
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Information Card -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                <div class="flex items-center justify-between mb-6">
                    <h3
                        style="font-size: 1.5rem; font-weight: 600; color: #374151; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 24px; height: 24px; color: #5260DE;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        User Information
                    </h3>
                    @if ($user->id === auth()->id())
                        <span
                            style="padding: 8px 16px; background: linear-gradient(135deg, #3B82F6, #60A5FA); color: white; font-size: 12px; font-weight: 600; border-radius: 20px;">
                            Current User (You)
                        </span>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Full
                            Name</label>
                        <p style="font-size: 18px; font-weight: 600; color: #374151;">{{ $user->name }}</p>
                    </div>

                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Email
                            Address</label>
                        <p style="font-size: 18px; font-weight: 600; color: #374151; word-break: break-all;">
                            {{ $user->email }}</p>
                    </div>

                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Phone
                            Number</label>
                        <p style="font-size: 18px; font-weight: 600; color: #374151;">{{ $user->phone_number }}</p>
                    </div>

                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Role</label>
                        <span
                            style="padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; display: inline-block;
                                 {{ $user->role === 'admin' ? 'background: linear-gradient(135deg, #EF4444, #F87171); color: white;' : 'background: linear-gradient(135deg, #10B981, #34D399); color: white;' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>

                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Account
                            Status</label>
                        <span
                            style="padding: 8px 16px; border-radius: 20px; font-size: 14px; font-weight: 600; display: inline-block;
                                 {{ $user->status === 'active' ? 'background: linear-gradient(135deg, #10B981, #34D399); color: white;' : 'background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white;' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </div>

                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Email
                            Verification</label>
                        @if ($user->email_verified_at)
                            <span
                                style="padding: 8px 16px; background: linear-gradient(135deg, #10B981, #34D399); color: white; font-size: 14px; font-weight: 600; border-radius: 20px; display: inline-flex; align-items: center; gap: 6px;">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Verified
                            </span>
                        @else
                            <span
                                style="padding: 8px 16px; background: linear-gradient(135deg, #EF4444, #F87171); color: white; font-size: 14px; font-weight: 600; border-radius: 20px; display: inline-flex; align-items: center; gap: 6px;">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Not Verified
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Timeline Card -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                <h3
                    style="font-size: 1.5rem; font-weight: 600; color: #374151; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                    <svg style="width: 24px; height: 24px; color: #5260DE;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Timeline
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Account
                            Created</label>
                        <p style="font-size: 16px; font-weight: 600; color: #374151; margin-bottom: 4px;">
                            {{ $user->created_at->format('F d, Y \a\t g:i A') }}</p>
                        <p style="font-size: 14px; color: #6B7280;">{{ $user->created_at->diffForHumans() }}</p>
                    </div>

                    <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                        <label
                            style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Last
                            Updated</label>
                        <p style="font-size: 16px; font-weight: 600; color: #374151; margin-bottom: 4px;">
                            {{ $user->updated_at->format('F d, Y \a\t g:i A') }}</p>
                        <p style="font-size: 14px; color: #6B7280;">{{ $user->updated_at->diffForHumans() }}</p>
                    </div>

                    @if ($user->email_verified_at)
                        <div style="background: #f9fafb; border-radius: 12px; padding: 20px; border: 1px solid #e5e7eb;">
                            <label
                                style="display: block; font-size: 12px; font-weight: 600; color: #6B7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Email
                                Verified</label>
                            <p style="font-size: 16px; font-weight: 600; color: #374151; margin-bottom: 4px;">
                                {{ $user->email_verified_at->format('F d, Y \a\t g:i A') }}</p>
                            <p style="font-size: 14px; color: #6B7280;">{{ $user->email_verified_at->diffForHumans() }}</p>
                        </div>
                    @endif

                    @if ($user->frozen_at)
                        <div style="background: #fef2f2; border-radius: 12px; padding: 20px; border: 1px solid #fecaca;">
                            <label
                                style="display: block; font-size: 12px; font-weight: 600; color: #DC2626; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Account
                                Frozen</label>
                            <p style="font-size: 16px; font-weight: 600; color: #DC2626; margin-bottom: 4px;">
                                {{ $user->frozen_at->format('F d, Y \a\t g:i A') }}</p>
                            <p style="font-size: 14px; color: #EF4444;">{{ $user->frozen_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Actions Card -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px;">
                <h3
                    style="font-size: 1.5rem; font-weight: 600; color: #374151; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                    <svg style="width: 24px; height: 24px; color: #5260DE;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Actions
                </h3>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('admin.users.edit', $user) }}"
                        style="background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(245, 158, 11, 0.3)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Edit User
                    </a>

                    @if (!$user->isFrozen())
                        <form method="POST" action="{{ route('admin.users.freeze', $user) }}" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                style="background: linear-gradient(135deg, #F97316, #FB923C); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;"
                                @if ($user->id === auth()->id()) disabled style="opacity: 0.5; cursor: not-allowed;" title="Cannot freeze yourself" @endif
                                onmouseover="if(!this.disabled) { this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(249, 115, 22, 0.3)' }"
                                onmouseout="if(!this.disabled) { this.style.transform='translateY(0)'; this.style.boxShadow='none' }"
                                onclick="return confirm('Are you sure you want to freeze this user account?')">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L5.636 5.636">
                                    </path>
                                </svg>
                                Freeze Account
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.users.unfreeze', $user) }}" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                style="background: linear-gradient(135deg, #10B981, #34D399); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(16, 185, 129, 0.3)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                onclick="return confirm('Are you sure you want to unfreeze this user account?')">
                                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Unfreeze Account
                            </button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background: linear-gradient(135deg, #EF4444, #F87171); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;"
                            @if ($user->id === auth()->id() || $user->isFrozen()) disabled style="opacity: 0.5; cursor: not-allowed;" @endif
                            @if ($user->id === auth()->id()) title="Cannot delete yourself" @endif
                            @if ($user->isFrozen()) title="Cannot delete frozen user" @endif
                            onmouseover="if(!this.disabled) { this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(239, 68, 68, 0.3)' }"
                            onmouseout="if(!this.disabled) { this.style.transform='translateY(0)'; this.style.boxShadow='none' }"
                            onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                            <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Delete User
                        </button>
                    </form>
                </div>

                <!-- Information Messages -->
                <div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid #e5e7eb;">
                    @if ($user->id === auth()->id())
                        <div
                            style="background: linear-gradient(135deg, #3B82F6, #60A5FA); color: white; padding: 16px; border-radius: 12px; display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                            <svg style="width: 20px; height: 20px; flex-shrink: 0;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p style="font-weight: 500;">
                                <strong>Note:</strong> You cannot freeze or delete your own account.
                            </p>
                        </div>
                    @endif

                    @if ($user->isFrozen())
                        <div
                            style="background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white; padding: 16px; border-radius: 12px; display: flex; align-items: center; gap: 12px;">
                            <svg style="width: 20px; height: 20px; flex-shrink: 0;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                            <p style="font-weight: 500;">
                                <strong>Note:</strong> Frozen users cannot log in and cannot be deleted until unfrozen.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
