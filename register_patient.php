<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
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
        
        .patient_registration_form {
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
        input[type="number"],
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
        input[type="number"]:focus,
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
        <form action="post_patient_data.php" class="patient_registration_form" method="post">
            <h1>Register Patient</h1>

            <input type="text" id="patient_ssn" name="patient_ssn" placeholder="SSN" onkeyup="checkForm()"><br>
            <input type="text" id="patient_name" name="patient_name" placeholder="Name" onkeyup="checkForm()"><br>
            <input type="text" id="address" name="address" placeholder="Address" onkeyup="checkForm()"><br>
            <input type="number" id="age" name="age" placeholder="Age" onkeyup="checkForm()"><br>
            <select id="doctor_ssn" name="doctor_ssn" onchange="checkForm()">
                <option value="">Select Doctor SSN</option>
                <?php
                // Establish connection to your database
                require_once "conn.php";

                // Fetch doctor SSNs from the database
                $sql = "SELECT ssn FROM doctor";
                $result = $con->query($sql);

                // Populate select dropdown with doctor SSNs
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ssn'] . "'>" . $row['ssn'] . "</option>";
                    }
                }
                ?>
            </select><br>

            <input type="submit" value="Register" id="submit" disabled>

        </form>
        <button class="btn-back" onclick="window.location.href='patient_page.php'">Back</button>
    </div>

    <script>
        function checkForm() {
            var patient_ssn = document.getElementById('patient_ssn').value;
            var patient_name = document.getElementById('patient_name').value;
            var address = document.getElementById('address').value;
            var age = document.getElementById('age').value;
            var doctor_ssn = document.getElementById('doctor_ssn').value;
            var submitBtn = document.getElementById('submit');

            if (patient_ssn !== '' && patient_name !== '' && address !== '' && age !== '' && doctor_ssn != '') {
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
