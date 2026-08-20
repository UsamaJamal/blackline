<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 0; background-color: #ffffff; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333333; -webkit-font-smoothing: antialiased;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; padding: 50px 20px;">
        <tr>
            <td align="center">
                <!-- Main Container -->
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; width: 100%; background-color: #1C1C1F; border: 2px solid #E5CA83; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.5);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 40px 50px 20px 50px;">
                            <h1 style="margin: 0 0 10px 0; color: #ffffff; font-size: 28px; font-weight: 800;">New Inquiry Received</h1>
                            <p style="margin: 0; color: #7A7A7C; font-size: 15px;">A user has submitted the contact form on your website.</p>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 20px 50px 40px 50px;">
                            
                            <!-- Field: First Name -->
                            <div style="margin-bottom: 25px;">
                                <div style="font-size: 12.5px; font-weight: 600; color: #E5CA83; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">First Name</div>
                                <div style="padding-bottom: 10px; color: #ffffff; font-size: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">{{ $data['first_name'] ?? 'N/A' }}</div>
                            </div>
                            
                            <!-- Field: Last Name -->
                            <div style="margin-bottom: 25px;">
                                <div style="font-size: 12.5px; font-weight: 600; color: #E5CA83; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Last Name</div>
                                <div style="padding-bottom: 10px; color: #ffffff; font-size: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">{{ $data['last_name'] ?? 'N/A' }}</div>
                            </div>

                            <!-- Field: Email -->
                            <div style="margin-bottom: 25px;">
                                <div style="font-size: 12.5px; font-weight: 600; color: #E5CA83; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Email</div>
                                <div style="padding-bottom: 10px; color: #ffffff; font-size: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);"><a href="mailto:{{ $data['email'] ?? '' }}" style="color: #ffffff; text-decoration: none;">{{ $data['email'] ?? 'N/A' }}</a></div>
                            </div>

                            <!-- Field: Phone -->
                            <div style="margin-bottom: 25px;">
                                <div style="font-size: 12.5px; font-weight: 600; color: #E5CA83; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Phone Number</div>
                                <div style="padding-bottom: 10px; color: #ffffff; font-size: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">{{ $data['phone'] ?? 'N/A' }}</div>
                            </div>

                            <!-- Field: Company -->
                            <div style="margin-bottom: 25px;">
                                <div style="font-size: 12.5px; font-weight: 600; color: #E5CA83; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Company Name</div>
                                <div style="padding-bottom: 10px; color: #ffffff; font-size: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">{{ $data['company'] ?? 'N/A' }}</div>
                            </div>

                            <!-- Field: Interest -->
                            <div style="margin-bottom: 25px;">
                                <div style="font-size: 12.5px; font-weight: 600; color: #E5CA83; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Area of Interest</div>
                                <div style="padding-bottom: 10px; color: #ffffff; font-size: 16px; border-bottom: 1px solid rgba(255, 255, 255, 0.2); text-transform: capitalize;">{{ $data['interest'] ?? 'N/A' }}</div>
                            </div>

                            <!-- Field: Details -->
                            <div style="margin-bottom: 10px;">
                                <div style="font-size: 12.5px; font-weight: 600; color: #E5CA83; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">Project Details</div>
                                <div style="padding-bottom: 10px; color: #ffffff; font-size: 15px; line-height: 1.6; border-bottom: 1px solid rgba(255, 255, 255, 0.2); white-space: pre-wrap;">{{ $data['details'] ?? 'No project details provided.' }}</div>
                            </div>

                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 25px 50px; text-align: center; background-color: #121215; border-top: 1px solid rgba(255,255,255,0.05);">
                            <p style="margin: 0; color: #7A7A7C; font-size: 13px;">This is an automated notification from <strong>Black Line Marketing</strong>.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
