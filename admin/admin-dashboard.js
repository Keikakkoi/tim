// Data dummy untuk simulasi
const inventory = [
  {
    id: 1,
    brand: "Toyota",
    model: "Avanza",
    year: 2022,
    price: 220000000,
    stock: 5,
  },
  {
    id: 2,
    brand: "Honda",
    model: "CR-V",
    year: 2023,
    price: 350000000,
    stock: 3,
  },
  {
    id: 3,
    brand: "Suzuki",
    model: "Ertiga",
    year: 2022,
    price: 240000000,
    stock: 7,
  },
];

const sales = [
  {
    id: 1,
    date: "2024-03-15",
    customer: "Budi Santoso",
    car: "Toyota Avanza",
    price: 220000000,
  },
  {
    id: 2,
    date: "2024-03-18",
    customer: "Siti Rahayu",
    car: "Honda CR-V",
    price: 350000000,
  },
  {
    id: 3,
    date: "2024-03-20",
    customer: "Agus Priyanto",
    car: "Suzuki Ertiga",
    price: 240000000,
  },
];

const customers = [
  {
    id: 1,
    name: "Budi Santoso",
    email: "budi@email.com",
    phone: "081234567890",
    totalPurchase: 220000000,
  },
  {
    id: 2,
    name: "Siti Rahayu",
    email: "siti@email.com",
    phone: "081234567891",
    totalPurchase: 350000000,
  },
  {
    id: 3,
    name: "Agus Priyanto",
    email: "agus@email.com",
    phone: "081234567892",
    totalPurchase: 240000000,
  },
];

// Fungsi untuk memformat angka menjadi format rupiah
function formatRupiah(number) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  }).format(number);
}

// Fungsi untuk mengisi data dashboard
function populateDashboard() {
  document.getElementById("totalSales").textContent = formatRupiah(
    sales.reduce((total, sale) => total + sale.price, 0)
  );
  document.getElementById("carsSold").textContent = sales.length;
  document.getElementById("newCustomers").textContent = customers.length;

  // Membuat grafik penjualan
  const ctx = document.getElementById("salesChart").getContext("2d");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: sales.map((sale) => sale.date),
      datasets: [
        {
          label: "Penjualan",
          data: sales.map((sale) => sale.price),
          backgroundColor: "rgba(54, 162, 235, 0.5)",
          borderColor: "rgba(54, 162, 235, 1)",
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function (value) {
              return formatRupiah(value);
            },
          },
        },
      },
    },
  });
}

// Fungsi untuk mengisi tabel inventaris
function populateInventoryTable() {
  const tbody = document.querySelector("#inventoryTable tbody");
  inventory.forEach((item) => {
    const row = tbody.insertRow();
    row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.brand}</td>
            <td>${item.model}</td>
            <td>${item.year}</td>
            <td>${formatRupiah(item.price)}</td>
            <td>${item.stock}</td>
        `;
  });
}

// Fungsi untuk mengisi tabel penjualan
function populateSalesTable() {
  const tbody = document.querySelector("#salesTable tbody");
  sales.forEach((sale) => {
    const row = tbody.insertRow();
    row.innerHTML = `
            <td>${sale.id}</td>
            <td>${sale.date}</td>
            <td>${sale.customer}</td>
            <td>${sale.car}</td>
            <td>${formatRupiah(sale.price)}</td>
        `;
  });
}

// Fungsi untuk mengisi tabel pelanggan
function populateCustomersTable() {
  const tbody = document.querySelector("#customersTable tbody");
  customers.forEach((customer) => {
    const row = tbody.insertRow();
    row.innerHTML = `
            <td>${customer.id}</td>
            <td>${customer.name}</td>
            <td>${customer.email}</td>
            <td>${customer.phone}</td>
            <td>${formatRupiah(customer.totalPurchase)}</td>
        `;
  });
}

// Event listener untuk tombol laporan
document.getElementById("generateSalesReport").addEventListener("click", () => {
  alert("Laporan Penjualan Bulanan telah dibuat.");
});

document
  .getElementById("generateInventoryReport")
  .addEventListener("click", () => {
    alert("Laporan Inventaris telah dibuat.");
  });

document
  .getElementById("generateCustomerReport")
  .addEventListener("click", () => {
    alert("Laporan Pelanggan telah dibuat.");
  });

// Inisialisasi dashboard
document.addEventListener("DOMContentLoaded", () => {
  populateDashboard();
  populateInventoryTable();
  populateSalesTable();
  populateCustomersTable();
});
