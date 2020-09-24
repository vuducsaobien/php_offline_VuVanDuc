<?php
// HEAD
require_once 'elements/head.php';

$dataForm = $userInfo;
if($this->arrParam['form']['token'] > 0 ) $dataForm = $this->arrParam['form'];

// Input
$inputEmail         = Helper::cmsInput('text', 'form[email]', 'form[email]', 'form-control', $dataForm['email'], null, null, 'readonly');
$inputChangePass     = Helper::cmsInput('text', 'form[password]', 'form[password]', 'form-control', $dataForm['password']);
$inputToken        = Helper::cmsInput('hidden', 'form[token]', 'form[token]', null, time());

// Row
$RowEmail         = HTML_Frontend::cmsRowForm('Email', $inputEmail, false, 'email', null, 'form-group');
$RowChangePass       = HTML_Frontend::cmsRowForm('Mật Khẩu Mới', $inputChangePass, false, 'fullname', null, 'form-group');

// Button
$btnSubmit = Helper::cmsButton('button', 'Cập nhật mật khẩu', 'submit', 'submit', 'btn btn-solid btn-sm', null, 'Cập nhật mật khẩu');


$newPassword    = Helper::randomString(8);
// Input
$inputNewPass   = Helper::cmsInput('text', 'new-password', null, 'form-control form-control-sm mb-0', $newPassword, null, null, 'readonly');
// Link Button
// $linkSave       = URL::createLink($module, $controller, $action, ['type' => 'save', 'id' => $id]);
// $linkChangePass = URL::createLink($module, $controller, 'reset_password');
// $linkCancel     = URL::createLink('backend', 'user', 'index');

// Button
// $btnSave        = Helper::cmsButton('noIcon', 'Save', null, 'submit', 'btn btn-sm btn-success mt-2', $linkSave);
$btnChangePass  = Helper::cmsButton('button', 'Generate Password', 'generatepassword', null, 'btn btn-sm btn-info mt-2 btn-generate-password', $linkChangePass);
// $btnCancel      = Helper::cmsButton('noIcon', 'Cancel', null, 'button', 'btn btn-sm btn-danger mt-1', $linkCancel);

// Row
// $rowID          = HTML::rowChangePass('p', 'ID', $id);
// $rowUserName    = HTML::rowChangePass('p', 'Username', $username);
// $rowEmail       = HTML::rowChangePass('p', 'Email', $email);
// $rowFullName    = HTML::rowChangePass('p', 'Full Name', $fullname);
// $rowNewPass     = HTML::rowChangePass('input', 'New Password', null, $inputNewPass.' '.$btnSave.' '.$btnChangePass.' '.$btnCancel);

?>

<!-- TITLE -->
<?php require_once 'elements/title.php' ;?>

<section class="faq-section section-b-space">
	<div class="container">
		<div class="row">

			<!-- MENU -->
			<?php require_once 'elements/menu.php' ;?>

			<div class="col-lg-9">
				<div class="dashboard-right">
					<div class="dashboard">
						<form action="" method="post" id="admin-form" class="theme-form">
							<?php if (!empty($error)) { echo $message = $error;} else { echo $message = HTML::showMessage();}?>
							<?php echo $RowEmail . $RowChangePass . $inputToken;?>
							<?php echo $btnChangePass . ' ' . $btnSubmit;?>

							<!-- <button type="submit" id="submit" name="submit" value="Cập nhật mật khẩu" class="btn btn-solid btn-sm">Cập nhật mật khẩu</button> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>