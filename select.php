<?php
include "includes/connect.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <select class="form-select" id="genre" name="genre">
            <?php
            // Fetch genres from the database
            $query = "SELECT * FROM genres";
            $result = $conn->query($query);

            // Check if the query was successful
            if (!$result) {
                die("Query failed: " . $conn->error);
            }

            // Check if any genres are available
            if ($result->num_rows > 0) {
                echo "Genres found: <br>";
                while ($row = $result->fetch_assoc()) {
                   echo "<option value='" . $row['ID'] . "'>" . $row['genre_title'] . "</option>";
                }
            } else {
                echo "No genres available.";
            }
            ?>
        </select>
    </div>
</body>

</html>