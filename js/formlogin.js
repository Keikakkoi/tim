function validateForm() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (email === "kelompok8@gmail.com" && password === "kelompok8") {
    window.location.href = "/admin/admin-dashboard.html";
    return false;
  } else {
    alert("Incorrect email or password. Please try again.");
    return false;
  }

  function validateForm() {
    alert("Form submitted!");
    return false;
  }
}
