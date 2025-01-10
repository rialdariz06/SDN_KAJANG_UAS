<?php 
include('includes/db.php'); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css" />
  <title>SDN Kajang - Website Resmi</title>
</head>
<body>
<header>
  <div class="container">
    <h1>SDN Kajang</h1>
    <nav>
      <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="guru.php">Guru</a></li>
        <li><a href="siswa.php">Siswa</a></li>
        <li><a href="sejarah.php">Sejarah</a></li>
        <li><a href="fasilitas.php">Fasilitas</a></li>
        <li><a href="prestasi.php">Prestasi</a></li>
      </ul>
    </nav>
  </div>
</header>

  <main>
    <section class="intro" id="home">
      <h1>Selamat Datang di SDN Kajang</h1>
      <p>
        Website resmi SDN Kajang, tempat di mana pendidikan berkualitas
        diutamakan. Kami berkomitmen untuk menyediakan lingkungan yang
        mendukung perkembangan siswa secara maksimal.
      </p>
    </section>

    <section class="overview" id="sejarah">
      <h2>Informasi Sekolah</h2>
      <p>
        SDN Kajang memiliki visi dan misi yang kuat untuk mendukung
        perkembangan siswa:
      </p>
      <ul>
        <li>
          <strong>Visi:</strong> Mewujudkan generasi muda yang cerdas,
          kreatif, dan berakhlak mulia.
        </li>
        <li>
          <strong>Misi:</strong> Menyediakan pendidikan yang berkualitas,
          meningkatkan kemampuan akademik dan keterampilan, serta membangun
          karakter siswa yang tangguh.
        </li>
      </ul>
    </section>

    <section class="program-unggulan" id="fasilitas">
      <h2>Program Unggulan</h2>
      <p>
        SDN Kajang memiliki berbagai program unggulan untuk meningkatkan
        kualitas pendidikan:
      </p>
      <ul>
        <li>Program Literasi: Membiasakan siswa membaca setiap hari.</li>
        <li>
          Penguatan Karakter: Pembentukan akhlak mulia melalui kegiatan
          harian.
        </li>
        <li>
          Pelatihan Teknologi: Keterampilan komputer untuk mendukung
          pembelajaran modern.
        </li>
      </ul>
    </section>

    <section class="ekstrakurikuler" id="prestasi">
      <h2>Ekstrakurikuler</h2>
      <p>
        Siswa dapat mengembangkan bakat dan minat mereka melalui berbagai
        kegiatan:
      </p>
      <ul>
        <li>Pramuka</li>
        <li>Olahraga: Sepak bola, bulu tangkis, dan atletik</li>
        <li>Kesenian: Tari tradisional dan seni musik</li>
      </ul>
    </section>
  </main>

  <footer>
    <div class="roket">
      <button id="scrollToTop">&#8679;</button>
    </div>
    <p>&copy; 2025 SDN Kajang. Semua Hak Cipta Dilindungi.</p>
  </footer>

  <script src="./assets/js/script.js"></script>
</body>
</html>
