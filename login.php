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
    <div class="login-container">
        <h2>Login to Your Account</h2>
        <form action="login_process.php" method="POST">
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