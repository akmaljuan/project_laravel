<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - PoliklinikCare+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #e3f2fd, #ffffff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }

    .login-container h1 {
      text-align: center;
      color: #0062cc;
      margin-bottom: 10px;
      font-size: 26px;
      font-weight: 700;
    }

    .login-container p {
      text-align: center;
      color: #555;
      margin-bottom: 30px;
      font-size: 14px;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #007bff;
    }

    .input-group input {
      width: 100%;
      padding: 12px 15px 12px 45px;
      border: 1px solid #ccc;
      border-radius: 30px;
      font-size: 14px;
      transition: 0.2s;
    }

    .input-group input:focus {
      outline: none;
      border-color: #007bff;
      box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
    }

    .remember-me {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      font-size: 14px;
    }

    .remember-me input {
      margin-right: 8px;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 30px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .text-link {
      margin-top: 15px;
      text-align: center;
      font-size: 13px;
    }

    .text-link a {
      color: #007bff;
      text-decoration: none;
    }

    .text-link a:hover {
      text-decoration: underline;
    }

    .alert {
      background-color: #f8d7da;
      color: #842029;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h1>PoliklinikCare+</h1>
  <p>Masuk ke akun Anda untuk melanjutkan</p>

  @if(session('error'))
    <div class="alert">
      {{ session('error') }}
    </div>
  @endif

  <form action="{{ route('login.post') }}" method="POST">
    @csrf

    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" placeholder="Email" required>
    </div>

    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" placeholder="Password" required>
    </div>

    <div class="remember-me">
      <input type="checkbox" name="remember" id="remember">
      <label for="remember">Ingat saya</label>
    </div>

    <button type="submit" class="btn">Masuk</button>

    <div class="text-link">
      Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </div>
  </form>
</div>

</body>
</html>
