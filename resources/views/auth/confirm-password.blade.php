<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Confirm Password - {{ config('app.name', 'Laravel') }}</title>
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

        .alert-error {
            background-color: #fef2f2;
            color: #dc2626;
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 15px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #fecaca;
        }

        .info-section {
            text-align: center;
            margin-bottom: 32px;
        }

        .shield-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #5260DE, #FFD700);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .instruction-text {
            color: #4b5563;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .security-notice {
            background-color: #fef3c7;
            color: #92400e;
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #fbbf24;
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

            .shield-icon {
                width: 60px;
                height: 60px;
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
                        <p class="text-gray-600 mt-1">Security Verification</p>
                    </div>
                </div>

                <!-- Shield Icon and Info Section -->
                <div class="info-section">
                    <div class="shield-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Secure Area Access</h2>

                    <div class="instruction-text">
                        This is a secure area of the application. Please confirm your password before continuing.
                    </div>
                </div>

                <!-- Security Notice -->
                <div class="security-notice">
                    <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <div class="font-medium">Additional Security Required</div>
                        <div class="text-sm mt-1">Re-enter your password to access sensitive features</div>
                    </div>
                </div>

                <!-- Error Messages -->
                @if (session('error'))
                    <div class="alert-error">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert-error">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Password Confirmation Form -->
                <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                    @csrf

                    <!-- Password -->
                    <div>
                        <label for="password" class="input-label">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Current Password
                        </label>
                        <input id="password" class="input-field" type="password" name="password" required
                            autocomplete="current-password" placeholder="Enter your current password" autofocus />
                        <p class="text-xs text-gray-500 mt-2">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Your password will not be stored or logged
                        </p>
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

                    <!-- Action Buttons -->
                    <div class="space-y-4 pt-4">
                        <button type="submit" class="primary-button" id="confirmBtn">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Confirm Password
                        </button>

                        <div class="text-center">
                            <span class="text-gray-600 text-sm">Need to go back?</span>
                        </div>

                        <a href="{{ url()->previous() }}" class="secondary-button w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Go Back
                        </a>
                    </div>
                </form>

                <!-- Footer -->
                <div class="text-center mt-8 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        🔒 This verification helps protect your sensitive data
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmBtn = document.getElementById('confirmBtn');
            const form = document.querySelector('form');

            // Focus on password input
            passwordInput.focus();

            // Real-time password feedback
            passwordInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.style.borderColor = '#10b981';
                    this.style.backgroundColor = '#f0fdf4';
                } else {
                    this.style.borderColor = '#e5e7eb';
                    this.style.backgroundColor = '#f9fafb';
                }
            });

            // Handle form submission
            form.addEventListener('submit', function() {
                confirmBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Verifying...
                `;
                confirmBtn.disabled = true;
            });

            // Auto-hide error messages after 5 seconds
            const errorMessages = document.querySelectorAll('.alert-error');
            errorMessages.forEach(message => {
                setTimeout(() => {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(() => {
                        message.style.display = 'none';
                    }, 500);
                }, 5000);
            });
        });
    </script>
</body>

</html>
