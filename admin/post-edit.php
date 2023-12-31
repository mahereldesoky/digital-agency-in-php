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
                    <h4> Edit Post
                    <a href="post-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                    
                </div>
                <div class="card-body">

                    <?php  
                        if(isset($_GET['id'])){
                            $post_id = $_GET['id'];
                            $post_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
                            $post_query_res = mysqli_query($con, $post_query);

                            if(mysqli_num_rows($post_query_res) > 0 ){
                                $post_row = mysqli_fetch_array($post_query_res);
                                ?>
                        
                <form action="code.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="post_id"  value="<?= $post_row['id']?>">
                    <div class="row">
                        <div class="col-md-12 mt3">
                            <label for="">Category List</label>
                            <?php
                                $category = "SELECT * FROM categories WHERE status ='0'"; 
                                $category_run = mysqli_query($con, $category);

                                if(mysqli_num_rows($category_run) > 0) {
                                    ?>
                                    <select name="category_id" required class="form-control">
                                        <option value="">--Select Category--</option>
                                        <?php
                                            foreach($category_run as $categoryitem){
                                                ?>
                                            <option value="<?= $categoryitem['id'] ?>" <?= $categoryitem['id'] == $post_row['category_id'] ? 'selected' : '' ?> > 
                                            <?= $categoryitem['name']  ?>
                                            </option>
                                                <?php
                                            }
                                    ?>
                                    </select>

                                        <?php
                                    }
                                    else {
                                        ?>
                                        <h4>No Category Available</h4>
                                        <?php
                                    }

                            ?>


                        </div>

                        <div class="col-md-6 mb-3 d-none " >
                            <label for="">ID</label>
                            <input type="hidden" name="user_id" value="<?= $_SESSION['auth_user']['user_id'];?>"  class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?= $post_row['name']?>" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug (URL)</label>
                            <input type="text" name="slug" value="<?= $post_row['slug']?>" required class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Small Description</label>
                            <textarea name="small_desc" id="" required class="form-control" rows="4"><?= htmlentities($post_row['small_desc'])?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="post" required class="form-control" rows="4"><?= htmlentities($post_row['description'])?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" value="<?= $post_row['meta_title']?>" max="191"  required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Desciption</label>
                            <input type="text" name="meta_description" value="<?= $post_row['meta_description']?>" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keyword</label>
                            <input type="text" name="meta_keyword" value="<?= $post_row['meta_keyword']?>" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <input type="hidden" name="old_image" value="<?= $post_row['image']?>" />
                            <img src="./uploads/<?= $post_row['image']?>" width="100px" height="100px" alt="">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox"  name="status"  <?= $post_row['status'] == '1' ? 'checked' : ''?> width="70px" height="70px">
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="post_update" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>
                </form>        

                    <?php   
                            }
                        }
                        else {
                            ?>
                            <h4>No Record Found</h4>
                            <?php
                        }
                    ?>





                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include('includes/footer.php');
include('includes/script.php');

?>