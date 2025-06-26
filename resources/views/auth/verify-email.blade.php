<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Verify Email - {{ config('app.name', 'Laravel') }}</title>
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

        .primary-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .secondary-button {
            background-color: transparent;
            color: #6b7280;
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
            background-color: #f3f4f6;
            border-color: #d1d5db;
            color: #374151;
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

        .success-message {
            background-color: #f0fdf4;
            color: #166534;
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 15px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #bbf7d0;
            animation: slideIn 0.5s ease-out;
        }

        .status-message {
            background-color: #eff6ff;
            color: #1e40af;
            padding: 16px 20px;
            border-radius: 12px;
            font-size: 15px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #bfdbfe;
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

        .email-icon {
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

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .instruction-text {
            color: #4b5563;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .email-display {
            background-color: #f3f4f6;
            color: #374151;
            padding: 12px 16px;
            border-radius: 8px;
            font-family: monospace;
            font-size: 14px;
            margin: 16px 0;
            border: 1px solid #d1d5db;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 32px;
        }

        .resend-cooldown {
            color: #6b7280;
            font-size: 14px;
            text-align: center;
            margin-top: 8px;
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

            .email-icon {
                width: 60px;
                height: 60px;
            }

            .action-buttons {
                gap: 12px;
            }
        }

        @media (min-width: 641px) {
            .form-container {
                max-width: 520px;
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
                        <p class="text-gray-600 mt-1">Email Verification</p>
                    </div>
                </div>

                <!-- Email Icon and Info Section -->
                <div class="info-section">
                    <div class="email-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Check Your Email</h2>

                    <div class="instruction-text">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking
                        on the link we just emailed to you?
                    </div>

                    @if (auth()->user() && auth()->user()->email)
                        <div class="email-display">
                            📧 {{ auth()->user()->email }}
                        </div>
                    @endif

                    <div class="instruction-text">
                        If you didn't receive the email, we will gladly send you another verification link.
                    </div>
                </div>

                <!-- Status Messages -->
                @if (session('status') == 'verification-link-sent')
                    <div class="success-message" id="successMessage">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <div class="font-semibold">Email Sent Successfully!</div>
                            <div class="text-sm mt-1">A new verification link has been sent to your email address.
                                Please check your inbox and spam folder.</div>
                        </div>
                    </div>
                @endif

                @if (session('status') && session('status') != 'verification-link-sent')
                    <div class="status-message">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{ session('status') }}
                    </div>
                @endif

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

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <!-- Resend Verification Email Form -->
                    <form method="POST" action="{{ route('verification.send') }}" id="resendForm">
                        @csrf
                        <button type="submit" class="primary-button" id="resendBtn">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Resend Verification Email
                        </button>
                    </form>

                    <div id="cooldownMessage" class="resend-cooldown" style="display: none;">
                        Please wait <span id="countdown">60</span> seconds before requesting another email.
                    </div>

                    <!-- Logout Form -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="secondary-button w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>

                <!-- Email Tips -->
                <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-blue-700">
                            <div class="font-medium mb-1">Didn't receive the email?</div>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Check your spam or junk folder</li>
                                <li>Make sure you entered the correct email address</li>
                                <li>Wait a few minutes - emails can take time to arrive</li>
                                <li>Add our domain to your safe senders list</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        🔒 This helps keep your account secure
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resendForm = document.getElementById('resendForm');
            const resendBtn = document.getElementById('resendBtn');
            const cooldownMessage = document.getElementById('cooldownMessage');
            const countdownSpan = document.getElementById('countdown');

            let cooldownActive = false;
            let cooldownTime = 60;

            // Check if we just sent an email (from session status)
            @if (session('status') == 'verification-link-sent')
                startCooldown();
            @endif

            function startCooldown() {
                cooldownActive = true;
                cooldownTime = 60;
                resendBtn.disabled = true;
                resendBtn.style.opacity = '0.6';
                cooldownMessage.style.display = 'block';

                const interval = setInterval(() => {
                    cooldownTime--;
                    countdownSpan.textContent = cooldownTime;

                    if (cooldownTime <= 0) {
                        clearInterval(interval);
                        cooldownActive = false;
                        resendBtn.disabled = false;
                        resendBtn.style.opacity = '1';
                        cooldownMessage.style.display = 'none';
                    }
                }, 1000);
            }

            // Handle form submission
            resendForm.addEventListener('submit', function(e) {
                if (cooldownActive) {
                    e.preventDefault();
                    return;
                }

                resendBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sending Email...
                `;
                resendBtn.disabled = true;
            });

            // Auto-hide success message after 10 seconds
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.transition = 'opacity 0.5s ease';
                    successMessage.style.opacity = '0';
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 500);
                }, 10000);
            }

            // Auto-refresh page every 30 seconds to check verification status
            let refreshCount = 0;
            const maxRefreshes = 20; // Stop after 10 minutes

            const refreshInterval = setInterval(() => {
                refreshCount++;
                if (refreshCount >= maxRefreshes) {
                    clearInterval(refreshInterval);
                    return;
                }

                // Silent check for verification status
                fetch(window.location.href, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                }).then(response => {
                    if (response.redirected) {
                        // User has been verified and redirected
                        window.location.href = response.url;
                    }
                }).catch(() => {
                    // Ignore errors
                });
            }, 30000);
        });
    </script>
</body>

</html>
