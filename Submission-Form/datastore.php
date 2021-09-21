<?php
$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME ="form";
$email = $_POST['email'];
$name = $_POST['name'];
$number =$_POST['number'];
$files =$_POST['files'];


// Create connection
$link = new mysqli($DB_SERVER , $DB_USERNAME, $DB_PASSWORD,$DB_NAME);

//Insert data to database
$sql = "INSERT INTO assignment (email,name,number,files) VALUES (?,?,?,?)";
if($stmt = mysqli_prepare($link, $sql)){
   // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssib", $param_email, $param_name,$param_number,$param_files);
    //Set parameters
    $param_email = $email;
    $param_name = $name;
    $param_number = $number;
    $param_files = $files;
    //Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo 'Your assignment form submitted successfully....';
    }
    
}

?>