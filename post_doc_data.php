<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $doctor_ssn = $_POST["doctor_ssn"];
    $doc_name = $_POST["doc_name"];
    $speciality = $_POST["speciality"];
    $years_exp = $_POST["years_exp"];
    require_once "conn.php";
    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `doctor` (`ssn`, `name`, `speciality`, `Years_exp`) 
    VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bind_param("sssi", $doctor_ssn, $doc_name, $speciality, $years_exp);
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
    header("Location: register_doctor.php");
}

