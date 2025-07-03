<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrasi - PoliklinikCare+</title>
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
      min-height: 100vh;
    }

    .register-container {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      max-width: 520px;
      width: 100%;
    }

    .register-container h1 {
      text-align: center;
      color: #0062cc;
      margin-bottom: 10px;
      font-size: 26px;
      font-weight: 700;
    }

    .register-container p {
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
      margin-top: 20px;
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

<div class="register-container">
  <h1>Registrasi Akun</h1>
  <p>Silakan lengkapi data Anda untuk membuat akun pasien</p>

  @if ($errors->any())
    <div class="alert">
      <ul style="padding-left: 18px; margin: 0;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('register.post') }}" method="POST">
    @csrf

    <div class="input-group">
      <i class="fas fa-user"></i>
      <input type="text" name="nama" placeholder="Nama Lengkap" required>
    </div>

    <div class="input-group">
      <i class="fas fa-map-marker-alt"></i>
      <input type="text" name="alamat" placeholder="Alamat" required>
    </div>

    <div class="input-group">
      <i class="fas fa-id-card"></i>
      <input type="text" name="no_ktp" placeholder="No KTP" required>
    </div>

    <div class="input-group">
      <i class="fas fa-phone"></i>
      <input type="text" name="no_hp" placeholder="No HP" required>
    </div>

    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" placeholder="Email" required>
    </div>

    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" placeholder="Password" required>
    </div>

    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    </div>

    <button type="submit" class="btn">Daftar</button>

    <div class="text-link">
      Sudah punya akun? <a href="{{ route('login') }}"><strong>Masuk</strong></a>
    </div>
  </form>
</div>

</body>
</html>
