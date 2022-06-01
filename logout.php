<?php
session_start();
unset($_SESSION["type"]);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['date_of_birth']);
header("Location:index.php?logout=success");