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
