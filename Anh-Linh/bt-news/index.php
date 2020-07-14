<!DOCTYPE html>
<html lang="en">
  <head>
	  	<?php
		// session_start();
		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';

		require_once 'define.php';
		require_once DIR_HTML .'head.php'; 
		?>
  </head>
  <body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
		<div id="wrapper">
    	<div class="title"></div>
        <div id="form">
			<?php   
			echo '<button><a href='.DIR_HTML.'login.php>Login</a></button>';
			?>		
	</div>
	</div>

		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row d-flex">
					<div class="col-xl-8 py-5 px-md-5">
						<?php require_once DIR_HTML . 'vnexpress.php'; ?>
					</div>

					<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
						<?php 
							require_once DIR_HTML . 'table-gold.php';
							require_once DIR_HTML . 'table-coin.php'; 
						?>
					</div>
				</div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	<?php require_once DIR_HTML .'script.php'; ?>
  </body>
</html>