<?php
    // Link URL
        $module         = $this->arrParam['module'];
        $controller     = $this->arrParam['controller'];
        $action         = $this->arrParam['action'];
        $linkReload     = URL::createLink($module, $controller, $action);
        $linkAdd        = URL::createLink($module, $controller, 'form');
        // Sort
        $columnPost		= $this->arrParam['sort_field'];
        $orderPost		= $this->arrParam['sort_order'];

        $lblID			= Helper::cmsLinkSort('ID Đơn Hàng', 'id', $columnPost, $orderPost);
        $lblName 		= Helper::cmsLinkSort('Username', 'name', $columnPost, $orderPost);
        $lblStatus		= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);

        $lblQuantities	= Helper::cmsLinkSort('Quantities', 'group_acp', $columnPost, $orderPost);
        $lblOrdering	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);

        $lblCreated		= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
        $lblCreatedBy	= Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
        $lblModified	= Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
        $lblModifiedBy	= Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
        // Pagination
        $paginationHTML		= $this->pagination->showPagination(URL::createLink($module, $controller, $action));
        
        // MESSAGE
        echo HTML::showMessage();
    $searchValue = $this->arrParam['search'] ?? '';
$xhtml = '';
if(!empty($this->Items)){
    foreach($this->Items as $key => $value){
        // echo '<pre>$value ';
        // print_r($value);
        // echo '</pre>';
        $arrBookID		= json_decode($value['books']);
        $arrPrice		= json_decode($value['prices']);
        $arrName		= json_decode($value['names']);
        $arrQuantity	= json_decode($value['quantities']);
        $arrPicture		= json_decode($value['pictures']);

        $booksID        = implode(',', $arrBookID);
        $quantities     = implode(',', $arrQuantity);
        $prices         = implode(',', $arrPrice);


        $cartID = $value['id'];
        $date   = date(TIMEDATE_FORMAT, strtotime($value['date']));

        $linkStatus     = URL::createLink($module, $controller, 'ajaxChangeStatus', ['id' => $cartID, 'status' => $value['status']]);
        $status	 	    = HTML::showItemState($linkStatus, $value['status'], true);
        $arrInfo        = ['Books ID' => $booksID, 'Quantities' => $quantities, 'Total Prices' => $prices];
        $info           = HTML::createInfo($arrInfo);

        $created        = HTML::showItemHistory($value['username'], $value['date']);
        $modified       = HTML::showItemHistory($value['modified_by'], $value['modified']);

        $linkEdit       = URL::createLink($module, $controller, 'form', ['id' => $cartID]);
        $checkbox       = HTML::showItemCheckbox($cartID);
        $btnAction      = HTML::showActionButton($module, $controller, $id);


        $totalPrice     = 0;
        foreach($arrBookID as $keyB => $valueB){
            // echo $booksID = $valueB;
            // $arrayID = implode(',', $valueB);

                // echo '<br>';
                // echo $name       = $arrName[$keyB];
                // echo '<pre>$name ';
                // print_r($name);
                // echo '</pre>';
                // echo '<br>';

                // echo $price      = HTML_Frontend::moneyFormat($arrPrice[$keyB]);
                // echo '<br>';

                // echo $quantity   = $arrQuantity[$keyB];
            // echo '<br>';


            // $totalPriceBook     = HTML_Frontend::moneyFormat($arrPrice[$keyB] * $arrQuantity[$keyB]);
            //     $totalPrice         += $arrPrice[$keyB] * $arrQuantity[$keyB];
            //     $totalPriceFormat   = HTML_Frontend::moneyFormat($totalPrice);

            //     $filePicture    = $arrPicture[$keyB];
            //     $folder         = TBL_BOOK;
            //     $pictureDefault = UPLOAD_URL . $folder . DS . '98x150-default.jpg';
            //     $picturePath 	= UPLOAD_URL . $folder . DS . $filePicture;
        
            //     $picture = $picturePath;
            // if(!file_exists($picturePath)) $picture = $pictureDefault;

            //
            // $id 		    = $item['id'];
            // $ordering       = $item['ordering'];

        }

        $xhtml         .= '
        <tr>
            <td class="text-center">'.$checkbox.'</td>
            <td class="text-center">'.$cartID.'</td>
            <td class="text-center"><a href="'.$linkEdit.'">'.$userName.'</a></td>
            <td class="text-center position-relative">'.$status.'</td>
            <td>'.$info.'</td>

            <td class="text-center">'.$created.'</td>
            <td class="text-center">'.$modified.'</td>
              
            <td class="text-center">' . $btnAction . '</td>
        </tr>
        ';

    }
}

?>
<!-- Search & Filter -->
<?php require_once 'elements/search.php' ;?>
<!-- List -->
<?php require_once 'elements/list.php' ;?>
