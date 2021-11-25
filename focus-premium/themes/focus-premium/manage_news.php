<?php include 'include/header.php'; ?>
<?php
if(isset($_POST['addBtn'])){
 $name=$_POST['title'];
 $desc=$_POST['descc'];
 $ca_id=$_POST['category_id'];

 $path = 'uplodes/';

 $p_img =time().'1'.$_FILES['pic']['name'];
 $img_tmp_name = $_FILES['pic']['tmp_name'];

 $query="INSERT INTO `newss`(`title` ,`descc`, `pic`, `category_id` ) 
 VALUES ('$name' , '$desc' , '$p_img' , '$ca_id')";
if(mysqli_query($connection,$query)){
    move_uploaded_file($img_tmp_name, $path.$p_img);
    
}
}
?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card" style="padding-left: 257px;">
                <div class="card-header bg-secondary text-light">Manage Category</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">Title :</label>
                                <input type="text" id="title" name="title" placeholder="Title" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Description :</label>
                                <input type="text" id="descc" name="descc" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> Image</label>
                                <input type="file" id="pic" name="pic" placeholder="Picture" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Category_id :</label>
                            <select name="category_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `categories`";
                                    $excute = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Product</button></div>
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
                                            <th>Title News</th>
                                            <th>Description</th>
                                            <th>Picture</th>
                                            <th>Category_id</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT * FROM `newss` ";
                                        $excute = mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                        <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['title'] ?></td>
                                            <td><?php echo $row['descc'] ?></td>
                                            <td><?php echo $row['pic'] ?></td>
                                            <td><?php echo $row['category_id'] ?></td>
                                            <td>
                                                <a href="delete_news.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                                <a href="edit_news.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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
