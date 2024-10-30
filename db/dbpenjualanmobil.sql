CREATE TABLE `mobil`(
    `Id_mobil` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `merek` VARCHAR(255) NOT NULL,
    `model` VARCHAR(255) NOT NULL,
    `tahun` INT NOT NULL,
    `harga` INT NOT NULL
);
CREATE TABLE `penjualan`(
    `id_penjualan` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tanggal_penjualan` DATE NOT NULL,
    `total_harga` INT NOT NULL,
    `id_mobil` INT NOT NULL,
    `id_pembeli` INT NOT NULL,
    `id_karyawan` INT NOT NULL
);
CREATE TABLE `karyawan`(
    `id_karyawan` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nama_karyawan` VARCHAR(255) NOT NULL,
    `jabatan` TEXT NOT NULL,
    `gaji` INT NOT NULL,
    `alamat` TEXT NOT NULL,
    `tanggal_masuk` DATE NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `no_telepon` VARCHAR(255) NOT NULL
);
CREATE TABLE `pembeli`(
    `id_pembeli` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nama_pembeli` VARCHAR(255) NOT NULL,
    `alamat` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `no_telepon` INT NOT NULL
);
CREATE TABLE `transaksi`(
    `id_transaksi` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tanggal_transaksi` DATE NOT NULL,
    `jumlah_bayar` INT NOT NULL,
    `metode_pembayaran` TEXT NOT NULL,
    `id_penjualan` INT NOT NULL
);
ALTER TABLE
    `penjualan` ADD CONSTRAINT `penjualan_id_karyawan_foreign` FOREIGN KEY(`id_karyawan`) REFERENCES `karyawan`(`id_karyawan`);
ALTER TABLE
    `transaksi` ADD CONSTRAINT `transaksi_id_penjualan_foreign` FOREIGN KEY(`id_penjualan`) REFERENCES `penjualan`(`id_penjualan`);
ALTER TABLE
    `penjualan` ADD CONSTRAINT `penjualan_id_mobil_foreign` FOREIGN KEY(`id_mobil`) REFERENCES `mobil`(`Id_mobil`);
ALTER TABLE
    `penjualan` ADD CONSTRAINT `penjualan_id_pembeli_foreign` FOREIGN KEY(`id_pembeli`) REFERENCES `pembeli`(`id_pembeli`);