
<?php 
ob_start();
$connection = mysqli_connect("localhost" , "root" , "" ,"news")
or die('Could Not Connect');

$id = $_GET['id'];

$query = "DELETE from newss where id=$id";
if(mysqli_query($connection,$query)){
    header("location:manage_news.php");
}

?>
