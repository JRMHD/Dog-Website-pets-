@extends('layouts.app')

@section('content')
    <div
        style="background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%); min-height: 100vh; padding: 24px 0;">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 32px; margin-bottom: 24px;">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                    <div>
                        <h2
                            style="font-size: 2rem; font-weight: 700; color: #374151; margin-bottom: 8px; display: flex; align-items: center; gap: 12px;">
                            <div
                                style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #5260DE, #FFD700); display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 20px;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            Edit {{ $user->name }}
                        </h2>
                        <p style="color: #6B7280; font-size: 1rem;">Update user information and settings</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}"
                        style="background-color: #F0F5F4; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; border: 2px solid #e5e7eb; justify-content: center;"
                        onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-1px)'"
                        onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Users
                    </a>
                </div>
            </div>

            <!-- User Info Card -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 24px; margin-bottom: 24px;">
                <h3
                    style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                    <svg style="width: 20px; height: 20px; color: #5260DE;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Current User Information
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div style="background: #f9fafb; border-radius: 8px; padding: 12px;">
                        <span style="color: #6B7280; font-weight: 500;">Created:</span>
                        <div style="color: #374151; font-weight: 600;">{{ $user->created_at->format('M d, Y g:i A') }}</div>
                    </div>
                    <div style="background: #f9fafb; border-radius: 8px; padding: 12px;">
                        <span style="color: #6B7280; font-weight: 500;">Status:</span>
                        <div>
                            <span
                                style="padding: 4px 8px; border-radius: 12px; font-size: 11px; font-weight: 600; display: inline-block; margin-top: 2px;
                                     {{ $user->status === 'active' ? 'background: linear-gradient(135deg, #10B981, #34D399); color: white;' : 'background: linear-gradient(135deg, #F59E0B, #FBBF24); color: white;' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                        </div>
                    </div>
                    @if ($user->frozen_at)
                        <div style="background: #fef2f2; border-radius: 8px; padding: 12px;"
                            class="col-span-1 sm:col-span-2">
                            <span style="color: #DC2626; font-weight: 500;">Frozen At:</span>
                            <div style="color: #DC2626; font-weight: 600;">{{ $user->frozen_at->format('M d, Y g:i A') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Form Section -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-radius: 16px; padding: 40px;">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div>
                        <label for="name"
                            style="color: #374151; font-weight: 600; margin-bottom: 6px; display: block; font-size: 14px;">
                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Full Name
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                            placeholder="Enter full name"
                            style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%;"
                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                            onblur="this.style.borderColor='{{ $errors->has('name') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                            oninput="this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4';">
                        @error('name')
                            <div
                                style="color: #ef4444; font-size: 14px; margin-top: 6px; display: flex; align-items: center; gap: 6px;">
                                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email"
                            style="color: #374151; font-weight: 600; margin-bottom: 6px; display: block; font-size: 14px;">
                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Email Address
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                            required placeholder="Enter email address"
                            style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%;"
                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                            onblur="this.style.borderColor='{{ $errors->has('email') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                            oninput="this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4';">
                        @error('email')
                            <div
                                style="color: #ef4444; font-size: 14px; margin-top: 6px; display: flex; align-items: center; gap: 6px;">
                                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone_number"
                            style="color: #374151; font-weight: 600; margin-bottom: 6px; display: block; font-size: 14px;">
                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            Phone Number
                        </label>
                        <input id="phone_number" type="tel" name="phone_number"
                            value="{{ old('phone_number', $user->phone_number) }}" required
                            placeholder="+254712345678 or 0712345678"
                            style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%;"
                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                            onblur="this.style.borderColor='{{ $errors->has('phone_number') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                            oninput="this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4';">
                        <p
                            style="font-size: 12px; color: #6B7280; margin-top: 6px; display: flex; align-items: center; gap: 4px;">
                            <svg style="width: 14px; height: 14px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Phone number (e.g., +254712345678 or 0712345678)
                        </p>
                        @error('phone_number')
                            <div
                                style="color: #ef4444; font-size: 14px; margin-top: 6px; display: flex; align-items: center; gap: 6px;">
                                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role"
                            style="color: #374151; font-weight: 600; margin-bottom: 6px; display: block; font-size: 14px;">
                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                            User Role
                        </label>
                        <select id="role" name="role" required
                            style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%;"
                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                            onblur="this.style.borderColor='{{ $errors->has('role') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                            onchange="this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4';">
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                            </option>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                        </select>
                        @error('role')
                            <div
                                style="color: #ef4444; font-size: 14px; margin-top: 6px; display: flex; align-items: center; gap: 6px;">
                                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password"
                            style="color: #374151; font-weight: 600; margin-bottom: 6px; display: block; font-size: 14px;">
                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Password
                            <span style="color: #6B7280; font-weight: 400; font-size: 12px;">(leave blank to keep current
                                password)</span>
                        </label>
                        <input id="password" type="password" name="password"
                            placeholder="Enter new password (optional)"
                            style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%;"
                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                            onblur="this.style.borderColor='{{ $errors->has('password') ? '#EF4444' : '#e5e7eb' }}'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                            oninput="this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4'; validatePasswordMatch();">
                        @error('password')
                            <div
                                style="color: #ef4444; font-size: 14px; margin-top: 6px; display: flex; align-items: center; gap: 6px;">
                                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation"
                            style="color: #374151; font-weight: 600; margin-bottom: 6px; display: block; font-size: 14px;">
                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Confirm Password
                        </label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="Confirm new password"
                            style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%;"
                            onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)'"
                            onblur="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; this.style.boxShadow='none'"
                            oninput="validatePasswordMatch();">
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <a href="{{ route('admin.users.index') }}"
                            style="background-color: #F0F5F4; color: #374151; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.3s ease; border: 2px solid #e5e7eb; flex: 1;"
                            onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#5260DE'; this.style.color='#5260DE'; this.style.transform='translateY(-1px)'"
                            onmouseout="this.style.backgroundColor='#F0F5F4'; this.style.borderColor='#e5e7eb'; this.style.color='#374151'; this.style.transform='translateY(0)'">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </a>

                        <button type="submit"
                            style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; border: none; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; justify-content: center; gap: 8px; flex: 1;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 25px rgba(82, 96, 222, 0.3)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'" id="submitBtn">
                            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Phone number formatting
            const phoneInput = document.getElementById('phone_number');
            phoneInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');

                if (value.startsWith('254')) {
                    this.value = '+' + value;
                } else if (value.startsWith('0')) {
                    this.value = value;
                }
            });

            // Form submission animation
            const form = document.querySelector('form');
            const submitButton = document.getElementById('submitBtn');

            form.addEventListener('submit', function() {
                submitButton.innerHTML = `
                <svg style="width: 18px; height: 18px; animation: spin 1s linear infinite;" fill="none" viewBox="0 0 24 24">
                    <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Updating User...
            `;
                submitButton.disabled = true;
            });
        });

        // Password confirmation validation
        function validatePasswordMatch() {
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');

            if (passwordConfirmation.value.length > 0 && password.value.length > 0) {
                if (password.value === passwordConfirmation.value) {
                    passwordConfirmation.style.borderColor = '#10b981';
                    passwordConfirmation.style.backgroundColor = '#f0fdf4';
                } else {
                    passwordConfirmation.style.borderColor = '#ef4444';
                    passwordConfirmation.style.backgroundColor = '#fef2f2';
                }
            }
        }
    </script>

    <style>
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
