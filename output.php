<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $merkMobil = $_POST['merk_mobil'] ?? '';
    $namaMobil = $_POST['nama_mobil'] ?? '';
    $hargaMobil = $_POST['harga_mobil'] ?? '';
    $tahunMobil = $_POST['tahun_mobil'] ?? '';
    $kontakPembeli = $_POST['kontak_pembeli'] ?? '';
    $rekeningPembeli = $_POST['rekening_pembayaran'] ?? '';
    $namaPembeli = $_POST['nama_pembeli'] ?? '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian Mobil</title>
    <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  line-height: 1.6;
  color: #333;
  cursor: url("https:codetheworld.io/wp-content/uploads/2024/10/cursor.png"),
    auto;
  font-family: Arial, Helvetica, sans-serif;
}

html {
  scroll-behavior: smooth;
}

body::-webkit-scrollbar {
  width: 5px;
}

body::-webkit-scrollbar-track {
  background: #f4f4f4;
}

body::-webkit-scrollbar-thumb {
  background-color: #00aaff;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
}

header {
  background-color: white;
  display: flex;
  position: relative;
}

.container {
  background-color: #64b5f6;
  width: 100%;
  margin-top: -15px;
  padding: 10px 20px 0;
  justify-content: center;
  text-align: center;
  position: fixed;
  z-index: 1500;
}

.container #logo h1 {
  float: left;
  padding: 10px 10px;
  color: white;
  display: flex;
  justify-content: flex-start;
  font-size: 1.5em;
  margin-left: 30px;
  margin-top: 10px;
}

nav ul {
  display: flex;
  justify-content: flex-end;
  flex-wrap: wrap;
  list-style: none;
  margin-top: 25px;
  padding-right: 30px;
}

.nav-link {
  color: #333;
  text-decoration: none;
  padding: 0.5rem 1rem;
  transition: background-color 0.3s;
  margin: 0 10px;
  width: 100%;
}

.nav-link:hover {
  color: #f4f4f4;
}

.hamburger {
  display: none;
  cursor: pointer;
  flex-direction: column;
  justify-content: space-around;
  width: 25px;
  height: 20px;
  position: absolute;
  right: 50px;
  top: 35px;
  z-index: 2000;
}

.bar {
  display: block;
  width: 100%;
  height: 3px;
  background: #333;
  border-radius: 3px;
  transition: all 0.4s cubic-bezier(0.68, -0.6, 0.32, 1.6);
}


.hamburger.active .bar:nth-child(1) {
  transform: rotate(45deg) translate(5px, 5px);
}


.hamburger.active .bar:nth-child(2) {
  opacity: 0;
  transform: translateX(-20px);
}


.hamburger.active .bar:nth-child(3) {
  transform: rotate(-45deg) translate(7px, -6px);
}


.nav-menu {
  transition: all 0.4s ease-in-out;
}

@media screen and (max-width: 855px) {
  .hamburger {
    display: flex;
  }
  
  .nav-menu {
    display: block;
    position: absolute;
    top: -300px; 
    right: 0;
    width: 100%;
    background: #64b5f6;
    padding: 10px 0;
    text-align: start;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    opacity: 0;
    visibility: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  }

  .nav-menu.active {
    top: 50px;
    opacity: 1;
    visibility: visible;
  }

  .nav-menu li {
    margin: 15px 0;
    transform: translateY(-20px);
    opacity: 0;
    transition: all 0.3s ease;
  }

  .nav-menu.active li {
    transform: translateY(0);
    opacity: 1;
    transition-delay: 0.2s;
  }

  .nav-menu li:nth-child(1) { transition-delay: 0.1s; }
  .nav-menu li:nth-child(2) { transition-delay: 0.2s; }
  .nav-menu li:nth-child(3) { transition-delay: 0.3s; }
  .nav-menu li:nth-child(4) { transition-delay: 0.4s; }
  .nav-menu li:nth-child(5) { transition-delay: 0.5s; }

  .nav-link {
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .nav-link:hover {
    background-color: #2980b9;
    transform: translateX(10px);
    border-radius: 5px;
    width: 100%;
  }
}


@media screen and (max-width: 480px) {
  .hamburger {
    right: 20px;
  }

  .nav-menu.active {
    top: 50px;
  }
  
}

.container-output {
    max-width: 600px;
    margin: 100px 20px;
    background: #19B5FE;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    text-align: center;
}
.container-output h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #000;
}

p {
    font-size: 16px;
    margin: 10px 0;
    color: #fff;
}

a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #64b5f6;
    color: #000;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

a:hover {
    background-color: #2980b9;
}
    </style>
</head>
<body>
<header>
      <div class="container">
        <div id="logo">
          <h1>AutoCar</h1>
        </div>
        <nav>
          <ul class="nav-menu">
            <li><a href="index.html" class="nav-link">Home</a></li>
            <li><a href="car-list.html" class="nav-link">Car List</a></li>
            <li><a href="about.html" class="nav-link">About Us</a></li>
            <li>
              <a href="termsandconditions.html" class="nav-link"
                >Terms and Conditions</a
              >
            </li>
            <li><a href="contact.html" class="nav-link">Contact</a></li>
          </ul>
        </nav>
        <div class="hamburger" onclick="toggleMenu()">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </div>
    </header>


    <div class="container-output">
        <h1>Detail Pembelian Mobil</h1>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
            <p><strong>Merk Mobil:</strong> <?= htmlspecialchars($merkMobil) ?></p>
            <p><strong>Nama Mobil:</strong> <?= htmlspecialchars($namaMobil) ?></p>
            <p><strong>Harga Mobil:</strong> Rp <?= number_format((float) str_replace(',', '', $hargaMobil), 0, ',', '.') ?></p>
            <p><strong>Tahun Mobil:</strong> <?= htmlspecialchars($tahunMobil) ?></p>
            <p><strong>Nama Pembeli:</strong> <?= htmlspecialchars($namaPembeli) ?></p>
            <p><strong>Rekening Pembayaran:</strong> <?= htmlspecialchars($rekeningPembeli) ?></p>
            <p><strong>Kontak Pembeli:</strong> <?= htmlspecialchars($kontakPembeli) ?></p>
        <?php else : ?>
            <p>Data tidak ditemukan.</p>
        <?php endif; ?>
        <a href="formpurchase.php">INPUT DATA LAGI</a>
    </div>

    <script>
    function toggleMenu() {
  const hamburger = document.querySelector(".hamburger");
  const navMenu = document.querySelector(".nav-menu");

  // Toggle class active
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");

  // Mengatur aria-expanded untuk aksesibilitas
  const isExpanded = navMenu.classList.contains("active");
  hamburger.setAttribute("aria-expanded", isExpanded);

  // Optional: Menonaktifkan scroll pada body ketika menu terbuka
  document.body.style.overflow = isExpanded ? "hidden" : "auto";
}

// Menutup menu ketika link diklik
document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("click", () => {
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
    document.body.style.overflow = "auto";
  });
});

// Menutup menu ketika mengklik di luar menu
document.addEventListener("click", (e) => {
  const hamburger = document.querySelector(".hamburger");
  const navMenu = document.querySelector(".nav-menu");

  if (
    !hamburger.contains(e.target) &&
    !navMenu.contains(e.target) &&
    navMenu.classList.contains("active")
  ) {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
    document.body.style.overflow = "auto";
  }
});
</script>
</body>
</html>

