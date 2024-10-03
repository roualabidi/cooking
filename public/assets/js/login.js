
document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");
    const showSignup = document.getElementById("show-signup");
    const showLogin = document.getElementById("show-login");

    // Lors du clic sur "Sign up"
    showSignup.addEventListener("click", function (e) {
        e.preventDefault();  // Empêche le comportement par défaut du lien
        loginForm.style.display = "none"; // Masque le formulaire de connexion
        signupForm.style.display = "block"; // Affiche le formulaire d'inscription
    });

    // Lors du clic sur "Login"
    showLogin.addEventListener("click", function (e) {
        e.preventDefault();  // Empêche le comportement par défaut du lien
        signupForm.style.display = "none"; // Masque le formulaire d'inscription
        loginForm.style.display = "block"; // Affiche le formulaire de connexion
    });
});
