<?php
require './nav.php';
require_once './includes/database.php';
$sql_query = "SELECT * FROM destination";
$target_dir = "./staticModels/";
$result = mysqli_query($connection, $sql_query);
if (isset($_SESSION['admin'])) {
    if (isset($_POST['delete'])) {
        $dest_name = $_POST['dest_name'];
        $sql_query1 = "DELETE FROM bookedDestination WHERE dest_name = ?";
        $stmt1 = mysqli_prepare($connection, $sql_query1);
        mysqli_stmt_bind_param($stmt1, "s", $dest_name);
        mysqli_stmt_execute($stmt1);
        $sql_query2 = "DELETE FROM landmark WHERE dest_name = ?";
        $stmt2 = mysqli_prepare($connection, $sql_query2);
        mysqli_stmt_bind_param($stmt2, "s", $dest_name);
        mysqli_stmt_execute($stmt2);
        $sql_query3 = "DELETE FROM destination WHERE dest_name = ?";
        $stmt3 = mysqli_prepare($connection, $sql_query3);
        mysqli_stmt_bind_param($stmt3, "s", $dest_name);
        mysqli_stmt_execute($stmt3);
        header('Location: http://localhost/travelPlanner/index.php');
        exit;
    }
}
?>

<section class="landingPage">
    <section>
        <img src="./staticModels/landing.jpg" class="heroImage" />
    </section>
    <section class="destinationSection" id="destinationItemID">
        <h1 class="destinationText">Popular Destinations<i class="fa-solid fa-plane-up fa-rotate-by" style="margin-left: 1rem; --fa-rotate-angle: 45deg;"></i></h1>
        <div id="destinationContainer">
            <?php
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $target_file = $row["dest_image"];
                    $target_image = $target_dir . $target_file;
            ?>
                    <div class="destinationItem" key=<?= $row["dest_name"] ?>>
                        <a href="/travelPlanner/destinationDetails.php?dest_name=<?= $row["dest_name"] ?>" style="color:black;">
                            <div style="position: relative; cursor: pointer;">
                                <div class="imageWrapper">
                                    <h3 class="imageWrapperText">Discover <?= $row["dest_name"] ?></h3>
                                </div>
                                <img src=<?php echo $target_image ?> alt=<?= $row["dest_name"] ?> class="destinationImage" />
                            </div>
                        </a>
                        <div class="destinationItemContainer">
                            <div class="destinationItemText">
                                <h3><?= $row["dest_name"] ?></h3>
                                <i class="fa-solid fa-location-dot" style="margin-left:0.6rem;"></i>
                            </div>
                            <?php if (isset($_SESSION['admin'])) {
                            ?>
                                <div class="dropdown">
                                    <button class="ellipsis" onclick="toggleDropDown('<?= $row['dest_name'] ?>')">&#8942;</button>
                                    <div class="dropdownContent" id="dropdownContent<?= $row['dest_name'] ?>">
                                        <form method="post">
                                            <input type="hidden" name="dest_name" value="<?= $row['dest_name'] ?>">
                                            <button name="delete" type="submit" style="border-bottom-left-radius: 0.4rem;
                                    border-bottom-right-radius: 0.4rem;">
                                                <i class="fa-solid fa-trash"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            <?php
                            } ?>
                        </div>
                    </div>
            <?php }
            }
            ?>
        </div>
    </section>
</section>
<script src="index.js" type="module"></script>
<?php require_once './footer.php' ?>