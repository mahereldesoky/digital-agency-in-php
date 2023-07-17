<?php  
@include('inc/header.php');
@include('inc/navbar.php');
include('./admin/config/config.php');

if(isset($_GET['title'])){
    $slug = mysqli_real_escape_string($con,$_GET['title']);

    $meta_posts = "SELECT slug,meta_title,meta_description,meta_keyword FROM categories WHERE slug='$slug' LIMIT 1 ";
    $meta_posts_run = mysqli_query($con, $meta_posts);

    if(mysqli_num_rows($meta_posts_run) > 0){
        $metaPostItem = mysqli_fetch_array($meta_posts_run);

        $page_title = $metaPostItem['meta_title'];
        $meta_descreption = $metaPostItem['meta_description'];
        $meta_keyword = $metaPostItem['meta_keyword'];
    }
    else {
        $page_title = "Post Page";
        $meta_descreption = " Post Page description crowd website";
        $meta_keyword = "php, html , css, javascript";
    }
}
else {

$page_title = "Category Page";
$meta_descreption = " Category Page description Blog website";
$meta_keyword = "php, html , css, javascript";
}
?>

<div class="wrapper">

    <!-- Section Started Heading -->
    <div class="section section-inner started-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

                    <?php 
                        if(isset($_GET['title'])){
                        $slug = mysqli_real_escape_string($con,$_GET['title']);

                        $category = "SELECT id,slug,name FROM categories WHERE slug='$slug' AND status='0' LIMIT 1 ";
                        $category_run = mysqli_query($con, $category);

                        if(mysqli_num_rows($category_run) > 0){
                            $categoryItem = mysqli_fetch_array($category_run);
                            $category_id = $categoryItem['id'];
                            ?>
                                <!-- titles -->
                            <div class="h-titles">
                                <div class="h-subtitle red splitting-text-anim-1 scroll-animate" data-splitting="chars" data-animate="active"><?= $categoryItem['name']  ?></div>
                                <div class="h-title splitting-text-anim-2 scroll-animate" data-splitting="chars" data-animate="active">Posts</div>
                            </div>
                            <?php 

                            $posts = "SELECT * FROM posts Where category_id='$category_id' AND status='0' ";
                            $posts_run = mysqli_query($con,$posts);

                            if(mysqli_num_rows($posts_run) > 0){
                                foreach($posts_run as $postItems){
                    ?>
             
                </div>
            </div>
            
        </div>
    </div>

    <!-- Section Archive -->
    <div class="section section-inner m-archive">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- archive items -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <div class="archive-item scrolla-element-anim-1 scroll-animate col-md-8" data-animate="active">
                            <div class="image">
                            <a href="blog-single?title=<?= $postItems['slug']?>">
                                <img src="<?='./admin/uploads/'.$postItems['image'];?>" alt="" />
                            </a>
                            </div>
                            <div class="desc">
                            <div class="category"><?= $categoryItem['name']?> <span>/ <?=date('d-M-Y',strtotime($postItems['created_at']));?></span></div>
                            <div class="title">
                                <a href="blog-single?title=<?= $postItems['slug']?>"><?=$postItems['name'];?></a>
                            </div>
                            <div class="text">
                                <?= $postItems['small_desc']?>
                            </div>
                            <div class="readmore">
                                <a href="blog-single?title=<?= $postItems['slug']?>" class="btn-link">Read More</a>
                            </div>
                            </div>
                        </div>

                    </div>

                    <?php
                        }
                    }
                    
                    else {
                        ?>
                        <h4>No posts found</h4>
                        <?php
                    }
                }

                
                    else {
                        ?>
                        <h4>No such category found</h4>
                        <?php
                    }
                }
                else {
                    ?>
                    <h4>No such url found</h4>
                    <?php
                }
            ?>
                        

                </div>                   
            </div>
        </div>
    </div>



</div>

















<?php    
@include('inc/footer.php');
@include('inc/script.php');
?>