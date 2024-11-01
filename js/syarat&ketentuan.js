function toggleSyarat(event) {
  event.preventDefault();
  const syaratSection = document.getElementById("syarat-dan-ketentuan");

  if (syaratSection.classList.contains("hidden")) {
    syaratSection.classList.remove("hidden");
    syaratSection.classList.add("visible");
  } else {
    syaratSection.classList.remove("visible");
    syaratSection.classList.add("hidden");
  }
}

const faqButton = document.getElementById("faq-button");
const faqSection = document.getElementById("faq");

faqButton.addEventListener("click", () => {
  faqSection.classList.toggle("hidden");
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
