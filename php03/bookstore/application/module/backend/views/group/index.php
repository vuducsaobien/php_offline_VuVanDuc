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
    $lblName 		= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
    $lblStatus		= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
    $lblGroupACP	= Helper::cmsLinkSort('Group ACP', 'group_acp', $columnPost, $orderPost);
    $lblOrdering	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
    $lblCreated		= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
    $lblCreatedBy	= Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
    $lblModified	= Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
    $lblModifiedBy	= Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
    $lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
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

            $linkStatus     = URL::createLink($module, $controller, 'ajaxChangeStatus', ['id' => $id, 'status' => $item['status']]);
            $status	 	    = HTML::showItemState($linkStatus, $item['status'], true);
           
            $linkACP        = URL::createLink($module, $controller, 'ajaxChangeStatus', ['id' => $id, 'group_acp' => $item['group_acp']]);
            $group_acp	    = HTML::showItemState($linkACP, $item['group_acp'], true);

            $inputOrdering  = Helper::cmsInput('number', "chkOrdering['$id']", $id, 
            'chkOrdering form-control form-control-sm m-auto text-center position-relative', $ordering, null, 'width: 65px', null, $id);
            $created        = HTML::showItemHistory($item['created_by'], $item['created']);
            $modified       = HTML::showItemHistory($item['modified_by'], $item['modified']);

            $btnAction      = HTML::showActionButton($module, $controller, $id);
            $xhtml         .= '
            <tr>
                <td class="text-center">'.$checkbox.'</td>
                <td class="text-center">'.$resultID.'</td>
                <td class="text-center"><a href="'.$linkEdit.'">'.$resultName.'</a></td>

                <td class="text-center position-relative">'.$status.'</td>
                <td class="text-center position-relative">'.$group_acp.'</td>

                <td class="text-center position-relative">'.$inputOrdering.'</td>

                <td class="text-center">'.$created.'</td>
                <td class="text-center modified-'.$id.'">'.$modified.'</td>
                
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
