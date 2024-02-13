<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $pharmacy_name = $_POST["pharmacy_name"];
    $drug_trade_name = $_POST["drug_trade_name"];
    $drug_company_name = $_POST["drug_company_name"];
    $price = $_POST["price"];

    require_once "conn.php";
    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `pharmacy_drug` (`pharmacy_name`, `drug_trade_name`, `drug_company_name`, `price`) 
        VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    // Bind parameters to the prepared statement
    $stmt->bind_param("ssss", $pharmacy_name, $drug_trade_name, $drug_company_name, $price);
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
    header("Location: sells.php");
}

