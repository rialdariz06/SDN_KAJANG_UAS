<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDN Kajang - Website Resmi</title>
  <link rel="stylesheet" href="assets/css/header.css">
</head>
<body>
  <header>
    <nav>
      <div class="container">
        <a href="index.php" class="logo">SDN Kajang</a>
        <span class="menu-toggle" onclick="toggleMenu()">&#9776;</span>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="guru.php">Guru</a></li>
          <li><a href="siswa.php">Siswa</a></li>
          <li><a href="sejarah.php">Sejarah</a></li>
          <li><a href="fasilitas.php">Fasilitas</a></li>
          <li><a href="prestasi.php">Prestasi</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <script>
    function toggleMenu() {
      const nav = document.querySelector("header nav ul");
      nav.classList.toggle("show");
    }
  </script>
</body>
</html>
