<?php
// Button
$btnSearch = Helper::cmsButton('button', 'Search', null, 'submit', 'btn btn-sm btn-info');
$btnClear  = Helper::cmsButton('button', 'Clear', 'btn-clear-search', 'button', 'btn btn-sm btn-danger');
$filterCategory	= Helper::cmsSelectbox('filter_category_id', $this->filterCategory, $this->arrParam['filter_category_id'], 'custom-select custom-select-sm mr-1', 'width: unset');
// $filterSpecial	= Helper::cmsSelectbox('filter_special', $this->filterSpecial, $this->arrParam['filter_special'], 'custom-select custom-select-sm mr-1', 'width: unset');

// SELECT BOX GROUP ACP
$arrSpecial = [
    ['name'  => '- Select Special Book -' , 'id' => 'default'],
    ['name'  => 'Yes'                     , 'id' => '1'],
    ['name'  => 'No'                      , 'id' => '0']
];

$filterSpecial   = HTML::createSelectBox($arrSpecial, 'filter_special', 'custom-select custom-select-sm', 'width: unset', null, null, $this->arrParam['filter_special']);


// Input
$inputHiddenModule     = Helper::cmsInput('hidden', 'module', null, null, $module, null, null);
$inputHiddenController = Helper::cmsInput('hidden', 'controller', null, null, $controller, null, null);
$inputHiddenAction     = Helper::cmsInput('hidden', 'action', null, null, $action, null, null);
$inputSearch = Helper::cmsInput('text', 'search', null, 'form-control form-control-sm', $this->arrParam['search'], null, 'min-width: 300px');

// Search Status
$itemsStatusCount = [
    'all'      => $this->countActive + $this->countInactive,
    'active'   => $this->countActive,
    'inactive' => $this->countInactive
];

$currentFilterStatus = $this->arrParam['status'] ?? 'all';
$xhtmlFilterButton = HTML::showFilterButton($this->arrParam, $itemsStatusCount, $currentFilterStatus);

?>
<div class="card card-info card-outline">
    <div class="card-header">
        <h6 class="card-title">Search & Filter</h6>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <div class="row justify-content-between">
            <div class="mb-1">
                <?php echo $xhtmlFilterButton ;?>
            </div>

            <div class="mb-1">
                <form id="filter-bar" name="filter-bar" method="GET" action="">  
                    <?php echo $inputHiddenModule . $inputHiddenController . $inputHiddenAction . $filterSpecial . ' ' . $filterCategory ;?>                        
                </form>
            </div>

            
            <div class="mb-1">
                <form action="" method="GET" id="form_search" name="form_search">
                    <div class="input-group">
                        <?php echo $inputHiddenModule . $inputHiddenController . $inputHiddenAction . $inputSearch ;?>                        
                        <div class="input-group-append">
                            <?php echo $btnSearch . $btnClear;?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
