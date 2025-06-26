<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message - {{ config('app.name') }}</title>
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

        .alert-badge {
            background: linear-gradient(135deg, #FF6B6B 0%, #FF5252 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 18px;
        }

        .notification-text {
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

        .contact-details {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .contact-details h3 {
            color: #4169E1;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
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
            min-width: 80px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #2c3e50;
            font-weight: 600;
            text-align: right;
            max-width: 60%;
            word-break: break-word;
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
            margin-bottom: 15px;
            font-size: 16px;
        }

        .message-content {
            color: #475569;
            font-style: italic;
            margin: 0;
            line-height: 1.7;
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .priority-notice {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
        }

        .priority-notice h3 {
            color: #1a1a1a;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 600;
        }

        .priority-notice p {
            color: #2c3e50;
            margin: 0;
            font-size: 14px;
        }

        .timestamp-section {
            background: white;
            border: 2px solid #4169E1;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin: 25px 0;
        }

        .timestamp-section h3 {
            color: #4169E1;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .timestamp {
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
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
                <img src="{{ asset('assets/images/logo.png') }}" alt="{{ config('app.name') }}" class="logo">
            </div>
            <h1>{{ config('app.name') }}</h1>
            <p>New Contact Message</p>
        </div>

        <div class="content">
            <div class="alert-badge">
                📩 New Message Received!
            </div>

            <div class="notification-text">
                You have received a new contact form submission.
            </div>

            <div class="description">
                A potential client has reached out through your website contact form. Please review the details below
                and respond promptly.
            </div>

            <div class="contact-details">
                <h3>👤 Contact Information</h3>

                <div class="detail-item">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $contact->fullname }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Email</span>
                    <span class="detail-value">{{ $contact->emailaddress }}</span>
                </div>

                @if ($contact->phone)
                    <div class="detail-item">
                        <span class="detail-label">Phone</span>
                        <span class="detail-value">{{ $contact->phone }}</span>
                    </div>
                @endif

                @if ($contact->subject)
                    <div class="detail-item">
                        <span class="detail-label">Subject</span>
                        <span class="detail-value">{{ $contact->subject }}</span>
                    </div>
                @endif
            </div>

            @if ($contact->msg)
                <div class="message-section">
                    <h3>💬 Message</h3>
                    <div class="message-content">{{ $contact->msg }}</div>
                </div>
            @endif

            <div class="priority-notice">
                <h3>⚡ Action Required</h3>
                <p>Please respond to this inquiry within 24 hours to maintain excellent customer service.</p>
            </div>

            <div class="timestamp-section">
                <h3>📅 Received</h3>
                <p class="timestamp">{{ now()->format('F j, Y \a\t g:i A') }}</p>
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
