<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - {{ config('app.name', 'Laravel') }}</title>
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
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
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

        .success-feedback {
            background-color: #f0fdf4;
            color: #166534;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            margin-top: 6px;
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
                max-width: 480px;
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
                        <p class="text-gray-600 mt-1">Create your account</p>
                    </div>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Full Name
                        </label>
                        <input id="name" class="input-field" type="text" name="name"
                            value="{{ old('name') }}" required autofocus autocomplete="name"
                            placeholder="Enter your full name" />
                        @error('name')
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
                            value="{{ old('email') }}" required autocomplete="username"
                            placeholder="Enter your email address" />
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

                    <!-- Phone Number -->
                    <div>
                        <label for="phone_number" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            Phone Number
                        </label>
                        <input id="phone_number" class="input-field" type="tel" name="phone_number"
                            value="{{ old('phone_number') }}" required placeholder="+254712345678 or 0712345678" />
                        <p class="text-sm text-gray-600 mt-2">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Phone number (e.g., +254712345678 or 0712345678)
                        </p>
                        @error('phone_number')
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

                    <!-- Password -->
                    <div>
                        <label for="password" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Password
                        </label>
                        <input id="password" class="input-field" type="password" name="password" required
                            autocomplete="new-password" placeholder="Create a secure password" />
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
                            Confirm Password
                        </label>
                        <input id="password_confirmation" class="input-field" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirm your password" />
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
                        <button type="submit" class="primary-button">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                            Create Account
                        </button>

                        <div class="text-center">
                            <span class="text-gray-600 text-sm">Already have an account?</span>
                        </div>

                        <a href="{{ route('login') }}" class="secondary-button w-full">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign In Instead
                        </a>
                    </div>
                </form>

                <!-- Footer -->
                <div class="text-center mt-8 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        By creating an account, you agree to our
                        <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms of Service</a>
                        and
                        <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add real-time validation feedback
            const inputs = document.querySelectorAll('.input-field');

            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = '#10b981';
                        this.style.backgroundColor = '#f0fdf4';
                    } else {
                        this.style.borderColor = '#e5e7eb';
                        this.style.backgroundColor = '#f9fafb';
                    }
                });

                input.addEventListener('blur', function() {
                    if (this.value.length === 0) {
                        this.style.borderColor = '#e5e7eb';
                        this.style.backgroundColor = '#f9fafb';
                    }
                });
            });

            // Password confirmation validation
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');

            function validatePasswordMatch() {
                if (passwordConfirmation.value.length > 0) {
                    if (password.value === passwordConfirmation.value) {
                        passwordConfirmation.style.borderColor = '#10b981';
                        passwordConfirmation.style.backgroundColor = '#f0fdf4';
                    } else {
                        passwordConfirmation.style.borderColor = '#ef4444';
                        passwordConfirmation.style.backgroundColor = '#fef2f2';
                    }
                }
            }

            password.addEventListener('input', validatePasswordMatch);
            passwordConfirmation.addEventListener('input', validatePasswordMatch);

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
            const submitButton = document.querySelector('.primary-button');

            form.addEventListener('submit', function() {
                submitButton.innerHTML = `
                    <svg class="animate-spin w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Creating Account...
                `;
                submitButton.disabled = true;
            });
        });
    </script>
</body>

</html>
