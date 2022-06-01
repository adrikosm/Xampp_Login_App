<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$table_name = "task1_table";

$conn = mysqli_connect($server_name, $db_username, $db_password, $table_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
