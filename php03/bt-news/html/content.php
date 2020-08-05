<?php
	$rssTxt	= file_get_contents('data/rss.txt', true);
	$url 	= preg_replace('/\s+/', '', $rssTxt);
	$urlArr = explode('https', $url);
	$a 		= array_shift($urlArr);
	$xhtml 	= '';

	foreach ($urlArr as &$b){
		$b = 'https' . $b;
	}
	foreach ($urlArr as $value){
		$xml   		= simplexml_load_file($value, 'SimpleXMLElement', LIBXML_NOCDATA);
		$xmlArr 	= json_decode(json_encode($xml), 1);
		$channel 	= $xmlArr['channel'];
		$item 		= $channel['item'];

		$i 			= 0;
		foreach ($item as $description){
			if($i == 2) break;
			
			$title = $description['title'];
			$link  = $description['link'];
			$day   = $description['pubDate'];

			if(strrpos($link, 'vnexpress') === false) {
				$pregMatch = '#.*<img src="(.*)" /></a>(.*)<end>#imSU';
				$danhMuc 	= substr($channel['title'],0,-11);
			} else { 
				$pregMatch = '#.*<img src="(.*)" ></a></br>(.*)<end>#imSU'; 
				$danhMuc 	= substr($channel['title'],0,-3);
			}
		
			preg_match_all($pregMatch, $description['description'] . '<end>', $matches);
			$srcImage    = implode($matches[1]);
			$description = implode($matches[2]);

			$xhtml 		.= 	
			'<div class="row pt-md-4">
				<div class="col-md-12">
					<div class="blog-entry ftco-animate d-md-flex">
						<a href= '.$link.' class="img img-2" style="background-image: url( '.$srcImage.')"></a>
						<div class="text text-2 pl-md-4">
							<h3 class="mb-2"><a href='.$link.'>'.$title.'</a></h3>
								<div class="meta-wrap">
									<p class="meta">
										<span><i class="icon-calendar mr-2"></i>'.$day.'</span>
										<span><a href="single.html"><i class="icon-folder-o mr-2"></i>'.$danhMuc.'</a></span>
									</p>
								</div>
							<p class="mb-4">'.$description.'</p>
							<p><a href='.$link.' class="btn-custom">Đọc Thêm <span class="ion-ios-arrow-forward"></span></a></p>
						</div>
					</div>
				</div>
			</div>';
			$i++;
		}
	}
?>

