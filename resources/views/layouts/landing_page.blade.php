<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PoliklinikCare+ - Sistem Informasi Poliklinik</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    * {
      scroll-behavior: smooth;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
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
      color: #0062cc;
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
      color: #0062cc;
    }

    .hero {
      padding: 100px 20px;
      text-align: center;
      background: linear-gradient(to right, #e3f2fd, #ffffff);
      position: relative;
      overflow: hidden;
    }

    .hero h1 {
      font-size: 38px;
      color: #004085;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 18px;
      color: #555;
      max-width: 600px;
      margin: 0 auto 30px;
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
      background-color: #007bff;
      color: white;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-outline {
      background-color: transparent;
      border-color: #007bff;
      color: #007bff;
    }

    .btn-outline:hover {
      background-color: #007bff;
      color: white;
    }

    section {
      padding: 60px 20px;
      text-align: center;
    }

    h2 {
      color: #0062cc;
      margin-bottom: 40px;
    }

    .feature-container, .testimoni-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
    }

    .feature-box, .testi-card {
      background-color: #ffffff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.05);
      flex: 1 1 250px;
      max-width: 300px;
      text-align: left;
    }

    .testi-card {
      border-left: 4px solid #007bff;
    }

    .testi-card p {
      font-style: italic;
      font-size: 15px;
      color: #444;
    }

    .testi-card strong {
      display: block;
      margin-top: 10px;
      color: #007bff;
    }

    .cta-extra {
      background-color: #e9f5ff;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #f1f1f1;
      font-size: 14px;
      color: #555;
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 28px;
      }

      .feature-container, .testimoni-container, .cta-buttons {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="logo">PoliklinikCare+</div>
  <nav>
    <a href="#fitur">Fitur</a>
    <a href="#testimoni">Testimoni</a>
    <a href="{{ route('login') }}">Masuk</a>
    <a href="{{ route('register') }}">Daftar</a>
  </nav>
</header>

<section class="hero">
  <h1 data-aos="fade-up">Selamat Datang di PoliklinikCare+</h1>
  <p data-aos="fade-up" data-aos-delay="200">Sistem informasi poliklinik yang memudahkan pendaftaran, pemeriksaan, dan konsultasi secara modern dan efisien.</p>
  <div class="cta-buttons" data-aos="zoom-in" data-aos-delay="400">
    <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
    <a href="{{ route('register') }}" class="btn btn-outline">Daftar Gratis</a>
  </div>
</section>

<section class="features" id="fitur">
  <h2 data-aos="fade-up">Fitur Utama</h2>
  <div class="feature-container">
    <div class="feature-box" data-aos="fade-up" data-aos-delay="100">
      <h3>Pendaftaran Online</h3>
      <p>Daftar ke poliklinik tanpa harus antre langsung di tempat.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="200">
      <h3>Riwayat Medis</h3>
      <p>Lihat catatan pemeriksaan dan obat yang pernah diberikan.</p>
    </div>
    <div class="feature-box" data-aos="fade-up" data-aos-delay="300">
      <h3>Jadwal Dokter</h3>
      <p>Cek ketersediaan dokter dan jadwal praktik secara real-time.</p>
    </div>
  </div>
</section>

<section class="testimoni" id="testimoni">
  <h2 data-aos="fade-up">Testimoni Pengguna</h2>
  <div class="testimoni-container">
    <div class="testi-card" data-aos="fade-right">
      <p>"Proses pendaftaran jadi lebih cepat dan tertata. Sangat membantu!"</p>
      <strong>- Bapak Arif, 39 tahun</strong>
    </div>
    <div class="testi-card" data-aos="fade-left" data-aos-delay="200">
      <p>"Saya suka fitur riwayat pemeriksaannya. Jadi tahu kapan terakhir kontrol."</p>
      <strong>- Ibu Lestari, 52 tahun</strong>
    </div>
  </div>
</section>

<section class="cta-extra">
  <h2 data-aos="zoom-in">Mulai gunakan PoliklinikCare+ hari ini!</h2>
  <div class="cta-buttons">
    <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
  </div>
</section>

<footer>
  © 2025 PoliklinikCare+. Dibuat untuk pelayanan kesehatan yang lebih baik.
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
