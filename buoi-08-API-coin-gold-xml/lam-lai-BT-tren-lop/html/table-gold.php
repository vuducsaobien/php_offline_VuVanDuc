<div class="sidebar-box ftco-animate">
<?php
	$urlGold = 'http://www.sjc.com.vn/xml/tygiavang.xml';
	$dataGold = simplexml_load_file($urlGold);
	$att = $dataGold -> ratelist -> city[0] -> item;
	$arrayGold = (array) $att;
	$update = $dataGold -> ratelist -> attributes() -> updated;
	echo '<h3 class="sidebar-heading">!!! Giá VÀNG mới nhất lúc: ' .$update.'</h3>';
?>
	<table>
	<tr>
		<th>Loại Vàng</th>
		<th>Mua Vào (Triệu Đồng)</th>
		<th>Bán Ra (Triệu Đồng)</th>
	</tr>
	
	<?php

		foreach($att as $keyGold => $valueGold){
			$goldName = $valueGold['type'];
			$goldBuy = $valueGold['buy'];
			$goldSell = $valueGold['sell'];

			$rowGold = '<tr>';
			$rowGold .= '<td>' .$goldName .'</td>';
			$rowGold .= '<td>' .$goldBuy .'</td>';
			$rowGold .= '<td>' .$goldSell .'</td>';
			$rowGold 	.= '</tr>';
			echo $rowGold;
		}

	?>
	</table>
</div>
