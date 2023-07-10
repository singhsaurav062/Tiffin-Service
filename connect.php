<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $con = new mysqli('localhost', 'root', '', 'data');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO `database` (name, email, gender, mobile, password) VALUES ('$name', '$email', '$gender', '$mobile', '$password')";
    
    if ($con->query($sql) === TRUE) {
        echo "Data Entered Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>
