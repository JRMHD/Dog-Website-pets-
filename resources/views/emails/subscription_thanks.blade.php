<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }} Newsletter!</title>
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

        .benefits-section {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .benefits-section h3 {
            color: #4169E1;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .benefits-list {
            list-style: none;
            padding: 0;
        }

        .benefits-list li {
            color: #475569;
            margin-bottom: 12px;
            padding-left: 25px;
            position: relative;
            font-size: 14px;
            line-height: 1.6;
        }

        .benefits-list li::before {
            content: '🐕';
            position: absolute;
            left: 0;
            font-size: 16px;
        }

        .what-to-expect {
            background: linear-gradient(135deg, #EBF8FF 0%, #DBEAFE 100%);
            border-left: 4px solid #4169E1;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 25px 0;
        }

        .what-to-expect h3 {
            color: #4169E1;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .what-to-expect p {
            color: #475569;
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .community-section {
            background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .community-section h3 {
            color: #059669;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
        }

        .community-section p {
            color: #64748b;
            margin: 0 0 15px 0;
            font-size: 14px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }

        .social-link {
            background: white;
            color: #4169E1;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            border: 1px solid #BBF7D0;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: #4169E1;
            color: white;
        }

        .contact-section {
            background: white;
            border: 2px solid #4169E1;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin: 25px 0;
        }

        .contact-section h3 {
            color: #4169E1;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .contact-link {
            color: #4169E1;
            text-decoration: none;
            font-weight: 600;
        }

        .contact-link:hover {
            text-decoration: underline;
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

        .unsubscribe-link {
            color: #64748b;
            text-decoration: none;
            font-size: 11px;
        }

        .unsubscribe-link:hover {
            text-decoration: underline;
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

            .social-links {
                flex-direction: column;
                align-items: center;
            }

            .social-link {
                width: 150px;
                text-align: center;
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
            <p>Welcome to Our Community!</p>
        </div>

        <div class="content">
            <div class="welcome-badge">
                🎉 Welcome Aboard!
            </div>

            <div class="greeting">
                Hi there!
            </div>

            <div class="welcome-message">
                Thank you so much for subscribing to our newsletter! We're thrilled to have you join our community of
                dog lovers and pet care enthusiasts. You've just taken the first step toward giving your furry companion
                the best care possible.
            </div>

            <div class="benefits-section">
                <h3>🌟 What You'll Receive</h3>
                <ul class="benefits-list">
                    <li>Expert dog care tips and advice from our professional team</li>
                    <li>Seasonal health reminders and preventive care guidelines</li>
                    <li>Exclusive updates about our services and special offers</li>
                    <li>Training tips and behavioral insights for happy, healthy dogs</li>
                    <li>Nutritional guidance and feeding recommendations</li>
                </ul>
            </div>

            <div class="what-to-expect">
                <h3>📅 What to Expect</h3>
                <p>You'll receive our carefully curated dog care tips and updates directly to your inbox. We respect
                    your time and inbox, so we only send valuable content that will help you and your four-legged friend
                    thrive together.</p>
            </div>

            <div class="community-section">
                <h3>🤝 Join Our Community</h3>
                <p>Connect with us on social media for daily tips, adorable photos, and real-time updates!</p>
                <div class="social-links">
                    <a href="#" class="social-link">Follow on Facebook</a>
                    <a href="#" class="social-link">Follow on Instagram</a>
                    <a href="#" class="social-link">Visit Our Website</a>
                </div>
            </div>

            <div class="contact-section">
                <h3>💬 Questions or Feedback?</h3>
                <p style="margin: 0; color: #64748b; font-size: 14px;">
                    We'd love to hear from you! Reach out at <a href="mailto:gibmarnel@gmail.com"
                        class="contact-link">gibmarnel@gmail.com</a>
                </p>
            </div>

            <div class="signature-section">
                <p>Once again, welcome to the {{ config('app.name') }} family! We're here to support you and your
                    beloved pet every step of the way.</p>
                <p class="team-signature">Best regards,<br>The {{ config('app.name') }} Team</p>
            </div>
        </div>

        <div class="footer">
            <div class="footer-brand">{{ config('app.name') }}</div>
            <div class="footer-tagline">Professional Dog Care Services</div>
            <div class="footer-legal">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
            <a href="#" class="unsubscribe-link">Unsubscribe from this list</a>
        </div>
    </div>
</body>

</html>
