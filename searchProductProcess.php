<?php

session_start();

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];
//echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock`INNER JOIN `product` ON `stock`.`product_id`  = `product`.`id` WHERE `name` LIKE '%$product%'";
$rs = DataBase::search($q);
$num = $rs->num_rows;
//echo($num);
$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
//echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = DataBase::search($q2);
$num2 = $rs2->num_rows;
//echo($num2);

if ($num2 == 0) {
    //Search No Results
    ?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any Matches for your Search Term</p>
    </div>

    <?php
} else {
    //load Result

    for ($i=0; $i < $num2 ; $i++) { 
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
                            onclick="SearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                }

                ?> href="#">Previous</a></li>


                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {

                    if ($y == $pageno) {
                        ?>

                        <li class="page-item active">
                            <a class="page-link" onclick="SearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>

                        <?php
                    } else {
                        ?>

                        <li class="page-item">
                            <a class="page-link" onclick="SearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
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