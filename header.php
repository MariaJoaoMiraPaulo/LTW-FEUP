<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,700,400' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script> <!-- Resource jQuery -->
    <script src="js/user.js"></script>
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
    <div class="header">
            <div class="header-left-icon">
                <img class="logo" src="assets/logo4.png">
            </div>
        <div class="header-right">
            <div class="header-login">
        <?php
        if(isset($_SESSION['login-user'])){
            echo '<button class="login-button" type="button">Logado!</button>';
        }
        else{
            echo '<button class="login-button" type="button">Iniciar Sessão!</button>';
        }
        ?>
         </div>
        </div>
        <form action="db/register.php" method="post">
            Username:<br>
            <input type="email" name="username"><br>
            Password:<br>
            <input type="password" name="password"><br>
            Fullname:<br>
            <input type="text" name="fullname"><br>
            Type:<br>
            <input type="radio" name="type" value="Owner"> Owner
            <input type="radio" name="type" value="Reviewer"> Reviewer
            <input type="submit" value="Submit">
        </form>

        <form action="db/login.php" method="post">
            Login:<br>
            <input type="email" name="username"><br>
            Password:<br>
            <input type="password" name="password"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</head>







