// Fungsi untuk memformat angka menjadi format rupiah
function formatRupiah(number) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
  }).format(number);
}

// Fungsi untuk mengisi data dashboard
async function populateDashboard() {
  try {
    const response = await fetch("database_connection.php?action=dashboard");
    const data = await response.json();

    document.getElementById("totalSales").textContent = formatRupiah(
      data.total_sales
    );
    document.getElementById("carsSold").textContent = data.cars_sold;
    document.getElementById("newCustomers").textContent = data.new_customers;

    // Membuat grafik penjualan
    const ctx = document.getElementById("salesChart").getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: data.sales_chart.map((item) => item.month),
        datasets: [
          {
            label: "Penjualan",
            data: data.sales_chart.map((item) => item.total),
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
  } catch (error) {
    console.error("Error fetching dashboard data:", error);
  }
}

// Fungsi untuk mengisi tabel inventaris
async function populateInventoryTable() {
  try {
    const response = await fetch("database_connection.php?action=inventory");
    const inventory = await response.json();

    const tbody = document.querySelector("#inventoryTable tbody");
    tbody.innerHTML = ""; // Clear existing rows
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
  } catch (error) {
    console.error("Error fetching inventory data:", error);
  }
}

// Fungsi untuk mengisi tabel penjualan
async function populateSalesTable() {
  try {
    const response = await fetch("database_connection.php?action=sales");
    const sales = await response.json();

    const tbody = document.querySelector("#salesTable tbody");
    tbody.innerHTML = ""; // Clear existing rows
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
  } catch (error) {
    console.error("Error fetching sales data:", error);
  }
}

// Fungsi untuk mengisi tabel pelanggan
async function populateCustomersTable() {
  try {
    const response = await fetch("database_connection.php?action=customers");
    const customers = await response.json();

    const tbody = document.querySelector("#customersTable tbody");
    tbody.innerHTML = ""; // Clear existing rows
    customers.forEach((customer) => {
      const row = tbody.insertRow();
      row.innerHTML = `
                <td>${customer.id}</td>
                <td>${customer.name}</td>
                <td>${customer.email}</td>
                <td>${customer.phone}</td>
                <td>${formatRupiah(customer.total_purchase)}</td>
            `;
    });
  } catch (error) {
    console.error("Error fetching customer data:", error);
  }
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
