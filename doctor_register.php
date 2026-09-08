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

    // Hash password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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

        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

?>