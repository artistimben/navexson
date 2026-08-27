<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - NAVEXMAR Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #050B14;
            color: #F1F5F9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            background: #0B192C;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        }

        .brand-logo {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 24px;
            color: #FFF;
        }

        .brand-logo i {
            color: #00ADB5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #94A3B8;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            background: #070F1A;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #FFF;
            font-size: 0.95rem;
        }

        input:focus {
            outline: none;
            border-color: #00ADB5;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #00ADB5, #008891);
            color: #FFF;
            padding: 12px;
            border-radius: 8px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
        }

        .error-message {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid #EF4444;
            color: #F87171;
            padding: 10px;
            border-radius: 6px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo" style="display:flex; flex-direction:column; align-items:center;">
            <img src="{{ asset('images/artisan.jpeg') }}" alt="NAVEX Logo" style="height: 72px; width: 72px; object-fit: cover; border-radius: 14px; margin-bottom: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.25);">
            <div>NAVEX<span style="color:#D4AF37;">MAR</span></div>
            <div style="font-size: 0.85rem; font-weight: 600; color: #94A3B8; margin-top: 4px;">Acente Yönetim Paneli</div>
        </div>

        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>E-Posta Adresi</label>
                <input type="email" name="email" value="{{ old('email', 'admin@navexmar.com') }}" required autofocus>
            </div>

            <div class="form-group">
                <label>Şifre</label>
                <input type="password" name="password" value="password123" required>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; font-size: 0.85rem; color: #94A3B8;">
                <label style="display: flex; align-items: center; gap: 6px; cursor: pointer; margin: 0;">
                    <input type="checkbox" name="remember" style="width: auto;"> Beni Hatırla
                </label>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fa-solid fa-right-to-bracket"></i> Giriş Yap
            </button>
        </form>
    </div>

</body>
</html>
