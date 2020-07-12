<!DOCTYPE html>
<html lang="en">
  <head>
	  <?php
	  require_once 'define.php';
	  require_once DIR_HTML .'head.php'; 
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

			<div class="colorlib-footer">
				<h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Andrea <span>Moore</span></a></h1>
				<div class="mb-4">
					<h3>Subscribe for newsletter</h3>
					<form action="#" class="colorlib-subscribe-form">
            <div class="form-group d-flex">
            	<div class="icon"><span class="icon-paper-plane"></span></div>
              <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
          </form>
				</div>
				<p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
						<?php 
						require_once DIR_HTML . 'vnexpress.php';
						// $urlVnexpress = 'https://vnexpress.net/rss/giai-tri.rss';
						// '<a href="https://vnexpress.net/dam-vinh-hung-tinh-tu-ben-ly-nha-ky-4129179.html">
						// <img src="https://i1-giaitri.vnecdn.net/2020/07/12/ly-nha-ky-top.jpg?w=900&h=0&q=100&dpr=1&fit=crop&s=v158dLXvn5_DUQYbWeFHmw" >
						// </a></br>Ca sĩ Đàm Vĩnh Hưng choàng vai, hôn má diễn viên Lý Nhã Kỳ trong buổi giao lưu tối 11/7. ]]>';

						// $urlVnexpress = 'https://vnexpress.net/rss/giai-tri.rss';//9+71+15+47
						// $dataVnexpress = simplexml_load_file($urlVnexpress);
						// $description = $dataVnexpress->channel->item[0]->description;
						// $item = $dataVnexpress->channel->item[0];

						// echo '-leng $description = ' . strlen ($description);
						// echo '<br>';
						// echo '<br>';

						// echo '-leng $link = ' . strlen($link);
						// echo '<br>';
						// echo '$link = ' . $link = $item->link;
						// echo '<br>';

						// echo '-leng $srcIMAGE = ' . strlen($srcImage);
						// echo '<br>';
						// echo '$srcIMAGE = ' . $srcImage = getImgSrc($description);
						// echo '<br>';

						// echo '-leng $content = ' . $leng = 24+strlen($link)+strlen($srcImage)+5;
						// echo '<br>';
						// echo '-$content ='. $content = substr($description,$leng,150);
						// echo '<br>';
						// echo substr($content, 4,100);
						// echo '<br>';
						// echo strlen($content);
						// echo '<br>';
						// echo substr($description,-126,500);
						// echo '<pre>';
						// print_r($item);
						// echo '</pre>';
						?>
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
				
				<?php require_once DIR_HTML . 'table-gold.php'; ?>
				<?php require_once DIR_HTML . 'table-coin.php'; ?>

	            </div>
	          </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php
require_once DIR_HTML .'script.php'; 
?>
    
  </body>
</html>