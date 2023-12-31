<?php
    include '../php/connect.php';
    session_start();
    $id = $_SESSION['id'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'"));
    
    if(isset($_GET['logout'])){
        unset($id);
        session_destroy();
        header('location: ../loginForm/login.php');
    }

    if(isset($_GET['delete'])){
        mysqli_query($conn, "DELETE FROM upload WHERE id = '".$_GET['delete']."'");
        header("location: admin.php?id=".$id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>User</title>
</head>
<body>
        <div class="header-container">
            <div class="logo-container">
                <a href="#" class="logoLink"><h1>Portico</h1></a>
            </div>
            <div class="rightHeaderContent">
                <ul class="navItems">
                    <li class="navItem hideablenavItem">
                        <button class="loginHeaderButton loginTrigger" id="upload">
                            <span>Upload</span>
                        </button>
                    </li>
                    <li class="navItem hideablenavItem">
                        <a href="#">
                            <button class="loginHeaderButton loginTrigger">
                                <span>Accounts</span>
                            </button>
                        </a>
                    </li>
                    <li class="navItem hideablenavItem">
                        <a  href="admin.php?logout="<?= $id?>>
                            <button class="signupHeaderButton signupTrigger">
                                <span>Logout</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>          
        </div> 
        <div class="grid">
            <?php 
                $query = mysqli_query($conn, "SELECT * FROM upload ORDER BY date DESC");
                while($row = mysqli_fetch_assoc($query)) { 
                    $uploadID = $row['id'];
            ?>        
                <div class="gridWrapper">
                    <img src="../uploads/<?=$row['image'];?>">
                    <div class="overlay">
                        <a href="admin.php?delete=<?=$uploadID?>">Delete</a>
                        <a href="../homepage/info.php?id=<?= $uploadID;?>">Read More</a>
                    </div>            
                </div>
            <?php } ?>
        </div>
        <div class="modal">
            <div class="modal-box">
                <form method="post" action="../php/upload.php" enctype="multipart/form-data" class="upload-form">
                    <input type="file" name="image" required>
                    <input type="text" name="title" placeholder="Title of the place" required>
                    <input type="text" name="description" placeholder="describe the place">
                    <div class="btn-box">
                        <button type="submit" class="cancel" name="cancel">Cancel</button>
                        <button type="submit" class="btns" name="upload">Upload</button>
                    </div>
                </form>
            </div>
        </div>
</body>
<script src="../js/modal.js"></script>
</html>