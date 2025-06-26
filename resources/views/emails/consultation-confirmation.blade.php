<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Confirmed - {{ config('app.name') }}</title>
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

        .success-badge {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            color: #1a1a1a;
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

        .description {
            color: #64748b;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .booking-details {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .booking-details h3 {
            color: #4169E1;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #64748b;
            font-weight: 500;
            font-size: 14px;
        }

        .detail-value {
            color: #2c3e50;
            font-weight: 600;
            text-align: right;
            max-width: 60%;
        }

        .message-section {
            background: #f1f5f9;
            border-left: 4px solid #4169E1;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 25px 0;
        }

        .message-section h3 {
            color: #4169E1;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .next-steps {
            background: linear-gradient(135deg, #F5F5DC 0%, #F0E68C 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
        }

        .next-steps h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
        }

        .steps-list {
            list-style: none;
            padding: 0;
        }

        .steps-list li {
            color: #475569;
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
            font-size: 14px;
        }

        .steps-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #4169E1;
            font-weight: bold;
            font-size: 16px;
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

            .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .detail-value {
                text-align: left;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <div class="logo-container">
                <img src="{{ $logoUrl ?? asset('assets/images/logo.png') }}" alt="{{ config('app.name') }}"
                    class="logo">
            </div>
            <h1>{{ config('app.name') }}</h1>
            <p>Consultation Confirmed</p>
        </div>

        <div class="content">
            <div class="success-badge">
                ✅ Booking Confirmed!
            </div>

            <div class="greeting">
                Hello {{ $consultation->name }},
            </div>

            <div class="description">
                Your consultation has been successfully booked. We're excited to help you and your furry companion!
            </div>

            <div class="booking-details">
                <h3>📋 Booking Details</h3>

                <div class="detail-item">
                    <span class="detail-label">Reference ID</span>
                    <span class="detail-value">#{{ str_pad($consultation->id, 6, '0', STR_PAD_LEFT) }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Service</span>
                    <span class="detail-value">{{ $consultation->service_name }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">{{ $consultation->formatted_date }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Time</span>
                    <span class="detail-value">{{ $consultation->formatted_time }}</span>
                </div>

                @if ($consultation->dog_age)
                    <div class="detail-item">
                        <span class="detail-label">Dog's Age</span>
                        <span class="detail-value">{{ $consultation->dog_age_display }}</span>
                    </div>
                @endif
            </div>

            @if ($consultation->message)
                <div class="message-section">
                    <h3>💬 Your Message</h3>
                    <p style="color: #475569; font-style: italic; margin: 0;">"{{ $consultation->message }}"</p>
                </div>
            @endif

            <div class="next-steps">
                <h3>🚀 What's Next?</h3>
                <ul class="steps-list">
                    <li>We'll contact you within 24 hours to confirm</li>
                    <li>Receive detailed preparation instructions</li>
                    <li>Meet with our expert team</li>
                    <li>Get your personalized action plan</li>
                </ul>
            </div>

            <div class="contact-section">
                <h3>📞 Questions?</h3>
                <p style="margin: 0; color: #64748b; font-size: 14px;">
                    Contact us at <a href="mailto:gibmarnel@gmail.com" class="contact-link">gibmarnel@gmail.com</a>
                </p>
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
