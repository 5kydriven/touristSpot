<?php
    include 'connect.php';

    $post = $_POST['postId'];
    $user = $_POST['userId'];
    $content = $_POST['comment'];
    $name = $_POST['name'];

    if(isset($_POST['send'])){
        mysqli_query($conn, "INSERT INTO comment (user_id,content,post_id,name) VALUES ('$user','$content','$post','$name')");
        header("location: ../homepage/info.php?id=".$post);
    }