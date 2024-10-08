<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Movie Alto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Dashboard
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./movie/movie_create.php">Movie List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../config/genre_add.php">Genres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reviews and Rating</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">User List</a>
                            <a class="dropdown-item" href="#">Admin List</a>
                            <a class="dropdown-item" href="./config/year.php">Year List</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Portmanteau</a>
                        </div>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-3">
                    <p class="mb-0 text-light">Welcome, <?= htmlspecialchars($user['username']); ?></p>
                    <form action="./user/user_out.php" method="POST" onsubmit="return confirmLogout();">
                        <button type="submit" class="btn btn-secondary ms-2">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>
