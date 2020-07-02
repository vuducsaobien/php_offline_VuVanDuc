<?php include_once ('html/data.php');

    $xhtml = '<ul class="dropDownMenu">';
    $menuCurrent = basename($_SERVER['PHP_SELF'], ".php");
    foreach($arrMenu as $keyMenuLV1 => $menuLV1){
        $classActive = '';
        if ($menuCurrent == $keyMenuLV1){
            $classActive = 'active';
        }
        
        if (isset ($menuLV1['child'])){
            $arrMenuLV2 = $menuLV1['child'];
            $a = array_keys($arrMenuLV2);
            echo $menuCurrent;
            echo '<pre>';
            print_r($a);
            echo '</pre>';
            
            if ( in_array($menuCurrent, $a ) ) $classActive = 'active';
            // if  ( in_array($menuCurrent, array_keys($menuLV2))  )
            $xhtml     .= sprintf('<li class="%s"><a href="%s">%s</a><ul>' , $classActive , $menuLV1['link'] , $menuLV1['name'] );
            
            foreach($arrMenuLV2 as $keyMenuLV2 => $menuLV2){
                $xhtml .= sprintf('<li class="%s"><a href="%s">%s</a></li>', $classActive , $menuLV2['link'], $menuLV2['name']);
            }
            
            $xhtml     .= '</ul></li>';
            
        } else {
            $xhtml     .= sprintf('<li class="%s"><a href="%s">%s</a></li>' , $classActive , $menuLV1['link'] , $menuLV1['name'] );
        }
        
    }
    $xhtml .= '</ul>';
    
 ?>

<div class="menuBackground">
         <div class="center">
            <?php  echo $xhtml; ?>
         </div>
      </div>





