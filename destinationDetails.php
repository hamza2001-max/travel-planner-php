<?php
require_once './nav.php';
require_once './includes/database.php';
$dest_name = $_GET["dest_name"];
$target_dir = "./staticModels/";
$sql_query_landmark = "SELECT * FROM landmark WHERE dest_name = '$dest_name'";
$sql_query_destination = "SELECT * FROM destination WHERE dest_name = '$dest_name'";
$result_landmark = mysqli_query($connection, $sql_query_landmark);
$result_destination = mysqli_query($connection, $sql_query_destination);
$form_error = '';
$form_message = '';
if (isset($_SESSION['user'])) {
    if (isset($_POST['bookDestination'])) {
        $sql_query1 = "SELECT * FROM bookedDestination WHERE dest_name = ? AND user_id = ?";
        $stmt1 = mysqli_prepare($connection, $sql_query1);
        mysqli_stmt_bind_param($stmt1, "si", $dest_name, $_SESSION['user']['user_id']);
        mysqli_stmt_execute($stmt1);
        $result = mysqli_stmt_get_result($stmt1);
        if (mysqli_num_rows($result) > 0) {
            $form_message = "This destination has already been booked.";
        } else {
            $sql_query2 = "INSERT INTO bookedDestination (dest_name, user_id) values (?, ?)";
            $stmt2 = mysqli_prepare($connection, $sql_query2);
            mysqli_stmt_bind_param($stmt2, "si", $dest_name, $_SESSION['user']['user_id']);
            mysqli_stmt_execute($stmt2);
            header('Location: http://localhost/travelPlanner/destinationDetails.php?dest_name=' . $dest_name);
            exit;
        }
    }
} else {
    $form_error = "You need to login first";
}

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
                                <div class="landmarkDetailsText">
                                    <h3>Visit <?= $row_landmark['land_name'] ?></h3>
                                    <p><?= $row_landmark['land_description'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="rightSection">
                    <div class="viewButton">
                        <button id="overviewBtn">overview</button> / <button id="descriptionBtn">description</button>
                    </div>
                    <div class="textContainer overview">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                            <h1 style="margin-bottom: 1.5rem; text-transform: capitalize;">
                                <?= $row_destination['dest_name'] ?></h1>
                            <h1>$<?= $row_destination['dest_cost'] ?></h1>
                        </div>
                        <ul class="landmarkList">
                            <h3>Destinations To Visit</h3>
                            <?php
                            mysqli_data_seek($result_landmark, 0);
                            while ($row_landmark = mysqli_fetch_assoc($result_landmark)) {
                            ?>
                                <li>-<?= $row_landmark["land_name"] ?></li>
                            <?php } ?>
                        </ul>
                        <?php
                        if ($form_message) {
                        ?>
                            <p class="message"><?= $form_message ?></p>
                        <?php
                        }
                        ?>
                        <form method="post">
                            <button class="bookButton" name="bookDestination" type="submit">Book now</button>
                        </form>
                    </div>
                    <div class="textContainer description" style="display:none;">
                        <p><?= $row_destination['dest_description'] ?></p>
                    </div>
                </div>
                <?= $form_error ?>
            </div>
    <?php                    }
    } ?>
</div>
<script src="destinationDetails.js" type="module"></script>
<?php require_once './footer.php' ?>