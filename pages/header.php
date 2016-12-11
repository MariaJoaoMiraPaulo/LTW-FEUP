<?php
include_once "../dbActions/user.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,700,400' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script> <!-- Resource jQuery -->
    <script src="https://use.fontawesome.com/0b68c59fc5.js"></script>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Resource style -->
    <div class="header">
        <div class="header-left-icon">
            <img class="logo" src="../assets/logo4.png" onclick="location.href='index.php'">
        </div>

        <div class="header-right">
            <div class="header-error">
                <?php
                if (isset($_SESSION["ERROR"]))
                    echo $_SESSION["ERROR"];
                ?>
            </div>
            <div class="header-login">
                <?php
                if (isset($_SESSION['login-user'])) {
                    $fullname = getUserInfoByUserName($_SESSION['login-user'], 'fullName');
                    echo '<button class="login-button" onclick="location.href=\'profile.php\'" type="button">' . $fullname . '</button>';
                    echo '<a class="createAccount-button" href="../dbActions/logout.php">Logout</a>';
                } else {
                    echo '<button class="login-button" id="btnCreateAccount" onclick="visibleLogin()">Sign In</button>';
                    echo ' <button class="createAccount-button" id="btnCreateAccount" onclick="visibleCreateAcc()">Sign Up</button>';
                }
                ?>

            </div>
        </div>

        <div id="login-form" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <h1>Sign In</h1>
                <form action="../dbActions/login.php" method="post"> 
                    <input type="email" name="username" placeholder="UserName">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Login"> 
                    <span class="errorMsg" id="validation"><?php echo $message; ?></span>
                </form>
                <span class="close" onclick="exitLogin()">x</span>
            </div>
            ?>
        </div>

        <div id="createAcc-form" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <h1>Sign Up</h1>
                <form action="../dbActions/register.php" method="post"> 
                    <input type="email" name="username" placeholder="UserName">
                    <input type="text" name="fullname" placeholder="Full Name">
                    <div id="gender">
                        <input type="radio" name="gender" value="Male"> Male 
                        <input type="radio" name="gender" value="Female"> Female 
                    </div>
                    <input type="password" name="password" placeholder="Password">
                    <input type="date" name="birthDate">
                    <div id="type">
                        <input type="radio" name="type" value="Owner"> Owner 
                        <input type="radio" name="type" value="Reviewer"> Reviewer 
                    </div>
                    <input type="submit" value="Sign Up">
                     
                </form>
                <span class="close" onclick="exitCreateAcc()">x</span>
            </div>
        </div>

    </div>
</head>