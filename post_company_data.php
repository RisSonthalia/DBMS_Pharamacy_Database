<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $phone_number = $_POST["phone_number"];
    require_once "conn.php";
    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `pharmaceutical company` (`name`, `Phone_number`) 
    VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bind_param("ss", $name, $phone_number);
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
    header("Location: register_pharmaceutical_company.php");
}

