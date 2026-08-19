document.getElementById("adminLoginForm").addEventListener("submit", function(event) {

    event.preventDefault();

    let email = document.getElementById("adminEmail").value.trim();
    let password = document.getElementById("adminPassword").value;

    // Email: lowercase letters and numbers only before @
    if (!/^[a-z0-9]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(email)) {
        alert("Email must contain only lowercase letters and numbers");
        return;
    }

    // Password: uppercase + lowercase + number + special character
    if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/.test(password)) {
        alert("Password must contain uppercase, lowercase, number and special character");
        return;
    }

    // Admin login details
    if (email !== "admin123@gmail.com" || password !== "Admin@123") {
        alert("Invalid admin email or password");
        return;
    }

    alert("Admin Login Successful!");

    window.location.href = "admin-dashboard.html";
});