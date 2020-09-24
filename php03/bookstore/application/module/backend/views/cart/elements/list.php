<?php
// Input
$inputHiddenSortField = Helper::cmsInput('hidden', 'sort_field', null, null, '', null, null);
$inputHiddenSortOrder = Helper::cmsInput('hidden', 'sort_order', null, null, '', null, null);
$inputCheckAll        = Helper::cmsInput('checkbox', 'check-all', 'check-all', 'custom-control-input');
// Button
$btnReload            = Helper::cmsButton('add', null, null, 'button', 'btn btn-tool', $linkReload, null, 'fas fa-sync');
$btnApply	          = Helper::cmsButton('apply', 'Apply', 'bulk-apply', null,  'btn btn-sm btn-info');

$arrAction = [
    'default'        => '- Bulk Action -', 
    'multi-delete'   => 'Multi Delete', 
    'multi-active'   => 'Multi Active', 
    'multi-inactive' => 'Multi Inactive',
    // 'multi-ordering' => 'Multi Ordering'
];
$selectboxAction = Helper::cmsSelectbox('bulk-action', $arrAction, $this->arrParam['bulk-action'], 'custom-select custom-select-sm mr-1', 'width: unset', 'bulk-action');
$checkAll        = Helper::cmscheckAll($inputCheckAll);

?>
<div class="card card-info card-outline">
    <div class="card-header">
        <h4 class="card-title">List</h4>
        <div class="card-tools">
            <?php echo $btnReload ;?>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <!-- Control -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
            <div class="mb-1"><?php echo $selectboxAction . $btnApply ;?></div>
        </div>
        
        <!-- List Content -->
        <form action="#" method="post" class="table-responsive" id="form-table" name="form-table">
            <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                <thead>
                    <tr>
                        <!-- CHECK ALL -->
                        <th class="text-center"><?= $checkAll ;?></th>
                        <th class="text-center"><?= $lblID ;?></th>
                        <th class="text-center"><?= $lblName ;?></th>
                        <th class="text-center"><?= $lblStatus ;?></th>
                        <th>Info</th>

                        <th class="text-center"><?= $lblCreated ;?></th>
                        <th class="text-center"><?= $lblModified ;?></th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tbody><?php echo $xhtml ;?></tbody>
            </table>
            <div><?php echo $inputHiddenSortField .$inputHiddenSortOrder;?></div>
        </form>
    </div>
    <div class="card-footer clearfix"><?php echo $paginationHTML ;?></div>
</div>

