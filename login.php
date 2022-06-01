<!Doctype html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 'admin') {
        header("location: admin_view.php");
    } else {
        header("location: user_view.php");
    }
}
?>
<head>
    <title>Task 1</title>
    <meta charset="UTF-8">
    <link href="./CSS/style.css" rel="stylesheet" type="text/css">
    <script src="./JS/scripts.js" type="text/javascript"></script>
</head>

<body>

<!-- Login form -->
<div id='signup_form'>
    <h1> Login</h1>
    <form action="./Includes/login_data.php" method="post">
        <label>First Name</label>
        <input name="first_name" placeholder="first_name" required type="text">

        <label>Last Name</label>
        <input name="last_name" placeholder="last_name" required type="text">

        <label> Date of birth </label>
        <input type="date" name="date_of_birth" required>
        <br>
        <input name="login" type="submit" value="Login">


    </form>
    <?php
    if ($_GET['error'] == 'none') {
        echo "<p>You have successfully signed up!</p>";
    }
    ?>
    <p>Dont have an account? <a href="index.php">Sign up Here</a></p>
</div>

</body>