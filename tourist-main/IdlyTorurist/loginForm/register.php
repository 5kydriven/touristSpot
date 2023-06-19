<!DOCTYPE html>
<html>
    <head>
        <title>Registration form</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div id="header">
            <h1 id="logo">Picture Gallery</h1>
            <nav>
                <ul class="menu">
                    <li id="home"><a href="../index.html">Back</a></li>           
                </ul>
            </nav>
        </div>
        <div id="registerForm">
            <form action="../php/signup.php" method="POST">
                <h1 class="register">Registration Form</h1>
                <?php if(isset($_GET['error'])) { ?>
                    <div class="error">
                        <strong><?= $_GET['error']?></strong>
                    </div>
                <?php } ?>
                <div class="input-box">
                    <label>Name:</label>
                    <input type="text" placeholder="Enter your name" name=" name">
                </div>
                <div class="input-box">
                    <label>Username:</label>
                    <input type="text" placeholder="Enter your username" name="username">
                </div>
                <div class="input-box">   
                    <label>Password</label>
                    <input type="password" placeholder="Enter your password" name="password">
                </div>
                <label>I have an account<a href="login.html">Login</a></label>
                <button type="submit" name="register">Register</button>
            </form>
            
        </div>
    </body>
</html>