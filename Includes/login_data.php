<?php
include "db_handler.php";

session_start();

if (isset($_POST['login'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];

    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['date_of_birth'] = $date_of_birth;

    $sql = "SELECT * from task1_table.user_data WHERE first_name ='" . $first_name . "'
    AND last_name ='" . $last_name . "'
    AND date_of_birth ='" . $date_of_birth . "'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $_SESSION['type'] = $row['user_type'];
        if ($row['user_type'] == 'admin') {
            header("Location: ../admin_view.php");
        } else {
            header("Location: ../user_view.php");
        }
    } else {
        echo "User not found";
    }
} else {
    header("Location: ../login.php?error=noaccess");
}

