<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "ecs417";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Create MySQL database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Title, BlogText, DateAndTime FROM BLOG";

$result = $conn->query($sql);
$myposts = array();

// Store each blog post in an array
while ($row = $result->fetch_assoc()) {
    array_push($myposts, $row);
}

usort($myposts, function ($a, $b) {
    return strtotime($b['DateAndTime']) - strtotime($a['DateAndTime']);
});

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="BlogAppear.css">
    <title>BlogPage</title>
</head>

<body>
    <div class="top">
        <table class="table">
            <tr>
                <th class="header">Title</th>
                <th class="header">Comment</th>
                <th class="header">Date And Time</th>
            </tr>
            <?php
            foreach ($myposts as $post) {
                echo "<tr><td>".$post["Title"]."</td><td>".$post["BlogText"]."</td><td>".$post["DateAndTime"]."</td></tr>";
            }
            ?>
        </table>
        <br>
        <?php 
        session_start();
        if (isset($_SESSION["loggedIn"])) {
            echo '<a href="blog-post.html"><input type="submit" class="return" value="BACK TO BLOG PAGE!"></a>';
        }
        ?>
    </div>
</body>
</html>
