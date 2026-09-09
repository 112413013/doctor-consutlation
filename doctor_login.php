<?php

session_start();

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM doctors WHERE email = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $doctor = $result->fetch_assoc();

        if (password_verify($password, $doctor["password"])) {

            $_SESSION["doctor_id"] = $doctor["doctor_id"];
            $_SESSION["doctor_name"] = $doctor["doctor_name"];
            $_SESSION["doctor_email"] = $doctor["email"];

            header("Location: doctor_dashboard.html");
            exit();

        } else {

            echo "<script>
                    alert('Invalid password');
                    window.location.href='doctor_login.html';
                  </script>";
        }

    } else {

        echo "<script>
                alert('Doctor email not registered');
                window.location.href='doctor_login.html';
              </script>";
    }

    $stmt->close();
    $conn->close();

} else {

    header("Location: doctor_login.html");
    exit();

}

?>
