<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
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

        .pharmacy_registration_form {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
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

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Disabled state */
        input[type="submit"].disabled {
            background-color: #ccc;
            color: #666;
            cursor: not-allowed;
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
        <form action="post_pharmacy_data.php" class="pharmacy_registration_form" method="post">
            <h1>Register Pharmacy</h1>

            <input type="text" id="name" name="name" placeholder="Name" onkeyup="checkForm()"><br>
            <input type="text" id="address" name="address" placeholder="Address" onkeyup="checkForm()"><br>
            <input type="number" id="phone_number" name="phone_number" placeholder="Phone Number" onkeyup="checkForm()"><br>
            <input type="submit" value="Register" id="submit" class="disabled" disabled>

        </form>
        <button class="btn-back" onclick="window.location.href='pharmacy_page.php'">Back</button>
    </div>

    <script>
        function checkForm() {
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var phone_number = document.getElementById('phone_number').value;
            var submitBtn = document.getElementById('submit');

            if (name !== '' && address !== '' && phone_number !== '') {
                submitBtn.classList.remove('disabled');
                submitBtn.disabled = false;
            } else {
                submitBtn.classList.add('disabled');
                submitBtn.disabled = true;
            }
        }
    </script>
</body>

</html>
