<?php  
@include('inc/header.php');
@include('inc/navbar.php');
include('./admin/config/config.php');

?>


<div class="wrapper">

    <!-- Section Started Heading -->
    <div class="section section-inner started-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- titles -->
                    <div class="h-titles">
                        <div class="h-subtitle red splitting-text-anim-1 scroll-animate" data-splitting="chars" data-animate="active">Our</div>
                        <div class="h-title splitting-text-anim-2 scroll-animate" data-splitting="chars" data-animate="active">blog-Categories</div>
                    </div>

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
                    <div class="archive-items row">

                    <?php
                    
                        $categories = "SELECT * FROM categories WHERE  status = '0' Limit 6 ";
                        $categories_run = mysqli_query($con,$categories);

                        if(mysqli_num_rows($categories_run) > 0){

                                foreach($categories_run as $categoriesItems){
                    ?>

                    <div class="archive-item scrolla-element-anim-1 scroll-animate col-md-6" data-animate="active">
                        <div class="image">
                        <a href="category-posts?title=<?= $categoriesItems['slug']  ?>">
                            <img src="<?='./admin/uploads/'.$categoriesItems['image'];?>" alt="" />
                        </a>
                        </div>
                        <div class="desc">
                        <div class="category"><?= $categoriesItems['name']  ?> <span>/ <?=date('d-M-Y',strtotime($categoriesItems['created_at']));?> </span></div>
                        <div class="title text-white">
                            <a class="text-white" href="category-posts?title=<?= $categoriesItems['slug']  ?>"><?= $categoriesItems['small_desc']  ?></a>
                        </div>
                        <div class="text text-white">
                            <?= $categoriesItems['description']  ?>
                        </div>
                        <div class="readmore">
                            <a href="category-posts?title=<?= $categoriesItems['slug']  ?>" class="btn-link">See Posts</a>
                        </div>
                        </div>
                    </div>

                    <?php }} ?>

                    </div>


                </div>

            </div>
        </div>
    </div>

</div>









<?php    
@include('inc/footer.php');
@include('inc/script.php');
?>