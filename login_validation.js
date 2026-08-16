document.getElementById("loginForm").addEventListener("submit", function(event) {

    event.preventDefault();

    let email = document.getElementById("loginEmail").value.trim();
    let password = document.getElementById("loginPassword").value;

    if (email === "") {
        alert("Please enter your email");
        return;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Please enter a valid email");
        return;
    }

    if (password === "") {
        alert("Please enter your password");
        return;
    }

    if (password.length < 6) {
        alert("Password must contain at least 6 characters");
        return;
    }

    alert("Login Successful!");
});
