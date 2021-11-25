
<?php 
ob_start();
$connection = mysqli_connect("localhost" , "root" , "" ,"news")
or die('Could Not Connect');

$id = $_GET['id'];

$query = "DELETE from user where id=$id";
if(mysqli_query($connection,$query)){
    header("location:manage_category.php");
}

?>
