<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Form</title>
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

        .registration {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contract_form {
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
        input[type="text"],
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
        input[type="text"]:focus,
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
    <div class="registration">
        <form action="post_contract_data.php" class="contract_form" method="post">
            <h1>Fill the Contract</h1>
            <select id="company_name" name="company_name" onchange="checkForm()">
                <option value="">Company Name</option>
                <?php
                // Establish connection to your database
                require_once "conn.php";

                // Fetch doctor SSNs from the database
                $sql = "SELECT `name` FROM `pharmaceutical company`";
                $result = $con->query($sql);

                // Populate select dropdown with doctor SSNs
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select><br>

            <select id="pharmacy_name" name="pharmacy_name" onchange="checkForm()">
                <option value="">Pharmacy Name</option>
                <?php
                // Establish connection to your database
                require_once "conn.php";

                // Fetch doctor SSNs from the database
                $sql = "SELECT `name`  FROM `pharmacy`";
                $result = $con->query($sql);

                // Populate select dropdown with doctor SSNs
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select><br>

            <input type="date" id="start_date" name="start_date" placeholder="Start Date" onkeyup="checkForm()"><br>
            <input type="date" id="end_date" name="end_date" placeholder="End Date" onkeyup="checkForm()"><br>
            <input type="text" id="supervisor" name="supervisor" placeholder="Supervisor" onkeyup="checkForm()"><br>
            <input type="text" id="text" name="text" placeholder="Text" onkeyup="checkForm()"><br>
            <input type="submit" value="Register" id="submit" disabled>
        </form>
        <button class="btn-back" onclick="window.location.href='contracts_page.php'">Back</button>
    </div>

    <script>
        function checkForm() {
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;
            var supervisor = document.getElementById('supervisor').value;
            var text = document.getElementById('text').value;
            var pharmacy_name = document.getElementById('pharmacy_name').value;
            var company_name = document.getElementById('company_name').value;
            var submitBtn = document.getElementById('submit');

            if (start_date !== '' && end_date !== '' && supervisor !== '' && text !== '' && pharmacy_name != '' && company_name !== '') {
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
