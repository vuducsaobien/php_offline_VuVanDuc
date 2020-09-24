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
// echo '<pre>$this->Items ';
// print_r($this->Items);
// echo '</pre>';
$xhtml = '';
if(!empty($this->Items)){
    foreach($this->Items as $key => $value){
        echo '<pre>$value ';
        print_r($value);
        echo '</pre>';
        $cartID = $value['id'];
        $date   = date(TIMEDATE_FORMAT, strtotime($value['date']));

        $arrBookID		= json_decode($value['books']);
        $arrPrice		= json_decode($value['prices']);
        $arrName		= json_decode($value['names']);
        $arrQuantity	= json_decode($value['quantities']);
        $arrPicture		= json_decode($value['pictures']);
        
        $tableContent	= '';
        $totalPrice     = 0;
        foreach($arrBookID as $keyB => $valueB){
            echo $valueB;
            echo '<br>';
            echo $name       = $arrName[$keyB];
            // echo '<pre>$name ';
            // print_r($name);
            // echo '</pre>';
            echo '<br>';

            // echo $price      = HTML_Frontend::moneyFormat($arrPrice[$keyB]);
            echo '<br>';

            // echo $quantity   = $arrQuantity[$keyB];
            echo '<br>';


            $totalPriceBook     = HTML_Frontend::moneyFormat($arrPrice[$keyB] * $arrQuantity[$keyB]);
            $totalPrice         += $arrPrice[$keyB] * $arrQuantity[$keyB];
            $totalPriceFormat   = HTML_Frontend::moneyFormat($totalPrice);

            $filePicture    = $arrPicture[$keyB];
            $folder         = TBL_BOOK;
            $pictureDefault = UPLOAD_URL . $folder . DS . '98x150-default.jpg';
            $picturePath 	= UPLOAD_URL . $folder . DS . $filePicture;
    
            $picture = $picturePath;
            if(!file_exists($picturePath)) $picture = $pictureDefault;
            
            $tableContent .= '
               
            ';
        }

        $xhtml .= '
            
        ';



    }
}else{
    $xhtml = '
        <section class="p-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="error-section">
                            <h4>Bạn chưa mua sắm gì cả ??</h4>
                            <a href="index.php?module=frontend&controller=index&action=index" class="btn btn-solid">Quay lại trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    ';
}
// if(!empty($this->Items)){
    //     foreach($this->Items as $item){
    //         // echo '<pre>$item ';
    //         // print_r($item);
    //         // echo '</pre>';
    //         $id 		    = $item['id'];
    //         $ordering       = $item['ordering'];
    //         $linkEdit       = URL::createLink($module, $controller, 'form', ['id' => $id]);
    //         $checkbox       = HTML::showItemCheckbox($id);

    //         $resultBooksID       = Helper::highLight($searchValue, $item['id']);
    //         $resultBooksName     = Helper::highLight($searchValue, $item['name']);
    //         $booksPrice            ;

    //         $linkStatus     = URL::createLink($module, $controller, 'ajaxChangeStatus', ['id' => $id, 'status' => $item['status']]);
    //         $status	 	    = HTML::showItemState($linkStatus, $item['status']);

    //         $arrInfo        = ['Books ID' => $resultBooksID, 'Quantities' => $resultBooksName, 'Total Prices' => $resultEmail];
    //         $info           = HTML::createInfo($arrInfo);

    //         $created        = HTML::showItemHistory($item['created_by'], $item['created']);
    //         $modified     = HTML::showItemHistory($item['modified_by'], $item['modified']);


    //         $btnAction      = HTML::showActionButton($module, $controller, $id);
    //         $xhtml         .= '
    //         <tr>
    //             <td class="text-center">'.$checkbox.'</td>
    //             <td class="text-center">'.$resultID.'</td>
    //             <td class="text-center"><a href="'.$linkEdit.'">'.$resultName.'</a></td>

    //             <td class="text-center position-relative">'.$status.'</td>
    //             <td>'.$info.'</td>
    //             <td class="text-center position-relative">'.$modified.'</td>

    //             <td class="text-center">'.$created.'</td>                
    //             <td class="text-center">' . $btnAction . '</td>
    //         </tr>
    //         ';
    //     }
    // }
?>
<!-- Search & Filter -->
<?php require_once 'elements/search.php' ;?>
<!-- List -->
<?php require_once 'elements/list.php' ;?>
