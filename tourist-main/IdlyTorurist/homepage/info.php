<?php
    session_start();
    include '../php/connect.php';
    $crrntId = $_SESSION['id'];


    $id = $_GET['id'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = '$crrntId'"));
    $post = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM upload WHERE id = '$id'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/info.css">
    <title>Name</title>
</head>
<body>
    <div class="container">
        <?php if($user['type'] == "admin") {?>
            <div class="navbar">
                <a href="../admin/admin.php?id=<?=$crrntId?>">Back</a>
            </div>
        <?php } else {?>
            <div class="navbar">
                <a href="user.php?id=<?=$crrntId?>">Back</a>
            </div>
        <?php } ?>
        <div class="main">
            <div class="image">
                <div class="image-wrapper">
                    <img src="../uploads/<?= $post['image'];?>" width="500px">
                </div>
                
            </div>
            <div class="info">
                <div class="info-name">
                    <h1><?= $post['title'];?></h1>
                    <div class="time">
                        <label><?= $post['date'];?></label>
                    </div>
                </div>
                <div class="description">
                    <p><?= $post['description'];?></p>
                </div>
                <form action="../php/comment.php" method="post" class="input-comment">
                    <div class="input-box">
                        <input type="hidden" name="postId" value="<?=$post['id'];?>">
                        <input type="hidden" name="userId" value="<?= $crrntId;?>">
                        <input type="hidden" name="name" value="<?= $user['name'];?>">
                        <input type="text" name="comment" placeholder="Add your feedback">
                        <button type="submit" name="send">Send</button>
                    </div>
                </form>
                <div class="comment-container">
                    <?php 
                        $cmmt = mysqli_query($conn, "SELECT * FROM comment WHERE post_id = '$id' ORDER BY DATE DESC");
                        while($row = mysqli_fetch_assoc($cmmt)) {
                    ?>
                    <div class="comment-box">
                        <div class="comment-name">
                            <Strong><?= $row['name'];?></Strong>
                            <time><?= $row['date']?></time>
                        </div>
                        <div class="comment-contents">
                            <p><?= $row['content']?></p>
                        </div>
                        <?php if($user['type'] == "admin"){?>
                            <form action="../php/delete.php" method="post">
                                <input type="hidden" value="<?= $id?>" name="postId">
                                <input type="hidden" value="<?= $row['id'];?>" name="id">
                                <div class="delete">
                                    <button type="submit" name="delCom">Delete</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>