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

            <button class="login-button" id="btnCreateAccount" onclick="visibleLogin()">Entrar</button>
                <button class="createAccount-button" id="btnCreateAccount" onclick="visibleCreateAcc()">Criar Conta</button>

            </div>
        </div>

        <div id="login-form" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <h1>Iniciar Sessão</h1>
                <form action="db/login.php" method="post"> 
                    <input type="email" name="username" placeholder="UserName">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" value="Submit"> 
                </form>
                <span class="close" onclick="exitLogin()">x</span>
            </div>
        </div>

        <div id="createAcc-form" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <h1>Criar Conta</h1>
                <form action="db/register.php" method="post"> 
                    <input type="email" name="username" placeholder="UserName">
                    <input type="password" name="password" placeholder="Password">
                    <input type="text" name="fullname" placeholder="Nome Completo">
                    <input type="radio" name="type" value="Owner"> Owner 
                    <input type="radio" name="type" value="Reviewer"> Reviewer 
                    <input type="submit" value="Submit">
                     </form>
                <span class="close" onclick="exitCreateAcc()">x</span>
            </div>
        </div>



    </div>
</head>







