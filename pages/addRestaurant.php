<?php
include "header.php";
?>


<form action="../dbActions/addRestaurant.php" method="post">
    <fieldset>
        <legend>Add Restaurant:</legend>
        <br>
        Enter Restaurant Name:<br>
        <input type="text" name="name" placeholder="Name"><br>
        Enter Restaurant Address:<br>
        <input type="text" name="address" placeholder="Address"><br><br>
        Enter Restaurant Location:<br>
        <input type="text" name="location" placeholder="Location"><br><br>
        WebSite:<br>
        <input type="url" name="website" placeholder="Location"><br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>


<?php
include "footer.php";
?>

