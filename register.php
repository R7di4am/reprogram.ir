<?php
require_once "./database/functions.php";
require_once "./database/db.php";
function isValidName($name)
{
    return preg_match('/^[a-zA-Z\s]{3,15}$/', $name);
}
function isValidUsername($username)
{
    return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);
}

$form_status = false;

if (isset($_POST["username"]) && isset($_POST["name"]) && isset($_POST["password"])) {
    $name = sanitizeInput($_POST['name']);
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];

    if (isValidName($name) && isValidUsername($username)) {
        if (strlen($password) >= 8) {
            $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

            try {
                $stmt = $pdo->prepare('SELECT * FROM users WHERE username=?');
                $stmt->execute([$username]);
                if ($stmt->fetchColumn() > 0) {
                    $form_status = "This username is already taken";
                } else {
                    $stmt = $pdo->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
                    $stmt->execute([$name, $username, $hashedPassword]);
                    $form_status = "Registration successful";
                }


            } catch (PDOException $e) {
                $form_status = "Registration failed";
            }

        } else {
            $form_status = "Your password must contain at least 8 characters.";
        }
    } else {
        $form_status = "Please provide a valid name (3-15 characters) or username (3-20 characters).";
    }
}

?>
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
                <form action="register.php" method="POST" id="registerForm">
                    <?php echo $form_status ? '<p class="text-danger">' . $form_status . "</p>" : "" ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <p class="mt-3 text-center">Have an account? <a href="login.php">Sign in</a></p>

                    <button type="submit" class="btn-custom">Register</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once "./includes/footer.php" ?>

    <script>
        function saveFormData() {
            localStorage.setItem("name", document.getElementById("name").value);
            localStorage.setItem("username", document.getElementById("username").value);
        }
        function loadFormData() {
            if (localStorage.getItem("name")) {
                document.getElementById("name").value = localStorage.getItem("name");
            }
            if (localStorage.getItem("username")) {
                document.getElementById("username").value = localStorage.getItem("username");
            }
        }
        document.addEventListener("DOMContentLoaded", loadFormData);
        document.getElementById("name").addEventListener("input", saveFormData);
        document.getElementById("username").addEventListener("input", saveFormData);
        // document.getElementById("registerForm").addEventListener("submit", function () {
        //     localStorage.removeItem("name");
        //     localStorage.removeItem("username");
        // });
    </script>
</body>

</html>