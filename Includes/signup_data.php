<?php

include "db_handler.php";

// Check if user submitted form
if (isset($_POST['submit'])) {

    $name = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];

    $unique_id = $name . $lname . $date_of_birth;

    $resume = $_FILES['resume']['name'];
    $resume_type = $_FILES['resume']['type'];
    $resume_size = $_FILES['resume']['size'];
    $resume_tmp_name = $_FILES['resume']['tmp_name'];
    $resume_store = "resumes/" . $resume . $unique_id;
    move_uploaded_file($resume_tmp_name, $resume_store);

    $cover_letter = $_FILES['cover_letter']['name'];
    $cover_letter_type = $_FILES['cover_letter']['type'];
    $cover_letter_size = $_FILES['cover_letter']['size'];
    $cover_letter_tmp_name = $_FILES['cover_letter']['tmp_name'];
    $cover_letter_store = "cover_letter/" . $cover_letter . $unique_id;
    move_uploaded_file($cover_letter_tmp_name, $cover_letter_store);

    // Insert data into database
    $sql = "INSERT INTO task1_table.user_data(first_name, last_name, date_of_birth, nationality, address, phone_number, resume_file, cover_letter) 
    VALUE ('$name', '$lname', '$date_of_birth', '$nationality', '$address', '$phone_number', '$resume', '$cover_letter')";

    try {
        $query = mysqli_query($conn, $sql);
        header("Location: ../login.php?error=none");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
} else {
    header("Location: ../login.php?error=noaccess");
}

