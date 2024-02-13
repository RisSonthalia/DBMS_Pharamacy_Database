<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .prescription {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .prescription_form {
            background-color: aliceblue;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        select,
        input[type="number"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        select:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="submit"]:focus {
            border-color: #007bff;
        }

        input[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            cursor: not-allowed;
            opacity: 0.5;
            transition: background-color 0.3s, opacity 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        input[type="submit"].enabled {
            cursor: pointer;
            opacity: 1;
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
            outline: none;
            display: block;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="prescription">
        <form action="post_prescription_data.php" class="prescription_form" method="post">
            <h1>Register Prescription</h1>

            <!-- Patient SSN Dropdown -->
            <select name="patient_ssn" id="patient_ssn" onchange="checkForm()">
                <option value="">Select Patient SSN</option>
                <?php
                // Your PHP code to retrieve patient SSNs from the database and populate the dropdown
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "pharmacy";
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT ssn FROM Patient";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["ssn"] . "'>" . $row["ssn"] . "</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select><br>

            <!-- Doctor SSN Dropdown -->
            <select name="doctor_ssn" id="doctor_ssn" onchange="checkForm()">
                <option value="">Select Doctor SSN</option>
                <?php
                // Your PHP code to retrieve doctor SSNs from the database and populate the dropdown
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT ssn FROM doctor";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["ssn"] . "'>" . $row["ssn"] . "</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select><br>

            <!-- Drug Trade Name Dropdown -->
            <select name="drug_trade_name" id="drug_trade_name" onchange="checkForm()">
                <option value="">Select Drug Trade Name</option>
                <?php
                // Your PHP code to retrieve drug trade names from the database and populate the dropdown
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT DISTINCT trade_name FROM drug";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["trade_name"] . "'>" . $row["trade_name"] . "</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select><br>

            <!-- Company Name Dropdown -->
            <select name="drug_company_name" id="drug_company_name" onchange="checkForm()">
                <option value="">Select Company Name</option>
                <?php
                // Your PHP code to retrieve drug trade names from the database and populate the dropdown
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT DISTINCT company_name FROM drug";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["company_name"] . "'>" . $row["company_name"] . "</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select><br>

            <input type="date" id="date" name="date" placeholder="Date" onkeyup="checkForm()"><br>
            <input type="number" id="qty" name="qty" placeholder="Quantity" onkeyup="checkForm()"><br>
            <input type="submit" value="Register" id="submit" disabled>

        </form>
        <button class="btn-back" onclick="window.location.href='prescription_page.php'">Back</button>
    </div>

    <script>
        // Define submitBtn globally
        var submitBtn = document.getElementById('submit');

        function checkForm() {
            var patient_ssn = document.getElementById('patient_ssn').value;
            var doctor_ssn = document.getElementById('doctor_ssn').value;
            var drug_trade_name = document.getElementById('drug_trade_name').value;
            var drug_company_name = document.getElementById('drug_company_name').value;
            var date = document.getElementById('date').value;
            var qty = document.getElementById('qty').value;

            if (patient_ssn !== '' && doctor_ssn !== '' && drug_trade_name !== '' && date !== '' && qty !== '' && drug_company_name !== '') {
                submitBtn.classList.add('enabled');
                submitBtn.disabled = false;
            } else {
                submitBtn.classList.remove('enabled');
                submitBtn.disabled = true;
            }
        }
    </script>
</body>

</html>