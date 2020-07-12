<?php
	require_once 'define.php';
	require_once DIR_HTML . 'functions.php';
	$urlVnexpress    = 'https://vnexpress.net/rss/giai-tri.rss';
	$dataVnexpress   = simplexml_load_file($urlVnexpress);

	for($i=0; $i <= 4; $i++){

		$item 		 = $dataVnexpress->channel->item[$i];
		$description = $item->description;
		$title 	 	 = $item->title;
		$day 	 	 = $item->pubDate;
		$link 	 	 = $item->link;
		$danhMuc 	 = substr($dataVnexpress->channel->title,0,-3);
		/*
		<a href="https://vnexpress.net/10-oto-it-khach-nhat-viet-nam-thang-6-4129168.html">
		<img src="https://i1-vnexpress.vnecdn.net/2020/07/12/settop_1594513141.jpg?w=900&h=0&q=100&dpr=1&fit=crop&s=9n4HUPNjXrnp_SvrQPQLbw" >
		</a></br>Trong tháng sáu, Granvia là cái tên mới gia nhập thị trường, trong khi Jazz âm thầm rời cuộc chơi.
		*/
		$srcImage    = getImgSrc($description);
		/*24: Các ký hiệu của thẻ tag HTML + 5:Lấy dư ra thẻ <br />;
		$content = substr($description, $lengDescription, 200); 200 Ngắn quá thì cho 300-400
		$newContent = substr($content, 4,200); // 4: Để không xuống dòng
		*/
		$lengDescription = 24 + strlen($link) + strlen($srcImage) + 5;
		$content 		 = substr($description, $lengDescription, 200); 
		$newContent 	 = substr($content, 4,200);
?>

	<div class="row pt-md-4">
		<div class="col-md-12">
			<div class="blog-entry ftco-animate d-md-flex">
				<a href="<?php echo $link?>" class="img img-2" style="background-image: url( <?php echo "$srcImage" ?>)"></a>
				<div class="text text-2 pl-md-4">
					<h3 class="mb-2"><a href="<?php echo $link?>"><?php echo $title?></a></h3>
						<div class="meta-wrap">
							<p class="meta">
								<span><i class="icon-calendar mr-2"></i><?php echo $day?></span>
								<span><a href="single.html"><i class="icon-folder-o mr-2"></i><?php echo $danhMuc?></a></span>
							</p>
						</div>
					<p class="mb-4"><?php echo $newContent?></p>
					<p><a href="<?php echo $link?>" class="btn-custom">Đọc Thêm <span class="ion-ios-arrow-forward"></span></a></p>
				</div>
			</div>
		</div>
	</div>

<?php
	}
?>


