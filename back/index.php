<?php

include "../includes/connect.php";

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ./user/user_data.php");
}
$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../back/css/bootstrap.css">
    <link rel="stylesheet" href="../back/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php 
    include "../back/navbar/backbar.php";
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-2">
                                <div class="card ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Total Users</h5>
                                        <i class="bi bi-person-circle text-warning" style="font-size: 30px;"></i>
                                        <?php

                                        $sql = "SELECT COUNT(*) AS user FROM users";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Fetch the row and display the count
                                            $row = $result->fetch_assoc();
                                            echo "<h1>" . $row['user'] . "</h1>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="user/user_data.php" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-center">Total Movies</h5>
                                        <i class="bi bi-film text-warning" style="font-size: 30px;"></i>
                                        <?php

                                        $sql = "SELECT COUNT(*) AS mlist FROM movies";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Fetch the row and display the count
                                            $row = $result->fetch_assoc();
                                            echo "<h1>" . $row['mlist'] . "</h1>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center ">
                                        <a href="movie/movie_create.php" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="card ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Genres</h5>
                                        <i class="bi bi-list-stars text-warning" style="font-size: 30px;"></i>
                                        <?php

                                        $sql = "SELECT COUNT(*) AS genres FROM genres";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Fetch the row and display the count
                                            $row = $result->fetch_assoc();
                                            echo "<h1>" . $row['genres'] . "</h1>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="config/genre_add.php" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="card ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Year</h5>
                                        <i class="bi bi-calendar-fill text-warning" style="font-size: 30px;"></i>
                                        <?php

                                        $sql = "SELECT COUNT(*) AS years FROM years";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Fetch the row and display the count
                                            $row = $result->fetch_assoc();
                                            echo "<h1>" . $row['years'] . "</h1>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="config/genre_add.php" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="card ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Rating</h5>
                                        <i class="bi bi-star-fill text-warning" style="font-size: 30px;"></i>
                                        <?php

                                        $sql = "SELECT COUNT(*) AS years FROM years";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Fetch the row and display the count
                                            $row = $result->fetch_assoc();
                                            echo "<h1>" . $row['years'] . "</h1>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="config/genre_add.php" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="card ">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Admin</h5>
                                        <i class="bi bi-shield-shaded text-warning" style="font-size: 30px;"></i>
                                        <?php

                                        $sql = "SELECT COUNT(*) AS admins FROM admin";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Fetch the row and display the count
                                            $row = $result->fetch_assoc();
                                            echo "<h1>" . $row['admins'] . "</h1>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="config/genre_add.php" class="btn btn-primary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>