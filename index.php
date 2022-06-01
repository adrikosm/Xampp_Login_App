<!Doctype html>
<html lang="en">

<head>
    <title>Task 1</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/style.css">
    <script type="text/javascript" src="./JS/scripts.js"></script>
</head>
<body>

<!-- Make the signup form -->
<div id="signup_form">
    <h1> Sign up </h1>
    <form action="./Includes/signup_data.php" method="post" enctype="multipart/form-data">
        <label> First Name</label>
        <input type="text" name="first_name" placeholder="First Name" required>

        <label> Last Name</label>
        <input type="text" name="last_name" placeholder="Last Name" required>

        <label> Date of birth </label>
        <input type="date" name="date_of_birth" required>

        <label> Nationality</label>
        <input type="text" name="nationality" required>

        <label>Address</label>
        <input type="text" name="address" required>

        <label>Phone number</label>
        <select id="country" onchange="country_code()">
            <!-- https://www.quackit.com/character_sets/emoji/emoji_v3.0/emoji_icons_flags.cfm flags-->
            <option value="other_country">Other</option>
            <option value="UK">&#x1F1EC;&#x1F1E7; UK</option>
            <option value="DE">&#x1F1E9;&#x1F1EA; DE</option>
        </select>
        <input type="tel" id="phone_number" name="phone_number" required>

        <label>Resume</label>
        <input type="file" name="resume" accept="application/pdf" required>
        <br>
        <label>Cover Letter</label>
        <input type="file" name="cover_letter" accept="application/pdf" required>
        <br>
        <input type="submit" name='submit' value="Sign up">

        <?php
        if ($_GET['logout'] == 'success') {
            echo "<p>You have successfully logged out!</p>";
        }
        ?>
    </form>
    <p>Already have an account? <a href="login.php">Login Here</a></p>
</div>


</body>
</html>




