<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php
        // MESSAGE
        $error = $this->errors;
        if (!empty($error)) {
            echo $message = $error;
        } else {
            echo $message = HTML::showMessage();
        }
        $dataForm   = $this->arrParam['form'];
        $module     = $this->arrParam['module'];
        $controller = $this->arrParam['controller'];
        $action     = $this->arrParam['action'];

        if(isset($this->arrParam['id'])){
            $action .= '&id='.$this->arrParam['id'];
            $inputID       = Helper::cmsInput('text', 'form[id]', 'form[id]', 'form-control form-control-sm', $dataForm['id'], null, null, 'readonly');
            $rowID         = Helper::cmsRowForm('ID', $inputID, false, 'id', 'col-sm-2 col-form-label text-sm-right');
        }
        
        // Input
        $inputName         = Helper::cmsInput('text', 'form[name]', 'form[name]', 'form-control form-control-sm', $dataForm['name'], null, null);
        $inputOrdering     = Helper::cmsInput('number', 'form[ordering]', 'form[ordering]', 'form-control form-control-sm', $dataForm['ordering'], null, null);
        $inputToken        = Helper::cmsInput('hidden', 'form[token]', 'form[token]', null, time());

        // Select Box
        $arrStatus   = [
            ['name'  => '- Select Status -', 'id' => 'default'],
            ['name'  => 'Active', 'id' => 'active'],
            ['name'  => 'Inactive', 'id' => 'inactive']
        ];
        $arrGroupACP = [
            ['name'  => '- Select Group ACP -', 'id' => 'default'],
            ['name'  => 'Yes', 'id' => '1'],
            ['name'  => 'No', 'id' => '0']
        ];
        $selectboxStatus   = HTML::createSelectBox($arrStatus, 'form[status]', 'custom-select custom-select-sm', 'width: unset', null, null, $dataForm['status']);
        $selectboxGroupACP = HTML::createSelectBox($arrGroupACP, 'form[group_acp]', 'custom-select custom-select-sm', 'width: unset', null, null, $dataForm['group_acp']);
        // Row
        $rowStatus         = Helper::cmsRowForm('Status', $selectboxStatus, false, 'status', 'col-sm-2 col-form-label text-sm-right');
        $rowGroupACP       = Helper::cmsRowForm('Group ACP', $selectboxGroupACP, false, 'group_acp', 'col-sm-2 col-form-label text-sm-right');
        $rowName           = Helper::cmsRowForm('Name', $inputName, false, 'name', 'col-sm-2 col-form-label text-sm-right required');
        $rowOrdering       = Helper::cmsRowForm('Ordering', $inputOrdering, false, 'ordering', 'col-sm-2 col-form-label text-sm-right');
        // Link Button
        $linkSave          = URL::createLink($module, $controller, $action, ['type' => 'save']);
        $linkSavedAndNew   = URL::createLink($module, $controller, $action, ['type' => 'save-new']);
        $linkSavedAndClose = URL::createLink($module, $controller, $action, ['type' => 'save-close']);
        $linkCancel        = URL::createLink($module, $controller, 'index');
        // Button
        $btnSave           = Helper::cmsButton('noIcon', 'Save', null, null, 'btn btn-sm btn-success mr-1', $linkSave);
        $btnSavedAndNew       = Helper::cmsButton('noIcon', 'Save & New', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndNew);
        $btnSavedAndClose  = Helper::cmsButton('noIcon', 'Save & Close', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndClose);
        $btnCancel           = Helper::cmsButton('noIcon', 'Cancel', null, null, 'btn btn-sm btn-danger mr-1', $linkCancel);
        ?>

        <form action="#" method="post" class="mb-0" id="admin-form">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <?php echo $rowID . $rowName . $rowStatus . $rowGroupACP . $rowOrdering . $inputToken; ?>
                </div>

                <div class="card-footer">
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <?php echo $btnSave . $btnSavedAndNew . $btnSavedAndClose . $btnCancel; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->