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
            height: 80vh;
        }

        .select {
            text-align: center;
        }

        button {
            height: 40px;
            width: 200px;
            background-color: #007bff;
            color: #fff;
            margin: 10px 0;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        button:hover {
            transform: scale(1.1);
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
        <h1>Welcome To Registration Page of Pharmacy DataBase</h1>
    </header>
    <main>
        <div class="select">
            <h2>Click to :</h2>
            <button onclick="registerPatient()">Register Patient</button><br>
            <button onclick="registerDoctor()">Register Doctor</button><br>
            <button onclick="registerDrug()">Register Drug</button><br>
            <button onclick="registerPharmaceuticalCompany()">Register Pharmaceutical Company</button><br>
            <button onclick="registerPharmacy()">Register Pharmacy</button><br>
            <button onclick="registerPrescription()">Fill Prescription</button><br>
            <button onclick="fillContract()">Fill Contract</button><br>
            <button onclick="registerSell()">Register Sell</button><br>
        </div>
    </main>

    <script>
        function registerPatient() {
            window.location.href = "register_patient.php";
        }

        function registerDoctor() {
            window.location.href = "register_doctor.php";
        }

        function registerDrug() {
            window.location.href = "register_drug.php";
        }

        function registerPharmaceuticalCompany() {
            window.location.href = "register_pharmaceutical_company.php";
        }

        function registerPrescription() {
            window.location.href = "prescription_form.php";
        }

        function fillContract() {
            window.location.href = "contracts_form.php";
        }

        function registerSell() {
            window.location.href = "sells.php";
        }

        function registerPharmacy(){
            window.location.href = "register_pharmacy.php";
        }
    </script>
</body>

</html>
