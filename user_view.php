<?php
session_start();
if ($_SESSION['type'] != 'user') {
    header("Location: admin_view.php?error=You are not authorized to view this page!");
}
include 'header.php';
?>


<h1 style="color:white">User Page</h1>


</body>
</html>
