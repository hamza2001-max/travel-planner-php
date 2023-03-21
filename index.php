<?php
require_once './includes/nav.php';
require_once './includes/database.php';
$sql_query = "SELECT * FROM destination";
$target_dir = "./staticModels/";
$result = mysqli_query($connection, $sql_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/f34a5d3160.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <section class="landingPage">
        <section>
            <img src="./staticModels/landingImage.jpg" class="heroImage" />
        </section>
        <section class="destinationSection" id="destinationItemID">
            <div>
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
            </div>
        </section>
    </section>
</body>
</html>
<?php require_once './includes/footer.php'?>
