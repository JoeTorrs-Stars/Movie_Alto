<?php 
// Include the database connection
include "includes/connect.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: back/user/user_data.php");
    exit(); // Stop further execution
}

// Get the user session data
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Alto</title>
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/styles.css"> <!-- Custom CSS for additional styling -->
    <style>
        body {
            background-color: #121212; /* Dark background */
            font-family: 'Roboto', sans-serif; /* Modern font */
            color: #e0e0e0; /* Light text for readability */
            line-height: 1.6; /* Improved line height */
        }
        h1, h2 {
            color: #ffffff; /* White color for headings */
            text-align: center; /* Center align headings */
            margin-bottom: 20px; /* Space below headings */
        }
        .card {
            border: none;
            border-radius: 20px; /* Slightly rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Darker shadow */
            transition: transform 0.3s, box-shadow 0.3s; /* Smooth transition */
            margin: 15px; /* Margin for spacing */
            background-color: #686dc3; /* Dark card background */
            width: 100%; /* Full width of container */
            display: flex;
            flex-direction: column; /* Make the card stretch to fill height */
        }
        .card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7); /* Deeper shadow on hover */
        }
        .card-img-top {
            width: 100%;
            height: 520px; /* Fixed height for images */
            object-fit: cover; /* Crop images to fit */
            border-top-left-radius: 10px; /* Rounded corners */
            border-top-right-radius: 10px; /* Rounded corners */
        }
        .card-body {
            flex-grow: 1; /* Make the card body stretch */
            padding: 15px; /* Padding inside the card */
            text-align: left; /* Left align the text */
        }
        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis; /* Ellipsis for long titles */
        }
        .divider {
            margin: 10px 0; /* Space above and below divider */
            border: 0;
            height: 1px;
            background-color: #ffffff; /* Light divider color */
            opacity: 0.2; /* Subtle appearance */
        }
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden; /* Prevent text overflow */
            text-overflow: ellipsis;
        }
        .footer {
            color: #e0e0e0; /* Light text in footer */
            padding: 20px 0; /* Padding for footer */
        }
        .footer a {
            margin: 0 10px; /* Margin between links */
        }
        .footer a:hover {
            color: #0056b3; /* Darker blue on hover */
        }
        .container {
            margin-top: 30px; /* Top margin for the container */
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .col-md-3 {
            flex: 0 0 30%; /* Set fixed percentage for all cards */
            max-width: 30%;
        }
        .btn-primary {
            background-color: #1e88e5; /* Bootstrap primary color */
            border: none; /* No border */
            transition: background-color 0.3s; /* Smooth transition */
        }
        .btn-primary:hover {
            background-color: #1565c0; /* Darker blue on hover */
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .card-img-top {
                height: 150px; /* Adjust image height for smaller screens */
            }
            .col-md-3 {
                flex: 0 0 100%; /* Full width for smaller screens */
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include "back/navbar/frontbar.php"; ?>

    <div class="container">
        <h1>Welcome to Movie Alto, <?php echo htmlspecialchars($user['username']); ?>!</h1>
        <div class="text-center">
            <p>Explore our collection of movies and enjoy your experience!</p>
        </div>
        
        <hr>

        <h2>Featured Movies</h2>
        <div class="row">
            <?php
            // Fetch movie data from the database
            $query = "SELECT id, title, description, image FROM movies LIMIT 9"; 
            $result = mysqli_query($conn, $query);

            // Check if the query executed successfully and has results
            if ($result && mysqli_num_rows($result) > 0) {
                while ($movie = mysqli_fetch_assoc($result)) {
                    if (isset($movie['id'])) {
                        // Convert BLOB image data to base64 for display
                        $imageData = base64_encode($movie['image']);
                        $src = 'data:image/jpeg;base64,' . $imageData; // Adjust for your image type
                        echo '
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img src="' . $src . '" class="card-img-top" alt="' . htmlspecialchars($movie['title']) . '">
                                <div class="card-body">
                                    <h5 class="card-title">' . htmlspecialchars($movie['title']) . '</h5>
                                    <hr class="divider">
                                    <p class="card-text">' . htmlspecialchars($movie['description']) . '</p>
                                    <a href="movie_details.php?id=' . htmlspecialchars($movie['id']) . '" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>';
                    } else {
                        echo '<div class="col-md-3 mb-4"><div class="card"><div class="card-body">Error: Movie ID is missing.</div></div></div>';
                    }
                }
            } else {
                echo '<div class="col-md-12"><div class="card"><div class="card-body">No movies found or error fetching movies: ' . mysqli_error($conn) . '</div></div></div>';
            }
            ?>
        </div>
    </div>

    <footer class="text-light footer text-center py-1">
        <p>&copy; <?php echo date("Y"); ?> Movie Magic. All rights reserved.</p>
        <a href="about.php">About Us</a> | 
        <a href="contact.php">FaQ</a>
    </footer>

    <script src="front/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
</body>
</html>
