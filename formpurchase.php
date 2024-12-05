<?php
// Data mobil yang lebih detail
$dataMobil = [
    "Toyota" => [
        "Alphard" => ["harga" => "1200000000", "tahun" => "2020"],
        "Avanza" => ["harga" => "200000000", "tahun" => "2019"],
        "Fortuner" => ["harga" => "500000000", "tahun" => "2020"],
    ],
    "Honda" => [
        "Civic" => ["harga" => "450000000", "tahun" => "2018"],
        "BR-V" => ["harga" => "300000000", "tahun" => "2021"],
        "HR-V" => ["harga" => "350000000", "tahun" => "2022"],
    ],
    "Suzuki" => [
        "Ertiga" => ["harga" => "250000000", "tahun" => "2019"],
        "Baleno" => ["harga" => "220000000", "tahun" => "2021"],
        "Ignis" => ["harga" => "180000000", "tahun" => "2020"],
        "APV" => ["harga" => "300000000", "tahun" => "2020"],
        "Karimun Wagon R" => ["harga" => "150.000.000", "tahun" => "2018"],
    ],
    "Mitsubishi" => [
        "Xpander" => ["harga" => "280000000", "tahun" => "2020"],
        "Pajero" => ["harga" => "700000000", "tahun" => "2021"],
    ],
    "Hyundai" => [
        "Creta" => ["harga" => "300000000", "tahun" => "2021"],
        "Palisade" => ["harga" => "850000000", "tahun" => "2022"],
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Mobil</title>
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
        main {
            color: white;
            padding: 20px;
            text-align: center;
        }
        main h1 {
            margin: 0;
        }

        .container-form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #19b5fe;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            flex: 1;
            margin-right: 10px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            flex: 2;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-box {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2980b9;
            color: white;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .submit-box:hover {
            background-color: #64b5f6;
        }
        @media (max-width: 600px) {
            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }
            .form-group label {
                margin-bottom: 5px;
            }
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

    <main>
        <h1>Form Pembelian Mobil</h1>
    </main>
    <div class="container-form">
        <form id="formPembelian" action="output.php" method="POST">
            <div class="form-group">
                <label for="merk_mobil">Merk Mobil:</label>
                <select id="merk_mobil" name="merk_mobil" onchange="updateModels()">
                    <option value="">Pilih Merk Mobil</option>
                    <?php foreach ($dataMobil as $merk => $models): ?>
                        <option value="<?= $merk ?>"><?= $merk ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_mobil">Nama Mobil:</label>
                <select id="nama_mobil" name="nama_mobil" onchange="updateDetails()">
                    <option value="">Pilih Nama Mobil</option>
                </select>
            </div>

            <div class="form-group">
                <label for="harga_mobil">Harga Mobil:</label>
                <input type="text" id="harga_mobil" name="harga_mobil" readonly>
            </div>

            <div class="form-group">
                <label for="tahun_mobil">Tahun Mobil:</label>
                <input type="text" id="tahun_mobil" name="tahun_mobil" readonly>
            </div>

            <div class="form-group">
                <label for="nama_pembeli">Nama Pembeli:</label>
                <input type="text" id="nama_pembeli" name="nama_pembeli" required>
            </div>

            <div class="form-group">
                <label for="rekening_pembayaran">Rekening Pembayaran:</label>
                <select id="rekening_pembayaran" name="rekening_pembayaran" required>
                    <option value="">Pilih Rekening Pembayaran</option>
                    <option value="BCA">BCA</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="MANDIRI">MANDIRI</option>
                    <option value="CASH">CASH</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kontak_pembeli">Kontak Pembeli:</label>
                <input type="text" id="kontak_pembeli" name="kontak_pembeli" required>
            </div>

            <div class="submit-box" onclick="submitForm()">Submit</div>
        </form>
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


        const dataMobil = <?= json_encode($dataMobil) ?>;

        function updateModels() {
            const merkMobil = document.getElementById("merk_mobil").value;
            const namaMobil = document.getElementById("nama_mobil");
            namaMobil.innerHTML = '<option value="">Pilih Nama Mobil</option>';
            if (dataMobil[merkMobil]) {
                Object.keys(dataMobil[merkMobil]).forEach(model => {
                    const option = document.createElement("option");
                    option.value = model;
                    option.textContent = model;
                    namaMobil.appendChild(option);
                });
            }
        }

        function updateDetails() {
            const merkMobil = document.getElementById("merk_mobil").value;
            const namaMobil = document.getElementById("nama_mobil").value;
            const hargaMobil = document.getElementById("harga_mobil");
            const tahunMobil = document.getElementById("tahun_mobil");
            if (dataMobil[merkMobil] && dataMobil[merkMobil][namaMobil]) {
                hargaMobil.value = dataMobil[merkMobil][namaMobil].harga;
                tahunMobil.value = dataMobil[merkMobil][namaMobil].tahun;
            } else {
                hargaMobil.value = "";
                tahunMobil.value = "";
            }
        }

        function submitForm() {
            document.getElementById("formPembelian").submit();
        }
    </script>
</body>
</html>
