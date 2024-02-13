<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Database - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .menu {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .menu a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }
        .menu a:hover {
            background-color: #555;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #333;
        }
        .content p {
            color: #666;
            line-height: 1.6;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .section {
            background-color: #fff;
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .section h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .section p {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to MedMaster-Pharmacy Database</h1>
        </div>
        <div class="menu">
            <a href="#about">About</a>
            <a href="doctor_page.php">Doctors</a>
            <a href="patient_page.php">Patients</a>
            <a href="drug_page.php">Drugs</a>
            <a href="company_page.php">Companies</a>
            <a href="pharmacy_page.php">Pharmacies</a>
            <a href="contracts_page.php">Contracts</a>
            <a href="prescription_page.php">Prescription</a>
        </div>
        <div class="content">
            <div id="about" class="section">
                <h2>About Us</h2>
                <p>
                    Welcome to our Pharmacy Database website. We provide comprehensive solutions for managing pharmacy operations, including patient management, drug inventory, prescription tracking, and more.
                </p>
            </div>
            <div id="doctor" class="section">
                <h2>Doctors</h2>
                <p>
                    Register and view information about doctors, their specialties, and years of experience.
                </p>
            </div>
            <div id="patient" class="section">
                <h2>Patients</h2>
                <p>
                Register and access patient records including their names, addresses, ages, and primary physicians.
                </p>
            </div>
            <div id="drug" class="section">
                <h2>Drugs</h2>
                <p>
                Register and explore a database of drugs, including trade names, formulas, and pharmaceutical companies.
                </p>
            </div>
            <div id="company" class="section">
                <h2>Pharmaceutical Companies</h2>
                <p>
                Register and learn about pharmaceutical companies and their contact information.
                </p>
            </div>
            <div id="pharmacy" class="section">
                <h2>Pharmacies</h2>
                <p>
                Register and find information about pharmacies, including their names, addresses, and contact numbers.
                </p>
            </div>
            <div id="contract" class="section">
                <h2>Contracts</h2>
                <p>
                Register and explore contracts between pharmaceutical companies and pharmacies, including start and end dates, supervisors, and additional details.
                </p>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 Pharmacy Database. All rights reserved.
    </div>
</body>
</html>
