<?php
$userInfo	    = Session::get('user')['info'];

$id             = $userInfo['id'];
$username       = $userInfo['username'];
$email          = $userInfo['email'];
$fullname       = $userInfo['fullname'];
if(isset($this->Items['id'])){
    $id             = $this->Items['id'];
    $username       = $this->Items['username'];
    $email          = $this->Items['email'];
    $fullname       = $this->Items['fullname'];
}

$newPassword    = Helper::randomString(8);
// Input
$inputNewPass   = Helper::cmsInput('text', 'new-password', null, 'form-control form-control-sm mb-0', $newPassword, null, null, 'readonly');
// Link Button
$linkSave       = URL::createLink($module, $controller, $action, ['type' => 'save', 'id' => $id]);
$linkChangePass = URL::createLink($module, $controller, 'reset_password');
$linkCancel     = URL::createLink('backend', 'user', 'index');
// Button
$btnSave        = Helper::cmsButton('noIcon', 'Save', null, 'submit', 'btn btn-sm btn-success mt-2', $linkSave);
$btnChangePass  = Helper::cmsButton('button', 'Generate Password', 'generatepassword', null, 'btn btn-sm btn-info mt-2 btn-generate-password', $linkChangePass);
$btnCancel      = Helper::cmsButton('noIcon', 'Cancel', null, 'button', 'btn btn-sm btn-danger mt-1', $linkCancel);
// Row
$rowID          = HTML::rowChangePass('p', 'ID', $id);
$rowUserName    = HTML::rowChangePass('p', 'Username', $username);
$rowEmail       = HTML::rowChangePass('p', 'Email', $email);
$rowFullName    = HTML::rowChangePass('p', 'Full Name', $fullname);
$rowNewPass     = HTML::rowChangePass('input', 'New Password', null, $inputNewPass.' '.$btnSave.' '.$btnChangePass.' '.$btnCancel);
?>

<div class="row">
    <div class="col">
        <form action="#" method="post" id="admin-form">
            <div class="card card-info card-outline">
                <div class="card-header"></div>
                <div class="card-body">
                    <?php echo $rowID . $rowUserName . $rowEmail . $rowFullName . $rowNewPass ;?>
                </div>
            </div>
        </form>
    </div>
</div>