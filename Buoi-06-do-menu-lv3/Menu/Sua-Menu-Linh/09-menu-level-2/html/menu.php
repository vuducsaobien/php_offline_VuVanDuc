<?php include_once ('html/data.php');
    $xhtmlMenu = '';
    $menuCurrent = basename($_SERVER['PHP_SELF'], ".php");

    foreach($arrMenu as $keyMenuLV1 => $menuLV1){
        if (isset ($menuLV1['child'])){
            $arrMenuLV2 = $menuLV1['child'];
            $classActive = ($keyMenuLV1 = $menuCurrent) ? 'class="active"' : '';

            if(in_array($menuCurrent, array_keys($arrMenuLV2))) $classActive = 'class="active"';
            $xhtmlMenu     .= sprintf('<li %s><a href="%s">%s</a><ul>' , $classActive , $menuLV1['link'] , $menuLV1['name'] );
            
            foreach($arrMenuLV2 as $keyMenuLV2 => $menuLV2){
                $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>', $menuLV2['link'], $menuLV2['name']);
            }
            
            $xhtmlMenu     .= '</ul></li>';
        } else {
            $classActive = ($keyMenuLV1 = $menuCurrent) ? 'class="active"' : '';
            $xhtmlMenu     .= sprintf('<li %s><a href="%s">%s</a></li>' , $classActive , $menuLV1['link'] , $menuLV1['name'] );
        }
    }
    
 ?>

<div class="menuBackground">
         <div class="center">
            <ul class="dropDownMenu">
                <?php  echo $xhtmlMenu; ?>
            </ul>
         </div>
      </div>





