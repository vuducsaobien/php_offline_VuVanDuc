<?php
class Helper{
	
	public static function showIconStatus($status){
        $xhtml = '';
        if($status==0){
            $class = 'fas fa-minus-square';
            $color = 'red';
        } else {
            $class = 'fas fa-check';
            $color = 'green';
        }
        $icon = '<i class="'.$class.'" style="color:'.$color.'";></i>';
        $xhtml = $icon;

        return $xhtml;
    }

    // public static function countValue($source, $element, $arrValue){
    //     $xhtml = '';
    //     $count = 0; 

    //     foreach($source as $value){
    //             if($value["$element"]==$arrValue) $count++;
    //     }
    //     return $count;
    // }

    public static function countValue($source, $element, $arrValue){
        $xhtml = '';
        $count = 0; 
        foreach($source as $value){
                if($value["$element"]==$arrValue) $count++;
                ($arrValue==1) ? $name = 'Active' : $name = 'InActive';
        }
        $xhtml = '<span><u>Group '.$name.':</u> '. $count.' groups</span><br>';
        return $xhtml;
    }


    public static function searchPost($postElement){
            $aa = $_POST["$postElement"];

            if($_POST['clear']!=null) $aa = '';
            
            return $aa;
        }

}