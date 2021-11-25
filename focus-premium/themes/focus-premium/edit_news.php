<?php
ob_start();
include 'include/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from newss where id=$id";
$excute = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($excute);



if(isset($_POST['updateBtn'])){
    $title = $_POST['title'];
    $descc =$_POST['descc'];
    $ca_id = $_POST['category_id'];

    $path = 'uploads/';
    
    $pic = $_FILES['pic']['name'];
    $pic_tmp_name = $_FILES['pic']['tmp_name'];

    $query = "UPDATE `newss` SET `title`='$title',`descc`='$descc',`pic`='$pic',`category_id`='$ca_id' WHERE id=$id";  
    mysqli_query($connection,$query);
        move_uploaded_file($p_tmp_name, $path.$p_image);
        header('location:manage_news.php');
    
}?>

<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card" style="padding-left: 257px;">
                <div class="card-header bg-secondary text-light">Manage New's</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">Title News :</label>
                                <input type="text" id="title" name="title" placeholder="Title" value="<?php echo $row['title'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> Description :</label>
                                <input type="text" id="descc" name="descc" placeholder="Description" value="<?php echo $row['descc'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> Image :</label>
                                <input type="file" id="pic" name="pic" placeholder="Pictrue" value="<?php echo $row['pic'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> Category :</label>
                                <input type="text" id="category_id" name="category_id" placeholder="category_id" value="<?php echo $row['category_id'] ?>" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update Newss</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>