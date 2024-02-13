<?php
// doctor_info.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trade_name = $_POST["trade_name"];
    require_once "conn.php";

    $sql = "SELECT * FROM drug WHERE trade_name = '$trade_name'";
    $result = $con->query($sql);
    $drugs = array();
    $flag = 0;
    if ($result->num_rows > 0) {
        $flag = 1;
        while ($row = $result->fetch_assoc()) {
            $drugs[] = $row;
        }
    } else {
        echo "Drug with trade name: $trade_name not found";
        exit;
    }
    $con->close();
} else {

    header("Location: get_drug_data.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Information</title>
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
        }

        .drug-table th,
        .drug-table td {
            padding: 10px;
            /* Increased padding for better readability */
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
        <h2>Drug Information</h2>
        <div class="drug-info">
            <?php if ($flag) : ?>
                <table class="drug-table">
                    <thead>
                        <tr>
                            <th>Trade Name</th>
                            <th>Formulae</th>
                            <th>Company Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($drugs as $drug) : ?>
                            <tr>
                                <td><?php echo $drug['trade_name']; ?></td>
                                <td><?php echo $drug['formulae']; ?></td>
                                <td><?php echo $drug['company_name']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No prescriptions found for this patient.</p>
            <?php endif; ?>
        </div><br>
        <div class="btn-container">
            <button class="btn-back" onclick="window.location.href='get_doctor_data.php'">Back</button>
        </div>
    </div>
</body>

</html>