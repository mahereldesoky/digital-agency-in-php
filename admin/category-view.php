<?php 
include('authentication.php');
include('includes/header.php');


?>


<div class="container-fluid px-4">


    <div class="row mt-4">
        <div class="com-md-12">

            <?php include('message.php');  ?>
            <div class="card">
                <div class="card-header">
                    <h4> View Category
                    <a href="category-add.php" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                    
            </div>
            <div class="card-body">

                <div class="table-responsive">
                        
                    <table id="myTable" class="table table-dark text-white table-stripe">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <?php if($_SESSION['auth_role'] == '2') : ?>
                                <th>Delete</th>
                                <?php endif;?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $category = "SELECT * FROM categories WHERE status != '2' ";
                            $category_run = mysqli_query($con, $category);

                            if(mysqli_num_rows($category_run) > 0) {
                                foreach($category_run as $item){
                                    ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><img src="uploads/<?=$item['image']?>" width="60px" height="60px" /></td>
                                        <td>
                                        <?php 
                                        if($item['status'] == '1') {echo 'Hidden';} else { echo 'Visible'; }
                                        ?>
                                        </td>
                                        <td>
                                            <a href="category-edit.php?id=<?= $item['id']?>" class="btn btn-info">Edit</a>
                                        </td>
                                        <?php if($_SESSION['auth_role'] == '2') : ?>
                                        <td>
                                            <form action="code-superadmin.php" method="POST">
                                                <button type="submit" name="category_delete" value="<?= $item['id']?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        <?php endif;?>
                                    </tr>         
                        </tbody>
                                                
                        <?php
                                    }

                                    }
                                    else {
                                        ?>
                                            <tr>
                                                <td colspan="5"> No Record Found</td>
                                            </tr>
                                        <?php
                                            }
                                    ?>   
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