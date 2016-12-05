
<?php
$title = "Welcome";      // Set the title
include "header.php";
?>
<!DOCTYPE html>


<header class="cd-header">
    <h1>Content Filter</h1>
</header>

<main class="cd-main-content">
    <div class="cd-tab-filter-wrapper">
        <div class="cd-tab-filter">
            <ul class="cd-filters">
                <li class="placeholder">
                    <a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
                </li>
                <li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
                <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Color 1</a></li>
                <li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Color 2</a></li>
            </ul> <!-- cd-filters -->
        </div> <!-- cd-tab-filter -->
    </div> <!-- cd-tab-filter-wrapper -->

    <section class="cd-gallery">
        <ul>
            <li class="mix color-1 check1 radio2 option3"><img src="assets/logotipo.png" alt="Image 1"></li>
            <li class="mix color-2 check2 radio2 option2"><img src="assets/bg-img.jpg" alt="Image 2"></li>
            <li><!-- ... --></li>
            <li class="gap"></li>
        </ul>
        <div class="cd-fail-message">No results found</div>
    </section> <!-- cd-gallery -->

    <div class="cd-filter">
        <form>
            <div class="cd-filter-block">
                <h4>Block title</h4>

                <div class="cd-filter-content">
                    <!-- filter content -->
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->
        </form>

        <a href="#0" class="cd-close">Close</a>
    </div> <!-- cd-filter -->

    <a href="#0" class="cd-filter-trigger">Filters</a>
</main> <!-- cd-main-content -->

<?php
include "footer.php";
?>