<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'Laravel') }}</title>
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

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .custom-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .custom-checkbox:checked {
            background-color: #5260DE;
            border-color: #5260DE;
        }

        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .forgot-password-link {
            color: #5260DE;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password-link:hover {
            color: #3730a3;
            text-decoration: underline;
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
                        <p class="text-gray-600 mt-1">Welcome back!</p>
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
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
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

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

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
                            value="{{ old('email') }}" required autofocus autocomplete="username"
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

                    <!-- Password -->
                    <div>
                        <label for="password" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Password
                        </label>
                        <input id="password" class="input-field" type="password" name="password" required
                            autocomplete="current-password" placeholder="Enter your password" />
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

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="checkbox-container">
                            <input id="remember_me" type="checkbox" class="custom-checkbox" name="remember">
                            <label for="remember_me" class="text-sm text-gray-600 cursor-pointer">
                                Remember me
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password-link">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4 pt-4">
                        <button type="submit" class="primary-button">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Sign In
                        </button>

                        <div class="text-center">
                            <span class="text-gray-600 text-sm">Don't have an account?</span>
                        </div>

                        <a href="{{ route('register') }}" class="secondary-button w-full">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                </path>
                            </svg>
                            Create New Account
                        </a>
                    </div>
                </form>

                <!-- Footer -->
                <div class="text-center mt-8 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        Protected by industry-standard security measures
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

            // Form submission animation
            const form = document.querySelector('form');
            const submitButton = document.querySelector('.primary-button');

            form.addEventListener('submit', function() {
                submitButton.innerHTML = `
                    <svg class="animate-spin w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Signing in...
                `;
                submitButton.disabled = true;
            });

            // Auto-hide success/error messages after 5 seconds
            const statusMessages = document.querySelectorAll('.status-message, .success-message, .alert-error');
            statusMessages.forEach(message => {
                setTimeout(() => {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(() => {
                        message.style.display = 'none';
                    }, 500);
                }, 5000);
            });

            // Email validation feedback
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value && !emailRegex.test(this.value)) {
                    this.style.borderColor = '#ef4444';
                    this.style.backgroundColor = '#fef2f2';
                } else if (this.value) {
                    this.style.borderColor = '#10b981';
                    this.style.backgroundColor = '#f0fdf4';
                }
            });
        });
    </script>
</body>

</html>
