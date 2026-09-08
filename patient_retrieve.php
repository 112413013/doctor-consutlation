<?php
include "db.php";

$sql = "SELECT patient_id, patient_name, email, age, gender, phone_number, created_at 
        FROM users";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Patient Details</h1>

    <?php
    if ($result->num_rows > 0) {
    ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Registered Date</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $row["patient_id"]; ?></td>
            <td><?php echo $row["patient_name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["age"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["phone_number"]; ?></td>
            <td><?php echo $row["created_at"]; ?></td>
        </tr>

        <?php
        }
        ?>

    </table>

    <?php
    } else {
        echo "<p>No patient records found.</p>";
    }

    $conn->close();
    ?>

</div>

</body>
</html>