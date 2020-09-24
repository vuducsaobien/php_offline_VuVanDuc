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
            $userForm   = Session::get('user')['info'];
            $dataForm   = $this->arrParam['form']; 
            $module     = $this->arrParam['module'];
            $controller = $this->arrParam['controller'];
            $action     = $this->arrParam['action'];
            // Input
            $inputUserName     = Helper::cmsInput('text', 'form[username]', 'form[username]', 'form-control form-control-sm', $userForm['username'], null, null, 'readonly');
            $inputEmail        = Helper::cmsInput('text', 'form[email]', 'form[email]', 'form-control form-control-sm', $userForm['email'], null, null, 'readonly');
            $inputFullName     = Helper::cmsInput('text', 'form[fullname]', 'form[fullname]', 'form-control form-control-sm', $userForm['fullname']);
            $inputToken        = Helper::cmsInput('hidden', 'form[token]', 'form[token]', null,time()); 
            $inputID           = Helper::cmsInput('text', 'form[id]', 'form[id]', 'form-control form-control-sm', $userForm['id'], null, null, 'readonly');
            // $inputPassword     = Helper::cmsInput('text', 'form[password]', 'form[password]', 'form-control form-control-sm', $userForm['password'], null, null, 'readonly');
            // Row
            $rowUserName	    = Helper::cmsRowForm('Username', $inputUserName, false, 'form[username]', 'col-sm-2 col-form-label text-sm-right');
            $rowEmail		    = Helper::cmsRowForm('Email', $inputEmail, false, 'form[email]', 'col-sm-2 col-form-label text-sm-right');
            $rowFullName	    = Helper::cmsRowForm('Fullname', $inputFullName, false, 'form[fullname]', 'col-sm-2 col-form-label text-sm-right');
            $rowID              = Helper::cmsRowForm('ID', $inputID, false, 'id', 'col-sm-2 col-form-label text-sm-right');
            // $rowPassword	    = Helper::cmsRowForm('Password', $inputPassword, false, 'form[password]', 'col-sm-2 col-form-label text-sm-right');
            // $arrStatus   = [
            //     ['name'  => '- Select Status -'  , 'id' => 'default'],
            //     ['name'  => 'Active'             , 'id' => 'active'],
            //     ['name'  => 'Inactive'           , 'id' => 'inactive']
            // ];
            // $slbStatus          = HTML::createSelectBox($arrStatus, 'form[status]', 'custom-select custom-select-sm', 'width: unset', null, null, $userForm['status']);
            // $slbGroup	        = Helper::cmsSelectbox('form[group_id]', $this->filterGroup, $userForm['group_id'], 'custom-select custom-select-sm mr-1', 'width: unset');
            // $rowStatus		    = Helper::cmsRowForm('Status', $slbStatus, false, 'status', 'col-sm-2 col-form-label text-sm-right required');
            // $rowGroup	        = Helper::cmsRowForm('Group', $slbGroup, false, 'group_id', 'col-sm-2 col-form-label text-sm-right required');
            // Link Button
            $linkSave           = URL::createLink($module, $controller, $action, ['type' => 'save']);
            $linkSavedAndClose  = URL::createLink($module, $controller, $action, ['type' => 'save-close']);
            // $linkChangePass     = URL::createLink($module, $controller, $action, ['type' => 'change-password']);
            $linkCancel         = URL::createLink($module, 'user', 'index');
            // Button
            $btnSave	        = Helper::cmsButton('noIcon', 'Save', null, null, 'btn btn-sm btn-success mr-1', $linkSave);
            $btnSavedAndClose   = Helper::cmsButton('noIcon', 'Save & Close', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndClose);
            // $btnChangePass      = Helper::cmsButton('noIcon', 'Change Password', null, null, 'btn btn-sm btn-info mr-1', $linkChangePass);
            $btnCancel	        = Helper::cmsButton('noIcon', 'Cancel', null, null, 'btn btn-sm btn-danger mr-1', $linkCancel);
        ?>

        <form action="#" method="post" class="mb-0" id="admin-form">
            <div class="card card-info card-outline">
                <div class="card-body">
                        <?php echo $rowID . $rowUserName . $rowEmail . $rowFullName . $rowStatus . $rowGroup . $rowPassword . $inputToken;?>
                </div>
                
                <div class="card-footer">
                    <div class="col-12 col-sm-8 offset-sm-2">
                        <?php echo $btnSave . $btnSavedAndClose . $btnChangePass . $btnCancel ;?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
