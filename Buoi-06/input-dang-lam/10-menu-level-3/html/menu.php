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
            $xhtml     .= sprintf('<li class="%s"><a href="%s">%s</a><ul>' , $classActive , $menuLV1['link'] , $menuLV1['name'] ); //About

            foreach($arrMenuLV2 as $keyMenuLV2 => $menuLV2){
                if (isset ($menuLV2['child'])){
                    $arrMenuLV3 = $menuLV2['child'];
                    $xhtml     .= sprintf('<li><a href="%s">%s</a><ul>', $menuLV2['link'] , $menuLV2['name'] ); //Service

                    foreach($arrMenuLV3 as $keyMenuLV3 => $menuLV3){
                        $xhtml .= sprintf('<li><a href="%s">%s</a></li>', $menuLV3['link'], $menuLV3['name']);//Sale Training
                    }
                    $xhtml     .= '</ul></li>';

                } else {
                    $xhtml .= sprintf('<li><a href="%s">%s</a></li>', $menuLV2['link'] , $menuLV2['name'] ); //Company

                }

            }
            $xhtml     .= '</ul></li>'; //About

        } else {
            $xhtml     .= sprintf('<li class="%s"><a href="%s">%s</a></li>' , $classActive , $menuLV1['link'] , $menuLV1['name']);
        }
        
    }
    $xhtml .= '</ul>';
    
 ?>

 

<div class="menuBackground">
    <div class="center">
        <?php  echo $xhtml; ?>
    </div>
</div>





