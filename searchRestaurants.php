
<?php
$title = "Welcome";
include_once "db/config.php";
include "header.php";
?>
<!DOCTYPE html>


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
            <li class="mix color-1 check1 radio2 option3"><img src="assets/img-1.jpg" alt="Image 1"></li>
            <li class="mix color-2 check2 radio2 option2"><img src="assets/img-2.jpg" alt="Image 2"></li>
            <li class="mix color-1 check1 radio2 option3"><img src="assets/img-1.jpg" alt="Image 1"></li>
            <li class="mix color-2 check2 radio2 option2"><img src="assets/img-2.jpg" alt="Image 2"></li>
            <li class="mix color-2 check2 radio2 option2"><img src="assets/img-2.jpg" alt="Image 2"></li>
            <li><!-- ... --></li>
            <li class="gap"></li>
        </ul>
        <div class="cd-fail-message">No results found</div>
    </section> <!-- cd-gallery -->

    <div class="cd-filter">
       <form>
            <div class="cd-filter-block">
                <h4>Search</h4>

                <div class="cd-filter-content">
                    <input type="search" placeholder="Name of the restaurant">
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            <div class="cd-filter-block">
                <h4>Tipo</h4>

                <ul class="cd-filter-content cd-filters list">
                    <li>
                        <input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
                        <label class="checkbox-label" for="checkbox1">Vegetariano</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
                        <label class="checkbox-label" for="checkbox2">Italiano</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
                        <label class="checkbox-label" for="checkbox3">Brasileirão</label>
                    </li>
                </ul> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            <div class="cd-filter-block">
                <h4>Select</h4>

                <div class="cd-filter-content">
                    <div class="cd-select cd-filters">
                        <select class="filter" name="selectThis" id="selectThis">
                            <option value="">Choose an option</option>
                            <option value=".option1">Option 1</option>
                            <option value=".option2">Option 2</option>
                            <option value=".option3">Option 3</option>
                            <option value=".option4">Option 4</option>
                        </select>
                    </div> <!-- cd-select -->
                </div> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

            <div class="cd-filter-block">
                <h4>Refeição</h4>

                <ul class="cd-filter-content cd-filters list">
                    <li>
                        <input class="filter" data-filter="" type="radio" name="radioButton" id="radio1"            >
                        <label class="radio-label" for="radio1">Jantar</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
                        <label class="radio-label" for="radio2">Lanche</label>
                    </li>

                    <li>
                        <input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
                        <label class="radio-label" for="radio3">Almoço</label>
                    </li>
                    <li>
                        <input class="filter" data-filter=".radio4" type="radio" name="radioButton" id="radio4">
                        <label class="radio-label" for="radio4">Pequeno-Almoço</label>
                    </li>
                </ul> <!-- cd-filter-content -->
            </div> <!-- cd-filter-block -->

       </form>

    </div> <!-- cd-filter -->

    <a href="#0" class="cd-filter-trigger">Filters</a>
</main> <!-- cd-main-content -->

<?php
include "footer.php";
?>