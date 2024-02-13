<?php
// doctor_info.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST["company_name"];
    require_once "conn.php";

    $sql = "SELECT * FROM contracts_with WHERE company_name = '$company_name'";
    $result = $con->query($sql);
    $contracts = array();
    $flag = 0;
    if ($result->num_rows > 0) {
        $flag = 1;
        while ($row = $result->fetch_assoc()) {
            $contracts[] = $row;
        }
    } else {
        echo "Contract of Company: $company_name not found";
        exit; // Stop execution if doctor is not found
    }
    $con->close();
} else {
    // Redirect user back to the form if accessed directly without submitting the form
    header("Location: get_contract_data.php");
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

        .contract-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .contract-table th,
        .contract-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .contract-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .contract-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .contract-table tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Contract Information</h2>
        <div class="contract-info">
            <?php if ($flag) : ?>
                <table class="contract-table">
                    <thead>
                        <tr>
                            <th>Pharmacy Name</th>
                            <th>Start_Date</th>
                            <th>End_Date</th>
                            <th>Supervisor</th>
                            <th>text</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contracts as $contract) : ?>
                            <tr>
                                <td><?php echo $contract['pharmacy_name']; ?></td>
                                <td><?php echo $contract['start_date']; ?></td>
                                <td><?php echo $contract['end_date']; ?></td>
                                <td><?php echo $contract['supervisor']; ?></td>
                                <td><?php echo $contract['text']; ?></td>

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