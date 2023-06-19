<!DOCTYPE html>
<html>
    <head>
        <title>Log in form</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div id="header">
            <h1 id="logo">Partico</h1>
            <nav>
                <ul class="menu">
                    <li id="Gallery"><a href="../index.html">Back</a></li>
                </ul>
            </nav>
        </div>
        <div id="loginForm">
            <form action="../php/verify.php" method="POST">
                <h1 class="login">Log in Form</h1>
                <?php if(isset($_GET['error'])) { ?>
                    <div class="error">
                        <strong><?= $_GET['error']?></strong>
                    </div>
                <?php } ?>
                <div class="input-box">
                    <label>Username:</label>
                    <input type="text" placeholder="Enter your username" name="username">
                </div>
                <div class="input-box">
                    <label>Password:</label>
                    <input type="password" placeholder="Enter your password" name="password">
                </div>
                <label>Don't have an account yet? <a href="register.php">sign up</a></label>
                <button type="submit" name="login">Log in</button>
            </form>
        </div>

    </body>
</html>