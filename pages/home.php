<?php
session_start();
require_once "../php/sqlConnection.php";

if(!isset($_SESSION["email"])) {
    header("location: ../index.html");
} else {
    $email = $_SESSION["email"];

    $name_query = "SELECT * FROM users WHERE email = '$email'";
    $name_result = $sql->query($name_query);
    if($name_result->num_rows > 0) {
        while($data = $name_result->fetch_assoc()) {
            $username = $data["username"];
        }
    }

    if(isset($_SESSION["logged_in"])) {
        $status = "signed in";
    } else {
        $status ="signed up";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <div class="home">
        <div class="status">
            <div>
            <p>Hi, <?php echo $username ?></p>
            <p>You have sucessfully <?php echo $status ?></p>
            <a href="../php/logOut.php"> Log Out</a>
        </div>
        </div>
    </div>
</body>
</html>