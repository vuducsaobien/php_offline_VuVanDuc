<?php
$urlXML = 'http://www.sjc.com.vn/xml/tygiavang.xml';
$XMl = simplexml_load_file($urlXML);
echo '<pre>';
print_r($XMl);
echo '</pre>';


?>

<h3 class="sidebar-heading">Giá Vàng</h3>
	              <ul class="categories">
	                <li><a href="#">Fashion <span>(6)</span></a></li>
	                <li><a href="#">Technology <span>(8)</span></a></li>
	                <li><a href="#">Travel <span>(2)</span></a></li>
	                <li><a href="#">Food <span>(2)</span></a></li>
	                <li><a href="#">Photography <span>(7)</span></a></li>
	              </ul>
	            </div>
