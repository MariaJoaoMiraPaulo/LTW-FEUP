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
    $photoUser = getUserInfoByUserName($username,'photoId');
    $srcPhoto  = '../assets/'.$photoUser;
    ?>

    <body>
    <div id="container">
        <div id="left">
            <img class="img-item" src="<?php echo $srcPhoto ?>"><br>

            <form action="../dbActions/uploadUserPhoto.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload" value="Select image to upload:">
                <input type="submit" value="Upload Image" name="submit">
            </form>


        </div>
        <div id="right">
            <form class="editProfileForm" action="../dbActions/editProfile.php" method="post">
                <ul>
                    <li>
                        <label for="Name">Name</label>
                        <input type="text" name="name"  maxlength="100" placeholder="<?php echo $fullName?>"><br>
                        <span>Modify your full name here</span>
                    </li>
                    <li>
                        <label for="UserName">Username</label>
                        <input type="email" name="userName" maxlength="100" placeholder="<?php echo $username?>"><br>
                        <span>Modify your username email address</span>
                    </li>
                    <li>
                        <label for="bio">About You</label>
                        <textarea name="bio" onkeyup="adjust_textarea(this)"></textarea>
                        <span>Say something about yourself</span>
                    </li>
                    <li>
                        <input type="submit" value="Save Changes">
                        <button class="button-item" type="button" onclick="location.href='index.php';">Cancel</button>
                    </li>

                </ul>
            </form>

        </div>

        <div class="clear"></div>
    </div>

    </body>

    <?php echo $id?>


<?php
include "footer.php";
?>