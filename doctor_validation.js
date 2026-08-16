document.getElementById("doctorForm").addEventListener("submit", function(event) {

    event.preventDefault();

    let name = document.getElementById("doctorName").value.trim();
    let email = document.getElementById("doctorEmail").value.trim();
    let phone = document.getElementById("doctorPhone").value.trim();
    let specialization = document.getElementById("specialization").value;
    let qualification = document.getElementById("qualification").value.trim();
    let registration = document.getElementById("registrationNumber").value.trim();
    let experience = document.getElementById("experience").value;
    let hospital = document.getElementById("hospital").value.trim();
    let time = document.getElementById("availableTime").value;
    let password = document.getElementById("doctorPassword").value;
    let confirmPassword = document.getElementById("confirmDoctorPassword").value;
    let gender = document.querySelector('input[name="gender"]:checked');

    if (name === "" || !/^[A-Za-z ]+$/.test(name)) {
        alert("Enter a valid doctor name");
        return;
    }

    if (email === "" || !/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(email)) {
        alert("Enter a valid lowercase email");
        return;
    }

    if (!/^[0-9]{10}$/.test(phone)) {
        alert("Phone number must contain 10 digits");
        return;
    }

    if (!gender) {
        alert("Please select gender");
        return;
    }

    if (specialization === "") {
        alert("Please select specialization");
        return;
    }

    if (qualification === "" || registration === "" || hospital === "") {
        alert("Please fill all required details");
        return;
    }

    if (experience === "" || experience < 0 || experience > 60) {
        alert("Enter valid experience");
        return;
    }

    if (time === "") {
        alert("Please select available time");
        return;
    }

    if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*]).{12}$/.test(password)) {
        alert("Password must be exactly 12 characters with uppercase, lowercase, number and special character");
        return;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return;
    }

    alert("Doctor Registration Successful!");
});
