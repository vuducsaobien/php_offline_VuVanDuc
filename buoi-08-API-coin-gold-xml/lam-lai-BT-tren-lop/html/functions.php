<?php 

//function getImgSrc !CDATA
function getImgSrc($cdata)
{
    $found = preg_match("/img src=\"([^\"]+)\"/", $cdata, $match);
    if ($found)
    {
        return $match[1];
    }
    else
    {
        return FALSE;
    }
}

?>