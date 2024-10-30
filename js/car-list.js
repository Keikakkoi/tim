const socialIcons = document.querySelectorAll(".social-icons img");

socialIcons.forEach((icon) => {
  icon.style.transition = "transform 0.3s ease";
  icon.addEventListener("mouseover", () => {
    icon.style.transform = "scale(1.2)";
  });
  icon.addEventListener("mouseout", () => {
    icon.style.transform = "scale(1)";
  });
});

const cars = {
  all: [],
  honda: [
    {
      image: "/car img/Honda Civic_1_11zon.webp",
      details: "Honda Civic",
      fuel: "Gas",
      seats: "4 Seats",
      modelYear: "2018 Model",
      price: "Rp 450.000.000",
    },
    {
      image: "/car img/Honda Civic BR-V_14_11zon.webp",
      details: "Honda BR-V",
      fuel: "Gas",
      seats: "6 Seats",
      modelYear: "2021 Model",
      price: "Rp 300.000.000",
    },
    {
      image: "/car img/Honda Civic HR-V_15_11zon.webp",
      details: "Honda HR-V",
      fuel: "Gas",
      seats: "5 Seats",
      modelYear: "2022 Model",
      price: "Rp 350.000.000",
    },
  ],
  suzuki: [
    {
      image: "/car img/Suzuki Ertiga_8_11zon.webp",
      details: "Suzuki Ertiga",
      fuel: "Gas",
      seats: "5 Seats",
      modelYear: "2019 Model",
      price: "Rp 250.000.000",
    },
    {
      image: "/car img/Suzuki Baleno_7_11zon.webp",
      details: "Suzuki Baleno",
      fuel: "Gas",
      seats: "5 Seats",
      modelYear: "2021 Model",
      price: "Rp 220.000.000",
    },
    {
      image: "/car img/Suzuki Ignis_9_11zon.webp",
      details: "Suzuki Ignis",
      fuel: "Gas",
      seats: "5 Seats",
      modelYear: "2020 Model",
      price: "Rp 180.000.000",
    },
    {
      image: "/car img/Suzuki APV_6_11zon.webp",
      details: "Suzuki APV",
      fuel: "Gas",
      seats: "8 Seats",
      modelYear: "2020 Model",
      price: "Rp 300.000.000",
    },
    {
      image: "/car img/Suzuki Karimun Wagon R_10_11zon.webp",
      details: "Suzuki Karimun Wagon R",
      fuel: "Gas",
      seats: "5 Seats",
      modelYear: "2018 Model",
      price: "Rp 150.000.000",
    },
  ],
  hyundai: [
    {
      image: "/car img/Hyundai Creta_2_11zon.webp",
      details: "Hyundai Creta",
      fuel: "Gas",
      seats: "5 Seats",
      modelYear: "2021 Model",
      price: "Rp 300.000.000",
    },
    {
      image: "/car img/Hyundai Palisade_3_11zon.webp",
      details: "Hyundai Palisade",
      fuel: "Diesel",
      seats: "7 Seats",
      modelYear: "2022 Model",
      price: "Rp 850.000.000",
    },
  ],
  toyota: [
    {
      image: "/car img/Toyota Alphard_11_11zon.webp",
      details: "Toyota Alphard",
      fuel: "Gas",
      seats: "4 Seats",
      modelYear: "2020 Model",
      price: "Rp 1.200.000.000",
    },
    {
      image: "/car img/Toyota Avanza_12_11zon.webp",
      details: "Toyota Avanza",
      fuel: "Gas",
      seats: "7 Seats",
      modelYear: "2019 Model",
      price: "Rp 200.000.000",
    },
    {
      image: "/car img/Toyota Fortuner_13_11zon.webp",
      details: "Toyota Fortuner",
      fuel: "Diesel",
      seats: "7 Seats",
      modelYear: "2020 Model",
      price: "Rp 500.000.000",
    },
  ],
  mitsubishi: [
    {
      image: "/car img/Mutsubishi Xpander_5_11zon.webp",
      details: "Mitsubishi Xpander",
      fuel: "Gas",
      seats: "6 Seats",
      modelYear: "2020 Model",
      price: "Rp 280.000.000",
    },
    {
      image: "/car img/Mutsubishi Pajero_4_11zon.webp",
      details: "Mitsubishi Pajero",
      fuel: "Diesel",
      seats: "7 Seats",
      modelYear: "2021 Model",
      price: "Rp 700.000.000",
    },
  ],
};

function changeCar(brand) {
  const carGallery = document.getElementById("carGallery");
  carGallery.innerHTML = "";

  if (brand === "all") {
    for (let key in cars) {
      cars[key].forEach((car) => {
        carGallery.innerHTML += `
            <div class="car-item" data-aos="fade-up" data-aos-duration="300">
              <img src="${car.image}" alt="${car.details}">
              <div class="car-details">
                <h3>${car.details}</h3>
                <div class="car-icons">
                  <img src="icon/fuel.png" alt="Fuel Icon"> 
                  <p>Fuel: ${car.fuel}</p>
                </div>
                <div class="car-icons">
                  <img src="icon/car-seat.png" alt="Seats Icon"> 
                  <p>Seats: ${car.seats}</p>
                </div>
                <div class="car-icons">
                  <img src="icon/calendar.png" alt="Year Icon"> 
                  <p>Model: ${car.modelYear}</p>
                </div>
                <div class="car-price">${car.price}</div>
              </div>
                  <div class="purchase-container">
            <button class="purchase-button">
              Purchase <img src="/icon/cart.png" alt="Icon"> 
            </button>
          </div>
            </div>
          `;
      });
    }
  } else {
    cars[brand].forEach((car) => {
      carGallery.innerHTML += `
          <div class="car-item">
            <img src="${car.image}" alt="${car.details}">
            <div class="car-details">
              <h3>${car.details}</h3>
              <div class="car-icons">
                <img src="icon/fuel.png" alt="Fuel Icon">
                <p>Fuel: ${car.fuel}</p>
              </div>
              <div class="car-icons">
                <img src="icon/car-seat.png" alt="Seats Icon"> 
                <p>Seats: ${car.seats}</p>
              </div>
              <div class="car-icons">
                <img src="icon/calendar.png" alt="Year Icon">
                <p>Model: ${car.modelYear}</p>
              </div>
              <div class="car-price">${car.price}</div>
            </div>
          <div class="purchase-container">
            <button class="purchase-button">
              Purchase <img src="/icon/cart.png" alt="Icon">
            </button>
          </div>
          </div>
        `;
    });
  }

  const buttons = document.querySelectorAll(".buttons button");
  buttons.forEach((button) => {
    button.classList.remove("active");
    if (button.innerText.toLowerCase() === brand) {
      button.classList.add("active");
    }
  });
}

window.onload = () => changeCar("all");
