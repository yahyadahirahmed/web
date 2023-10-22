<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ecs417";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database for the user with the given email and password
    $sql = "SELECT * FROM USERS WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);


    // If a matching user is found, display a welcome message
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "Welcome, " . $row['firstName'] . " " . $row['lastName'] . "!";
        session_start();
        $_SESSION["loggedIn"] = "true";
        header('Location: blog-post.html');
        exit;
    } 
    else {
        // Otherwise, display an error message
        echo "Invalid email or password.";
    }

}

// Close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="jScript.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="top">
    <h1 class="header">WELCOME TO MY PORTFOLIO</h1>
        <nav class="links">           
            <a class="link1" href="http://127.0.0.1:8888/aboutme.html">ABOUT ME</a>
            <a class="link2" href="http://127.0.0.1:8888/Experience.html">EXPERIENCE</a>
            <a class="link3" href="http://127.0.0.1:8888/skills.html">SKILLS</a>
            <a class="link4" href="http://127.0.0.1:8888/BlogAppear.php">POSTS</a>
    </div>
    <br>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <fieldset class="login">
        <h1 class="login-header"><center>LOGIN</center></h1>
            <div class="user">
               <center><label class="email-name" for="email">Email:</label><br></center> 
                <center><input type="email" class="email" name="email" required><br></center>
        </div>
        <div class="pass">
            <center><label class="password-name" for="pass">Password :</label><br></center>
            <center><input type="password" class="password" name="password" required><br><br></center>
        </div>
        <center><input class="submit" type="submit"></center>
        </fieldset>
    </form>
</body>
</html>