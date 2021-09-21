<?php
$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME ="form";

// Create connection
$link = new mysqli($DB_SERVER , $DB_USERNAME, $DB_PASSWORD,$DB_NAME);

if(isset($_POST['submit'])){
   
    $title =$_FILES['files']['name'];
    $type =$_FILES['files']['type'];
   $email = $_POST['email'];
   $name = $_POST['name'];
   $number =$_POST['number'];
   $files =file_get_contents($_FILES['files']['tmp_name']);



//Insert data to database
$sql = "INSERT INTO assignment (email,name,number,title,type,files) VALUES (?,?,?,?,?,?)";
if($stmt = mysqli_prepare($link, $sql)){
   // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssissb", $param_email, $param_name,$param_number,$param_title,$param_type,$param_files);
    //Set parameters
    $param_email = $email;
    $param_name = $name;
    $param_number = $number;
    $param_title =$title;
    $param_type =$type;
    $param_files = $files;
    
    //Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo 'Your assignment form submitted successfully....';
    }
    
}
}
?>
