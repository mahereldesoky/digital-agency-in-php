<?php  
@include('inc/header.php');
@include('inc/navbar.php');
include('./admin/config/config.php');

if(isset($_GET['title'])){
    $slug = mysqli_real_escape_string($con,$_GET['title']);

    $meta_posts = "SELECT slug,meta_title,meta_description,meta_keyword FROM posts WHERE slug='$slug'  LIMIT 1 ";  
    $meta_posts_run = mysqli_query($con, $meta_posts);

    if(mysqli_num_rows($meta_posts_run) > 0){
        $metaPostItem = mysqli_fetch_array($meta_posts_run);

        $page_title = $metaPostItem['meta_title'];
        $meta_descreption = $metaPostItem['meta_description'];
        $meta_keyword = $metaPostItem['meta_keyword'];
    }
    else {
        $page_title = "Post Page";
        $meta_descreption = " Post Page description Blog website";
        $meta_keyword = "php, html , css, javascript";
    }
}
else {

$page_title = "Category Page";
$meta_descreption = " Category Page description Blog website";
$meta_keyword = "php, html , css, javascript";
}
?>

            <?php 
                if(isset($_GET['title'])){
                    $slug = mysqli_real_escape_string($con,$_GET['title']);


                    $posts = "SELECT p. *, a.name AS aname FROM posts p, admin a Where  slug='$slug' and a.id= p.user_id  ";
					 
                    $posts_run = mysqli_query($con,$posts);

                    if(mysqli_num_rows($posts_run) > 0){

                        if(mysqli_num_rows($posts_run) > 0){
                            foreach($posts_run as $postItems){
                                ?>
							<!-- Wrapper -->
							<div class="wrapper">

									<!-- Section Started Heading -->
									<div class="section section-inner started-heading">
										<div class="container">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<?php
														$category_id = $postItems['category_id'];
														$categories = "SELECT *  from categories where id='$category_id' ";
														$categories_run = mysqli_query($con,$categories);

														if(mysqli_num_rows($categories_run) > 0){

																foreach($categories_run as $categoriesItems){
															?>
													<!-- titles -->
													<div class="m-titles">
														<div class="m-category splitting-text-anim-1 scroll-animate" data-splitting="chars" data-animate="active">
															<a href="category-posts?title=<?=$categoriesItems['slug'];?>"><?=$categoriesItems['name'];?></a><em> </em>
														</div>
														<div class="title" style="font-size:large;" >
														
															Added by: <?=$postItems['aname']; ?> / <?=date('d-M-Y',strtotime($postItems['created_at']));?>
														
														</div>
														<?php }} ?>
														<div class="title" style="font-size: x-large;" >
														
															<?=$postItems['name'];?>
														
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>

									<!-- Section Image Large -->
									<div class="section section-inner m-image-large">
										<div class="image">
											<div class="img scrolla-element-anim-1 scroll-animate" data-animate="active" style="background-image: url(<?='./admin/uploads/'.$postItems['image'];?>);">
											</div>
										</div>
									</div>

									<!-- Section Archive -->
									<div class="section section-inner m-archive">
										<div class="container">
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 offset-1">

													<!-- content -->
													<div class="post-content">

														<blockquote>
															<p>
															<?=$postItems['description'];?>
															</p>
															
														</blockquote>

													</div>

													

												
												</div>

											</div>
										</div>
									</div>
								</div>

							</div>
				<?php
						}
					}
					
				}

				else {
					?>
					<h4>No such post found</h4>
					<?php
				}
			}
			else {
				?>
				<h4>No such url found</h4>
				<?php
			}
			?>

<?php    
@include('inc/footer.php');
@include('inc/script.php');
?>
