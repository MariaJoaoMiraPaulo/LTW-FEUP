<?php
session_start();
$title = "Welcome";      // Set the title
include_once "header.php";
include_once "../dbActions/user.php";
?>

    <h1>Edit Profile</h1>

    <?php
    $username = $_SESSION['login-user'];
    $fullName =  getUserInfoByUserName($username,'fullName');
    ?>

    <body>
    <div id="container">
        <div id="left">
            <img class="img-item" src="../assets/profile-icon.png"><br>

            <form action="uploadUserPhoto.php" method="post" enctype="multipart/form-data">

                <input type="file" name="fileToUpload" id="fileToUpload" value="Select image to upload:">
                <input type="submit" value="Upload Image" name="submit">
            </form>


        </div>
        <div id="right">
            <form action="../dbActions/editProfile.php" method="post">
                Full Name:<br>
                <input type="text" name="fullName" placeholder="<?php echo $fullName?>"><br>
                UserName:<br>
                <input type="text" name="userName" placeholder="<?php echo $username?>"><br>
             <!--   Date:<br>
                <input type="date" name="birtdDate" placeholder=""><br>-->
                <input type="submit" value="Save Changes">
            </form>
            <button class="button-item" type="button" onclick="location.href='index.php';">Exit</button>
        </div>
        <div class="clear"></div>
    </div>
    </body>

    <?php echo $id?>


<?php
include "footer.php";
?>