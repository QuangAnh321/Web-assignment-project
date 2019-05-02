<?php require_once("../Database/config.php");
        require_once("../Core/LoginandRegister.php");
?>
<html>
<header>
    <title>Sign In Page</title>
    <link rel="stylesheet" href="../Asset/css/Au.css">
</header>
<body>

    <div class="signin">
        <h2>Sign In</h2>
        <h5>Please enter your email and password</h5>
        <?php include('../Core/Errors.php'); ?>
        <form method="post" action="SignIn.php">
            Email: <br>
            <input type="email" name="email" placeholder="Enter your email" required><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter your password" required><br>

            <input type="submit" name="login_user" value="Sign In">
        </form>

        <p><a href="SignUp.php">Sign Up</a><br></p>
        <p><a href="#">Forgot username or password</a></p>
    </div>
</body>
</html>
