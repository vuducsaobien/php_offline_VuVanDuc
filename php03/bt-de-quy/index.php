

<?php
function showAll($path, &$newString){
	$data   = scandir($path);

	$newString .= '<ul>';
	foreach ($data as $key => $value){
		
		if ($value != '.' && $value != '..'){
			$dir = "$path/$value";
			$level = 1;
			$doc = '';

			if (is_dir($dir)){ // Điều kiện dừng
				
				$a = explode('/',$dir);

				$level = (count ($a)-2);
				$icon = '<img style="max-width: 20px" src ="images/folder.jpg">';
				$newString .= "<li>$icon: $value-$level" ;

				showAll($dir, $newString);
				$newString .= '</li>';
			} else {
				$extension = pathinfo($value, PATHINFO_EXTENSION);
				$arrayExtension = [
					'doc.jpg' 		=> ['ini' , 'txt'],
					'video.jpg' 	=> ['mp3' , 'mp4'],
					'recycle.jpg' 	=> ['ies']
				];
				
				foreach ($arrayExtension as $key => $valueExtension){
					if( in_array($extension, $valueExtension) ){
						$iconFile = $key;
						break;
					}
				}
				$newString .= '<li><img style="width: 20px" src ="./images/'.$iconFile.'">'. $value .'</li>';

			}
		}
	}
	$newString .= '</ul>';
}



showAll('./data', $newString);
echo $newString;

