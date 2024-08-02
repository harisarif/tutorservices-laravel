<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test QR Code</title>
</head>
<body>
    <div style="height: 515px; text-align: center;">
        <!-- QR code container -->
        <div id="qrcode"></div>
    </div>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        var number = "+971 56 642 8066";
        var websiteLink = "https://edexceledu.com";
        var encodedData = "Whatsapp: " + number + "      Website: " + websiteLink;

        // Generate the QR code
        new QRCode(document.getElementById('qrcode'), encodedData);
    </script>
</body>
</html>
