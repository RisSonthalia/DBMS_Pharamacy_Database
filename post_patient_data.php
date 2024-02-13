<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $patient_ssn = $_POST["patient_ssn"];
    $patient_name = $_POST["patient_name"];
    $address = $_POST["address"];
    $age = $_POST["age"];
    $doctor_ssn = $_POST["doctor_ssn"];
    require_once "conn.php";
    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `patient` (`ssn`, `name`, `address`, `Age`,`primary_physician_ssn`) 
    VALUES (?, ?, ?, ?,?)";
    $stmt = $con->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bind_param("sssis", $patient_ssn, $patient_name, $address, $age, $doctor_ssn);
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

