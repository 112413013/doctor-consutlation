document.getElementById("patientForm").addEventListener("submit", function(event) {

    event.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let age = document.getElementById("age").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    let gender = document.querySelector('input[name="gender"]:checked');

    // Name validation
    if (name === "") {
        alert("Please enter your name");
        return;
    }

    if (!/^[A-Za-z ]+$/.test(name)) {
        alert("Name should contain only letters");
        return;
    }

    // Email validation
    if (email === "") {
        alert("Please enter your email");
        return;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Please enter a valid email");
        return;
    }

    // Phone validation
    if (!/^[0-9]{10}$/.test(phone)) {
        alert("Phone number must contain 10 digits");
        return;
    }

    // Age validation
    if (age === "" || age < 1 || age > 100) {
        alert("Age must be between 1 and 100");
        return;
    }

    // Gender validation
    if (!gender) {
        alert("Please select your gender");
        return;
    }

    // Password validation
    if (password.length !== 8) {
        alert("Password must contain exactly 8 characters");
        return;
    }

    // Confirm password
    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return;
    }

    alert("Patient Registration Successful!");

    // Send the validated data to PHP
    this.submit();
});
