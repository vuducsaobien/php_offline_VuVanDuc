<?php 
    include_once ('html/data.php'); 
    $menuCurrent = basename($_SERVER['PHP_SELF'], ".php");
    $menuCurrent = $menuCurrent . '.php';

    foreach ($arrMenu as $keyMenuLV1 => $menuLV1){
        // echo '<pre>';
        // print_r($menuLV1['name']);
        // echo '</pre>';
        if ($menuCurrent == 'index.php'){
            $breadcrumb = '<a href="index.php">Home</a>';
        } else {
            echo $menuCurrent;
            $breadcrumb = '<a href="index.php">Home</a>';
            $breadcrumb .= '<span>    >>>>     </span>';
            $breadcrumb .= sprintf('<span>%s</span>' , $menuLV1['name']  ) ;
        }
    }
?>

    <div class="breadcrumb">
        <?php
        echo $breadcrumb;
        ?>
    </div>
