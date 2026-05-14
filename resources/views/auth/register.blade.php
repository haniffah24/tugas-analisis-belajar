<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { 
            display: flex; justify-content: center; align-items: center; min-height: 100vh; 
            margin: 0; background: linear-gradient(135deg, #6c5ce7, #00b894); padding: 20px;
        }
        /* Penyesuaian lebar kartu di Mobile */
        .auth-card { 
            background: white; padding: 40px; border-radius: 20px; 
            width: 100%; max-width: 400px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
        }
        @media (max-width: 480px) {
            .auth-card { padding: 25px; }
            h2 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <h2 style="text-align: center; margin-bottom: 20px;">{{ Request::is('login') ? 'Masuk ke Sistem' : 'Daftar Akun' }}</h2>
        
        @if($errors->any())
            <p style="color: var(--accent); font-size: 0.8rem; text-align:center;">{{ $errors->first() }}</p>
        @endif

        <form action="{{ Request::is('login') ? '/login' : '/register' }}" method="POST">
            @csrf
            @if(Request::is('register'))
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            @endif
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn-primary" style="width: 100%; margin-top: 20px;">
                {{ Request::is('login') ? 'Login' : 'Daftar Sekarang' }}
            </button>
            <p style="text-align: center; margin-top: 15px; font-size: 0.9rem;">
                {{ Request::is('login') ? 'Belum punya akun?' : 'Sudah punya akun?' }} 
                <a href="{{ Request::is('login') ? '/register' : '/login' }}" style="color: var(--primary); font-weight:600;">
                    {{ Request::is('login') ? 'Daftar' : 'Login' }}
                </a>
            </p>
        </form>
    </div>
</body>
</html>