<?php
require './nav.php';
require_once './includes/database.php';
$sql_query = "SELECT * FROM destination";
$target_dir = "./staticModels/";
$result = mysqli_query($connection, $sql_query);
?>

<section class="landingPage">
    <section>
        <img src="./staticModels/plane.jpg" class="heroImage" />
    </section>
    <section class="destinationSection" id="destinationItemID">
        <!-- <div> its existence pushes ,destinationText to left -->
            <h1 class="destinationText">Popular Destinations<i class="fa-solid fa-plane-up fa-rotate-by" style="margin-left: 1rem; --fa-rotate-angle: 45deg;"></i></h1>
            <div id="destinationContainer">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $target_file = $row["dest_image"];
                        $target_image = $target_dir . $target_file;
                ?>
                        <a href="/travelPlanner/destinationDetails.php?dest_name=<?= $row["dest_name"] ?>" style="color:black;">
                            <div class="destinationItem" key=<?= $row["dest_name"] ?>>
                                <div style="position: relative;">
                                    <div class="imageWrapper">
                                        <h3 class="imageWrapperText">Discover <?= $row["dest_name"] ?></h3>
                                    </div>
                                    <img src=<?php echo $target_image ?> alt=<?= $row["dest_name"] ?> class="destinationImage" />
                                </div>
                                <h3 class="destinationItemText">
                                    <?= $row["dest_name"] ?> <i class="fa-solid fa-location-dot" style="margin-left:0.6rem;"></i>
                                </h3>
                            </div>
                        </a>
                <?php }
                }
                ?>
            </div>
        <!-- </div> -->
    </section>
</section>

<?php require_once './footer.php' ?>