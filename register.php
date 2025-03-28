<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Reprogram</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/login-register.css">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center">
        <div class="container mt-5">
            <div class="form-container">
                <h2>Register</h2>
                <form action="register_process.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            required>
                    </div>
                        <p class="mt-3 text-center">Have an account? <a href="login.php">Sign in</a></p>
                    
                    <button type="submit" class="btn-custom">Register</button>
                </form>
            </div>
        </div>
    </div>
    
    <?php include_once "./includes/footer.php" ?>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>