<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "ecs417";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['firstname'];
    $sname = $_POST['surname'];
    $email = $_POST['email'];
    $pass1 = $_POST['password'];
    
    $sql = "INSERT INTO USERS (firstName, lastName, email, password) 
            VALUES ('$fname', '$sname', '$email', '$pass1')";
    if ($conn->query($sql) === TRUE) {
      header('Location: success.html');
      exit;
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
