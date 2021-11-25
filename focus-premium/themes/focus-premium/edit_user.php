<?php
ob_start();
include 'include/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from user where id=$id";
$excute = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
  
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "UPDATE `user` SET `username`='$username',`email`='$email',`password`='$password' WHERE id=$id";
    mysqli_query($connection,$query);
    header("location:manage_user.php");
            }
    

    

?>
<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card" style="padding-left: 257px;">
                <div class="card-header bg-secondary text-light">Manage User's</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">User Name :</label>
                                <input type="text" id="username" name="username" placeholder="User Name" value="<?php echo $row['username'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> E-Mail :</label>
                                <input type="text" id="email" name="email" placeholder="E-mail" value="<?php echo $row['email'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> Password :</label>
                                <input type="text" id="password" name="password" placeholder="Password" value="<?php echo $row['password'] ?>" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update User</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>