<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Subscription - {{ config('app.name') }}</title>
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
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
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

        .subscription-details {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .subscription-details h3 {
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
            word-break: break-word;
        }

        .email-highlight {
            background: linear-gradient(135deg, #EBF8FF 0%, #DBEAFE 100%);
            border: 2px solid #4169E1;
            border-radius: 12px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }

        .email-highlight h3 {
            color: #4169E1;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 600;
        }

        .email-address {
            color: #2c3e50;
            font-size: 18px;
            font-weight: 700;
            word-break: break-all;
        }

        .stats-section {
            background: linear-gradient(135deg, #F0FDF4 0%, #DCFCE7 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .stats-section h3 {
            color: #059669;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }

        .stat-item {
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #BBF7D0;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #059669;
            display: block;
        }

        .stat-label {
            font-size: 12px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 500;
        }

        .action-notice {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
        }

        .action-notice h3 {
            color: #1a1a1a;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 600;
        }

        .action-notice p {
            color: #2c3e50;
            margin: 0;
            font-size: 14px;
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

            .stats-grid {
                grid-template-columns: 1fr;
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
            <p>Newsletter Subscription</p>
        </div>

        <div class="content">
            <div class="success-badge">
                🎉 New Subscriber!
            </div>

            <div class="notification-text">
                Great news! You have a new newsletter subscriber.
            </div>

            <div class="description">
                Someone has just joined your mailing list and is interested in receiving updates about your dog care
                services.
            </div>

            <div class="email-highlight">
                <h3>📧 New Subscriber Email</h3>
                <div class="email-address">{{ $subscription->email }}</div>
            </div>

            <div class="subscription-details">
                <h3>📋 Subscription Details</h3>

                <div class="detail-item">
                    <span class="detail-label">Email Address</span>
                    <span class="detail-value">{{ $subscription->email }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Subscribed On</span>
                    <span class="detail-value">{{ $subscription->created_at->format('F j, Y') }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Time</span>
                    <span class="detail-value">{{ $subscription->created_at->format('g:i A') }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Source</span>
                    <span class="detail-value">Website Newsletter Form</span>
                </div>
            </div>

            

            <div class="action-notice">
                <h3>💡 Next Steps</h3>
                <p>Consider adding this subscriber to your email marketing campaigns and welcome sequence.</p>
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
