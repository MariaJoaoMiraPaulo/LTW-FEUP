<?php
session_start();
session_regenerate_id(true);
include_once "dbActions/user.php";
include_once "header.php";
?>
<!DOCTYPE html>
<body>
<title>Pomodoro</title>
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

        <section class="cd-intro">
            <h1 id="xtype" class="cd-headline letters type">
                <span>My favourite food is</span>
                <span class="cd-words-wrapper waiting">
				<b class="is-visible">pizza</b>
				<b>sushi</b>
				<b>steak</b>
			</span>
            </h1>
        </section> <!-- cd-intro -->

        <?php
        include "dbActions/searchBar.php";
        ?>


        <div class="cd-bg-video-wrapper" data-video="../assets/video">
            <!-- video element will be loaded using jQuery -->
        </div>
    </div>
</section>
<section class="quick-servicesItems">
    <div class="quick-services">
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/category_8.png'>
            <div>Breakfast</div>
        </a>
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/category_9.png'>
            <div>Lunch</div>
        </a>
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/category_10.png'>
            <div>Dinner</div>
        </a>
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/category_1.png'>
            <div>Home delivery</div>
        </a>
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/category_3.png'>
            <div>Have a drink</div>
        </a>
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/category_6.png'>
            <div>Coffees and Pastries</div>
        </a>
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/category_5.png'>
            <div>Take away</div>
        </a>
        <a onclick="location.href='searchRestaurants.php';">
            <img src='assets/special_23.png'>
            <div>Luxury Meals</div>
        </a>
    </div>
</section>
</body>

<?php
include_once "footer.php";
?>
