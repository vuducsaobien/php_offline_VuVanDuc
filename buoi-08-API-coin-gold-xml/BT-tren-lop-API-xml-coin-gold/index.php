<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    	include_once 'html/head.php';
    ?>
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="index.html">Home</a></li>
					<li><a href="fashion.html">Fashion</a></li>
					<li><a href="travel.html">Travel</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>


          </form>

		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">								
							<div class="col-md-12">
<?php
$urlXML = 'sjc.xml';
$XML = simplexml_load_file($urlXML);
$c = $XML->ratelist->city[0]->item;
$array = (array) $c;
$d = json_encode($array);
// $e = js
$e = json_decode($d , true);
// echo '<pre>';
// print_r($e);
// echo '</pre>';
// giá vàng lấy RSS
//tuoi tre , vnexpress RSS
//Muốn chuyển về 1 mảng [
// 	['name'] => HCM,
// 	['list'] => [ 'buy' => '50.000', 'sell' => 53.000, 'type' => 'SJC nhẫn'];
// ]

?>
								<div class="blog-entry ftco-animate d-md-flex">
									<a href="single.html" class="img img-2" style="background-image: url(images/image_12.jpg);"></a>
									<div class="text text-2 pl-md-4">
			              <h3 class="mb-2"><a href="single.html">You Can't Blame Gravity for Falling in Love</a></h3>
			              <div class="meta-wrap">
											<p class="meta">
			              		<span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
			              		<span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
			              		<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
			              	</p>
		              	</div>
			              <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
			              <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
			            </div>
								</div>
							</div>
			    		</div><!-- END-->
			    		<div class="row">
			          <div class="col">
			            <div class="block-27">
			              <ul>
			                <li><a href="#">&lt;</a></li>
			                <li class="active"><span>1</span></li>
			                <li><a href="#">2</a></li>
			                <li><a href="#">3</a></li>
			                <li><a href="#">4</a></li>
			                <li><a href="#">5</a></li>
			                <li><a href="#">&gt;</a></li>
			              </ul>
			            </div>
			          </div>
			        </div>
			    	</div>
	    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box ftco-animate">
				<?php require_once 'html/box-gold.php'?>
				<?php require_once 'html/box-coin.php'?>


	          </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<?php include_once 'html/script.php'; ?>
  </body>
</html>