<?php

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "form";

// Create connection
$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (isset($_POST['submit'])) {

    $title = $_FILES['files']['name'];
    $type = $_FILES['files']['type'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $files = file_get_contents($_FILES['files']['tmp_name']);
    $encodePdf = base64_encode($files);

    //Insert data to database



    $sql = "INSERT INTO assignment (email,name,number,title,type,files)
    VALUES ('$email', '$name', '$number', '$title', '$type', '$encodePdf')";
    $result = $link->query($sql);
    if ($result) {
        echo '<h2>Your assignment form submitted successfully....</h2>';
    } else {
        echo "Error";
    }
}

?>
