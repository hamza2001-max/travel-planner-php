<?php
require_once './includes/database.php';
$form_success = "";
$form_error = "";

if (isset($_POST["admin"])) {
    $fullName = htmlspecialchars(trim($_POST["fullName"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    if (!empty($fullName) || !empty($password)) {
        $sql_query = "SELECT * FROM admin WHERE admin_name = ? AND admin_password = ?";
        if ($stmt = mysqli_prepare($connection, $sql_query)) {
            mysqli_stmt_bind_param($stmt, "ss", $fullName, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows == 1) {
                $_SESSION['admin'] = 'admin';
                header("Location: http://localhost/travelPlanner/index.php");
            } else {
                $form_error = "user was not found";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $form_error = "fill up the required inputs.";
    }
}
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
    <section class="accountWrapper">
        <section class="accountContainer">
            <div class="imageContainer">
                <img src="./staticModels/landingImage.jpg" alt="">
                <div class="blur">
                    <h2>
                        <i class="fa-sharp fa-solid fa-play"></i>Plan and book your trips with ease
                        <span style="color:black;"> with travelPlanner.</span>
                    </h2>
                    <p>Access the site.</p>
                </div>
            </div>
            <section class="formContainer">
                <form action="" method="post">
                    <div class="accountText">
                        <h2>Welcome Admin.</h2>
                        <h2>Login to continue.</h2>
                        <p>Login as a <a href="/travelPlanner/login.php" style="
                        font-weight: 500; 
                        color:black;
                        text-decoration: underline; ">User.</a></p>
                    </div>
                    <div class="accountInput">
                        <?= $form_error ?>
                        <?= $form_success ?>
                        <div>
                            <label for="fullName">Full Name</label>
                            <input type="text" name="fullName" id="userName" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                    </div>
                    <button class="accountBtn" name="admin">Login</button>
                </form>
            </section>
        </section>
    </section>
</body>

</html>