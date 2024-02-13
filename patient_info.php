<?php
// doctor_info.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_ssn = $_POST["patient_ssn"];
    require_once "conn.php";

    $sql = "SELECT * FROM patient WHERE ssn = '$patient_ssn'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ssn = $row["ssn"];
            $name = $row["name"];
            $address = $row["address"];
            $Age = $row["Age"];
            $primary_physician_ssn = $row["primary_physician_ssn"]; // Add a semicolon here
        }
    } else {
        echo "Patient with SSN: $patient_ssn not found";
        exit; // Stop execution if patient is not found
    }

    $sql_doctor = "SELECT * FROM doctor WHERE ssn = '$primary_physician_ssn'";
    $resultDoctor = $con->query($sql_doctor);
    $doctors = array();
    $flag = 0;
    if ($resultDoctor->num_rows > 0) {
        $flag = 1;
        while ($rowDoctor = $resultDoctor->fetch_assoc()) {
            $doctors[] = $rowDoctor;
        }
    }

    $sql_pescription = "SELECT * FROM prescribes WHERE patient_ssn = '$patient_ssn'";
    $resultPres = $con->query($sql_pescription);
    $prescs = array();
    $flag1 = 0;
    if ($resultPres->num_rows > 0) {
        $flag1 = 1;
        while ($row = $resultPres->fetch_assoc()) {
            $prescs[] = $row;
        }
    }
    $con->close();
} else {
    // Redirect user back to the form if accessed directly without submitting the form
    header("Location: get_patient_data.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
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

        .patient-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .patient-table th,
        .patient-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .patient-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .patient-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .patient-table tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Patient Information</h2>
        <div class="info-item">
            <p class="info-label">SSN:</p>
            <p><?php echo $ssn; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Name:</p>
            <p><?php echo $name; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">address:</p>
            <p><?php echo $address; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Age:</p>
            <p><?php echo $Age; ?></p>
        </div>
        <h2>Assigned Doctor</h2>
        <div class="patient-info">
            <?php if ($flag) : ?>
                <?php foreach ($doctors as $doctor) : ?>
                    <p><strong>Patient SSN:</strong> <?php echo $doctor['ssn']; ?></p>
                    <p><strong>Name:</strong> <?php echo $doctor['name']; ?></p>
                    <p><strong>speciality:</strong> <?php echo $doctor['speciality']; ?></p>
                    <p><strong>Years_exp:</strong> <?php echo $doctor['Years_exp']; ?></p>
                    <hr>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No Doctor assigned to this doctor.</p>
            <?php endif; ?>
        </div>
        <h2>Prescription</h2>
        <div class="patient-info">
            <?php if ($flag1) : ?>
                <table class="patient-table">
                    <thead>
                        <tr>
                            <th>Patient SSN</th>
                            <th>Doctor SSN</th>
                            <th>Drug Trade Name</th>
                            <th>Drug Company Name</th>
                            <th>Date</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prescs as $presc) : ?>
                            <tr>
                                <td><?php echo $presc['patient_ssn']; ?></td>
                                <td><?php echo $presc['doctor_ssn']; ?></td>
                                <td><?php echo $presc['drug_trade_name']; ?></td>
                                <td><?php echo $presc['drug_company_name']; ?></td>
                                <td><?php echo $presc['date']; ?></td>
                                <td><?php echo $presc['qty']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No prescriptions found for this patient.</p>
            <?php endif; ?>
        </div>


        <div class="btn-container">
            <button class="btn-back" onclick="window.location.href='get_doctor_data.php'">Back</button>
        </div>
    </div>
</body>

</html>