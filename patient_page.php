<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedMaster</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        .select {
            text-align: center;
        }

        button {
            height: 50px;
            width: 250px;
            background-color: #007bff;
            color: #fff;
            margin: 20px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            outline: none;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .btn-go-home {
            height: 50px;
            width: 150px;
            background-color: #28a745 !important;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            outline: none;
        }

        .btn-go-home:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5) !important;
        }
    </style>
</head>

<body>
    <header>
        <h1>Patient Page</h1>
    </header>
    <main>
        <div class="select">
            <h2>Select an Action:</h2>
            <button onclick="registerPatient()">Register Patient</button><br>
            <button onclick="patientinfo()">Get Data</button><br>

            <div class="btn-container">
                <button class="btn-go-home" onclick="window.location.href='home.php'">Go to home</button>
            </div>
            
        </div>
    </main>

    <script>
        function registerPatient() {
            window.location.href = "register_patient.php";
        }

        function patientinfo(){
            window.location.href = "get_patient_data.php";
        }


    </script>
</body>

</html>
