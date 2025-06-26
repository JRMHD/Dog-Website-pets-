<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            margin: 0;
            padding: 40px 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #4169E1 0%, #1e3a8a 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        }

        .logo-container {
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .logo {
            max-height: 60px;
            width: auto;
            filter: brightness(0) invert(1);
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 40px 30px;
        }

        .welcome-badge {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 18px;
        }

        .greeting {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .welcome-message {
            color: #64748b;
            margin-bottom: 30px;
            font-size: 15px;
            line-height: 1.7;
        }

        .credentials-section {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .credentials-section h3 {
            color: #4169E1;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .credential-item {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .credential-item:last-child {
            margin-bottom: 0;
        }

        .credential-label {
            color: #64748b;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .credential-value {
            color: #2c3e50;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Courier New', monospace;
            background: #f1f5f9;
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
        }

        .security-notice {
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-left: 4px solid #F59E0B;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 25px 0;
        }

        .security-notice h3 {
            color: #92400E;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .security-notice p {
            color: #78350F;
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .action-section {
            background: linear-gradient(135deg, #EBF8FF 0%, #DBEAFE 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .action-section h3 {
            color: #4169E1;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
        }

        .action-section p {
            color: #64748b;
            margin: 0 0 20px 0;
            font-size: 14px;
        }

        .reset-button {
            background: linear-gradient(135deg, #4169E1 0%, #1e3a8a 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .reset-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(65, 105, 225, 0.3);
        }

        .expiry-notice {
            background: linear-gradient(135deg, #FEF2F2 0%, #FECACA 100%);
            border: 1px solid #F87171;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin: 25px 0;
        }

        .expiry-notice h3 {
            color: #DC2626;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .expiry-notice p {
            color: #7F1D1D;
            margin: 0;
            font-size: 14px;
        }

        .signature-section {
            background: linear-gradient(135deg, #FFF7ED 0%, #FFEDD5 100%);
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
        }

        .signature-section p {
            color: #64748b;
            margin: 0 0 10px 0;
            font-size: 14px;
        }

        .team-signature {
            color: #2c3e50;
            font-weight: 600;
            font-size: 16px;
        }

        .footer {
            background: #1e293b;
            color: #94a3b8;
            text-align: center;
            padding: 30px;
            font-size: 13px;
        }

        .footer-brand {
            color: white;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .footer-tagline {
            color: #64748b;
            margin-bottom: 15px;
        }

        .footer-legal {
            color: #64748b;
            font-size: 11px;
            margin-bottom: 10px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            .content {
                padding: 30px 20px;
            }

            .header {
                padding: 30px 20px;
            }

            .reset-button {
                padding: 12px 24px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <div class="logo-container">
                <img src="{{ asset('assets/images/logo.png') }}" alt="{{ config('app.name') }}" class="logo">
            </div>
            <h1>{{ config('app.name') }}</h1>
            <p>Welcome to Our Platform!</p>
        </div>

        <div class="content">
            <div class="welcome-badge">
                🎉 Account Created Successfully!
            </div>

            <div class="greeting">
                Welcome, {{ $user->name }}!
            </div>

            <div class="welcome-message">
                Your account has been created successfully! We're excited to have you join our platform. Below you'll
                find your login credentials and important next steps to secure your account.
            </div>

            <div class="credentials-section">
                <h3>🔐 Your Login Credentials</h3>
                <div class="credential-item">
                    <div class="credential-label">Email Address</div>
                    <div class="credential-value">{{ $user->email }}</div>
                </div>
                <div class="credential-item">
                    <div class="credential-label">Temporary Password</div>
                    <div class="credential-value">{{ $temporaryPassword }}</div>
                </div>
            </div>

            <div class="security-notice">
                <h3>🛡️ Important Security Notice</h3>
                <p>For your security, we've provided you with a temporary password. Please reset your password
                    immediately using the button below to ensure your account remains secure.</p>
            </div>

            <div class="action-section">
                <h3>🚀 Next Step Required</h3>
                <p>Click the button below to reset your password and complete your account setup.</p>
                <a href="{{ $resetLink }}" class="reset-button">Reset Your Password</a>
            </div>

            <div class="expiry-notice">
                <h3>⏰ Time Sensitive</h3>
                <p>This password reset link will expire in 60 minutes for security purposes.</p>
            </div>

            <div class="signature-section">
                <p>Thank you for joining {{ config('app.name') }}! We're here to support you every step of the way.</p>
                <p class="team-signature">Best regards,<br>The {{ config('app.name') }} Team</p>
            </div>
        </div>

        <div class="footer">
            <div class="footer-brand">{{ config('app.name') }}</div>
            <div class="footer-tagline">Professional Dog Care Services</div>
            <div class="footer-legal">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>
