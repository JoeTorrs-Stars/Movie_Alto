<?php
// Ensure session is started only once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user session exists
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontbar</title>
    <link rel="stylesheet" href="../front/css/bootstrap.css">
    <link rel="stylesheet" href="../front/css/bootstrap.min.css">
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="MovieAlto.php">Movie Magic</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="MovieAlto.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="latestmovies.php">Latest Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="browsemovies.php">Browse Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="genre.php">Genre</a>
                            <a class="dropdown-item" href="year.php">Year</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="watchlist.php">Watch List</a>
                        </div>
                    </li>
                </ul>
                <!-- Center the search bar -->
                <form class="d-flex mx-auto">
                    <input class="form-control me-2" type="search" placeholder="Search">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </form>
                <div class="d-flex align-items-center ms-3">
                    <?php if ($user): ?>
                        <p class="mb-0 text-light">Welcome, <?= htmlspecialchars($user['username']); ?></p>
                        <form action="./back/user/user_out.php" method="POST" onsubmit="return confirmLogout();">
                            <button type="submit" class="btn btn-secondary ms-2">Logout</button>
                        </form>
                    <?php else: ?>
                        <a href="back/user/login.php" class="btn btn-secondary">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>
