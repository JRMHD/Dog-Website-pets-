<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forgot Password - {{ config('app.name', 'Laravel') }}</title>
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

        .primary-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
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

        .lock-icon {
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

        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin: 24px 0;
            padding: 20px;
            background-color: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            flex: 1;
            max-width: 120px;
        }

        .step-number {
            width: 32px;
            height: 32px;
            background-color: #5260DE;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }

        .step-text {
            text-align: center;
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
        }

        .step-arrow {
            color: #cbd5e1;
            font-size: 18px;
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

            .lock-icon {
                width: 60px;
                height: 60px;
            }

            .step-indicator {
                flex-direction: column;
                gap: 12px;
            }

            .step-arrow {
                transform: rotate(90deg);
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
                        <p class="text-gray-600 mt-1">Password Recovery</p>
                    </div>
                </div>

                <!-- Lock Icon and Info Section -->
                <div class="info-section">
                    <div class="lock-icon">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Forgot Your Password?</h2>

                    <div class="instruction-text">
                        No problem. Just let us know your email address and we will email you a password reset link that
                        will allow you to choose a new one.
                    </div>
                </div>

                <!-- Process Steps -->
                <div class="step-indicator">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-text">Enter Email</div>
                    </div>
                    <div class="step-arrow">→</div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-text">Check Inbox</div>
                    </div>
                    <div class="step-arrow">→</div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-text">Reset Password</div>
                    </div>
                </div>

                <!-- Status Messages -->
                @if (session('status'))
                    <div class="success-message" id="successMessage">
                        <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <div class="font-semibold">Reset Link Sent!</div>
                            <div class="text-sm mt-1">{{ session('status') }}</div>
                        </div>
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

                <!-- Password Reset Form -->
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6" id="resetForm">
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
                            value="{{ old('email') }}" required autofocus autocomplete="email"
                            placeholder="Enter your registered email address" />
                        <p class="text-xs text-gray-500 mt-2">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            We'll send a password reset link to this email
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

                    <!-- Action Buttons -->
                    <div class="space-y-4 pt-4">
                        <button type="submit" class="primary-button" id="submitBtn">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Email Password Reset Link
                        </button>

                        <div id="cooldownMessage" class="resend-cooldown" style="display: none;">
                            Please wait <span id="countdown">60</span> seconds before requesting another reset link.
                        </div>

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

                <!-- Email Tips -->
                <div class="mt-8 p-4 bg-amber-50 border border-amber-200 rounded-lg">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-amber-700">
                            <div class="font-medium mb-1">Important Notes:</div>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Reset links expire after 60 minutes for security</li>
                                <li>Check your spam folder if you don't see the email</li>
                                <li>Make sure the email address is correct</li>
                                <li>You can only request one reset link per minute</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        🔒 Password reset links are secure and expire automatically
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resetForm = document.getElementById('resetForm');
            const submitBtn = document.getElementById('submitBtn');
            const emailInput = document.getElementById('email');
            const cooldownMessage = document.getElementById('cooldownMessage');
            const countdownSpan = document.getElementById('countdown');

            let cooldownActive = false;
            let cooldownTime = 60;

            // Check if we just sent a reset link (from session status)
            @if (session('status'))
                startCooldown();
            @endif

            function startCooldown() {
                cooldownActive = true;
                cooldownTime = 60;
                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.6';
                cooldownMessage.style.display = 'block';

                const interval = setInterval(() => {
                    cooldownTime--;
                    countdownSpan.textContent = cooldownTime;

                    if (cooldownTime <= 0) {
                        clearInterval(interval);
                        cooldownActive = false;
                        submitBtn.disabled = false;
                        submitBtn.style.opacity = '1';
                        cooldownMessage.style.display = 'none';

                        // Reset button text
                        submitBtn.innerHTML = `
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Email Password Reset Link
                        `;
                    }
                }, 1000);
            }

            // Real-time email validation
            emailInput.addEventListener('input', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value.length > 0) {
                    if (emailRegex.test(this.value)) {
                        this.style.borderColor = '#10b981';
                        this.style.backgroundColor = '#f0fdf4';
                    } else {
                        this.style.borderColor = '#f59e0b';
                        this.style.backgroundColor = '#fefbf2';
                    }
                } else {
                    this.style.borderColor = '#e5e7eb';
                    this.style.backgroundColor = '#f9fafb';
                }
            });

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

            // Handle form submission
            resetForm.addEventListener('submit', function(e) {
                if (cooldownActive) {
                    e.preventDefault();
                    return;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value)) {
                    e.preventDefault();
                    emailInput.style.borderColor = '#ef4444';
                    emailInput.style.backgroundColor = '#fef2f2';
                    emailInput.focus();
                    return;
                }

                submitBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sending Reset Link...
                `;
                submitBtn.disabled = true;
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
        });
    </script>
</body>

</html>
