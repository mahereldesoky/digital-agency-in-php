<?php  
@include('inc/header.php');
@include('inc/navbar.php');

include('./admin/config/config.php');


$records = $con->query("select * from posts WHERE status = '0' ");
$nr_of_rows = $records->num_rows;

// Setting the number of rows to display in a page.
$rows_per_page = 2;

// calculating the nr of pages.
$pages = ceil($nr_of_rows / $rows_per_page);

// Setting the start from, value.
$start = 0;

// If the user clicks on the pagination buttons.
if(isset($_GET['page-nr'])){
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows_per_page;
}



?>


	<!-- Wrapper -->
	<div class="wrapper">

		<!-- Section Started Heading -->
		<div class="section section-inner started-heading">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						<!-- titles -->
						<div class="h-titles">
							<div class="h-subtitle red splitting-text-anim-1 scroll-animate" data-splitting="chars" data-animate="active">Our</div>
							<div class="h-title splitting-text-anim-2 scroll-animate" data-splitting="chars" data-animate="active">blog</div>
						</div>

					</div>
				</div>
			</div>
		</div>

    <!-- Section Archive -->
    <div class="section section-inner m-archive">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

            <!-- archive items -->
            <div class="archive-items">

            <?php 
                

                    $posts = "SELECT * FROM posts WHERE status = '0' ORDER BY id LIMIT $start, $rows_per_page ";
                    $posts_run = mysqli_query($con,$posts);

                    if(mysqli_num_rows($posts_run) > 0){

                        if(mysqli_num_rows($posts_run) > 0){
                            foreach($posts_run as $postItems){
                                ?>

                          <div class="archive-item scrolla-element-anim-1 scroll-animate" data-animate="active">
                            <div class="image">
                              <a href="blog-single?title=<?=$postItems['slug']?>">
                                <img src="<?='./admin/uploads/'.$postItems['image'];?>" alt="<?=$postItems['name'];?>" />
                              </a>
                            </div>
                              
                              <div class="desc">
                                <?php
                                  $category_id = $postItems['category_id'];
                                  $category = "SELECT *  from categories where id='$category_id' ";
                                  $category_run = mysqli_query($con,$category);
                                  if(mysqli_num_rows($category_run) > 0){
                                    foreach ($category_run as $categoryItem){
                                ?>
                                <div class="category"><?= $categoryItem['name']; ?> <span><?=date('d-M-Y',strtotime($postItems['created_at']));?></span>
                                <?php
                                  }
                                  }
                                ?>
                              </div>
                              
                              <div class="title">
                                <a href="blog-single?title=<?=$postItems['slug']?>"><?=$postItems['name'];?></a>
                              </div>
                              <div class="text">
                                <?=$postItems['small_desc'];?>
                              </div>
                              <div class="readmore">
                                <a href="blog-single?title=<?= $postItems['slug']?>" class="btn-link">Read more</a>
                              </div>
                            </div>
                          </div>
                          <?php
                            
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


            </div>          

                <div class="pager">
                    <!-- Go to the previous page -->
                    <!-- <?php 
                        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                            ?> <a class="page-numbers next" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>"></a> <?php
                        }else{
                            ?> <a><</a>	<?php
                        }
                    ?> -->
                    
                    <!-- Output the page numbers -->
                    <div class=" ">
                        <?php 
                            if(!isset($_GET['page-nr'])){
                                ?> <a class="page-numbers current" href="?page-nr=1">1</a> <?php
                                $count_from = 2;
                            }else{
                                $count_from = 1;
                            }
                        ?>
                        
                        <!-- current page -->
                        <?php   
                            for ($num = $count_from; $num <= $pages; $num++) {
                                if($num == @$_GET['page-nr']) {
                                    ?> <a class="page-numbers current" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> <?php
                                }else{
                                    ?> <a class="page-numbers " href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> <?php
                                }
                            }
                        ?>
                    </div>
                    
                    <!-- Go to the next page -->
                    <?php 
                        if(isset($_GET['page-nr'])){
                            if($_GET['page-nr'] >= $pages){
                                ?> <a class="page-numbers next"><i class="icon-arrow"></i></a> <?php
                            }else{
                                ?> <a class="page-numbers next" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>"><i class="icon-arrow"></i></a> <?php
                            }
                        }else{
                            ?> <a class="page-numbers next" href="?page-nr=2"></a> <?php
                        }
                    ?>
                    
                    <!-- Go to the last page -->
                    <!-- <a href="?page-nr=<?php echo $pages ?>">Last</a> -->
                </div>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">

            <!-- sidebar -->
            <div class="col__sedebar scrolla-element-anim-1 scroll-animate" data-animate="active">
              <div class="content-sidebar">
                <aside class="widget-area">

                  <!-- <section class="widget widget_search">
                    <h2 class="widget-title">Search</h2>
                    <form class="search-form">
                      <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" class="search-field" placeholder="Search" value="" />
                      </label>
                      <input type="submit" class="search-submit" value="Search" />
                    </form>
                  </section> -->

                   

                  <section class="widget widget_categories">
                    <a href="blog-category"><h2 class="widget-title">All Categories</h2></a>
                   
                    <ul>
                    <?php
                      $category = "SELECT * from categories WHERE status = '0' limit 5 ";
                      $category_run = mysqli_query($con,$category);
                      if(mysqli_num_rows($category_run) > 0){
                        foreach ($category_run as $categoryItems){
                    ?>
                      <li><a href="category-posts?title=<?= $categoryItems['slug'];?>"><?= $categoryItems['name'];?></a></li>
                    <?php 
                        }
                      }
                    ?>
                    </ul>
                    
                  </section>
                 

                  <section class="widget widget_recent_entries">
                    <h2 class="widget-title">Recent Posts</h2>
                    <?php  
                      $homePosts = "SELECT * FROM posts WHERE status = '0' ORDER BY id Limit 5";
                      $homePosts_run = mysqli_query($con, $homePosts);

                      
                      if(mysqli_num_rows($homePosts_run) > 0){
                      foreach($homePosts_run as $homePostsItem){
                    ?>
                    <ul>
                      <li><a href="blog-single?title=<?=$homePostsItem['slug'] ; ?>"><?= $homePostsItem['name']  ?></a></li>
                    </ul>
                    <?php
                        }

                        }

                    ?>
                  </section>

                  </section> 

                  <!-- <section class="widget widget_recent_comments">
                    <h2 class="widget-title">Recent Comments</h2>
                    <ul>
                      <li class="recentcomments">
                        <span class="comment-author-link">
                          <a href="#" class="url">John Doe</a>
                        </span> on <a href="#">How to Photograph Food without a Tripod</a>
                      </li>
                      <li class="recentcomments">
                        <span class="comment-author-link">
                          <a href="#" class="url">John Doe</a>
                        </span> on <a href="#">How to Photograph Food without a Tripod</a>
                      </li>
                      <li class="recentcomments">
                        <span class="comment-author-link">
                          <a href="#" class="url">James Flick</a>
                        </span> on <a href="#">My Style My Choise Lighthouse Long White Jacket</a>
                      </li>
                    </ul>
                  </section> -->

                </aside>
              </div>
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