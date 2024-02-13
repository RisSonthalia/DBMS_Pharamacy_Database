<?php
// doctor_info.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_ssn = $_POST["doctor_ssn"];
    require_once "conn.php";

    $sql = "SELECT * FROM doctor WHERE ssn = '$doctor_ssn'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ssn = $row["ssn"];
            $name = $row["name"];
            $speciality = $row["speciality"];
            $years_exp = $row["Years_exp"];
        }
    } else {
        echo "Doctor with SSN: $doctor_ssn not found";
        exit; // Stop execution if doctor is not found
    }
    $sql_patient = "SELECT * FROM patient WHERE primary_physician_ssn = '$doctor_ssn'";
    $resultPatient = $con->query($sql_patient);
    $patients = array();
    $flag=0;
    if ($resultPatient->num_rows > 0) {
        $flag=1;
        while ($rowPatient = $resultPatient->fetch_assoc()) {
            $patients[] = $rowPatient;
        }
    }
    $con->close();
} else {
    // Redirect user back to the form if accessed directly without submitting the form
    header("Location: get_doctor_info.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            font-weight: bold;
        }

        .btn-container {
            text-align: center;
        }

        .btn-back {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Doctor Information</h2>
        <div class="info-item">
            <p class="info-label">SSN:</p>
            <p><?php echo $ssn; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Name:</p>
            <p><?php echo $name; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Speciality:</p>
            <p><?php echo $speciality; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Years of Experience:</p>
            <p><?php echo $years_exp; ?></p>
        </div>
        <h2>Assigned Patients</h2>
        <div class="patient-info">
            <?php if ($flag) : ?>
                <?php foreach ($patients as $patient) : ?>
                    <p><strong>Patient SSN:</strong> <?php echo $patient['ssn']; ?></p>
                    <p><strong>Name:</strong> <?php echo $patient['name']; ?></p>
                    <p><strong>Address:</strong> <?php echo $patient['address']; ?></p>
                    <p><strong>Age:</strong> <?php echo $patient['Age']; ?></p>
                    <hr>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No patients assigned to this doctor.</p>
            <?php endif; ?>
        </div>
        <div class="btn-container">
            <button class="btn-back" onclick="window.location.href='get_doctor_data.php'">Back</button>
        </div>
    </div>
</body>

</html>