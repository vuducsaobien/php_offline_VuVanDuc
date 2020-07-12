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

						<?php require_once DIR_HTML . 'vnexpress.php'; ?>
				<?php

				// Provides: You should eat pizza, beer, and ice cream every day
				// echo $phrase  = "You should eat fruits, vegetables, and fiber every day." . '<br>';
				// $healthy = array("fruits", "vegetables", "fiber");
				// $yummy   = array("pizza", "beer", "ice cream");

				// echo $newphrase = str_replace($healthy, $yummy, $phrase);

				// $urlVnexpress = 'https://vnexpress.net/rss/giai-tri.rss';
				// $dataVnexpress = simplexml_load_file($urlVnexpress);
				// $arrayVnexpress = (array) $dataVnexpress;


//Get all tags and their values. CDATA (recursive)
// $xml = simplexml_load_file($urlVnexpress);
// function all_tag($xml){
//     $i=0; $name = "";
//     foreach ($xml as $k){
//         $tag = $k->getName();
//         $tag_value = $xml->$tag;
//         if ($name == $tag){ $i++;    }
//                 $name = $tag;    
//             echo $tag .' '.$tag_value[$i].'<br />';
//         // recursive
//            all_tag($xml->$tag->children());
//     }
// }
// echo $q = all_tag($xml);
//Get all tags and their values. CDATA (recursive)
// $description = $dataVnexpress->channel->item;
// $count = count($description);
// $objectDescription = (object) $description;

// $url = "http://www.ss.lv/lv/real-estate/flats/riga/hand_over/rss/";
// $result = simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
//                                                       // ^^ here
// foreach($result->channel->item as $item) {
//     $title = (string) $item->title;
//     $desc = (string) $item->description;
//     $dom = new DOMDocument($desc);
//     $dom->loadHTML($desc);
//     $bold_tags = $dom->getElementsByTagName('b');
//     foreach($bold_tags as $b) {
//         echo $b->nodeValue . '<br/>';
//     }
// }
// echo '<pre>';
// print_r($result);
// echo '</pre>';

/*If you want CDATA in your object you should use LIBXML_NOCDATA*/
// $xml = simplexml_load_file($urlVnexpress);

// function simplexml_unCDATAise($xml) {
//     $new_xml = NULL;
//     preg_match_all("/\<\!\[CDATA \[(.*)\]\]\>/U", $xml, $args);

//     if (is_array($args)) {
//         if (isset($args[0]) && isset($args[1])) {
//             $new_xml = $xml;
//             for ($i=0; $i<count($args[0]); $i++) {
//                 $old_text = $args[0][$i];
//                 $new_text = htmlspecialchars($args[1][$i]);
//                 $new_xml = str_replace($old_text, $new_text, $new_xml);
//             }
//         }
//     }

//     return $new_xml;
// }
// $xml = simplexml_unCDATAise($xml);

// for ( $i=0; $i <= 50; $i++){
// 	echo '<pre>';
// 	print_r($objectDescription[$i]);
// 	echo '</pre>';
// }

// function &getXMLnode($object, $param) {
// 	foreach($object as $key => $value) {
// 		if(isset($object->$key->$param)) {
// 			return $object->$key->$param;
// 		}
// 		if(is_object($object->$key)&&!empty($object->$key)) {
// 			$new_obj = $object->$key;
// 			$ret = getCfgParam($new_obj, $param);   
// 		}
// 	}
// 	if($ret) return (string) $ret;
// 	return false;
// }
// $param = 'description';
// $t = getXMLnode($objectDescription , $param);

//  exit;
 
				// echo $item = $dataVnexpress->channel->item[0]->{'description'};
				// $arrayItem = (array) $item;

				// $title = $item->title;
				// $day = $item->pubDate;
				// $link = $item->link;
				// $danhMuc = substr($dataVnexpress->channel->title,0,23);
				// $description = $dataVnexpress->channel->item[0]->description;
				// $xml_file_data = simplexml_load_file($urlVnexpress, 'SimpleXMLElement', LIBXML_NOCDATA);
				// echo $item = $dataVnexpress->channel->item[0]->description;
// $xml = simplexml_load_file($urlVnexpress, 'SimpleXMLElement', LIBXML_NOCDATA);
// $hh = (string)$xml->channel->item[0]->description;
// echo $xmlJson = json_encode($xml);
// echo $xmlArr = json_decode($xmlJson, 1);
// $parseFile = simplexml_load_file($urlVnexpress, 'SimpleXMLElement', LIBXML_NOCDATA);
// foreach ($parseFile->channel->item[0]->description as $node ){
// 	echo $node;
// 	}
 // Returns associative array
// $dataTitle = simplexml_load_file($urlVnexpress, 'SimpleXMLElement', LIBXML_NOCDATA);
// <![CDATA[ <a href="https://vnexpress.net/cam-ly-tai-xuat-sau-ba-nam-mat-giong-4127500.html">
// <img src="https://i1-giaitri.vnecdn.net/2020/07/11/CamLyz-1594432901-4833-1594433321.jpg?w=900&h=0&q=100&dpr=1&fit=crop&s=vRgdZYaSpfNEmC2VqFT70Q" >
// </a></br>
// Ca sĩ Cẩm Ly trở lại với show bolero trực tuyến do chồng - nhạc sĩ Minh Vy - thực hiện, sau ba năm cô điều trị mất giọng. ]]>

// $pattern = '#<article class="item-news item-news-common" data-offset="8">(.*)</article>#imsU';
// preg_match_all($pattern, $dataVnexpress, $matches);

// echo $ff = str_replace(array('<![CDATA[' , ']]>') , '' , $item);
// echo $ff['a'];
// echo json_encode($description, true); 
// echo (string) $item -> description;
// $arrayss = (array) $item;
// var_dump((string) $item);

// echo '<pre>';
// print_r($xml_file_data);
// echo '</pre>';
// exit;
				// echo $aa = var_dump((string) $dataVnexpress->channel->item->description);
				// $imgpattern = 'src=".*?"/i';
				// preg_match($imgpattern, $description, $matches);
				// echo $kq = $matches[1];
				// $xml = simplexml_load_file($urlVnexpress, 'SimpleXMLElement',LIBXML_NOCDATA );
				// $item = $dataVnexpress->channel->item[0]->description;
				// preg_match (
				// 	'<![CDATA[.*]]>',
				// 	$item = $xml->channel->item[0]->description,
				// 	$matches
				// );
				// echo $the_matches = $matches;
				// $item = str_replace(array('<![CDATA[' , ']]>') , '' , $item);
				// echo $item = str_replace('<![CDATA[' , '' , $item);
				// echo $tt['img'];
				// foreach ($tt as $key => $value){
				// 	echo $value;
				// } 
				// $gg = $item->title;
				// echo $description = $dataVnexpress->channel->item[0]->description;
				// echo $xmlGGG = str_replace("]]>", "", $xml);
// 				if(!empty($item))
// {
//     $nodes = $item->xpath('//xml/description');
// }
// print_r( $nodes );
// 				print_r( $nodes );
				// $pattern = 'bà';
				// echo preg_match($pattern, $item);
				// echo '<pre>';
				// print_r($item);
				// echo '</pre>';
				/*    
				dd/mm/yy Mẫu mô tả ngày tháng năm
				xxxx@gmail.com Mẫu mô tả các địa chỉ gmail
				*/
				// exit;
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