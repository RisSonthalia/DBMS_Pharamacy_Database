<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Registration</title>
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
        
        .drug_registration_form {
            background-color: #fff;
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
        
        input[type="text"],
        input[type="submit"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        select:focus {
            border-color: #007bff;
        }
        
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: not-allowed;
            opacity: 0.5;
            transition: background-color 0.3s, opacity 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #0056b3;
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
        <form action="post_drug_data.php" class="drug_registration_form" method="post">
            <h1>Register Drug</h1>

            <input type="text" id="trade_name" name="trade_name" placeholder="Trade Name" onkeyup="checkForm()"><br>
            <input type="text" id="formulae" name="formulae" placeholder="Formula" onkeyup="checkForm()"><br>
            <select id="company_name" name="company_name" onchange="checkForm()">
                <option value="">Select Company</option>
                <?php
                // Establish connection to your database
                require_once "conn.php";

                // Fetch pharmaceutical company names from the database
                $sql = "SELECT `name` FROM `pharmaceutical company`";
                $result = $con->query($sql);

                // Populate select dropdown with company names
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                }
                ?>
            </select><br>

            <input type="submit" value="Register" id="submit" class="disabled" disabled>

        </form>
        <button class="btn-back" onclick="window.location.href='drug_page.php'">Back</button>
    </div>

    <script>
        function checkForm() {
            var trade_name = document.getElementById('trade_name').value;
            var formulae = document.getElementById('formulae').value;
            var company_name = document.getElementById('company_name').value;
            var submitBtn = document.getElementById('submit');

            if (trade_name !== '' && formulae !== '' && company_name !== '') {
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
