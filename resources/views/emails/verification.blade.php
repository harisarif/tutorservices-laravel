@component('mail::message')
# Verify Your Email

Hi there,

We received a request to verify your email address. Please use the code below to complete your verification:

---

## 🔐 Your One-Time Code: **{{ $otp }}**

---

This code will expire in 10 minutes. If you didn’t request this, please ignore this message.

Thank you for using Edexcel Academy.

Regards,  
**Edexcel Academy Team**
@endcomponent
