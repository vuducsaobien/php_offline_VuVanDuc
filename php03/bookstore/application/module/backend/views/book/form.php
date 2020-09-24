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
    $inputID    = '';
    $rowID      = '';
    $picture    = '';
    if(isset($this->arrParam['id'])){
        $action .= '&id='.$this->arrParam['id'];
        $inputID             = Helper::cmsInput('text', 'form[id]', 'form[id]', 'form-control form-control-sm', $dataForm['id'], null, null, 'readonly');
        $rowID               = Helper::cmsRowForm('ID', $inputID, false, 'id', 'col-sm-2 col-form-label text-sm-right');
        $picture             = '<img src="'.UPLOAD_URL . $controller . DS . '98x150-' . $dataForm['picture'].'">';
        $inputHiddenPicture  = Helper::cmsInput('hidden', 'form[hidden_picture]', 'hidden_picture', 'form-control form-control-sm', $dataForm['picture'], null, null);
    }

    // Input
    $inputName          = Helper::cmsInput('text', 'form[name]', 'form[name]', 'form-control form-control-sm', $dataForm['name'], null, null);
    $inputShortDes      = '<textarea id="form[short_description]" name="form[short_description]" value="'.$dataForm['short_description'].'" class="form-control form-control-sm" rows="3"></textarea>';
    $inputDescription   = '<textarea id="form[description]" name="form[description]" value="'.$dataForm['description'].'" class="form-control form-control-sm" rows="9">'.$dataForm['description'].'</textarea>';
    $inputPrice         = Helper::cmsInput('number', 'form[price]', 'form[price]', 'form-control form-control-sm', $dataForm['price'], null, null);
    $inputSaleOff       = Helper::cmsInput('number', 'form[sale_off]', 'form[sale_off]', 'form-control form-control-sm', $dataForm['sale_off'], null, null);  
    $inputPicture       = Helper::cmsInput('file', 'picture', 'picture', 'form-control form-control-sm', $dataForm['picture'], null, null);
    $inputToken         = Helper::cmsInput('hidden', 'form[token]', 'form[token]', null, time());
    // Select Box
    $arrStatus   = [
        ['name'  => '- Select Status -',    'id' => 'default'],
        ['name'  => 'Active',               'id' => 'active'],
        ['name'  => 'Inactive',             'id' => 'inactive']
    ];
    $arrSpecial   = [
        ['name'  => '- Select Special Book -',  'id' => 'default'],
        ['name'  => 'Special',                   'id' => '1'],
        ['name'  => 'Normal',                 'id' => '0']
    ];
    $slbStatus          = HTML::createSelectBox($arrStatus, 'form[status]', 'custom-select custom-select-sm', 'width: unset', null, null, $dataForm['status']);
    $slbCategory	    = Helper::cmsSelectbox('form[category_id]', $this->filterCategory, $dataForm['category_id'], 'custom-select custom-select-sm mr-1', 'width: unset');
    $slbSpecial         = HTML::createSelectBox($arrSpecial, 'form[special]', 'custom-select custom-select-sm', 'width: unset', null, null, $dataForm['special']);

    // Row
    $rowName            = Helper::cmsRowForm('Name', $inputName, false, 'name', 'col-sm-2 col-form-label text-sm-right required required');
    $rowShortDes        = Helper::cmsRowForm('Short Description', $inputShortDes, false, 'short_description', 'col-sm-2 col-form-label text-sm-right');
    $rowDescription     = Helper::cmsRowForm('Description', $inputDescription, false, 'description', 'col-sm-2 col-form-label text-sm-right');
    $rowPrice           = Helper::cmsRowForm('Price', $inputPrice, false, 'price', 'col-sm-2 col-form-label text-sm-right');
    $rowSaleOff         = Helper::cmsRowForm('Sale Off', $inputSaleOff, false, 'sale_off', 'col-sm-2 col-form-label text-sm-right');
    
    $rowCategory        = Helper::cmsRowForm('Category', $slbCategory, false, 'category_id', 'col-sm-2 col-form-label text-sm-right required');
    $rowSpecial         = Helper::cmsRowForm('Special Book', $slbSpecial, false, 'special', 'col-sm-2 col-form-label text-sm-right required');

    $rowStatus          = Helper::cmsRowForm('Status', $slbStatus, false, 'status', 'col-sm-2 col-form-label text-sm-right required');
    $rowPicture         = Helper::cmsRowForm('Choose Picture', $inputPicture . $picture . $inputHiddenPicture, false, 'picture', 'col-sm-2 col-form-label text-sm-right');
    // Link Button
    $linkSave           = URL::createLink($module, $controller, $action, ['type' => 'save']);
    $linkSavedAndNew    = URL::createLink($module, $controller, $action, ['type' => 'save-new']);
    $linkSavedAndClose  = URL::createLink($module, $controller, $action, ['type' => 'save-close']);
    $linkCancel         = URL::createLink($module, $controller, 'index');
    // Button
    $btnSave            = Helper::cmsButton('noIcon', 'Save', null, null, 'btn btn-sm btn-success mr-1', $linkSave);
    $btnSavedAndNew     = Helper::cmsButton('noIcon', 'Save & New', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndNew);
    $btnSavedAndClose   = Helper::cmsButton('noIcon', 'Save & Close', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndClose);
    $btnCancel          = Helper::cmsButton('noIcon', 'Cancel', null, null, 'btn btn-sm btn-danger mr-1', $linkCancel);

?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="#" method="post" class="mb-0" id="admin-form" enctype="multipart/form-data">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <?php echo $rowID . $rowName . $rowShortDes . $rowDescription . $rowPrice . $rowSaleOff . $rowCategory . $rowSpecial .$rowStatus . $rowPicture . $inputToken;?>
                </div>

                <div class="card-footer">
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <?php echo $btnSave . $btnSavedAndNew . $btnSavedAndClose . $btnCancel ;?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->