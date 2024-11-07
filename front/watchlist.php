<?php
include "../include/connect.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: back/user/user_data.php");
    exit();
}

$user = $_SESSION['user'];
$username = $user['username']; // Get the username from the session
$userId = (int)$user['ID']; // Assuming ID is in the session user data, cast to integer

// Handle deletion if delete request is made
if (isset($_POST['delete_movie'])) {
    $movieId = (int)$_POST['movie_id']; // Get movie ID to delete, cast to integer

    // Delete movie from watchlist using a simple query
    $deleteQuery = "DELETE FROM watchlist WHERE user_id = $userId AND movie_id = $movieId";

    if ($conn->query($deleteQuery) === TRUE) {
        $sucessmessage = '<div class="alert alert-success">Movie removed from watchlist.</div>';
    } else {
        echo '<div class="alert alert-danger">Error removing movie from watchlist: ' . $conn->error . '</div>';
    }
}

// Query to fetch movies from the user's watchlist
$watchlistQuery = "SELECT movies.id, movies.title, movies.image, watchlist.user_id 
                   FROM movies 
                   JOIN watchlist ON movies.id = watchlist.movie_id 
                   WHERE watchlist.user_id = $userId"; // Directly use user ID

$result = $conn->query($watchlistQuery); // Execute the query
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Watchlist</title>
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/styles.css"> <!-- Custom CSS for additional styling -->
    <link rel="stylesheet" href="css/watchlist.css"> <!-- Additional CSS -->
    <style>
        .card {
            height: 100%; /* Ensure all cards are the same height */
        }

        .card-img-top {
            height: 26rem; /* Set a fixed height for images */
            object-fit: cover; /* Ensure images fit without distortion */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Space the content nicely */
            text-align: center; /* Center the text inside the card */
        }

        .button-container {
             /* Use flexbox for horizontal alignment */   
            justify-content: center; /* Center buttons in the container */
            gap: 5px; /* Space between buttons */
        }

        .btn {
            padding: 8px 12px; /* Adjust padding for normal size */
            font-weight: bold; /* Make button text bold */
            margin-top: 10px; /* Add margin to the top of buttons */
            width: fit-content; /* Set buttons to fit their content */
        }

        .btn-danger {
            background-color: #ff0000; /* Red color for the remove button */
            border: none; /* Remove border */
            color: white; /* Ensure text is white for contrast */
        }

        .btn-info {
            background-color: #007bff; /* Blue color for the view details button */
            border: none; /* Remove border */
            color: white; /* Ensure text is white for contrast */
        }

        .btn-danger:hover,
        .btn-info:hover {
            opacity: 0.9; /* Hover effect for buttons */
        }
    </style>
</head>

<body>
    <!-- Include the navigation bar -->
    <?php include "frontbar.php"; ?>

    <div class="container">
        <h1>Your Watchlist, <?php echo htmlspecialchars($username); ?></h1>
        <hr>
        <br>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($watchlistItem = $result->fetch_assoc()) {
                    // Set the source for the image to the uploads directory
                    $src = 'uploads/' . htmlspecialchars($watchlistItem['image']); // Assuming 'image' holds the filename

                    echo '
                    <div class="col-md-2 mb-4">
                        <div class="card shadow-sm" style="width: 13rem; height: 23.5rem; overflow: hidden;"> <!-- Added fixed width and height -->
                            <img src="' . $src . '" class="card-img-top" style="height: 18rem; object-fit: cover;" alt="' . htmlspecialchars($watchlistItem['title']) . '">
                            <div class="card-body p-1"> <!-- Adjusted padding for smaller container -->
                                <h5 class="card-title" style="font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' . htmlspecialchars($watchlistItem['title']) . '</h5>
                                <div class="button-container d-flex justify-content-between"> <!-- Adjusted button container to fit in small space -->
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="movie_id" value="' . htmlspecialchars($watchlistItem['id']) . '">
                                        <button type="submit" name="delete_movie" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                    <a href="movie_details.php?id=' . htmlspecialchars($watchlistItem['id']) . '" class="btn btn-info btn-sm">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<div class="col-md-12"><div class="alert alert-info">Your watchlist is empty.</div></div>';
            }
            ?>
        </div>
    </div>
    <footer class="text-light footer text-center py-3">
    <hr>
        <p>&copy; <?php echo date("Y"); ?> Movie Magic. All rights reserved.</p>
        <a href="about.php">About Us</a> |
        <a href="contact.php">FaQ</a>
    </footer>

    <script src="front/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
</body>
</html>

<?php
$conn->close(); // Close the database connection after all operations are complete
?>