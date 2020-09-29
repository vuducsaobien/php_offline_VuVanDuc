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
        $lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
        $lblName 		= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
        $lblStatus		= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
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

    if(!empty($this->Items)){
        foreach($this->Items as $item){
            $id 		    = $item['id'];
            $ordering       = $item['ordering'];
            $linkEdit       = URL::createLink($module, $controller, 'form', ['id' => $id]);
            $checkbox       = HTML::showItemCheckbox($id);
            $resultID       = Helper::highLight($searchValue, $item['id']);
            $resultName     = Helper::highLight($searchValue, $item['name']);

            $picture        = '<img src="'.URL_UPLOAD . $controller . DS . '300x124-' . $item['picture'].'">';
            $picturePath    = UPLOAD_PATH . $controller . DS . '300x124-' . $item['picture'];
            if(!file_exists($picturePath)){
                $picture    = '<img src="'.URL_UPLOAD . $controller . DS . '300x124-default.jpg' .'">';
            }

            $linkStatus     = URL::createLink($module, $controller, 'ajaxChangeStatus', ['id' => $id, 'status' => $item['status']]);
            $status	 	    = HTML::showItemState($linkStatus, $item['status'], true);
            $linkSpecial    = URL::createLink($module, $controller, 'ajaxChangeStatus', ['id' => $id, 'special' => $item['special']]);

            $inputOrdering  = Helper::cmsInput('number', "chkOrdering['$id']", $id, 'chkOrdering form-control form-control-sm m-auto text-center', $ordering, null, 'width: 65px', null, $id);
            $created        = HTML::showItemHistory($item['created_by'], $item['created']);
            $modified       = HTML::showItemHistory($item['modified_by'], $item['modified']);

            $btnAction      = HTML::showActionButton($module, $controller, $id);
            $xhtml         .= '
            <tr>
                <td class="text-center">'.$checkbox.'</td>
                <td class="text-center">'.$resultID.'</td>
                <td class="text-center"><a href="'.$linkEdit.'">'.$resultName.'</a></td>
                <td class="text-center">'.$picture.'</td>
                <td class="text-center position-relative">'.$status.'</td>
                <td class="text-center position-relative">'.$inputOrdering.'</td>
                <td class="text-center">'.$created.'</td>
                <td class="text-center modified-'.$id.'">'.$modified.'</td>
                
                <td class="text-center">' . $btnAction . '</td>
            </tr>
            ';
        }
    }else{
        $xhtmlUpdate = '
        <tr>
            <div class="alert alert-success alert-dismissible" id="admin-message">
                <button type="button" class="close p-2" data-dismiss="alert" aria-hidden="true">×</button>
                <p class="mb-0">Danh sách đang cập nhật !!!</p>
            </div>
        </tr>
        ';
    }
?>
<!-- Search & Filter -->
<?php require_once 'elements/search.php' ;?>
<!-- List -->
<?php require_once 'elements/list.php' ;?>
