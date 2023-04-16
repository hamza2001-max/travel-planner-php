<?php
require './nav.php';
require_once './includes/database.php';
$user = $_SESSION['user'];
$target_dir = "./staticModels/";
if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']['user_id'];
    $sql_query1 = "SELECT * from bookedDestination where user_id = $userId";
    $sql_query2 = "SELECT * from bookedDestination NATURAL JOIN destination";
    $result1 = mysqli_query($connection, $sql_query1);
    $result2 = mysqli_query($connection, $sql_query2);
}
?>
<section class="bookedDestinationWrapper">
    <div class="userDetailWrapper">
        <div class="userDetail">
            <?php if (!empty($user)) { ?>
                <h1 class="identfier"><?= $user['user_full_name'][0] ?></h1>
                <h1 class="username"><?= $user['user_full_name'] ?></h1>
            <?php } ?>
        </div>
    </div>
    <section class="allBookings">
        <?php
        if ($result2->num_rows > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $target_image = $target_dir . $row2['dest_image'];
        ?>
            <div class="booking">
                <img src="<?= $target_image?>" alt="<?= $row2['dest_image']?>">
                <div class="bookingText">
                    <h1><?= $row2['dest_name'] ?></h1>
                    <p><?= $row2['dest_description'] ?></p>
                </div>
            </div>
        <?php }
        } ?>
    </section>
</section>
<?php require_once './footer.php' ?>