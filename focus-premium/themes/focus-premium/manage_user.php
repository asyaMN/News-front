<?php include 'include/header.php'; ?>
<?php
if(isset($_POST['addBtn'])){
 $name=$_POST['username'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 

 $query="INSERT INTO `user`(`username`, `email`, `password`) VALUES  ('$name' , '$email' , '$password')";
mysqli_query($connection,$query);
}
?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card" style="padding-left: 257px;">
                <div class="card-header bg-secondary text-light">Manage User</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">User Name :</label>
                                <input type="text" id="username" name="username" placeholder="User Name" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">E-Mail :</label>
                                <input type="text" id="email" name="email" placeholder="E-Mail" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">password</label>
                                <input type="password" id="password" name="password" placeholder="password" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Users</button></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Table Show Data -->

    <div class="row mb-5">
    <div class="col-md-12">
                        <div class="card" style="padding-left:257px ;">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>E-mail</th>
                                            <th>password</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT * FROM `user` ";
                                        $excute = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                        <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['password'] ?></td>
                                            <td>
                                                <a href="delete_user.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                                <a href="edit_user.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</div>
