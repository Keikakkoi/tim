-- Buat database
CREATE DATABASE IF NOT EXISTS car_sales_db;
USE car_sales_db;

-- Tabel inventaris mobil
CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    price DECIMAL(12, 2) NOT NULL,
    stock INT NOT NULL
);

-- Tabel pelanggan
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(20) NOT NULL,
    total_purchase DECIMAL(12, 2) DEFAULT 0
);

-- Tabel penjualan
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    customer_id INT NOT NULL,
    inventory_id INT NOT NULL,
    price DECIMAL(12, 2) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (inventory_id) REFERENCES inventory(id)
);

-- Masukkan beberapa data contoh
INSERT INTO inventory (brand, model, year, price, stock) VALUES
('Toyota', 'Avanza', 2022, 220000000, 5),
('Honda', 'CR-V', 2023, 350000000, 3),
('Suzuki', 'Ertiga', 2022, 240000000, 7);

INSERT INTO customers (name, email, phone) VALUES
('Budi Santoso', 'budi@email.com', '081234567890'),
('Siti Rahayu', 'siti@email.com', '081234567891'),
('Agus Priyanto', 'agus@email.com', '081234567892');

INSERT INTO sales (date, customer_id, inventory_id, price) VALUES
('2024-03-15', 1, 1, 220000000),
('2024-03-18', 2, 2, 350000000),
('2024-03-20', 3, 3, 240000000);

-- Update total_purchase di tabel customers
UPDATE customers c
SET total_purchase = (SELECT SUM(price) FROM sales WHERE customer_id = c.id);