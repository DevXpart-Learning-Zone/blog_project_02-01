<?php include('lib/header.php') ?>
<!--========================== Contant-Area================================-->
<div class="contant-area">
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-md-3 col-sm-4 col-xs-6 sidebar-offcanvas" id="sidebar">
				<!--========================== left-sidebar ================================-->
				<div class="left-sidebar">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Top Reted
										<i class="fa fa-angle-right"></i>
										<i class="fa fa-angle-down"></i>
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<ul>
										<li><a href="#">Lorern ipsum</a></li>
										<li><a href="#">Dolor sit amet</a></li>
										<li><a href="#">Consectetur</a></li>
										<li><a href="#">Adipisicing elit</a></li>
										<li><a href="#">tempor</a></li>
									</ul>
								</div>
							</div>
						</div>



						<?php 
						$stmt = $blog->categoryList();
						$categories = $stmt->fetchAll(PDO::FETCH_OBJ);
						$i = 1;
						foreach ($categories as $category) { ?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTen">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseTen<?php echo $i; ?>"><?php echo $category->cat_name; ?>
										<i class="fa fa-angle-right"></i>
										<i class="fa fa-angle-down"></i>
									</a>
								</h4>
							</div>
							<div id="collapseTen<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
								<div class="panel-body">
									<ul>

										<?php
										$sql    = "select * from tbl_blog where cat_id=:cat_id";
										$blogstmt   =  $db->prepare($sql);
										$blogstmt->bindValue(':cat_id',11);
										$blogstmt->execute();
										$blog_lists = $blogstmt->fetchAll(PDO::FETCH_OBJ);

										foreach ($blog_lists as $blog_list) {  ?>
											<li><a href="#"><?php $blog_list->blog_title; ?></a></li>
										<?php } ?>
										
									</ul>
								</div>
							</div>
						</div>

						<?php $i++; } ?>
					</div>
				</div><!-- left-sidebar -->
			</div>
			<!--========================== main-content ================================-->
			<div class="col-md-6 col-sm-8 col-xs-12">
				<div class="main-content">

					<?php 
					$blogs = $blog->showBlog();

					foreach ($blogs as $blog) { ?>
						<article>
							<div class="post-img">
								<a href="details.php" target="_blank"><img class="img-responsive" src="uploads/blog/<?php echo $blog->image; ?>" alt="Post"/></a>
							</div>
							<a href="details.php" target="_blank" class="btn btn-default btn-sm btn-category" type="submit"><?php echo $blog->cat_name; ?></a>
							<a href="details.php" target="_blank"><h2 class="post-title"><?php echo $blog->blog_title; ?></h2></a>
							<div class="post-meta">
								<span><a href="#"><i class="fa fa-share-alt post-meta-icon"></i> 400 Shares </a></span>
								<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 20 Comments </a></span>
								<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> <?php echo date('M d, Y',strtotime($blog->blog_date)); ?></a></span>
							</div>
							<div class="post-content">
								<?php echo str_replace("&gt;", ">", str_replace("&lt;", "<", $blog->blog_details)) ; ?>
							</div>
						</article>

					<?php } ?>


				</div><!-- main-content -->
				<div class="pagination">
					<nav>
						<ul class="pagination">
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<!--========================== Right-Sidebar ================================-->
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="right-sidebar">
					<div class="righ-sidebar-body">
						<div class="item">
							<a href="#"><h4 class="post-title slide-title">popular posts</h4></a>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-1.jpg" alt="slider"></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">migrant crisis</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-2.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">kraft mac & cheese is ditching signature</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-3.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">denmark passes law banning bestiality</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-4.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">what welearned about microsoft at e3 2015</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-5.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">what welearned about microsoft at e3 2015</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-6.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">what welearned about microsoft at e3 2015</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<a href="#"><h4 class="post-title slide-title">featured posts</h4></a>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-7.jpg" alt="slider"></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">migrant crisis</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-8.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">kraft mac & cheese is ditching signature</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-9.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">denmark passes law banning bestiality</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-10.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">what welearned about microsoft at e3 2015</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-11.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">what welearned about microsoft at e3 2015</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<a href="#"><img src="asset/images/right-post-img-12.jpg" alt="Post"/></a>
								<div class="carousel-caption">
									<a href="#"><h5 class="post-title">what welearned about microsoft at e3 2015</h5></a>
									<div class="post-meta">
										<span><a href="#"><i class="fa fa-calendar-check-o post-meta-icon"></i> april 13, 2015 </a></span>
										<span><a href="#"><i class="fa fa-comments post-meta-icon"></i> 50 </a></span>
									</div>
									<div class="post-content no-border">
										<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-6 post-static">
							<h5 class="post-title">email newsletter</h5>
							<div class="post-content no-border">
								<p>Migrant survivor says Mediterranean shipwreck was like a war scene'.</p>
							</div>
						</div>
						<div class="col-md-12 col-sm-6 email-section">
							<form>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email address">
								<button type="submit" class="btn btn-default btn-xs"><i class="fa fa-paper-plane"></i></button>
							</form>
						</div>
					</div><!-- Righ-sidebar-body -->
				</div><!-- Right-Sidebar -->
			</div>
		</div>
	</div><!-- Container -->
</div><!-- Content-area -->
<?php include("lib/footer.php"); ?>