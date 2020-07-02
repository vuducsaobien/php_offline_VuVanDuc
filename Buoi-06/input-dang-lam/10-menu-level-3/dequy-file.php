

<?php
function showAll($path, &$newString){
	$data   = scandir($path);

	$newString .= '<ul>';
	foreach ($data as $key => $value){
		
		if ($value != '.' && $value != '..'){
			$dir = "$path/$value";

			if (is_dir($dir)){ // Điều kiện dừng
				$newString .= "<li>D: $value" ;

				showAll($dir, $newString);
				$newString .= '</li>';
			} else {
				$newString .= "<li>F: $value </li>";
			}

		}

	}
	$newString .= '</ul>';
}

showAll('.', $newString);
echo $newString;

