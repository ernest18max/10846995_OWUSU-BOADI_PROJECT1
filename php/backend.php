<?php
session_start();
require_once "sqlConnection.php";

//Sign In
if(isset($_POST["username"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    if($username != null && $email != null && $password1 != null && $password2 != null) {

    //Check if passwords are equal
    if($password1 != $password2) {
        echo "Passwords does not match";
    } else {
        //Check if email is not registered
        $password = md5($password1);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $email_result = $sql->query($check_email);
        if($email_result->num_rows > 0) {
            echo "Email is aleady registered";
        } else {
        //register user 
        $register = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
        if($sql->query($register)) {
            echo "true";
            $_SESSION["email"] = $email;
        } else {
            echo "user not registered";
        }
        }
        
    }
    } else {
        echo "You have empty fields";
    }

}


//Sign In
if(isset($_POST["email2"]) && isset($_POST["password"])) {
    $email = $_POST["email2"];
    $password = md5($_POST["password"]);

    $login = "SELECT * FROM users WHERE email ='$email' && password = '$password'";
    $login_result = $sql->query($login);
    if($login_result->num_rows > 0) {
        $_SESSION["email"] = $email;
        $_SESSION["logged_in"] = "true";
        echo "true";
    } else {
        echo "Email or password is not correct";
    }


}



?>