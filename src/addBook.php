<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'webp'); // valid extensions
$path = 'assets/img/'; // upload directory

if(!empty($_POST['title']) && !empty($_POST['author']) && !empty($_FILES['image']))
{
//TODO:
//Here do additional validation for parameters

  
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).$img;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 

if(move_uploaded_file($tmp,$path)) 
{
echo "<img src='$path' />";
$title = $_POST['title'];
$author = $_POST['author'];
$pages = $_POST['pages'];


//include database configuration file
//include_once 'db.php';
$databaseFile = '/var/www/html/your_database.db';
$db = new SQLite3($databaseFile);

//insert form data in the database
$insert = $db->query("INSERT INTO books_table (title, author, pages, file_name) VALUES ('".$title."','".$author."','".$pages."','".$path."')");

//echo $insert?'ok':'err';
}
} 
else 
{
echo 'invalid';
}
}
?>
