<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $patient_ssn = $_POST["patient_ssn"];
    $doctor_ssn = $_POST["doctor_ssn"];
    $drug_trade_name = $_POST["drug_trade_name"];
    $drug_company_name = $_POST["drug_company_name"];
    $qty = $_POST["qty"];
    $date = $_POST["date"];

    require_once "conn.php";
    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `prescribes` (`patient_ssn`, `doctor_ssn`, `drug_trade_name`, `drug_company_name`, `date`, `qty`) 
        VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssi", $patient_ssn, $doctor_ssn, $drug_trade_name, $drug_company_name, $date,$qty);
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
                alert('Record added successfully');
                window.location.href = 'home.php'; // Redirect to the registration page
              </script>"; 
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $stmt->close();
    // Close the connection
    $con->close();
} else {
    header("Location: register_patient.php");
}

