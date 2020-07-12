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
/*GIẢI ĐÁP THẮC MẮC VNEXPRESS.NET
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
*/

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