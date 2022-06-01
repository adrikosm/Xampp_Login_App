<!-- Navigation -->
<?php
include 'Includes/db_handler.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task 1</title>
    <meta charset="UTF-8">
    <link href="CSS/style.css" rel="stylesheet">

    <script type="text/javascript" src="JS/scripts.js"></script>
    <!-- Bootstrap CSS,JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css">
    <!--                  -->
</head>
<body>

<header class="header_decoration">

    <img class="logo" src="images/Logo.webp" alt="logo">
    <nav>
        <ul class="navbar_links">
            <li><a class="link_element" href="index.php">Home</a></li>
        </ul>
    </nav>
    <a class="cta" href="logout.php">
        <button class='logout_button'>Logout</button>
    </a>
</header>

<table class="table table-bordered">
    <thead>
    <tr>
        <?php
        if ($_SESSION['type'] == 'admin') {
            echo "<th>User ID</th>";
        }
        ?>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Date of birth</th>
        <th scope="col">Nationality</th>
        <th scope="col">Address</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Resume</th>
        <th scope="col">Cover letter</th>
        <?php
        if ($_SESSION['type'] == 'admin') {
            echo "<th>User Type</th>";
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($_SESSION['type'] == 'admin') {
        $sql = "SELECT * FROM task1_table.user_data";
    } else {
        $tmp_name = $_SESSION['first_name'];
        $tmp_lname = $_SESSION['last_name'];
        $tmp_birth = $_SESSION['date_of_birth'];

        $sql = "SELECT * FROM task1_table.user_data
            WHERE first_name = '$tmp_name'
            AND last_name = '$tmp_lname' 
            AND date_of_birth = '$tmp_birth'";
    }

    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        if ($_SESSION['type'] == 'admin') {
            echo "<td>" . $row['user_id'] . "</td>";
        }
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['date_of_birth'] . "</td>";
        echo "<td>" . $row['nationality'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        $resume_path = "../Includes/resume/" .
            $row['resume_file'] . $_SESSION['first_name'] .
            $_SESSION['last_name'] . $_SESSION['date_of_birth'];
        echo "<td><a href='$resume_path' target='_blank' class='change_link'>" . $row['resume_file'] . "</a></td>";


        $cover_path = "../Includes/cover_letter/" .
            $row['cover_letter'] . $_SESSION['first_name'] .
            $_SESSION['last_name'] . $_SESSION['date_of_birth'];
        echo "<td><a href = '$cover_path'target='_blank' class='change_link'>" . $row['cover_letter'] . "</a></td>";

        if ($_SESSION['type'] == 'admin') {
            echo "<td>" . $row['user_type'] . "</td>";
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>