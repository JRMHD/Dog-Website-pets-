<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reset Password - {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #F0F5F4 0%, #ffffff 50%, #5260DE 100%);
            min-height: 100vh;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .input-field {
            background-color: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 16px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .input-field:focus {
            outline: none;
            border-color: #5260DE;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(82, 96, 222, 0.1);
        }

        .input-label {
            color: #374151;
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            font-size: 14px;
        }

        .primary-button {
            background: linear-gradient(135deg, #5260DE, #FFD700);
            color: white;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .primary-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(82, 96, 222, 0.3);
        }

        .primary-button:active {
            transform: translateY(0);
        }

        .secondary-button {
            background-color: #F0F5F4;
            color: #374151;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 500;
            font-size: 14px;
            border: 2px solid #e5e7eb;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .secondary-button:hover {
            background-color: white;
            border-color: #5260DE;
            color: #5260DE;
            transform: translateY(-1px);
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .logo {
            width: 60px;
            height: 60px;
        }

        .floating-element {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(82, 96, 222, 0.1), rgba(255, 215, 0, 0.1));
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .success-message {
            background-color: #f0fdf4;
            color: #166534;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #bbf7d0;
        }

        .status-message {
            background-color: #eff6ff;
            color: #1e40af;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #bfdbfe;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #fecaca;
        }

        .info-box {
            background-color: #f0f9ff;
            color: #0369a1;
            padding: 16px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 24px;
            border: 1px solid #bae6fd;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .password-strength {
            margin-top: 8px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            background-color: #f3f4f6;
            color: #6b7280;
        }

        .password-strength.weak {
            background-color: #fef2f2;
            color: #dc2626;
        }

        .password-strength.medium {
            background-color: #fef3c7;
            color: #d97706;
        }

        .password-strength.strong {
            background-color: #f0fdf4;
            color: #166534;
        }

        /* Mobile Responsive */
        @media (max-width: 640px) {
            .form-container {
                margin: 20px;
                padding: 32px 24px;
            }

            .logo {
                width: 50px;
                height: 50px;
            }

            .floating-element {
                display: none;
            }
        }

        @media (min-width: 641px) {
            .form-container {
                max-width: 500px;
                margin: 0 auto;
                padding: 48px 40px;
            }
        }
    </style>
</head>

<body>
    <div class="gradient-bg relative overflow-hidden">
        <!-- Floating Elements -->
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>

        <div class="flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="form-container rounded-2xl">
                <!-- Logo and Title -->
                <div class="logo-container">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo">
                    <div class="text-center">
                        <h1 class="text-3xl font-bold text-gray-900">{{ config('app.name', 'MyApp') }}</h1>
                        <p class="text-gray-600 mt-1">Reset your password</p>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="info-box">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <div class="font-medium">Create a new secure password</div>
                        <div class="text-sm mt-1">Your new password should be at least 8 characters long and include a
                            mix of letters, numbers, and special characters.</div>
                    </div>
                </div>

                <!-- Session Status Messages -->
                @if (session('status'))
                    <div class="status-message">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Success Messages -->
                @if (session('success'))
                    <div class="success-message">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if (session('error'))
                    <div class="alert-error">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert-error">
                        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <div class="font-medium">There were some errors with your submission:</div>
                            <ul class="mt-1 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Reset Password Form -->
                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Email Address
                        </label>
                        <input id="email" class="input-field" type="email" name="email"
                            value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                            placeholder="Enter your email address" readonly
                            style="background-color: #f3f4f6; color: #6b7280;" />
                        <p class="text-xs text-gray-500 mt-2">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            This email is associated with your password reset request
                        </p>
                        @error('email')
                            <div class="error-message">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            New Password
                        </label>
                        <input id="password" class="input-field" type="password" name="password" required
                            autocomplete="new-password" placeholder="Create a strong password" />
                        <div id="passwordStrength" class="password-strength" style="display: none;">
                            Password strength: <span id="strengthText">-</span>
                        </div>
                        @error('password')
                            <div class="error-message">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
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
                        <label for="password_confirmation" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Confirm New Password
                        </label>
                        <input id="password_confirmation" class="input-field" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirm your new password" />
                        <div id="passwordMatch" class="password-strength" style="display: none;">
                            <span id="matchText">-</span>
                        </div>
                        @error('password_confirmation')
                            <div class="error-message">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4 pt-4">
                        <button type="submit" class="primary-button" id="submitBtn">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Reset Password
                        </button>

                        <div class="text-center">
                            <span class="text-gray-600 text-sm">Remember your password?</span>
                        </div>

                        <a href="{{ route('login') }}" class="secondary-button w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Back to Login
                        </a>
                    </div>
                </form>

                <!-- Footer -->
                <div class="text-center mt-8 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        🔒 Your password will be encrypted and stored securely
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const passwordStrengthDiv = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('strengthText');
            const passwordMatchDiv = document.getElementById('passwordMatch');
            const matchText = document.getElementById('matchText');
            const submitBtn = document.getElementById('submitBtn');

            // Password strength checker
            function checkPasswordStrength(password) {
                let strength = 0;
                let feedback = [];

                if (password.length >= 8) strength += 1;
                else feedback.push('at least 8 characters');

                if (/[A-Z]/.test(password)) strength += 1;
                else feedback.push('uppercase letter');

                if (/[a-z]/.test(password)) strength += 1;
                else feedback.push('lowercase letter');

                if (/[0-9]/.test(password)) strength += 1;
                else feedback.push('number');

                if (/[^A-Za-z0-9]/.test(password)) strength += 1;
                else feedback.push('special character');

                return {
                    strength,
                    feedback
                };
            }

            // Real-time password strength feedback
            passwordInput.addEventListener('input', function() {
                const password = this.value;

                if (password.length > 0) {
                    passwordStrengthDiv.style.display = 'block';
                    const result = checkPasswordStrength(password);

                    if (result.strength <= 2) {
                        passwordStrengthDiv.className = 'password-strength weak';
                        strengthText.textContent = `Weak (needs: ${result.feedback.join(', ')})`;
                    } else if (result.strength <= 4) {
                        passwordStrengthDiv.className = 'password-strength medium';
                        strengthText.textContent = `Medium (add: ${result.feedback.join(', ')})`;
                    } else {
                        passwordStrengthDiv.className = 'password-strength strong';
                        strengthText.textContent = 'Strong ✓';
                    }

                    // Visual feedback for input
                    if (result.strength >= 3) {
                        this.style.borderColor = '#10b981';
                        this.style.backgroundColor = '#f0fdf4';
                    } else {
                        this.style.borderColor = '#f59e0b';
                        this.style.backgroundColor = '#fefbf2';
                    }
                } else {
                    passwordStrengthDiv.style.display = 'none';
                    this.style.borderColor = '#e5e7eb';
                    this.style.backgroundColor = '#f9fafb';
                }

                // Check password match when password changes
                checkPasswordMatch();
            });

            // Password confirmation checker
            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (confirmPassword.length > 0) {
                    passwordMatchDiv.style.display = 'block';

                    if (password === confirmPassword) {
                        passwordMatchDiv.className = 'password-strength strong';
                        matchText.textContent = 'Passwords match ✓';
                        confirmPasswordInput.style.borderColor = '#10b981';
                        confirmPasswordInput.style.backgroundColor = '#f0fdf4';
                    } else {
                        passwordMatchDiv.className = 'password-strength weak';
                        matchText.textContent = 'Passwords do not match';
                        confirmPasswordInput.style.borderColor = '#ef4444';
                        confirmPasswordInput.style.backgroundColor = '#fef2f2';
                    }
                } else {
                    passwordMatchDiv.style.display = 'none';
                    confirmPasswordInput.style.borderColor = '#e5e7eb';
                    confirmPasswordInput.style.backgroundColor = '#f9fafb';
                }
            }

            confirmPasswordInput.addEventListener('input', checkPasswordMatch);

            // Form submission
            document.querySelector('form').addEventListener('submit', function() {
                submitBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Resetting Password...
                `;
                submitBtn.disabled = true;
            });

            // Auto-hide messages
            const statusMessages = document.querySelectorAll('.status-message, .success-message, .alert-error');
            statusMessages.forEach(message => {
                setTimeout(() => {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(() => {
                        message.style.display = 'none';
                    }, 500);
                }, 7000);
            });
        });
    </script>
</body>

</html>
