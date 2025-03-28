<?php
require_once "./database/functions.php";
require_once "./database/db.php";

if(is_login_ok()){
    echo "you login";
    exit;
}

$form_status = false;

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = sanitizeInput($_POST["username"]);
    $password = $_POST["password"];

    try {
        $user = get_user_by_username($username);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $ip = $_SERVER['REMOTE_ADDR'];
                $token = generate_key();
                $_SESSION['fingerprint'] = hash('sha256',$ip.$token);
                update_user_by_id($user['id'],$token,$ip);
                $form_status = "Login successful";
            } else {
                $form_status = "Wrong Password";
            }
        } else {
            $form_status = "Wrong Username";
        }

    } catch (PDOException $e) {
        $form_status = "Login failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Reprogram Blog</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/login-register.css">
</head>

<body class="d-flex align-items-center justify-content-center mt-5">
    <div class="login-container text-center">
        <h3>Login to Your Account</h3>
        <?php echo $form_status ? '<p class="text-danger">' . $form_status . "</p>" : "" ?>
        <form action="./login.php" method="POST" class="mt-4">
            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-custom">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="register.php">Sign up</a></p>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>