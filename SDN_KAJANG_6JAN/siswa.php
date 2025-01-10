<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="assets/css/siswa.css">
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
        <section class="class-menu">
            <h1>Daftar Siswa SDN Kajang</h1>
            <div class="menu">
                <?php
                // Menu untuk memilih kelas
                for ($i = 1; $i <= 6; $i++) {
                    echo "<a href='siswa.php?kelas=kelas_$i' class='class-link'>Kelas $i</a>";
                }
                // Tombol untuk melihat semua kelas
                echo "<a href='siswa.php?kelas=all' class='class-link all-class'>Semua Kelas</a>";
                ?>
            </div>
        </section>

        <section class="student-list">
            <?php
            if (isset($_GET['kelas'])) {
                $kelas = $conn->real_escape_string($_GET['kelas']);
                if ($kelas === 'all') {
                    // Query untuk semua kelas
                    echo "<h2>Daftar Siswa Semua Kelas</h2>";
                    echo "<table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>";
                    for ($i = 1; $i <= 6; $i++) {
                        $result = $conn->query("SELECT id, nama, nisn, kelas FROM kelas_$i");
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['nisn']}</td>
                                    <td>Kelas $i</td>
                                </tr>";
                        }
                    }
                    echo "</tbody></table>";
                } else {
                    // Query untuk kelas tertentu
                    $result = $conn->query("SELECT id, nama, nisn, kelas FROM $kelas");
                    if ($result->num_rows > 0) {
                        echo "<h2>Daftar Siswa Kelas " . str_replace('kelas_', '', $kelas) . "</h2>";
                        echo "<table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['nisn']}</td>
                                    <td>{$row['kelas']}</td>
                                </tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<p>Tidak ada data untuk kelas ini.</p>";
                    }
                }
            } else {
                echo "<p>Silakan pilih kelas untuk melihat daftar siswa.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 SDN Kajang. Semua Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>
