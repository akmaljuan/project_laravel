<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PinkCare+ - Platform Kesehatan Anda</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    * {
      scroll-behavior: smooth;
    }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #fff0f5;
      color: #333;
    }

    header {
      background-color: #ffffff;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 999;
    }

    .logo {
      font-weight: 700;
      color: #d63384;
      font-size: 24px;
    }

    nav a {
      margin-left: 20px;
      text-decoration: none;
      color: #555;
      font-weight: 500;
      transition: 0.2s;
    }

    nav a:hover {
      color: #d63384;
    }

    .hero {
      padding: 100px 20px;
      text-align: center;
      background: linear-gradient(to right, #ffe0ec, #fff0f5);
      position: relative;
      overflow: hidden;
    }

    .hero::after {
      content: '';
      position: absolute;
      bottom: -80px;
      right: -80px;
      width: 200px;
      height: 200px;
      background-color: #f8c6dc;
      border-radius: 50%;
      opacity: 0.2;
      z-index: 0;
    }

    .hero h1 {
      font-size: 36px;
      color: #c2185b;
      margin-bottom: 20px;
      position: relative;
      z-index: 1;
    }

    .hero p {
      font-size: 18px;
      color: #555;
      max-width: 600px;
      margin: 0 auto 30px;
      position: relative;
      z-index: 1;
    }

    .cta-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 12px 25px;
      border-radius: 30px;
      border: 2px solid transparent;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s ease-in-out;
      font-weight: 500;
    }

    .btn-primary {
      background-color: #d63384;
      color: white;
    }

    .btn-primary:hover {
      background-color: #ad1e68;
    }

    .btn-outline {
      background-color: transparent;
      border-color: #d63384;
      color: #d63384;
    }

    .btn-outline:hover {
      background-color: #d63384;
      color: white;
    }

    .features, .testimoni {
      padding: 60px 20px;
      background-color: #fff;
      text-align: center;
    }

    .features h2, .testimoni h2 {
      color: #d63384;
      margin-bottom: 40px;
    }

    .feature-box {
      background-color: #ffeaf4;
      border-radius: 16px;
      padding: 30px;
      flex: 1 1 250px;
      max-width: 300px;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
      margin: 15px;
    }

    .feature-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
    }

    .testimoni-container {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .testi-card {
      background-color: #fff0f5;
      border-left: 5px solid #d63384;
      padding: 20px;
      max-width: 350px;
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.05);
    }

    .testi-card p {
      font-style: italic;
      font-size: 14px;
      color: #444;
    }

    .testi-card strong {
      display: block;
      margin-top: 10px;
      color: #d63384;
    }

    .cta-extra {
      padding: 60px 20px;
      background-color: #ffe4ec;
      text-align: center;
    }

    .cta-extra h2 {
      margin-bottom: 20px;
      color: #c2185b;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #fff0f5;
      font-size: 14px;
      color: #777;
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 28px;
      }

      .cta-buttons {
        flex-direction: column;
      }

      .feature-container, .testimoni-container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="logo">PinkCare+</div>
  <nav>
    <a href="#fitur">Fitur</a>
    <a href="#testimoni">Testimoni</a>
    <a href="{{ route('login') }}">Masuk</a>
    <a href="{{ route('register') }}">Daftar</a>
  </nav>
</header>

<section class="hero">
  <h1 data-aos="fade-up">Kesehatan Cerdas, Hidup Berkualitas</h1>
  <p data-aos="fade-up" data-aos-delay="200">PinkCare+ hadir untuk membantu Anda mengelola kesehatan secara cerdas, praktis, dan penuh kasih.</p>
  <div class="cta-buttons" data-aos="zoom-in" data-aos-delay="400">
    <form action="{{ route('login') }}" method="GET">
      <button type="submit" class="btn btn-primary">Masuk</button>
    </form>
    <form action="{{ route('register') }}" method="GET">
      <button type="submit" class="btn btn-outline">Daftar Gratis</button>
    </form>
  </div>
</section>

<section class="features" id="fitur">
  <h2 data-aos="fade-up">Kenapa Memilih PinkCare+</h2>
  <div class="feature-container">
    <div class="feature-box" data-aos="fade-up" data-aos-delay="100">
      <h3>Pemantauan Kesehatan</h3>
      <p>Lacak tekanan darah, detak jantung, dan lainnya dengan mudah.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="200">
      <h3>Jadwal Teratur</h3>
      <p>Pengingat cerdas untuk kontrol rutin, minum obat, dan aktivitas sehat.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="300">
      <h3>Konsultasi Cepat</h3>
      <p>Chat langsung dengan dokter terpercaya dari kenyamanan rumah Anda.</p>
    </div>
  </div>
</section>

<section class="testimoni" id="testimoni">
  <h2 data-aos="fade-up">Apa Kata Pengguna?</h2>
  <div class="testimoni-container">
    <div class="testi-card" data-aos="fade-right">
      <p>"Sejak pakai PinkCare+, saya lebih rutin cek tekanan darah dan minum obat tepat waktu."</p>
      <strong>- Ibu Wati, 47 thn</strong>
    </div>
    <div class="testi-card" data-aos="fade-left" data-aos-delay="200">
      <p>"Fitur konsultasi dokternya sangat membantu dan hemat waktu!"</p>
      <strong>- Andi, 30 thn</strong>
    </div>
  </div>
</section>

<section class="cta-extra">
  <h2 data-aos="zoom-in">Yuk mulai hidup sehat bersama PinkCare+!</h2>
  <div class="cta-buttons">
    <form action="{{ route('register') }}">
      <button class="btn btn-primary">Daftar Sekarang</button>
    </form>
  </div>
</section>

<footer>
  © 2025 PinkCare+. Dibuat dengan ❤️ untuk kesehatan Anda.
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>

</body>
</html>
