<?php
// doctor_info.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["phar_name"];
    require_once "conn.php";

    $sql = "SELECT * FROM pharmacy WHERE `name` = '$name'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $address = $row["address"];
            $phone_number = $row["phone_number"];
        }
    } else {
        echo "Pharmacy With Name: $name not found";
        exit; // Stop execution if doctor is not found
    }
    $sql_drug_sell = "SELECT * FROM pharmacy_drug WHERE pharmacy_name = '$name'";
    $resultSell = $con->query($sql_drug_sell);
    $sells = array();
    $flag = 0;
    if ($resultSell->num_rows > 0) {
        $flag = 1;
        while ($row = $resultSell->fetch_assoc()) {
            $sells[] = $row;
        }
    }
    $con->close();
} else {
    // Redirect user back to the form if accessed directly without submitting the form
    header("Location: get_pharmacy_data.php");
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

        .drug-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .drug-table th,
        .drug-table td {
            padding: 8px 12px;
            /* Adjust padding as needed */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .drug-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .drug-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .drug-table tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pharmacy Information</h2>
        <div class="info-item">
            <p class="info-label">Name:</p>
            <p><?php echo $name; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Address:</p>
            <p><?php echo $address; ?></p>
        </div>
        <div class="info-item">
            <p class="info-label">Phone Number:</p>
            <p><?php echo $phone_number; ?></p>
            <h2>Drugs Info:</h2>
            <div class="drug-info">
                <?php if ($flag) : ?>
                    <table class="drug-table">
                        <thead>
                            <tr>
                                <th>Drug_Trade_Name</th>
                                <th>Company Name</th>
                                <th>Drug Trade Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sells as $sell) : ?>
                                <tr>
                                    <td><?php echo $sell['pharmacy_name']; ?></td>
                                    <td><?php echo $sell['drug_trade_name']; ?></td>
                                    <td><?php echo $sell['drug_company_name']; ?></td>
                                    <td><?php echo $sell['price']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No Sells found for this Pharmacy.</p>
                <?php endif; ?>
            </div>
            <div class="btn-container">
                <button class="btn-back" onclick="window.location.href='get_doctor_data.php'">Back</button>
            </div>
        </div>
</body>

</html>