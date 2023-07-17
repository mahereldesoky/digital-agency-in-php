<?php 
include('authentication.php');
include('middleware/superadminauth.php');

include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Registered Users</h4>
                        <a href="register-add.php" class="btn btn-primary float-end">Add Admin</a>
                </div>
                <div class="card-body table-responsive ">
                    <table id="myTable" class="table  table-dark text-white">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Total Posts</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $query = "SELECT * FROM admin";
                            $query_run = mysqli_query($con,$query);
                            if (mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td>
                                            <?php 
                                            if($row['role_as'] == '1'){
                                                echo 'Admin';
                                            }
                                            elseif($row['role_as'] == '0'){
                                                echo 'User';
                                            }
                                            elseif($row['role_as'] == '2'){
                                                echo 'Super Admin';
                                            }
                                            ?>
                                        </td>
                                        
                                        <td>
                                        <?php
                                            $id = $row['id'];  
                                            $query = "SELECT user_id FROM posts where user_id='$id'";
                                            $query_run = mysqli_query($con,$query);
                                            $total = mysqli_num_rows($query_run);
                                            if ($total > 0){ 
                                        ?>
                                            
                                            <a href="user-posts.php?id=<?= $row['id'] ?>" class="btn btn-info"> View All (<?= $total * 1 ?>)</a>
                                            <?php
                                            }else {
                                            ?>  
                                                0
                                            <?php
                                            }                                   
                                        ?>
                                        </td>
                                       
                                        <td><a href="register-edit.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                            <button type="submit" name="user_delete" value="<?=$row['id']?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

</div>

<?php 
include('includes/footer.php');
include('includes/script.php');
?>