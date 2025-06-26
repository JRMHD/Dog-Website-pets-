@extends('layouts.app')

@section('content')
    <div style="padding: 48px 0; background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 100%); min-height: 100vh;">
        <div style="max-width: 1280px; margin: 0 auto; padding: 0 24px; display: flex; flex-direction: column; gap: 32px;">

            <!-- Profile Information Section -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 32px; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); border: 1px solid rgba(255, 255, 255, 0.2);">
                <div style="max-width: 600px;">
                    <section>
                        <header style="margin-bottom: 32px;">
                            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px;">
                                <div
                                    style="width: 60px; height: 60px; background: linear-gradient(135deg, #5260DE, #FFD700); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg style="width: 24px; height: 24px; color: white; flex-shrink: 0;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 style="font-size: 28px; font-weight: 700; color: #1f2937; margin: 0;">
                                        {{ __('Profile Information') }}
                                    </h2>
                                    <p style="margin: 8px 0 0 0; font-size: 16px; color: #6b7280; line-height: 1.5;">
                                        {{ __("Update your account's profile information and email address.") }}
                                    </p>
                                </div>
                            </div>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}"
                            style="display: flex; flex-direction: column; gap: 24px;">
                            @csrf
                            @method('patch')

                            <div>
                                <label for="name"
                                    style="color: #374151; font-weight: 600; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ __('Name') }}
                                </label>
                                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                                    required autofocus autocomplete="name"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%; font-family: inherit;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)';"
                                    onblur="if(this.value) { this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4'; } else { this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; } this.style.boxShadow='none';" />
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

                            <div>
                                <label for="email"
                                    style="color: #374151; font-weight: 600; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ __('Email') }}
                                </label>
                                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                                    required autocomplete="username"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%; font-family: inherit;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)';"
                                    onblur="if(this.value) { this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4'; } else { this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; } this.style.boxShadow='none';" />
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

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                    <div
                                        style="background-color: #fef3c7; color: #92400e; padding: 12px 16px; border-radius: 8px; font-size: 14px; margin-top: 12px; border: 1px solid #fbbf24;">
                                        <p style="margin: 0 0 8px 0; font-weight: 500;">
                                            {{ __('Your email address is unverified.') }}
                                        </p>
                                        <button form="send-verification"
                                            style="background: none; border: none; color: #5260DE; text-decoration: underline; cursor: pointer; font-size: 14px; padding: 0;"
                                            onmouseover="this.style.color='#3730a3'"
                                            onmouseout="this.style.color='#5260DE'">
                                            {{ __('Click here to re-send the verification email.') }}
                                        </button>

                                        @if (session('status') === 'verification-link-sent')
                                            <p style="margin: 8px 0 0 0; font-weight: 500; color: #166534;">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div style="display: flex; align-items: center; gap: 16px; padding-top: 16px;">
                                <button type="submit"
                                    style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; border: none; cursor: pointer; transition: all 0.3s ease;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 25px rgba(82, 96, 222, 0.3)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <svg style="width: 20px; height: 20px; display: inline; margin-right: 8px;"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ __('Save Changes') }}
                                </button>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        style="font-size: 14px; color: #166534; background-color: #f0fdf4; padding: 8px 12px; border-radius: 8px; margin: 0; animation: fadeIn 0.5s ease;">
                                        ✓ {{ __('Profile updated successfully!') }}
                                    </p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Update Password Section -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 32px; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); border: 1px solid rgba(255, 255, 255, 0.2);">
                <div style="max-width: 600px;">
                    <section>
                        <header style="margin-bottom: 32px;">
                            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px;">
                                <div
                                    style="width: 60px; height: 60px; background: linear-gradient(135deg, #5260DE, #FFD700); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg style="width: 24px; height: 24px; color: white; flex-shrink: 0;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 style="font-size: 28px; font-weight: 700; color: #1f2937; margin: 0;">
                                        {{ __('Update Password') }}
                                    </h2>
                                    <p style="margin: 8px 0 0 0; font-size: 16px; color: #6b7280; line-height: 1.5;">
                                        {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                    </p>
                                </div>
                            </div>
                        </header>

                        <form method="post" action="{{ route('password.update') }}"
                            style="display: flex; flex-direction: column; gap: 24px;">
                            @csrf
                            @method('put')

                            <div>
                                <label for="update_password_current_password"
                                    style="color: #374151; font-weight: 600; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                    {{ __('Current Password') }}
                                </label>
                                <input id="update_password_current_password" name="current_password" type="password"
                                    autocomplete="current-password"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%; font-family: inherit;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)';"
                                    onblur="if(this.value) { this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4'; } else { this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; } this.style.boxShadow='none';" />
                                @error('current_password', 'updatePassword')
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

                            <div>
                                <label for="update_password_password"
                                    style="color: #374151; font-weight: 600; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z">
                                        </path>
                                    </svg>
                                    {{ __('New Password') }}
                                </label>
                                <input id="update_password_password" name="password" type="password"
                                    autocomplete="new-password"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%; font-family: inherit;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)';"
                                    onblur="if(this.value) { this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4'; } else { this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; } this.style.boxShadow='none';" />
                                @error('password', 'updatePassword')
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

                            <div>
                                <label for="update_password_password_confirmation"
                                    style="color: #374151; font-weight: 600; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ __('Confirm Password') }}
                                </label>
                                <input id="update_password_password_confirmation" name="password_confirmation"
                                    type="password" autocomplete="new-password"
                                    style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%; font-family: inherit;"
                                    onfocus="this.style.borderColor='#5260DE'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(82, 96, 222, 0.1)';"
                                    onblur="if(this.value) { this.style.borderColor='#10b981'; this.style.backgroundColor='#f0fdf4'; } else { this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; } this.style.boxShadow='none';" />
                                @error('password_confirmation', 'updatePassword')
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

                            <div style="display: flex; align-items: center; gap: 16px; padding-top: 16px;">
                                <button type="submit"
                                    style="background: linear-gradient(135deg, #5260DE, #FFD700); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; border: none; cursor: pointer; transition: all 0.3s ease;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 25px rgba(82, 96, 222, 0.3)';"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                    <svg style="width: 20px; height: 20px; display: inline; margin-right: 8px;"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                    {{ __('Update Password') }}
                                </button>

                                @if (session('status') === 'password-updated')
                                    <p
                                        style="font-size: 14px; color: #166534; background-color: #f0fdf4; padding: 8px 12px; border-radius: 8px; margin: 0; animation: fadeIn 0.5s ease;">
                                        ✓ {{ __('Password updated successfully!') }}
                                    </p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <!-- Delete Account Section -->
            <div
                style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 32px; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); border: 1px solid rgba(255, 255, 255, 0.2);">
                <div style="max-width: 600px;">
                    <section style="display: flex; flex-direction: column; gap: 24px;">
                        <header>
                            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 16px;">
                                <div
                                    style="width: 60px; height: 60px; background: linear-gradient(135deg, #ef4444, #dc2626); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg style="width: 24px; height: 24px; color: white; flex-shrink: 0;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 style="font-size: 28px; font-weight: 700; color: #1f2937; margin: 0;">
                                        {{ __('Delete Account') }}
                                    </h2>
                                    <p style="margin: 8px 0 0 0; font-size: 16px; color: #6b7280; line-height: 1.5;">
                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                    </p>
                                </div>
                            </div>
                        </header>

                        <button onclick="document.getElementById('deleteModal').style.display='flex'"
                            style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 14px 28px; border-radius: 12px; font-weight: 600; font-size: 16px; border: none; cursor: pointer; transition: all 0.3s ease; align-self: flex-start;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 25px rgba(239, 68, 68, 0.3)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            <svg style="width: 20px; height: 20px; display: inline; margin-right: 8px;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            {{ __('Delete Account') }}
                        </button>

                        <!-- Delete Modal -->
                        <div id="deleteModal"
                            style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; align-items: center; justify-content: center; backdrop-filter: blur(4px);">
                            <div
                                style="background: white; padding: 32px; border-radius: 20px; max-width: 500px; margin: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);">
                                <form method="post" action="{{ route('profile.destroy') }}">
                                    @csrf
                                    @method('delete')

                                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                                        <div
                                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #ef4444, #dc2626); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                            <svg style="width: 24px; height: 24px; color: white; flex-shrink: 0;"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <h2 style="font-size: 24px; font-weight: 700; color: #1f2937; margin: 0;">
                                            {{ __('Are you sure you want to delete your account?') }}
                                        </h2>
                                    </div>

                                    <p style="margin: 0 0 24px 0; font-size: 16px; color: #6b7280; line-height: 1.5;">
                                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                    </p>

                                    <div style="margin-bottom: 24px;">
                                        <label for="password"
                                            style="color: #374151; font-weight: 600; margin-bottom: 8px; display: block; font-size: 14px;">
                                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                </path>
                                            </svg>
                                            {{ __('Password') }}
                                        </label>
                                        <input id="password" name="password" type="password"
                                            placeholder="{{ __('Password') }}"
                                            style="background-color: #f9fafb; border: 2px solid #e5e7eb; border-radius: 12px; padding: 14px 16px; font-size: 16px; transition: all 0.3s ease; width: 100%; font-family: inherit;"
                                            onfocus="this.style.borderColor='#ef4444'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(239, 68, 68, 0.1)';"
                                            onblur="if(this.value) { this.style.borderColor='#ef4444'; this.style.backgroundColor='#fef2f2'; } else { this.style.borderColor='#e5e7eb'; this.style.backgroundColor='#f9fafb'; } this.style.boxShadow='none';" />
                                        @error('password', 'userDeletion')
                                            <div
                                                style="color: #ef4444; font-size: 14px; margin-top: 6px; display: flex; align-items: center; gap: 6px;">
                                                <svg style="width: 16px; height: 16px;" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                        <button type="button"
                                            onclick="document.getElementById('deleteModal').style.display='none'"
                                            style="background-color: #f3f4f6; color: #374151; padding: 12px 24px; border-radius: 12px; font-weight: 500; font-size: 14px; border: 2px solid #e5e7eb; cursor: pointer; transition: all 0.3s ease;"
                                            onmouseover="this.style.backgroundColor='white'; this.style.borderColor='#d1d5db';"
                                            onmouseout="this.style.backgroundColor='#f3f4f6'; this.style.borderColor='#e5e7eb';">
                                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            {{ __('Cancel') }}
                                        </button>

                                        <button type="submit"
                                            style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: 14px; border: none; cursor: pointer; transition: all 0.3s ease;"
                                            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 8px 20px rgba(239, 68, 68, 0.3)';"
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                            <svg style="width: 16px; height: 16px; display: inline; margin-right: 8px;"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1-1H8a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            {{ __('Delete Account') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 16px !important;
                padding: 24px !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide success messages
            const successMessages = document.querySelectorAll('[style*="animation: fadeIn"]');
            successMessages.forEach(message => {
                setTimeout(() => {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(() => {
                        message.style.display = 'none';
                    }, 500);
                }, 3000);
            });

            // Close modal when clicking outside
            const modal = document.getElementById('deleteModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            }

            // Show modal if there are userDeletion errors
            @if ($errors->userDeletion->isNotEmpty())
                document.getElementById('deleteModal').style.display = 'flex';
            @endif
        });
    </script>
@endsection
