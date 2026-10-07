<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - LSPD Management Console</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background: #090d16;
      color: #ffffff;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      background: #131b2e;
      border: 1px solid #1e293b;
      border-radius: 16px;
      padding: 2.5rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
      text-align: center;
    }

    .login-logo {
      width: 75px;
      height: 75px;
      margin-bottom: 1rem;
    }

    .login-title {
      font-size: 1.35rem;
      font-weight: 800;
      margin: 0 0 0.25rem 0;
      color: #ffffff;
    }

    .login-subtitle {
      font-size: 0.78rem;
      color: #3b82f6;
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 1.25rem;
      text-align: left;
    }

    .form-label {
      font-size: 0.78rem;
      color: #94a3b8;
      font-weight: 700;
      margin-bottom: 0.4rem;
      display: block;
    }

    .form-input {
      width: 100%;
      background: #0b0f19;
      border: 1px solid #1e293b;
      color: #ffffff;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      font-size: 0.95rem;
      box-sizing: border-box;
      text-align: center;
      letter-spacing: 2px;
      font-weight: 800;
    }

    .form-input:focus {
      outline: none;
      border-color: #3b82f6;
    }

    .btn-login {
      width: 100%;
      background: #2563eb;
      color: #ffffff;
      border: none;
      padding: 0.8rem;
      border-radius: 8px;
      font-weight: 800;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
    }

    .btn-login:hover {
      background: #1d4ed8;
    }

    .error-msg {
      background: rgba(239, 68, 68, 0.15);
      border: 1px solid #ef4444;
      color: #f87171;
      padding: 0.6rem;
      border-radius: 6px;
      font-size: 0.78rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }
  </style>
</head>

<body>
  <div class="login-card">
    <img src="{{ asset('img/lspd_logo.png') }}" alt="LSPD Emblem" class="login-logo">
    <h2 class="login-title">LOS SANTOS POLICE DEPT</h2>
    <div class="login-subtitle">ADMIN CONSOLE LOGIN</div>

    @if(session('error'))
      <div class="error-msg">
        <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
      </div>
    @endif

    <form action="{{ route('admin.authenticate') }}" method="POST">
      @csrf
      <div class="form-group">
        <label class="form-label">MASUKKAN PIN / PASSWORD ADMIN</label>
        <input type="password" name="pin" class="form-input" placeholder="••••••" autofocus required autocomplete="off">
      </div>

      <button type="submit" class="btn-login">
        <i class="fa-solid fa-key"></i> OTENTIKASI HAK AKSES
      </button>
    </form>

    <div style="margin-top: 1.5rem; font-size: 0.72rem; color: #64748b;">
      Admin PIN: <strong style="color: #3b82f6;">110011</strong>
    </div>
  </div>
</body>

</html>
