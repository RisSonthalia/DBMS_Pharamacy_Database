<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $company_name = $_POST["company_name"];
    $pharmacy_name = $_POST["pharmacy_name"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $supervisor = $_POST["supervisor"];
    $text = $_POST["text"];

    require_once "conn.php";
    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `contracts_with` (`company_name`, `pharmacy_name`, `start_date`, `end_date`, `supervisor`, `text`) 
        VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssi", $company_name, $pharmacy_name, $start_date, $end_date, $supervisor,$text);
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

