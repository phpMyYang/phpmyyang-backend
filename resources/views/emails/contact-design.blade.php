<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; color: #333; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-top: 5px solid #FE7743; }
        .header { text-align: center; border-bottom: 1px solid #ddd; padding-bottom: 20px; margin-bottom: 20px; }
        .header h2 { color: #273F4F; margin: 0; }
        .content p { line-height: 1.6; font-size: 16px; margin: 10px 0; }
        .label { font-weight: bold; color: #FE7743; }
        .message-box { background: #f9f9f9; padding: 15px; border-left: 4px solid #273F4F; font-style: italic; margin-top: 20px; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Client Inquiry 🚀</h2>
        </div>
        <div class="content">
            <p>Hello Jeremiah,</p>
            <p>You have received a new message from your portfolio website.</p>
            
            <p><span class="label">Name:</span> {{ $contactData['name'] }}</p>
            <p><span class="label">Email:</span> {{ $contactData['email'] }}</p>
            
            <div class="message-box">
                "{{ $contactData['message'] }}"
            </div>
        </div>
        <div class="footer">
            <p>This email was sent securely from phpMyYang via Laravel PHPMailer.</p>
        </div>
    </div>
</body>
</html>