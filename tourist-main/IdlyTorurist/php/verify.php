<?php
    session_start();
    include 'connect.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(isset($_POST['login'])){
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $row['type'];

            if($row['type'] == "admin"){
                header("Location: ../admin/admin.php?id=".$row['id']);
		        exit();
            } else {
                header("location: ../homepage/user.php?id=".$row['id']);
                exit();
            }
            
		}else{
			header("Location: ../loginForm/login.php?error=Incorect username or password!");
	        exit();
		}
    }