// Fungsi untuk validasi form admin_guru
function validateFormGuru() {
  console.log("Script.js berhasil dimuat!");
  // Ambil nilai input
  const nama = document.querySelector("input[name='nama']").value.trim();
  const mapel = document
    .querySelector("input[name='mata_pelajaran']")
    .value.trim();
  const jabatan = document.querySelector("input[name='jabatan']").value.trim();

  // Validasi Nama
  if (!nama) {
    alert("Nama guru harus diisi!");
    return false; // Mencegah submit
  }

  // Validasi Mata Pelajaran
  if (!mapel) {
    alert("Mata pelajaran harus diisi!");
    return false; // Mencegah submit
  }

  // Validasi Jabatan
  if (!jabatan) {
    alert("Jabatan harus diisi!");
    return false; // Mencegah submit
  }

  // Jika semua validasi lulus
  return true;
}

// Fungsi untuk validasi form admin_siswa
function validateFormSiswa() {
  const nama = document.getElementById("nama").value.trim();
  const kelas = document.getElementById("kelas").value.trim();
  const nisn = document.getElementById("nisn").value.trim();

  // Validasi Nama
  if (!nama) {
    alert("Nama siswa harus diisi!");
    return false;
  }

  // Validasi Kelas
  if (!kelas) {
    alert("Kelas harus diisi!");
    return false;
  }

  // Validasi NISN
  if (!nisn) {
    alert("NISN harus diisi!");
    return false;
  }

  // Jika validasi lulus, form akan disubmit
  return true;
}

// Menunggu sampai DOM selesai dimuat
document.addEventListener("DOMContentLoaded", () => {
  const scrollToTopButton = document.getElementById("scrollToTop");
  console.log(scrollToTopButton); 

 // Tampilkan tombol jika pengguna menggulir lebih dari 300px
  window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
      scrollToTopButton.style.display = "block";
    } else {
      scrollToTopButton.style.display = "none";
    }
  });
  // Gulir ke atas ketika tombol diklik
  scrollToTopButton.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});
