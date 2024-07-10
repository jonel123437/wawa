<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "seven_eleven";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile_number = $_POST['mobilenum'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $date_of_birth = "$year-$month-$day";
    $gender = $_POST['gender'];
    $terms_agreed = isset($_POST['checkbox']) ? 1 : 0;

    // Validate and sanitize input data
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $mobile_number = $conn->real_escape_string($mobile_number);
    $date_of_birth = $conn->real_escape_string($date_of_birth);
    $gender = $conn->real_escape_string($gender);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, password, mobile_number, date_of_birth, gender, terms_agreed) 
VALUES ('$name', '$email', '$hashed_password', '$mobile_number', '$date_of_birth', '$gender', $terms_agreed)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
