<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .email-header {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
            text-align: left;
        }
        .email-footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        .btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2 style="margin: 0; color: #4CAF50;">Welcome to Edexcel</h2>
        </div>
        <div class="email-body">
            <p style="margin: 0; font-size: 16px;">Dear {{ $tutor->f_name }} {{ $tutor->l_name }},</p>
            <p style="margin: 10px 0; font-size: 16px;">
                Welcome to Edexcel! 🎉 We’re excited to support you on your educational journey with top-notch resources and interactive learning.
            </p>
            <p style="margin: 10px 0; font-size: 16px;">
                Explore our courses, connect with expert educators, and engage with fellow learners.
            </p>
            <p style="margin: 10px 0; font-size: 16px;">
                If you need any assistance, contact us at 
                <a href="mailto:infoo@edexceledu.com" style="color: #4CAF50; text-decoration: none;">infoo@edexceledu.com</a> 
                or call us at <a href="tel:+971566428066" style="color: #4CAF50; text-decoration: none;">+971566428066</a>.
            </p>
            <p style="margin: 20px 0; text-align: center;">
                <a href="https://bit.ly/4jm3MAS" class="btn">Explore Courses</a>
            </p>
            <p style="margin: 10px 0; font-size: 16px;">We’re here to help you succeed!</p>
            <p style="margin: 10px 0; font-size: 16px; font-weight: bold;">Best regards,</p>
            <p style="margin: 10px 0; font-size: 16px; font-weight: bold;">The Edexcel Team</p>
        </div>
        <div class="email-footer">
            &copy; {{ date('Y') }} Edexcel. All rights reserved.
        </div>
    </div>
</body>
</html>
