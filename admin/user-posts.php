<?php 
include('authentication.php');
include('middleware/superadminauth.php');

include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Users Posts</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Users Posts</h4>
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-dark text-white">
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>User Name</th>
                                <th>Post Name</th>
                                <th>Post Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_GET['id']))
                            {
                                $id = $_GET['id'];
                                $query = "SELECT p. *, a.name AS aname FROM posts p, admin a Where a.id= p.user_id and user_id='$id' ";
                                $query_run = mysqli_query($con,$query);
                                if (mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['aname'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['status'] == '1' ? 'Hidden' : 'Visible' ?></td>
                             
                                    </tr>
                                    <?php
                                    }
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