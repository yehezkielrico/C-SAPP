<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #1A2333;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 8px 8px;
        }
        .otp-code {
            background-color: #ffffff;
            border: 2px solid #1A2333;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 4px;
            margin: 20px 0;
            color: #1A2333;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>C-SAPP</h1>
        <h2>Kode Verifikasi Email</h2>
    </div>

    <div class="content">
        <h3>Halo {{ $user->name }},</h3>

        <p>Terima kasih telah mendaftar di platform C-SAPP. Untuk menyelesaikan proses registrasi, silakan masukkan kode verifikasi berikut:</p>

        <div class="otp-code">
            {{ $otp }}
        </div>

        <p><strong>Penting:</strong></p>
        <ul>
            <li>Kode ini akan kadaluarsa dalam 10 menit</li>
            <li>Jangan bagikan kode ini dengan siapa pun</li>
            <li>Jika Anda tidak meminta kode ini, abaikan email ini</li>
        </ul>

        <p>Jika Anda mengalami kesulitan, silakan hubungi tim support kami.</p>

        <p>Salam,<br>
        Tim C-SAPP</p>
    </div>

    <div class="footer">
        <p>Email ini dikirim secara otomatis. Mohon jangan membalas email ini.</p>
        <p>&copy; 2026 C-SAPP. All rights reserved.</p>
    </div>
</body>
</html>
