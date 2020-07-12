<?php include_once ('html/data.php');

    $xhtmlLV1 = '<ul class="dropDownMenu">';
    $menuCurrent = basename($_SERVER['PHP_SELF'] , ".php");
    foreach ($arrMenu as $keyMenuLV1 => $menuLV1){
        $classActive = '';
        if ($menuCurrent == $keyMenuLV1){
            $classActive = 'active';
        }
        $xhtmlLV1 .= sprintf('<li class="%s"><a href="%s">%s</a></li>', $classActive , $menuLV1['link'] , $menuLV1['name'] );
    }
    $xhtmlLV1 .= '</ul>';
    
 ?>



<div class="menuBackground">
    <div class="center">
        <?php echo $xhtmlLV1; ?>
    </div>
</div>


