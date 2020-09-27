<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?php
            $dataForm       = $this->arrParam['form']; 
            $module         = $this->arrParam['module'];
            $controller     = $this->arrParam['controller'];
            $action         = $this->arrParam['action'];
            $userInfo       = Session::get('user')['info'];
            
            $inputID        = '';    
            $readonly       = '';
            $required       = 'required';
            if (isset($this->arrParam['id']) || $dataForm['id']) {
                if($this->arrParam['id'] == $userInfo['id']){
                    URL::redirect('backend', 'dashboard', 'index');
                }
                $inputID       = Helper::cmsInput('text', 'form[id]', 'form[id]', 'form-control form-control-sm', $dataForm['id'], null, null, 'readonly');
                $rowID         = Helper::cmsRowForm('ID', $inputID, false, 'id', 'col-sm-2 col-form-label text-sm-right');
                $readonly      = 'readonly';
                $required      = '';   
            }else{
                $inputPassword  = Helper::cmsInput('text', 'form[password]', 'form[password]', 'form-control form-control-sm', $dataForm['password'], null, null, $readonly);
                $rowPassword    = Helper::cmsRowForm('Password', $inputPassword, false, 'form[password]', 'col-sm-2 col-form-label text-sm-right required');          
            }

            // Input
            $inputUserName     = Helper::cmsInput('text', 'form[username]', 'form[username]', 'form-control form-control-sm', $dataForm['username'], null, null, $readonly);
            $inputEmail        = Helper::cmsInput('text', 'form[email]', 'form[email]', 'form-control form-control-sm', $dataForm['email'], null, null, $readonly);
            $inputFullName     = Helper::cmsInput('text', 'form[fullname]', 'form[fullname]', 'form-control form-control-sm', $dataForm['fullname']);
            $inputToken        = Helper::cmsInput('hidden', 'form[token]', 'form[token]', null,time());
            // Select Box
            $arrStatus   = [
                ['name'  => '- Select Status -'  , 'id' => 'default'],
                ['name'  => 'Active'             , 'id' => 'active'],
                ['name'  => 'Inactive'           , 'id' => 'inactive']
            ];
            $slbStatus          = HTML::createSelectBox($arrStatus, 'form[status]', 'custom-select custom-select-sm', 'width: unset', null, null, $dataForm['status']);
            $slbGroup	        = Helper::cmsSelectbox('form[group_id]', $this->filterGroup, $dataForm['group_id'], 'custom-select custom-select-sm mr-1', 'width: unset');
            // Row
            $rowUserName	    = Helper::cmsRowForm('Username', $inputUserName, false, 'form[username]', 'col-sm-2 col-form-label text-sm-right '.$required.'');
            $rowEmail		    = Helper::cmsRowForm('Email', $inputEmail, false, 'form[email]', 'col-sm-2 col-form-label text-sm-right '.$required.'');
            $rowFullName	    = Helper::cmsRowForm('Fullname', $inputFullName, false, 'form[fullname]', 'col-sm-2 col-form-label text-sm-right');
            $rowStatus		    = Helper::cmsRowForm('Status', $slbStatus, false, 'status', 'col-sm-2 col-form-label text-sm-right required');
            $rowGroup	        = Helper::cmsRowForm('Group', $slbGroup, false, 'group_id', 'col-sm-2 col-form-label text-sm-right required');
            // Link Button
            $linkSave           = URL::createLink($module, $controller, $action, ['type' => 'save']);
            $linkSavedAndNew    = URL::createLink($module, $controller, $action, ['type' => 'save-new']);
            $linkSavedAndClose  = URL::createLink($module, $controller, $action, ['type' => 'save-close']);
            $linkCancel         = URL::createLink($module, $controller, 'index');
            // Button
            $btnSave	        = Helper::cmsButton('noIcon', 'Save', null, null, 'btn btn-sm btn-success mr-1', $linkSave);
            $btnSavedAndNew	    = Helper::cmsButton('noIcon', 'Save & New', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndNew);
            $btnSavedAndClose   = Helper::cmsButton('noIcon', 'Save & Close', null, null, 'btn btn-sm btn-success mr-1', $linkSavedAndClose);
            $btnCancel	        = Helper::cmsButton('noIcon', 'Cancel', null, null, 'btn btn-sm btn-danger mr-1', $linkCancel);

            // MESSAGE
            $error = $this->errors;
            if (!empty($error)) { echo $message = $error; } else { echo $message = HTML::showMessage(); }
            
        ?>

        <form action="#" method="post" class="mb-0" id="admin-form">
            <div class="card card-info card-outline">
                <div class="card-body">
                        <?php echo $rowID . $rowUserName . $rowEmail . $rowFullName . $rowStatus . $rowGroup . $rowPassword . $inputToken ;?>
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
