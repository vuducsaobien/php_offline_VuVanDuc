<?php
	require_once 'define.php';
	require_once DIR_HTML . 'functions.php';
	
	$url    		= 'https://tuoitre.vn/rss/giai-tri.rss';
	$data   		= simplexml_load_file($url);
	$xhtml 			= '';

	for($i=0; $i <= 4; $i++){

		$item 				= $data->channel->item[$i];
		$description 		= $item->description;
		$danhMuc 			=  substr($data->channel->title, 0, -11);
		$title 				= $item->title;
		$link 				= $item->link;
		$day 	 	 		= $item->pubDate;
		$image    			= getImgSrc($description);
		$lengDescription 	= 25 + strlen($link) + strlen($image);
		$content 			= substr($description, $lengDescription, 300);
	
		$xhtml .= 	'<div class="row pt-md-4">
						<div class="col-md-12">
							<div class="blog-entry ftco-animate d-md-flex">
								<a href= '.$link.' class="img img-2" style="background-image: url( '.$image.')"></a>
								<div class="text text-2 pl-md-4">
									<h3 class="mb-2"><a href='.$link.'>'.$title.'</a></h3>
										<div class="meta-wrap">
											<p class="meta">
												<span><i class="icon-calendar mr-2"></i>'.$day.'</span>
												<span><a href="single.html"><i class="icon-folder-o mr-2"></i>'.$danhMuc.'</a></span>
											</p>
										</div>
									<p class="mb-4">'.$content.'</p>
									<p><a href='.$link.' class="btn-custom">Đọc Thêm <span class="ion-ios-arrow-forward"></span></a></p>
								</div>
							</div>
						</div>
					</div>';
	}
	echo $xhtml;
?>

