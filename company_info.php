<?php
// doctor_info.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["comp_name"];
    require_once "conn.php";

    $sql = "SELECT * FROM `pharmaceutical company` WHERE name = '$name'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $phone_number = $row["Phone_number"];
        }
    } else {
        echo "Comapany With name: $name not found";
        exit; // Stop execution if doctor is not found
    }

    $sql_drug = "SELECT * FROM drug WHERE company_name = '$name'";
    $resultdrug = $con->query($sql_drug);
    $drugs = array();
    $flag = 0;
    if ($resultdrug->num_rows > 0) {
        $flag = 1;
        while ($row = $resultdrug->fetch_assoc()) {
            $drugs[] = $row;
        }
    }
    $con->close();
} else {
    // Redirect user back to the form if accessed directly without submitting the form
    header("Location: get_company_data.php");
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

        .company-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .company-table th,
        .company-table td {
            padding: 8px 12px;
            /* Adjust padding as needed */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .company-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .company-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .company-table tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Company Information</h2>
        <div class="info-item">
            <p class="info-label">Name:</p>
            <p><?php echo $name; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Phone Number:</p>
            <p><?php echo $phone_number; ?></p>
        </div>

        <h2>Drug Info it makes:</h2>
        <div class="company-info">
            <?php if ($flag) : ?>
                <table class="company-table">
                    <thead>
                        <tr>
                            <th>Trade Name</th>
                            <th>Formulae</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($drugs as $drug) : ?>
                            <tr>
                                <td><?php echo $drug['trade_name']; ?></td>
                                <td><?php echo $drug['formulae']; ?></td>
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