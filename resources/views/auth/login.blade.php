<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AI Study System</title>
    <!-- Fonts & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
            background: linear-gradient(135deg, #6c5ce7, #00b894); 
            padding: 20px;
        }
        .auth-card { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            width: 100%; 
            max-width: 400px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
            animation: fadeIn 0.8s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .error-box {
            background: #fff5f5;
            color: #e17055;
            padding: 12px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            border: 1px solid #fab1a0;
            text-align: center;
        }
        @media (max-width: 480px) {
            .auth-card { padding: 25px; }
            h2 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <h2 style="text-align: center; margin-bottom: 10px; color: #2d3436;">Selamat Datang</h2>
        <p style="text-align: center; color: #636e72; font-size: 0.9rem; margin-bottom: 25px;">Masuk untuk akses Dashboard AI Study</p>
        
        <!-- Pesan Error Jika Login Gagal -->
        @if($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label style="color: #2d3436;">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username..." required autofocus>
            </div>
            
            <div class="form-group" style="margin-top: 15px;">
                <label style="color: #2d3436;">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password..." required>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; margin-top: 25px; height: 50px;">
                Masuk Sekarang
            </button>
            
            <p style="text-align: center; margin-top: 20px; font-size: 0.9rem; color: #636e72;">
                Belum punya akun? 
                <a href="{{ route('register') }}" style="color: var(--primary); font-weight: 600; text-decoration: none;">
                    Daftar di sini
                </a>
            </p>
        </form>
    </div>
</body>
</html>