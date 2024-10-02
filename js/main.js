// Sample car data (in a real application, this would come from a database)
const cars = [
  {
    id: 1,
    brand: "Toyota",
    model: "Camry",
    year: 2022,
    price: 350000000,
    image: "https://example.com/camry.jpg",
  },
  {
    id: 2,
    brand: "Honda",
    model: "Civic",
    year: 2023,
    price: 370000000,
    image: "https://example.com/civic.jpg",
  },
  {
    id: 3,
    brand: "Ford",
    model: "Mustang",
    year: 2022,
    price: 800000000,
    image: "https://example.com/mustang.jpg",
  },
  // Add more car objects as needed
];

// Function to create a car card element
function createCarCard(car) {
  const card = document.createElement("div");
  card.classList.add("car-card", "animate-fadeIn");

  card.innerHTML = `
        <img src="${car.image}" alt="${car.brand} ${
    car.model
  }" class="car-image">
        <div class="car-info">
            <h3 class="car-title">${car.brand} ${car.model} (${car.year})</h3>
            <p class="car-price">Rp ${car.price.toLocaleString()}</p>
        </div>
    `;

  return card;
}

// Function to populate the car grid
function populateCarGrid() {
  const carGrid = document.getElementById("carGrid");
  cars.forEach((car) => {
    const carCard = createCarCard(car);
    carGrid.appendChild(carCard);
  });
}

// Call the function when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", populateCarGrid);

// Add smooth scrolling to nav links
document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const targetId = this.getAttribute("href").substring(1);
    const targetElement = document.getElementById(targetId);
    if (targetElement) {
      targetElement.scrollIntoView({ behavior: "smooth" });
    }
  });
});
