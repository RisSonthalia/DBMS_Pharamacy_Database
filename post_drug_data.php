<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $trade_name = $_POST["trade_name"];
    $formulae = $_POST["formulae"];
    $company_name = $_POST["company_name"];
    require_once "conn.php";
    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `drug` (`trade_name`, `formulae`, `company_name`) 
    VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bind_param("sss", $trade_name, $formulae, $company_name);
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
    header("Location: register_drug.php");
}

