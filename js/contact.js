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

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}
