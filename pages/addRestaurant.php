<?php
include "header.php";
?>


<form class = "addRestaurantForm" action="../dbActions/addRestaurant.php" method="post">
    <ul>
        <li>
            <label for="Name">Name</label>
            <input type="text" name="name"  maxlength="100" placeholder="Restaurant Name"><br>
            <span> Enter Restaurant Name here</span>
        </li>
        <li>
            <label for="Address">Address</label>
            <input type="text" name="address" maxlength="100" placeholder="Address"><br>
            <span>Enter Restaurant Address here</span>
        </li>
        <li>
            <label for="date">Location</label>
            <input placeholder="Location" name="location" class="form-control" type="text"><br>
            <span>Enter Restaurant Location here</span>
        </li>
        <li>
            <label for="date">WebSite</label>
            <input placeholder="WebSite" name="website" class="form-control" type="url"><br>
            <span>Enter Restaurant WebSite here</span>
        </li>
        <li>
            <label for="services">Services</label>
            <input type="checkbox" name="services[]" value="Breakfast">Breakfast<br>
            <input type="checkbox" name="services[]" value="Lunch">Lunch<br>
            <input type="checkbox" name="services[]" value="Dinner">Dinner<br>
            <input type="checkbox" name="services[]" value="Home Delivery">Home Delivery<br>
            <input type="checkbox" name="services[]" value="Home and Drink">Have a Drink<br>
            <input type="checkbox" name="services[]" value="Coffees and Pastries">Coffees and Pastries<br>
            <input type="checkbox" name="services[]" value="Take Away">Take Away<br>
            <input type="checkbox" name="services[]" value="Luxury Meals">Luxury Meals<br>
            <span>Choose Restaurant Services here</span>
        </li>
        <li>
            <label for="category">Cuisines</label>
            <input type="checkbox" name="categories[]" value="Sushi">Sushi<br>
            <input type="checkbox" name="categories[]" value="Portuguese">Portuguese<br>
            <input type="checkbox" name="categories[]" value="Tapas">Tapas<br>
            <input type="checkbox" name="categories[]" value="Pizza">Pizza<br>
            <input type="checkbox" name="categories[]" value="Ice Cream">Ice Cream<br>
            <input type="checkbox" name="categories[]" value="Desserts">Desserts<br>
            <input type="checkbox" name="categories[]" value="Coffee and Tea">Coffee and Tea<br>
            <input type="checkbox" name="categories[]" value="Chinese">Chinese<br>
            <span>Choose Restaurant cuisines here</span>
        </li>
        <li>
            <label for="openHours">Open Hours</label>
            <input name="openHour" class="form-control" type="time"><br>
            to
            <input name="closeHour" class="form-control" type="time"><br>
            <span>Select Open Hours here</span>
        </li>
        <li>
            <label for="openHours">Open Hours</label>
            <input placeholder="€/ two people" name="price" class="form-control" type="text"><br>
            <span>Enter price for two people Here</span>
        </li>

        <li>
            <input type="submit" value="Save Changes">
            <button class="button-item" type="button" onclick="location.href='index.php';">Cancel</button>
        </li>
        </ul>
</form>


<?php
include "footer.php";
?>

