<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Consultation Booking - {{ config('app.name') }}</title>
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
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
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

        .priority-badge {
            background: linear-gradient(135deg, #FF6B6B 0%, #ee5a52 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 16px;
            border: 2px solid #ff5252;
        }

        .priority-badge::before {
            content: '⚠️';
            font-size: 20px;
            margin-right: 10px;
        }

        .admin-greeting {
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

        .booking-summary {
            background: linear-gradient(135deg, #FFF8E1 0%, #FFECB3 100%);
            border: 1px solid #FFD54F;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            text-align: center;
        }

        .booking-summary h3 {
            color: #F57F17;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
        }

        .booking-id {
            font-size: 24px;
            font-weight: 700;
            color: #E65100;
            background: white;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 10px;
        }

        .customer-details {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .customer-details h3 {
            color: #4169E1;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
        }

        .appointment-details {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .appointment-details h3 {
            color: #059669;
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

        .detail-value a {
            color: #4169E1;
            text-decoration: none;
        }

        .detail-value a:hover {
            text-decoration: underline;
        }

        .message-section {
            background: #f0f9ff;
            border-left: 4px solid #0ea5e9;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 25px 0;
        }

        .message-section h3 {
            color: #0ea5e9;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .message-content {
            color: #475569;
            font-style: italic;
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e0f2fe;
        }

        .action-required {
            background: linear-gradient(135deg, #FFE4E1 0%, #FFC1CC 100%);
            border: 2px solid #ff6b6b;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .action-required h3 {
            color: #c53030;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
        }

        .action-list {
            list-style: none;
            padding: 0;
            text-align: left;
            max-width: 400px;
            margin: 0 auto;
        }

        .action-list li {
            color: #744210;
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
            font-size: 14px;
            font-weight: 500;
        }

        .action-list li::before {
            content: '📞';
            position: absolute;
            left: 0;
            font-size: 16px;
        }

        .contact-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .contact-btn {
            background: linear-gradient(135deg, #4169E1 0%, #1e3a8a 100%);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: transform 0.2s;
        }

        .contact-btn:hover {
            transform: translateY(-2px);
        }

        .contact-btn.email {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .submission-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin: 25px 0;
            font-size: 14px;
            color: #64748b;
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

            .contact-buttons {
                flex-direction: column;
                align-items: center;
            }

            .contact-btn {
                width: 100%;
                max-width: 200px;
                text-align: center;
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
            <p>New Consultation Booking</p>
        </div>

        <div class="content">
            <div class="priority-badge">
                URGENT: Contact customer within 24 hours
            </div>

            <div class="admin-greeting">
                Hello Team,
            </div>

            <div class="description">
                A new consultation has been booked through your website. Please review the details below and contact the
                customer promptly to confirm their appointment.
            </div>

            <div class="booking-summary">
                <h3>📋 New Booking Alert</h3>
                <p style="margin: 0; color: #F57F17; font-weight: 500;">Booking Reference</p>
                <div class="booking-id">#{{ str_pad($consultation->id, 6, '0', STR_PAD_LEFT) }}</div>
            </div>

            <div class="customer-details">
                <h3>👤 Customer Information</h3>

                <div class="detail-item">
                    <span class="detail-label">Full Name</span>
                    <span class="detail-value">{{ $consultation->name }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Email Address</span>
                    <span class="detail-value">
                        <a href="mailto:{{ $consultation->email }}">{{ $consultation->email }}</a>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Phone Number</span>
                    <span class="detail-value">
                        <a href="tel:{{ $consultation->phone }}">{{ $consultation->phone }}</a>
                    </span>
                </div>

                @if ($consultation->dog_age)
                    <div class="detail-item">
                        <span class="detail-label">Dog's Age</span>
                        <span class="detail-value">{{ $consultation->dog_age_display }}</span>
                    </div>
                @endif
            </div>

            <div class="appointment-details">
                <h3>📅 Appointment Details</h3>

                <div class="detail-item">
                    <span class="detail-label">Preferred Date</span>
                    <span class="detail-value">{{ $consultation->formatted_date }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Preferred Time</span>
                    <span class="detail-value">{{ $consultation->formatted_time }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Service Requested</span>
                    <span class="detail-value">{{ $consultation->service_name }}</span>
                </div>
            </div>

            @if ($consultation->message)
                <div class="message-section">
                    <h3>💬 Customer Message</h3>
                    <div class="message-content">
                        "{{ $consultation->message }}"
                    </div>
                </div>
            @endif

            <div class="action-required">
                <h3>🎯 Action Required</h3>
                <ul class="action-list">
                    <li>Contact customer to confirm appointment availability</li>
                    <li>Send detailed preparation instructions</li>
                    <li>Update calendar with confirmed booking</li>
                </ul>

                <div class="contact-buttons">
                    <a href="mailto:{{ $consultation->email }}" class="contact-btn email">
                        📧 Send Email
                    </a>
                    <a href="tel:{{ $consultation->phone }}" class="contact-btn">
                        📞 Call Now
                    </a>
                </div>
            </div>

            <div class="submission-info">
                <p style="margin: 0;"><strong>Submitted:</strong>
                    {{ $consultation->created_at->format('F j, Y \a\t g:i A') }}</p>
                <p style="margin: 5px 0 0 0;"><strong>Response Time Target:</strong> Within 24 hours</p>
            </div>
        </div>

        <div class="footer">
            <div class="footer-brand">{{ config('app.name') }}</div>
            <div class="footer-tagline">Professional Dog Care Services - Admin Panel</div>
            <div class="footer-legal">
                © {{ date('Y') }} {{ config('app.name') }}. Internal notification system.
            </div>
        </div>
    </div>
</body>

</html>
