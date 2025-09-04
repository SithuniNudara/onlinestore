<?php


include "connection.php";

$pageno = 0;
$page = $_POST["pg"];

$color = $_POST["co"];
$cat = $_POST["cat"];
$brand = $_POST["b"];
$size = $_POST["s"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

$status = 0; //Not condition

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` 
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `brand` ON `brand`.`brand_id` = `product`.`brand_id`
INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`";


//Search By Color
if ($status == 0 && $color != 0) {
    //1st time search by color (WHERE)
    $q .= " WHERE `color`.`color_id` = '".$color."' ";
    $status = 1;
} elseif ($status != 0 && $color != 0) {
    //2nd time search by color (AND)
    $q .= " AND `color`.`color_id` = '" . $color . "' ";
}


//Search By Category
if ($status == 0 && $cat != 0) {
    $q .= "WHERE `category`.`cat_id` = '" . $cat . "' ";
    $status = 1;
} elseif ($status != 0 && $cat != 0) {
    $q .= "AND `category`.`cat_id` = '" . $cat . "' ";
}


//Search By Brand

if ($status == 0 && $brand != 0) {
    $q .= "WHERE `brand`.`brand_id` = '" . $brand . "' ";
    $status = 1;
} elseif ($status != 0 && $brand != 0) {
    $q .= "AND `brand`.`brand_id` = '" . $brand . "' ";
}

//Search By Size

if ($status == 0 && $size != 0) {
    $q .= "WHERE `size`.`size_id` = '" . $size . "' ";
    $status = 1;
} elseif ($status != 0 && $size != 0) {
    $q .= "AND `size`.`size_id` = '" . $size . "' ";
}

//Search By Min Price

if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

//Search By Max Price

if (empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= "AND `stock`.`price` <= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

//Search By Price Range
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } elseif ($status != 0) {
        $q .= "AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}

$rs = DataBase::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = DataBase::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    //Search No Results
    ?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any Matches for your Search Term</p>
    </div>

    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $data = $rs2->fetch_assoc();
        ?>
        <!-- Card -->
        <div class="col-lg-3 col-12 mt-5 d-flex justify-content-center">
            <div class="card" style="width: 300px;">
            <a href="singleProductView.php?s=<?php echo ($data["stock_id"]); ?>">
               <img src="<?php echo ($data["path"]); ?>" class="card-img-top" />
               </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo ($data["name"]); ?></h5>
                    <p class="card-text">
                        <?php echo ($data["description"]); ?>
                    </p>
                    <p>Rs : <?php echo ($data["price"]); ?></p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-success col-6">Buy Now</button>
                        <button class="btn btn-outline-warning col-6 ms-2">Add To Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->

        <?php
    }
    ?>
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php

                if ($pageno <= 1) {
                    echo ("#");
                } else {
                    ?>
                            onclick="advancedSearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                }

                ?> href="#">Previous</a></li>


                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {

                    if ($y == $pageno) {
                        ?>

                        <li class="page-item active">
                            <a class="page-link" onclick="advancedSearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>

                        <?php
                    } else {
                        ?>

                        <li class="page-item">
                            <a class="page-link" onclick="advancedSearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>

                        <?php
                    }

                }

                ?>

                <li class="page-item"><a class="page-link" <?php

                if ($pageno >= $num_of_pages) {
                    echo ("#");
                } else {
                    ?>
                            onclick="SearchProduct(<?php echo ($pageno + 1) ?>);" <?php
                }

                ?> href="#">Next</a></li>
            </ul>
        </nav>
    </div>
    <!-- Pagination -->

    <?php
}


?>