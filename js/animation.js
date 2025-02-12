const passwordField = document.getElementById("password");
const togglePasswordIcon = document.getElementById("togglePassword");
const showPasswordImage = "../includes/images/show.png";
const hidePasswordImage = "../includes/images/hide.png";

togglePasswordIcon.addEventListener("click", () => {
    const isPasswordHidden = passwordField.type === "password";
    passwordField.type = isPasswordHidden ? "text" : "password";
    togglePasswordIcon.src = isPasswordHidden ? hidePasswordImage : showPasswordImage;
    togglePasswordIcon.alt = isPasswordHidden ? "Hide Password" : "Show Password";
});
