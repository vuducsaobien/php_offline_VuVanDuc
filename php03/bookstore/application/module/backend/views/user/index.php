<?php
// MESSAGE
    echo HTML::showMessage();
    $userInfo	= Session::get('user')['info'];
    // Pagination
    $paginationHTML = $this->pagination->showPagination(URL::createLink($module, $controller, $action));

    // Link URL
    $module         = $this->arrParam['module'];
    $controller     = $this->arrParam['controller'];
    $action         = $this->arrParam['action'];
    $linkReload     = URL::createLink($module, $controller, $action);
    $linkAdd        = URL::createLink($module, $controller, 'form');

    // Sort
    $columnPost		= $this->arrParam['sort_field'];
    $orderPost		= $this->arrParam['sort_order'];
    $lblName 		= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
    $lblStatus		= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
    $lblOrdering	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
    $lblCreated		= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
    $lblCreatedBy	= Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
    $lblModified	= Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
    $lblModifiedBy	= Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
    $lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);

$searchValue    = $this->arrParam['search'] ?? '';

$xhtml = '';
if(!empty($this->Items)){
    foreach($this->Items as $item){
        $id 		    = $item['id'];
        if($id != $userInfo['id']){
            $ordering       = $item['ordering'];
            $linkEdit       = URL::createLink($module, $controller, 'form', ['id' => $id]);
            $checkbox       = HTML::showItemCheckbox($id);

            $resultID       = Helper::highLight($searchValue, $id);
            $resultUsername = Helper::highLight($searchValue, $item['username']);
            $resultFullname = Helper::highLight($searchValue, $item['fullname']);
            $resultEmail    = Helper::highLight($searchValue, $item['email']);
            $arrInfo        = ['Username' => $resultUsername, 'Full Name' => $resultFullname, 'Email' => $resultEmail];
            $info           = HTML::createInfo($arrInfo);

            $slbGroup	    = Helper::cmsSelectbox('slb_group_id', $this->filterGroup, $item['group_id'], 'custom-select custom-select-sm mr-1', 'width: unset', $id, $id);
            $linkStatus     = URL::createLink($module, $controller, 'changeStatus', ['id' => $id, 'status' => $item['status']]);
            $status	 	    = HTML::showItemState($linkStatus, $item['status']);

            $created      = HTML::showItemHistory($item['created_by'], $item['created']);
            $modified     = HTML::showItemHistory($item['modified_by'], $item['modified']);

            $btnAction      = HTML::showActionButton($module, $controller, $id);

            $xhtml         .= '
            <tr class="'.$readonly.'">
                <td class="text-center">'.$checkbox.'</td>
                <td class="text-center">'.$resultID.'</td>
                <td>'.$info.'</td>
                <td class="text-center position-relative">'.$slbGroup.'</td>
                <td class="text-center">'.$status.'</td>
                <td class="text-center">'.$created.'</td>
                <td class="text-center modified-'.$id.'">'.$modified.'</td>
                <td class="text-center">'.$btnAction.'</td>
            </tr>
            ';
        }
    }
}

?>

<!-- Search & Filter -->
<?php require_once 'elements/search.php' ;?>

<!-- List -->
<?php require_once 'elements/list.php' ;?>
