const gridItems = document.querySelectorAll(".grid-item");

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
        entry.target.style.transform = "translateY(0)";
      }
    });
  },
  {
    threshold: 0.5,
  }
);

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

const companyContainer = document.querySelectorAll(".company-container img");

companyContainer.forEach((icon) => {
  icon.style.transition = "transform 0.3s ease";
  icon.addEventListener("mouseover", () => {
    icon.style.transform = "scale(1.2)";
  });
  icon.addEventListener("mouseout", () => {
    icon.style.transform = "scale(1)";
  });
});

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
