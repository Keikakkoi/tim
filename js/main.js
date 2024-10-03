// Animasi fade-in ketika gambar muncul di viewport saat di-scroll
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

gridItems.forEach((item) => {
  item.style.opacity = "0";
  item.style.transform = "translateY(20px)";
  item.style.transition = "opacity 0.6s ease-out, transform 0.6s ease-out";
  observer.observe(item);
});

window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  if (window.scrollY > 50) {
    header.style.padding = "0.5rem 0";
    header.style.transition = "padding 0.3s ease-in-out";
  } else {
    header.style.padding = "1rem 0";
  }
});

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

window.addEventListener("DOMContentLoaded", () => {
  const contentWrapper = document.querySelector(".content-wrapper");
  contentWrapper.style.opacity = "0";
  contentWrapper.style.transform = "translateY(20px)";
  contentWrapper.style.transition = "transform 0.8s ease";

  setTimeout(() => {
    contentWrapper.style.opacity = "1";
    contentWrapper.style.transform = "translate(0)";
  }, 500);
});

window.addEventListener("DOMContentLoaded", () => {
  const imageContent = document.querySelector(".image-content img");
  imageContent.style.transform = "scale(0.8)";
  imageContent.style.opacity = "0";
  imageContent.style.transition = "transform 0.7s ease-out";

  setTimeout(() => {
    imageContent.style.transform = "scale(1)";
    imageContent.style.opacity = "1";
  }, 700);
});

window.addEventListener("DOMContentLoaded", () => {
  const heroText = document.querySelector(".hero-text");
  heroText.style.opacity = "0";
  heroText.style.transform = "translateY(20px)";
  heroText.style.transition = "transform 1s ease-out";

  setTimeout(() => {
    heroText.style.opacity = "1";
    heroText.style.transform = "translate(0)";
  }, 1000);
});
