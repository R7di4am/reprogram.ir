<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reprogram Blog</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>
<body>
<?php include_once "./includes/navbar.php" ?>
<!-- Hero Section -->
<div class="hero">
    <h3>Share Your Knowledge with us</h3>
    <p class="lead">Inspire, educate, and connect through your words.</p>
    <a href="login.php" class="btn-custom">Get Started</a>
</div>

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <!-- Active Users -->
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">Active Users:</h2>
                    <div class="card-text">
                        <a href="#">@user1</a>
                        <a href="#">@user2</a>
                        <a href="#">@user3</a>
                        <a href="#">@user4</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">A Blog for Sharing Knowledge</div>
                <div class="card-body">
                    <p>Turn your ideas into impact! Share insights, experiences, and expertise with us.</p>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><a href="#">Tools</a></li>
                        <li><a href="#">Learning Sources</a></li>
                        <li><a href="#">Comics</a></li>
                        <li><a href="#">Notes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "./includes/footer.php" ?>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>