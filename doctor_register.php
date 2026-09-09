<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $doctor_name = $_POST["doctorName"];
    $email = $_POST["doctorEmail"];
    $phone = $_POST["doctorPhone"];
    $gender = $_POST["gender"];
    $specialization = $_POST["specialization"];
    $qualification = $_POST["qualification"];
    $registration_number = $_POST["registrationNumber"];
    $experience = $_POST["experience"];
    $hospital = $_POST["hospital"];

    // Get selected available days
    $available_days = isset($_POST["availableDays"])
        ? implode(", ", $_POST["availableDays"])
        : "";

    $available_time = $_POST["availableTime"];
    $password = $_POST["doctorPassword"];

    // Check whether email already exists
    $check_sql = "SELECT doctor_id FROM doctors WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);

    if (!$check_stmt) {
        die("Error: " . $conn->error);
    }

    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {

        echo "<script>
                alert('Email already registered. Please use another email.');
                window.location.href='doctor.html';
              </script>";

        $check_stmt->close();
        $conn->close();
        exit();
    }

    $check_stmt->close();

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert doctor details
    $sql = "INSERT INTO doctors
    (
        doctor_name,
        email,
        phone,
        gender,
        specialization,
        qualification,
        registration_number,
        experience,
        hospital,
        available_days,
        available_time,
        password
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssissss",
        $doctor_name,
        $email,
        $phone,
        $gender,
        $specialization,
        $qualification,
        $registration_number,
        $experience,
        $hospital,
        $available_days,
        $available_time,
        $hashed_password
    );

    if ($stmt->execute()) {

        echo "<script>
                alert('Doctor registered successfully!');
                window.location.href='doctor.html';
              </script>";

    } else {

        echo "<script>
                alert('Registration failed. Please try again.');
                window.location.href='doctor.html';
              </script>";
    }

    $stmt->close();
    $conn->close();

} else {

    header("Location: doctor.html");
    exit();
}

?>
