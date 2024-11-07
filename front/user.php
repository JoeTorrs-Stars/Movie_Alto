<?php
session_start();
include "../include/connect.php";

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: back/user/user_data.php");
    exit();
}

$user = $_SESSION['user'];
$username = $user['username'];

// Fetch user bio and profile image from the database
$sql = "SELECT bio, profile_image FROM users WHERE username = '" . mysqli_real_escape_string($conn, $username) . "'";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Initialize the profile_image variable in case no image is found
$profile_image = '';

if ($result->num_rows === 1) {
    $user_data = $result->fetch_assoc();
    $bio = htmlspecialchars($user_data['bio']);
    $profile_image = $user_data['profile_image'];
} else {
    $bio = "Bio not available"; 
}

// Set a default profile image if the user does not have one
$profile_image = isset($profile_image) ? 'uploads/' . htmlspecialchars($profile_image) : 'uploads/profile_pics/default_profile.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="front/css/bootstrap.css">
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <style>
        .profile-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 100px auto;
            padding: 30px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .profile-container img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ccc;
            margin-left: -4rem;
            margin-top: -15rem;
        }

        .profile-details {
            display: flex;
            flex-direction: column;
        }

        .profile-details h2 {
            margin: 0;
            color: #333;
            font-size: 3rem;
        }

        .profile-details hr {
            width: 60rem;
            border: 0;
            height: 4px;
            background: black;
            margin: 10px 0;
        }

        .profile-details p {
            font-size: 18px;
            margin: 15px 0;
            color: #777;
        }

        .edit-profile-btn {
            background-color: #d5006d;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            position: absolute;
            right: 20px;
            top: 20px;
        }

        .edit-profile-btn:hover {
            background-color: #ab0047;
            cursor: pointer;
        }

        .personal-info-title {
            font-size: 2.5rem;
            color: white;
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Include the navigation bar -->
    <?php include "frontbar.php"; ?>

    <div class="container">
        <!-- Personal Information Heading -->
        <h1 class="personal-info-title">Personal Information</h1>
        <hr>
        <!-- Profile Picture and User Details Container -->
        <div class="profile-container">
            <div class="d-flex align-items-center">
                <img src="<?php echo $profile_image; ?>" alt="Profile Image">
                <div class="profile-details ms-3">
                    <h2><?php echo htmlspecialchars($user['username']); ?></h2>
                    <hr>
                    <br>
                    <p><strong>Email: </strong><?php echo htmlspecialchars($user['email']); ?></p>
                    <p><strong>Name: </strong><?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Contact: </strong><?php echo htmlspecialchars($user['contact']); ?></p>
                    <p><strong>Bio: </strong><?php echo $bio; ?></p>
                </div>
            </div>
            <!-- Edit Profile Button at the upper right -->
            <a href="edit_profile.php?editID=<?= $user['ID']; ?>" class="edit-profile-btn">Edit Profile</a>
        </div>
    </div>
   
    <footer class="text-light footer text-center py-1">
    <hr>
        <p>&copy; <?php echo date("Y"); ?> Movie Magic. All rights reserved.</p>
        <a href="about.php">About Us</a> | 
        <a href="contact.php">FAQ</a>
    </footer>

    <script src="front/js/bootstrap.bundle.min.js"></script>
</body>
</html>
