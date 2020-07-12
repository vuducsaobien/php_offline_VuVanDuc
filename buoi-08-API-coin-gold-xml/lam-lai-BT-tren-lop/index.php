<!DOCTYPE html>
<html lang="en">
  <head>
	  <?php
	  require_once 'define.php';
	  require_once DIR_HTML .'head.php'; 
	  ?>
  </head>
  <body>

	<?php 
		require_once DIR_HTML .'content.php';
		require_once DIR_HTML . 'vnexpress.php';
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

	<?php
	require_once DIR_HTML .'script.php'; 
	?>
    
  </body>
</html>