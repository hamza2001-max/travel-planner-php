<?php
require_once './includes/database.php';
$form_error = "";
// print_r($_SESSION['user']);

if (isset($_POST["login"])) {
    $fullName = htmlspecialchars(trim($_POST["fullName"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    if (!empty($fullName) || !empty($password)) {
        $sql_query = "SELECT * FROM users WHERE user_full_name = ? AND user_password = ?";
        if ($stmt = mysqli_prepare($connection, $sql_query)) {
            mysqli_stmt_bind_param($stmt, "ss", $fullName, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows == 1) {
                $_SESSION['user'] = $result->fetch_assoc();
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
                <img src="./staticModels/plane.jpg" alt="">
                <div class="blur">
                    <h2>
                        <i class="fa-sharp fa-solid fa-play"></i>Welcome back to your
                        <span style="color:black;"> travelPlanner.</span>
                    </h2>
                    <p>Continue with your travel plans.</p>
                </div>
            </div>
            <section class="formContainer">
                <form action="" method="post">
                    <div class="accountText">
                        <h2>Welcome to travelPlanner</h2>
                        <h2>Login to continue</h2>
                        <p>Don't have an account? <a href="/travelPlanner/signup.php" style="font-weight: 500; 
                        color:black;
                        text-decoration: underline; ">
                        Signup.</a></p>
                        <h1>OR</h1>
                        <p>Login as an admin. <a href="/travelPlanner/admin.php" style="font-weight: 500; 
                        color:black;
                        text-decoration: underline; ">
                        Admin.</a></p>
                    </div>
                    <div class="accountInput">
                        <?= $form_error ?>
                        <div>
                            <label for="userName">Username</label>
                            <input type="text" name="fullName" id="userName" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                    </div>
                    <button class="accountBtn" name="login">Login</button>
                    <p>Go to <a href="/travelPlanner/index.php" style="font-weight: 500; 
                        color:black;
                        text-decoration: underline; ">
                        Home.</a></p>
                </form>
            </section>
        </section>
    </section>
</body>

</html>