
const container = document.querySelector(".container");
const pwShowHide = document.querySelectorAll(".showHidePw");
const pwFields = document.querySelectorAll(".password");
const signUp = document.querySelector(".signup-link");
const login = document.querySelector(".login-link");

// Toggle password visibility
pwShowHide.forEach(eyeIcon => {
eyeIcon.addEventListener("click", () => {
pwFields.forEach(pwField => {
pwField.type = (pwField.type === "password") ? "text" : "password";
});

pwShowHide.forEach(icon => {
icon.classList.toggle("uil-eye");
icon.classList.toggle("uil-eye-slash");
});
});
});




