<?php 
include('includes/db.php');  
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="assets/css/guru.css">
    <style>/* Header styles */
header {
  background: #4caf50;
  color: white;
  padding: 20px 0;
  text-align: center;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

header .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

header h1 {
  margin: 0;
  font-size: 2.5rem;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  gap: 20px;
}

nav ul li {
  margin: 0;
}

nav ul li a {
  color: white;
  text-decoration: none;
  font-size: 1rem;
  transition: color 0.3s;
}

nav ul li a:hover {
  color: #ffeb3b;
}</style>
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
        <section class="teacher-list">
            <h1>Daftar Guru SDN Kajang</h1>
            <div class="cards-container">
                <?php
                $result = $conn->query("SELECT * FROM guru");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card'>
                                <h2>{$row['nama']}</h2>
                                <p><strong>Mata Pelajaran:</strong> {$row['mata_pelajaran']}</p>
                                <p><strong>Jabatan:</strong> {$row['jabatan']}</p>
                              </div>";
                    }
                } else {
                    echo "<p>Tidak ada data guru.</p>";
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 SDN Kajang. Semua Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>
