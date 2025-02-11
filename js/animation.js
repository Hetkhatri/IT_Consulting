const passwordField = document.getElementById("password");
const togglePasswordIcon = document.getElementById("togglePassword");

// Image paths for showing and hiding the password
const showPasswordImage = "images/show.png";
const hidePasswordImage = "images/hide.png";

togglePasswordIcon.addEventListener("click", () => {
    // Toggle the type attribute
    const isPasswordHidden = passwordField.type === "password";
    passwordField.type = isPasswordHidden ? "text" : "password";

    // Change the icon based on the state
    togglePasswordIcon.src = isPasswordHidden ? hidePasswordImage : showPasswordImage;
    togglePasswordIcon.alt = isPasswordHidden ? "Hide Password" : "Show Password";
});
