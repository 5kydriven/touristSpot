<?php

    include 'connect.php';


    if(isset($_POST['delCom'])){
        $idCom = $_POST['id']; 
        $postId = $_POST['postId'];

        mysqli_query($conn, "DELETE FROM `comment` WHERE id = '$idCom'");
        header('location: ../homepage/info.php?id='.$postId);
        exit();
    }