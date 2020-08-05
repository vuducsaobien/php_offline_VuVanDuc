<?php include_once ('html/data.php');
    $xhtmlMenu = '';
    $menuCurrent = basename($_SERVER['PHP_SELF'], ".php");
    foreach($arrMenu as $keyMenuLV1 => $menuLV1){
        if (isset ($menuLV1['child'])){
            $arrMenuLV2 = $menuLV1['child'];
            $classActive = '';

            // Lấy danh sách key của menuLV2
            $arrKeyMenuLV2 = array_keys($arrMenuLV2);
            if(in_array($menuCurrent, $arrKeyMenuLV2)) $classActive = 'class="active"';

            foreach($arrMenuLV2 as $menuLV2){
                if (isset ($menuLV2['child'])){
                // Lấy danh sách key của menuLV3
                $arrKeyMenuLV3 = array_keys($menuLV2['child']);
                    if(in_array($menuCurrent, $arrKeyMenuLV3)) $classActive = 'class="active"';
                }
            }

            $xhtmlMenu     .= sprintf('<li %s><a href="%s">%s</a><ul>' , $classActive , $menuLV1['link'] , $menuLV1['name'] );

            foreach ($menuLV1['child'] as $keyMenuLV2 => $menuLV2){
                if (isset ($menuLV2['child'])){
                    $xhtmlMenu     .= sprintf('<li><a href="%s">%s</a><ul>' , $menuLV2['link'] , $menuLV2['name'] );

                    //Menu Con
                    foreach ($menuLV2['child'] as $keyMenuLV3 => $menuLV3){
                        $xhtmlMenu     .= sprintf('<li><a href="%s">%s</a></li>' , $menuLV3['link'] , $menuLV3['name'] );
                    }

                    $xhtmlMenu     .= '</ul></li>';
                } else {
                    $xhtmlMenu     .= sprintf('<li><a href="%s">%s</a><ul>' , $menuLV2['link'] , $menuLV2['name'] );
                }
            }
        $xhtmlMenu .= '</ul></li>';
        } else{
            $classActive = ($keyMenuLV1 = $menuCurrent) ? 'class="active"' : '';
            $xhtmlMenu  .= sprintf('<li %s><a href="%s">%s</a></li>' , $classActive , $menuLV1['link'] , $menuLV1['name'] );
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





