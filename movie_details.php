<?php
// Include the database connection
include "includes/connect.php";

// Check if movie ID is provided in the URL
if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Fetch the movie details from the database
    $query = "SELECT * FROM movies WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $movie_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the movie exists
    if (mysqli_num_rows($result) > 0) {
        $movie = mysqli_fetch_assoc($result);

        // Convert the BLOB image to base64
        $imageData = base64_encode($movie['image']);
        $src = 'data:image/jpeg;base64,' . $imageData; // Adjust for your image type
    } else {
        echo "Movie not found.";
        exit();
    }
} else {
    echo "Invalid movie ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($movie['title']); ?> - Movie Details</title>
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/styles.css"> <!-- Custom CSS for additional styling -->
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include "back/navbar/frontbar.php"; ?>

    <div class="container mt-5">
        <h1><?php echo htmlspecialchars($movie['title']); ?></h1>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo $src; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($movie['title']); ?>" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Genre:</strong> <?php echo htmlspecialchars($movie['genre']); ?></li>
                    <li class="list-group-item"><strong>Director:</strong> <?php echo htmlspecialchars($movie['director']); ?></li>
                    <li class="list-group-item"><strong>Year:</strong> <?php echo htmlspecialchars($movie['year']); ?></li>
                    <li class="list-group-item"><strong>Cast:</strong> <?php echo htmlspecialchars($movie['casts']); ?></li>
                    <li class="list-group-item"><strong>Description:</strong> <?php echo htmlspecialchars($movie['description']); ?></li>
                </ul>
            </div>
        </div>
        <!-- Change the href to point to MovieAlto.php -->
        <a href="MovieAlto.php" class="btn btn-primary mt-3">Back to Movies</a>
    </div>

    <script src="front/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
</body>
</html>
