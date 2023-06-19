<?php
    include 'connect.php';

    $name = $_POST['name'];

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(isset($_POST['register'])){
        $user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_num_rows($user) > 0){
            header("location: ../loginForm/register.php?error=Username already taken!");
            exit();
        } else{
            mysqli_query($conn, "INSERT INTO user (name,username,password) VALUES ('$name','$username','$password')");
            header('location: ../loginForm/login.php');
            exit();
        }

    }