<?php
require_once './nav.php';
require_once './includes/database.php';
$dest_name = $_GET["dest_name"];
$target_dir = "./staticModels/";
$sql_query_landmark = "SELECT * FROM landmark WHERE dest_name = '$dest_name'";
$sql_query_destination = "SELECT * FROM destination WHERE dest_name = '$dest_name'";
$result_landmark = mysqli_query($connection, $sql_query_landmark);
$result_destination = mysqli_query($connection, $sql_query_destination);
?>

<div id="destinationDetails">
    <?php
    if ($result_landmark->num_rows > 0 && $result_destination->num_rows > 0) {
        while ($row_destination = mysqli_fetch_assoc($result_destination)) {
            $destination_target_image = $target_dir . $row_destination["dest_image"];
    ?>
            <div class="destinationDetailsContainer">
                <div class="imageContainer">
                    <img src="<?= $destination_target_image ?>" alt=<?= $row_destination['dest_name'] ?> class="largeImage" />
                    <?php
                    while ($row_landmark = mysqli_fetch_assoc($result_landmark)) {
                        $landmark_target_image = $target_dir . $row_landmark["land_image"];
                    ?>
                        <div>
                            <img src="<?= $landmark_target_image ?>" class="smallImage" onclick="toggleDetail(<?= $row_landmark['land_id'] ?>)" />
                            <div class="landmarkDetails" id="destinationDetail<?= $row_landmark["land_id"] ?>">
                                <img src="<?= $landmark_target_image ?>" />
                                <i class="fa-solid fa-xmark" onclick="toggleDetail(<?= $row_landmark['land_id'] ?>)"></i>
                                <div>
                                    <div>
                                        <h3>Visit</h3>
                                        <h3><?= $row_landmark['land_name'] ?></h3>
                                    </div>
                                    <p><?= $row_landmark['land_description'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="rightSection">
                    <div class="viewButton">
                        <button id="overviewBtn">Overview</button> / <button id="descriptionBtn">Description</button>
                    </div>
                    <div class="textContainer overview">
                        <h1 style="margin-bottom: 1.5rem"><?= $row_destination['dest_name'] ?></h1>
                        <h1>$<?= $row_destination['dest_cost'] ?></h1>
                        <ul class="landmarkList">
                            <?php
                            mysqli_data_seek($result_landmark, 0);
                            while ($row_landmark = mysqli_fetch_assoc($result_landmark)) {
                            ?>
                                <li><?= $row_landmark["land_name"] ?></li>
                            <?php } ?>
                        </ul>
                        <button class="bookButton">Book now</button>
                    </div>
                    <div class="textContainer description" style="display:none;">
                        <p><?= $row_destination['dest_description'] ?></p>
                    </div>
                </div>
            </div>
    <?php                    }
    } ?>
</div>
<script src="destinationDetails.js" type="module"></script>
<?php require_once './footer.php' ?>