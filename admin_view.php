<?php
session_start();
if ($_SESSION['type'] != 'admin') {
    header("Location: user_view.php?error=You are not authorized to view this page!");
}
include 'header.php';
?>


<h1 style="color:white">Admin Page</h1>


</body>
</html>