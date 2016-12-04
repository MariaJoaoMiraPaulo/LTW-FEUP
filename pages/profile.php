<?php
session_start();
$title = "Welcome";      // Set the title
include_once "header.php";
include_once "../dbActions/user.php";
?>

    <h1 id="editProfile">Edit Profile</h1>

    <?php
    $username = $_SESSION['login-user'];
    $fullName =  getUserInfoByUserName($username,'fullName');
    $photoUser = getUserInfoByUserName($username,'photoId');
    $srcPhoto  = '../assets/'.$photoUser;
    $date = getUserInfoByUserName($username,'birthDate');
    $gender = getUserInfoByUserName($username,'gender');
    $type = getUserInfoByUserName($username,'type');
    ?>

    <body>
    <div id="container">
        <div id="left">
            <img class="img-item" src="<?php echo $srcPhoto ?>"><br>

            <form class="uploadPhoto" action="../dbActions/uploadUserPhoto.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload" value="Select image to upload:">
                <input type="submit" value="Upload Image" name="submit">
            </form>


        </div>
        <div id="center">
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
                        <span>Modify your username here</span>
                    </li>
                    <li>
                        <label for="date">Date of Birth</label>
                        <input placeholder='<?php echo $date?>' name="birthdate" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date"><br>
                        <span>Modify your date of birth here</span>
                    </li>
                    <li>

                        <label for="gender">Gender</label>
                        <div class="genderProfile">
                        <?php
                        if(strtoupper($gender)=='MALE'){
                            echo '  <input type="radio" name="gender" checked="checked" value="Male"> Male ';
                            echo '<input type="radio" name="gender" value="Female"> Female ';
                        }
                        else{
                            echo '  <input type="radio" name="gender" value="Male"> Male ';
                            echo '<input type="radio" name="gender" checked="checked" value="Female"> Female ';
                        }
                        ?>
                        <br>
                        </div>
                        <span>Modify your gender here</span>

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

        <div id = "right">
            <?php
            if(strtoupper($type) == 'OWNER'){
                echo '<h1>My Restaurants</h1>';
                echo '<div class="ownerColumn">';
                echo 'Cannot find your Restaurant?'.'<br>'.'<br>';
                echo '<button id="button-add" class="button-item" type="button" onclick="location.href=\'userRestaurants.php\';">Add a Restaurant </button>';
                echo '</div>';
            }
            ?>
        </div>


        <div class="clear">
            <?php
            include "footer.php";
            ?>
        </div>
    </div>

    </body>

