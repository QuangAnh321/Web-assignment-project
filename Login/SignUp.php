<?php require_once("../Database/config.php");
        require_once("../Core/LoginandRegister.php");
?>
<html>
<header>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="../Asset/css/Au.css">
</header>
<body>
    <div class="signup">
        <h2>
            Sign Up
        </h2>
        <h5>Welcome to Sign Up page</h5>
        <?php include('../Core/Errors.php'); ?>
        <form method="post" action="SignUp.php">

            Email:<br>
            <input type="email" name="email" placeholder="Please enter your email" >

            Password: <br>
            <input type="password" name="password_1" placeholder="Enter your password" ><br>

            Password (re-enter):<br>
            <input type="password" name="password_2" placeholder="Enter your password again"><br>

            Username:<br>
            <input type="text" name="username" placeholder="Enter your username"><br>

            <input type="submit" name="reg_user" value="Sign Up">

            <p><a href="SignIn.php" style="background: white">Sign in</a><br></p>
            <p><a href="../index.php" style="background: white">Homepage</a><br></p>
        </form>
    </div>

</body>
</html>

