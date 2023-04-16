<?php
require './nav.php';
require_once './includes/database.php';
$user = $_SESSION['user'];
$target_dir = "./staticModels/";
if (isset($_SESSION['user'])) {
    if (isset($_POST['delete'])) {
        $book_id = $_POST['book_id'];
        $sql_query4 = "DELETE FROM bookedDestination WHERE book_id = ?";
        $stmt = mysqli_prepare($connection, $sql_query4);
        mysqli_stmt_bind_param($stmt, "i", $book_id);
        mysqli_stmt_execute($stmt);
        header('Location: http://localhost/travelPlanner/bookedDestinations.php');
        exit;
    }
    $user_id = $_SESSION['user']['user_id'];
    $sql_query1 = "SELECT * FROM bookedDestination WHERE user_id";
    $sql_query2 = "SELECT * FROM bookedDestination NATURAL JOIN destination WHERE user_id = $user_id";
    $sql_query3 = "SELECT sum(dest_cost) FROM bookedDestination NATURAL JOIN destination WHERE user_id = $user_id";
    $result1 = mysqli_query($connection, $sql_query1);
    $result2 = mysqli_query($connection, $sql_query2);
    $result3 = mysqli_query($connection, $sql_query3);
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
        <?php
        if ($result3->num_rows > 0) {
            $row3 = mysqli_fetch_assoc($result3);
            if ($row3['sum(dest_cost)']) {
        ?>
                <h1 class="cost">Total Cost - $<?= $row3['sum(dest_cost)'] ?></h1>
            <?php } else {
            ?>
                <h1 class="cost">Total Cost - $0</h1>
        <?php }
        } ?>
    </div>
    <section class="allBookings">
        <?php
        if ($result2->num_rows > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $target_image = $target_dir . $row2['dest_image'];
        ?>
                <div class="booking">
                    <img src="<?= $target_image ?>" alt="<?= $row2['dest_image'] ?>">
                    <div class="bookingText">
                        <form method="post">
                            <input type="hidden" name="book_id" value="<?php echo $row2['book_id']; ?>">
                            <button name="delete" type="submit" class="unbook">Unbook</button>
                        </form>
                        <h1><?= $row2['dest_name'] ?></h1>
                        <p><?= $row2['dest_description'] ?></p>
                    </div>
                </div>
        <?php }
        } ?>
    </section>
</section>
<?php require_once './footer.php' ?>