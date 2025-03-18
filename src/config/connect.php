<?php

$servername = "db"; 
$username = "shithost_user"; 
$password = "password";  
$dbname = "shithost";  


try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

?>
