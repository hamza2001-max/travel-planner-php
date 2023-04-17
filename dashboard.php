<?php
require './nav.php';
require_once './includes/database.php';
if (!isset($_SESSION['admin'])) header("Location: http://localhost/travelPlanner/index.php");
$admin = $_SESSION['admin'];
$target_dir = "./staticModels/";
$sql_query1 = "SELECT * FROM bookedDestination NATURAL JOIN destination";
$result1 = mysqli_query($connection, $sql_query1);
?>
<section class="bookedDestinationWrapper admin">
    <div class="userDetailWrapper">
        <?php if (!empty($admin)) {
        ?>
            <div class="userDetail">
                <h1 class="identfier"><?= $admin[0] ?></h1>
                <h1 class="username"><?= $admin ?></h1>
            </div>
        <?php } ?>
    </div>
    <section class="allBookings admin">
        <?php
        if ($result1->num_rows > 0) {
            $prev_user_id = null;
            while ($row1 = mysqli_fetch_assoc($result1)) {
        ?>
                <section>
                    <?php
                    $target_image = $target_dir . $row1['dest_image'];
                    $user_id = $row1['user_id'];
                    if ($user_id != $prev_user_id) {
                        $sql_query2 = "SELECT * from users WHERE user_id = $user_id";
                        $result2 = mysqli_query($connection, $sql_query2);
                        if ($result2->num_rows > 0) {
                            $row2 = mysqli_fetch_assoc($result2); ?>
                            <div class="adminUserDetail">
                                <h1 class="identfier"><?= $row2['user_full_name'][0] ?></h1>
                                <h1 class="username"><?= $row2['user_full_name'] ?></h1>
                            </div>
                    <?php }
                        $prev_user_id = $user_id;
                    }
                    ?>
                    <div class="booking">
                        <img src="<?= $target_image ?>" alt="<?= $row1['dest_image'] ?>">
                        <div class="bookingText">
                            <h1><?= $row1['dest_name'] ?></h1>
                            <p><?= $row1['dest_description'] ?></p>
                        </div>
                    </div>
                </section>
        <?php
            }
        } ?>
    </section>
</section>
<?php require_once './footer.php' ?>