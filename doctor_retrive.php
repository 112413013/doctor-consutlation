<?php

include "db.php";

$sql = "SELECT * FROM doctors ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Details</title>
</head>

<body>

<h1>Doctor Details</h1>

<?php

if ($result->num_rows > 0) {

    while ($doctor = $result->fetch_assoc()) {

        echo "<div>";

        echo "<h2>" . htmlspecialchars($doctor["doctor_name"]) . "</h2>";
        echo "<p>Email: " . htmlspecialchars($doctor["email"]) . "</p>";
        echo "<p>Phone: " . htmlspecialchars($doctor["phone"]) . "</p>";
        echo "<p>Gender: " . htmlspecialchars($doctor["gender"]) . "</p>";
        echo "<p>Specialization: " . htmlspecialchars($doctor["specialization"]) . "</p>";
        echo "<p>Qualification: " . htmlspecialchars($doctor["qualification"]) . "</p>";
        echo "<p>Registration Number: " . htmlspecialchars($doctor["registration_number"]) . "</p>";
        echo "<p>Experience: " . htmlspecialchars($doctor["experience"]) . " years</p>";
        echo "<p>Hospital: " . htmlspecialchars($doctor["hospital"]) . "</p>";
        echo "<p>Available Days: " . htmlspecialchars($doctor["available_days"]) . "</p>";
        echo "<p>Available Time: " . htmlspecialchars($doctor["available_time"]) . "</p>";
        echo "<p>Status: " . htmlspecialchars($doctor["status"]) . "</p>";

        echo "<hr>";

        echo "</div>";
    }

} else {

    echo "<p>No doctors found.</p>";

}

$conn->close();

?>

</body>
</html>