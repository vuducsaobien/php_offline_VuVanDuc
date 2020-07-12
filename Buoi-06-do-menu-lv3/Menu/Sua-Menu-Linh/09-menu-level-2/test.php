<?php include_once ('html/data.php');

    echo "<pre>";
    echo print_r($arrMenu);
    echo "</pre>";
    foreach ($arrMenu as $keyMenuLV2 => $menuLV2){
        if (isset ($menuLV2['child'])){
            echo "1";
        } else {
            echo "0o0o";
        }
    }
