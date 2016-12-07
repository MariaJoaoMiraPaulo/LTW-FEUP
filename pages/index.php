<?php
session_start();
include_once "../dbActions/user.php";
include_once "header.php";
?>
<!DOCTYPE html>
<body>
<section class="cd-intro video">
    <div class="cd-intro-content video">
        <h1 class="svg-wrapper">
          <!--  <svg class="svg-mask" x="0px" y="0px" width="4000px" height="3000px" viewBox="0 0 4000 3000">
                <title>El Capitáno Ristorante</title>
                <path
                        d="M1836.9,1488h-2.9v24h2.1c3.5,0,6.1-1,7.7-3.1s2.5-5.2,2.5-9.4c0-3.9-0.8-6.8-2.3-8.7   C1842.5,1488.9,1840.1,1488,1836.9,1488z"
                        id="path2"
                        fill="#FFFFFF" /><path
                        d="M 0,0 V 3000 H 4000 V 0 Z"
                        id="path4"
                        inkscape:connector-curvature="0"
                        style="fill:#ffffff"
                        sodipodi:nodetypes="ccccc" /><path
                        d="M1942.3,1487.4c-5.8,0-8.7,4.2-8.7,12.5c0,8.3,2.9,12.4,8.6,12.4c2.9,0,5.1-1,6.5-3c1.4-2,2.1-5.1,2.1-9.4   c0-4.3-0.7-7.4-2.2-9.5C1947.3,1488.5,1945.1,1487.4,1942.3,1487.4z"
                        id="path6"
                        fill="#FFFFFF" />
            </svg> <!-- .svg-mask -->

        <!--    <svg class="svg-mask-mobile" x="0px" y="0px" width="2000px" height="3000px" viewBox="0 0 2000 3000">
                <title>El Capitáno Ristorante</title>
                <path
                        fill="#FFFFFF"
                        d="M1082,1445c-5.8,0-8.7,4.2-8.7,12.5s2.9,12.4,8.6,12.4c2.9,0,5.1-1,6.5-3s2.1-5.1,2.1-9.4s-0.7-7.4-2.2-9.5  C1087,1446,1084.9,1445,1082,1445z"
                        id="path2" /><path
                        d="M 0,0 V 3000 H 2000 V 0 Z"
                        id="path4"
                        inkscape:connector-curvature="0"
                        style="fill:#ffffff"
                        sodipodi:nodetypes="ccccc" /><path
                        fill="#FFFFFF"
                        d="M993.2,1466.4c1.6-2,2.5-5.2,2.5-9.4c0-3.9-0.8-6.8-2.3-8.7c-1.6-1.9-3.9-2.8-7.1-2.8h-3.4v24h2.6  C989,1469.5,991.6,1468.5,993.2,1466.4z"
                        id="path6" />
            </svg> <!-- .svg-mask-mobile -->
        </h1>

        <p id="pomodoro">Pomodoro</p>

        <form method="post" action="searchRestaurants.php" class="action-wrapper">
            <input class="select-location" type="text" name="search" placeholder="Location">
            <input class="search-bar" type="text" name="restaurant" placeholder="Search for restaurants or cuisines...">
            <input class="button" type="submit" name="submit" value="Search">
        </form>

        <div class="cd-bg-video-wrapper" data-video="../assets/video">
            <!-- video element will be loaded using jQuery -->
        </div>
    </div>
</section>
<section class="quick-servicesItems">
    <div class="quick-services">
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/category_8.png?output-format=webp">
            <div>Breakfast</div>
        </a>
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/category_9.png?output-format=webp">
            <div>Lunch</div>
        </a>
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/category_10.png?output-format=webp">
            <div>Dinner</div>
        </a>
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/category_1.png?output-format=webp">
            <div>Home delivery</div>
        </a>
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/category_3.png?output-format=webp">
            <div>Have a drink</div>
        </a>
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/category_6.png?output-format=webp">
            <div>Coffees and Pastries</div>
        </a>
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/category_5.png?output-format=webp">
            <div>Take away</div>
        </a>
        <a href="">
            <img src="https://b.zmtcdn.com/images/search_tokens/app_icons/special_23.png?output-format=webp">
            <div>Luxury Meals</div>
        </a>
    </div>
</section>
</body>

<?php
include_once "footer.php";
?>
