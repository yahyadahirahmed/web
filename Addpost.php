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
  $title = $_POST['title'];
  $blogtext = $_POST['comment'];
  $dateandtime = date('Y-m-d H:i:s');
     
    $sql = "INSERT INTO BLOG (Title, BlogText, DateAndTime) 
            VALUES ('$title', '$blogtext', '$dateandtime')";
    if ($conn->query($sql) === TRUE) {
      header('Location: BlogAppear.php'); 
      exit;
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>


