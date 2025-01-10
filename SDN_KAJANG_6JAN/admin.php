<?php
session_start();
include('includes/db.php');

// Proses Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi Login
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['login'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $loginError = "Username atau password salah.";
    }
}

// Proses Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// Cek Login
if (!isset($_SESSION['login'])) {
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Admin</title>
        <link rel="stylesheet" href="assets/css/admin.css">
    </head>
    <body>
        <h1>Login Admin</h1>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (isset($loginError)): ?>
            <p style="color: red; text-align: center;"><?= $loginError ?></p>
        <?php endif; ?>
    </body>
    </html>
    <?php
    exit;
}

// Proses Hapus Data
if (isset($_GET['delete'])) {
    $kelas = $_GET['kelas'] ?? '';
    $id = $_GET['delete'];
    $table = $kelas ?: 'guru';
    $sql = "DELETE FROM $table WHERE id = $id";
    mysqli_query($conn, $sql);
    header('Location: admin.php?section=' . ($kelas ? $kelas : 'guru'));
    exit;
}

// Proses Tambah Data
if (isset($_POST['submit'])) {
    $section = $_POST['section'];
    if ($section === 'guru') {
        $nama = $_POST['nama'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $jabatan = $_POST['jabatan'];
        $sql = "INSERT INTO guru (nama, mata_pelajaran, jabatan) VALUES ('$nama', '$mata_pelajaran', '$jabatan')";
    } else {
        $kelas = $_POST['kelas'];
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $sql = "INSERT INTO $kelas (nama, nisn, kelas) VALUES ('$nama', '$nisn', '$kelas')";
    }
    mysqli_query($conn, $sql);
    header('Location: admin.php?section=' . $section);
    exit;
}

// Proses Update Data
if (isset($_POST['update'])) {
    $section = $_POST['section'];
    $id = $_POST['id'];
    if ($section === 'guru') {
        $nama = $_POST['nama'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $jabatan = $_POST['jabatan'];
        $sql = "UPDATE guru SET nama='$nama', mata_pelajaran='$mata_pelajaran', jabatan='$jabatan' WHERE id=$id";
    } else {
        $kelas = $_POST['kelas'];
        $nama = $_POST['nama'];
        $nisn = $_POST['nisn'];
        $sql = "UPDATE $kelas SET nama='$nama', nisn='$nisn', kelas='$kelas' WHERE id=$id";
    }
    mysqli_query($conn, $sql);
    header('Location: admin.php?section=' . $section);
    exit;
}

// Mendapatkan Data untuk Edit
$editMode = false;
$editData = [];
if (isset($_GET['edit'])) {
    $section = $_GET['section'];
    $editMode = true;
    $id = $_GET['edit'];
    $table = ($section === 'guru') ? 'guru' : $_GET['kelas'];
    $result = mysqli_query($conn, "SELECT * FROM $table WHERE id=$id");
    $editData = mysqli_fetch_assoc($result);
}

$section = $_GET['section'] ?? 'guru';
$kelas = $_GET['kelas'] ?? 'kelas_1';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <h1>Admin Panel - Manajemen Data</h1>
    <nav>
        <button onclick="window.location.href='admin.php?section=guru'">Manajemen Guru</button>
        <select onchange="window.location.href='admin.php?section=siswa&kelas=' + this.value">
            <option value="kelas_1" <?= $kelas === 'kelas_1' ? 'selected' : '' ?>>Kelas 1</option>
            <option value="kelas_2" <?= $kelas === 'kelas_2' ? 'selected' : '' ?>>Kelas 2</option>
            <option value="kelas_3" <?= $kelas === 'kelas_3' ? 'selected' : '' ?>>Kelas 3</option>
            <option value="kelas_4" <?= $kelas === 'kelas_4' ? 'selected' : '' ?>>Kelas 4</option>
            <option value="kelas_5" <?= $kelas === 'kelas_5' ? 'selected' : '' ?>>Kelas 5</option>
            <option value="kelas_6" <?= $kelas === 'kelas_6' ? 'selected' : '' ?>>Kelas 6</option>
        </select>
        <button onclick="window.location.href='admin.php?logout=true'">Logout</button>
    </nav>

    <?php if ($section === 'guru'): ?>
        <h2>Manajemen Guru</h2>
        <form action="" method="post">
            <input type="hidden" name="section" value="guru">
            <?php if ($editMode): ?>
                <input type="hidden" name="id" value="<?= $editData['id'] ?>">
            <?php endif; ?>
            <input type="text" name="nama" placeholder="Nama Guru" value="<?= $editMode ? $editData['nama'] : '' ?>" required>
            <input type="text" name="mata_pelajaran" placeholder="Mata Pelajaran" value="<?= $editMode ? $editData['mata_pelajaran'] : '' ?>" required>
            <input type="text" name="jabatan" placeholder="Jabatan" value="<?= $editMode ? $editData['jabatan'] : '' ?>" required>
            <button type="submit" name="<?= $editMode ? 'update' : 'submit' ?>">
                <?= $editMode ? 'Update' : 'Tambah' ?> Guru
            </button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM guru");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['mata_pelajaran']}</td>
                        <td>{$row['jabatan']}</td>
                        <td>
                            <a href='admin.php?section=guru&edit={$row['id']}'>Edit</a> |
                            <a href='admin.php?section=guru&delete={$row['id']}'>Hapus</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

    <?php else: ?>
        <h2>Manajemen <?= ucfirst(str_replace('_', ' ', $kelas)) ?></h2>
        <form action="" method="post">
            <input type="hidden" name="section" value="siswa">
            <input type="hidden" name="kelas" value="<?= $kelas ?>">
            <?php if ($editMode): ?>
                <input type="hidden" name="id" value="<?= $editData['id'] ?>">
            <?php endif; ?>
            <input type="text" name="nama" placeholder="Nama Siswa" value="<?= $editMode ? $editData['nama'] : '' ?>" required>
            <input type="text" name="nisn" placeholder="NISN" value="<?= $editMode ? $editData['nisn'] : '' ?>" required>
            <button type="submit" name="<?= $editMode ? 'update' : 'submit' ?>">
                <?= $editMode ? 'Update' : 'Tambah' ?> Siswa
            </button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM $kelas");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['nisn']}</td>
                        <td>{$row['kelas']}</td>
                        <td>
                            <a href='admin.php?section=siswa&kelas=$kelas&edit={$row['id']}'>Edit</a> |
                            <a href='admin.php?section=siswa&kelas=$kelas&delete={$row['id']}'>Hapus</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
