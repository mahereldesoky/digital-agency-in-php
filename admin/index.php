<?php 
include('authentication.php');
include('includes/header.php');

?>

<div class="container-fluid px-4">
    <?php if($_SESSION['auth_role'] == '2' || $_SESSION['auth_role'] == '1') : ?>
        <h1 class="mt-4">Crowd Admin Panel</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    <?php  endif;  ?>
    <?php if($_SESSION['auth_role'] == '0') : ?>
        <h1 class="mt-4">Bloger Posts Panel</h1>
    <?php  endif;  ?>
    <?php include('message.php'); ?>


    <div class="row">
    <?php if($_SESSION['auth_role'] == '2' || $_SESSION['auth_role'] == '1') : ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Category
                    <?php
                    $dash_category_query = "SELECT * FROM categories";
                    $dash_category_query_run = mysqli_query($con,$dash_category_query);
                    if($category_total = mysqli_num_rows($dash_category_query_run)){
                        echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                    }
                    else {
                        echo '<h4 class="mb-1"> No records found </h4>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="category-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Posts
                <?php
                    $dash_posts_query = "SELECT * FROM posts";
                    $dash_posts_query_run = mysqli_query($con,$dash_posts_query);
                    if($posts_total = mysqli_num_rows($dash_posts_query_run)){
                        echo '<h4 class="mb-0"> '.$posts_total.' </h4>';
                    }
                    else {
                        echo '<h4 class="mb-1"> No records found </h4>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="post-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($_SESSION['auth_role'] == '2' ) : ?>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total users
                <?php
                    $dash_useres_query = "SELECT * FROM admin";
                    $dash_useres_query_run = mysqli_query($con,$dash_useres_query);
                    if($useres_total = mysqli_num_rows($dash_useres_query_run)){
                        echo '<h4 class="mb-0"> '.$useres_total.' </h4>';
                    }
                    else {
                        echo '<h4 class="mb-1"> No records found </h4>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Bloced Users
                <?php
                    $dash_blocked_query = "SELECT * FROM admin WHERE status= '1' ";
                    $dash_blocked_query_run = mysqli_query($con,$dash_blocked_query);
                    if($blocked_total = mysqli_num_rows($dash_blocked_query_run)){
                        echo '<h4 class="mb-0"> '.$blocked_total.' </h4>';
                    }
                    else {
                        echo '<h4 class="mb-1">0</h4>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="../blog.php" class="btn btn-info">Go to Blog</a>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
include('includes/script.php');
?>