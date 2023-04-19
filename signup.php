<?php
require_once './includes/database.php';
$form_error = "";
if (isset($_POST["signup"])) {
    $fullName = htmlspecialchars(trim($_POST["fullName"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    if (!empty($fullName) || !empty($password)) {
        if (strlen($fullName) < 8 || strlen($password) < 8) {
            $form_error = "Fields must be equal or greater than eight characters.";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $form_error = "Password must include at least one number.";
        } elseif (!preg_match("#[a-zA-Z]+#", $password)) {
            $form_error = "Password must include at least one letter.";
        } else {
            $sql_query3 = "SELECT * FROM users WHERE user_full_name = ?";
            $stmt1 = mysqli_prepare($connection, $sql_query3);
            mysqli_stmt_bind_param($stmt1, "s", $fullName);
            mysqli_stmt_execute($stmt1);
            $result = mysqli_stmt_get_result($stmt1);
            if (mysqli_num_rows($result) > 0) {
                $form_error = "User already exist with this name.";
            } else {
                $sql_query1 = "INSERT INTO users (user_full_name, user_password) values (?, ?)";
                if ($stmt = mysqli_prepare($connection, $sql_query1)) {
                    mysqli_stmt_bind_param($stmt, "ss", $fullName, $password);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        $sql_query2 = "SELECT * FROM users where user_full_name = ? AND user_password = ?";
                        if ($stmt2 = mysqli_prepare($connection, $sql_query2)) {
                            mysqli_stmt_bind_param($stmt2, "ss", $fullName, $password);
                            mysqli_stmt_execute($stmt2);
                        } else {
                            $form_error = "Error occured during searching of the user in db.";
                        }
                        $result = mysqli_stmt_get_result($stmt2);
                        if ($result->num_rows == 1) {
                            $_SESSION['user'] = $result->fetch_assoc();
                            header("Location: http://localhost/travelPlanner/index.php");
                        }
                    } else {
                        $form_error = "Error occured";
                    }
                    mysqli_stmt_close($stmt);
                }
            }
        }
    } else {
        $form_error = "Fill up the required inputs.";
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
                        <i class="fa-sharp fa-solid fa-play"></i>Make your planning and reserve vacations easier
                        <span style="color:black;"> with travelPlanner.</span>
                    </h2>
                    <p>join our community.</p>
                </div>
            </div>
            <section class="formContainer">
                <form action="" method="post">
                    <div class="accountText">
                        <h2>Welcome to travelPlanner</h2>
                        <h2>Sign up to continue</h2>
                        <p>Already have an account? <a href="/travelPlanner/login.php" style="
                        font-weight: 500; 
                        color:black;
                        text-decoration: underline; ">Login.</a></p>
                    </div>
                    <div class="accountInput">
                        <p class="error"><?= $form_error ?> </p>
                        <div>
                            <label for="fullName">Full Name</label>
                            <input type="text" name="fullName" id="userName" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                    </div>
                    <button class="accountBtn" name="signup">Signup</button>
                    <p style="display: flex;
                        justify-content: center;">Go to <a href="/travelPlanner/index.php" style="font-weight: 500; 
                        color:black;
                        text-decoration: underline;
                        margin-left: 0.5rem"> Home.</a></p>
                </form>
            </section>
        </section>
    </section>
</body>

</html>