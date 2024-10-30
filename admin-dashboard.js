function loadDataMobil() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "php/data_mobil.php", true);
  xhr.onload = function () {
    if (this.status == 200) {
      var outputDiv = document.getElementById("data-output");
      outputDiv.innerHTML = this.responseText;
      outputDiv.classList.add("loaded"); // Tambahkan kelas loaded untuk transisi
    }
  };
  xhr.send();
}

// Fungsi untuk memuat data karyawan dari database
function loadDataKaryawan() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "php/data_karyawan.php", true);
  xhr.onload = function () {
    if (this.status == 200) {
      document.getElementById("data-output").innerHTML = this.responseText;
    }
  };
  xhr.send();
}

// Fungsi untuk memuat data penjualan dari database
function loadDataPenjualan() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "php/data_penjualan.php", true);
  xhr.onload = function () {
    if (this.status == 200) {
      document.getElementById("data-output").innerHTML = this.responseText;
    }
  };
  xhr.send();
}

// Fungsi untuk memuat data transaksi dari database
function loadDataTransaksi() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "php/data_transaksi.php", true);
  xhr.onload = function () {
    if (this.status == 200) {
      document.getElementById("data-output").innerHTML = this.responseText;
    }
  };
  xhr.send();
}

// Fungsi untuk memuat data pembeli dari database
function loadDataPembeli() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "php/data_pembeli.php", true);
  xhr.onload = function () {
    if (this.status == 200) {
      document.getElementById("data-output").innerHTML = this.responseText;
    }
  };
  xhr.send();
}
