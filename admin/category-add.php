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
                    <h4> Add Category
                    <a href="category-view.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                    
                </div>
                <div class="card-body">

                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug (URL)</label>
                            <input type="text" name="slug" required class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Small Description</label>
                            <textarea name="small_desc" required class="form-control" rows="4"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="category" required class="form-control" rows="4"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" max="191" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Desciption</label>
                            <input type="text" name="meta_description" required class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keyword</label>
                            <input type="text" name="meta_keyword" required class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" width="70px" height="70px">
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" name="category_add" class="btn btn-primary">Save Category</button>
                        </div>
                    </div>
                </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
include('includes/script.php');
?>