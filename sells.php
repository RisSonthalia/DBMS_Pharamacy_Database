<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Registration</title>
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
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .sell_registration_form {
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
    </style>
</head>

<body>
    <div class="registration">
        <form action="post_sells_data.php" class="sell_registration_form" method="post">
            <h1>Register Sell</h1>
            
            <select id="pharmacy_name" name="pharmacy_name" onchange="checkForm()">
                <option value="">Pharmacy Name</option>
                <?php
                // Establish connection to your database
                require_once "conn.php";

                // Fetch pharmacy names from the database
                $sql = "SELECT `name` FROM pharmacy";
                $result = $con->query($sql);

                // Populate select dropdown with pharmacy names
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select><br>

            <select id="drug_trade_name" name="drug_trade_name" onchange="checkForm()">
                <option value="">Drug Trade Name</option>
                <?php
                // Establish connection to your database
                require_once "conn.php";

                // Fetch drug trade names from the database
                $sql = "SELECT `trade_name` FROM drug";
                $result = $con->query($sql);

                // Populate select dropdown with drug trade names
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['trade_name'] . "'>" . $row['trade_name'] . "</option>";
                    }
                }
                ?>
            </select><br>

            <select id="drug_company_name" name="drug_company_name" onchange="checkForm()">
                <option value="">Company Name</option>
                <?php
                // Establish connection to your database
                require_once "conn.php";

                // Fetch drug company names from the database
                $sql = "SELECT `company_name` FROM drug";
                $result = $con->query($sql);

                // Populate select dropdown with drug company names
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['company_name'] . "'>" . $row['company_name'] . "</option>";
                    }
                }
                ?>
            </select><br>

            <input type="number" id="price" name="price" placeholder="Price" onkeyup="checkForm()"><br>

            <input type="submit" value="Register" id="submitBtn" disabled>

        </form>
    </div>

    <script>
        function checkForm() {
            var pharmacy_name = document.getElementById('pharmacy_name').value;
            var drug_trade_name = document.getElementById('drug_trade_name').value;
            var drug_company_name = document.getElementById('drug_company_name').value;
            var price = document.getElementById('price').value;
            var submitBtn = document.getElementById('submitBtn');

            if (pharmacy_name !== '' && drug_trade_name !== '' && drug_company_name !== '' && price !== '') {
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
