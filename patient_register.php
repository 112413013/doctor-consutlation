<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_name = trim($_POST["patient_name"]);
    $email = trim($_POST["email"]);
    $phone_number = trim($_POST["phone_number"]);
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert patient into users table
    $sql = "INSERT INTO users 
            (patient_name, email, age, gender, phone_number, password)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssisss",
        $patient_name,
        $email,
        $age,
        $gender,
        $phone_number,
        $hashed_password
    );

    if ($stmt->execute()) {

        echo "<script>
                alert('Patient registered successfully!');
                window.location.href='patient_login.html';
              </script>";

    } else {

        if ($conn->errno == 1062) {
            echo "<script>
                    alert('Email already exists. Please use another email.');
                    window.history.back();
                  </script>";
        } else {
            echo "Registration failed: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}

?>