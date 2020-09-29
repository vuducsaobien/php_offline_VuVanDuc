<?php
// HEAD
require_once 'elements/head.php';

$dataForm       = $this->arrParam['form']; 
if($this->arrParam['form']['token'] > 0 ) $dataForm = $this->arrParam['form'];
// echo '<pre>$userInfo ';
// print_r($userInfo);
// echo '</pre>';

// echo '<pre>$dataForm ';
// print_r($dataForm);
// echo '</pre>';
// Input
// $inputEmail         = Helper::cmsInput('text', 'form[email]', 'form[email]', 'form-control', $dataForm['email'], null, null, 'readonly');
$inputChangePass    = Helper::cmsInput('text', 'form[password]', 'form[password]', 'form-control', $dataForm['password']);
$inputToken        	= Helper::cmsInput('hidden', 'form[token]', 'form[token]', null, time());
$inputOldPass   	= Helper::cmsInput('text', 'form[old-password]', null, 'form-control form-control-sm mb-0', $dataForm['old-password']);
$inputNewPass   	= Helper::cmsInput('text', 'form[new-password]', null, 'form-control form-control-sm mb-0', $dataForm['new-password']);

// Link Button
// $linkSubmit          = URL::createLink($module, $controller, 'changePassword');
$linkCancel     = URL::createLink('frontend', 'user', 'index');

// Button
$btnSubmit 		= Helper::cmsButton('button', 'Cập nhật mật khẩu', 'submit', 'submit', 'btn btn-sm btn-solid ', null, 'Cập nhật mật khẩu');
$btnCancel      = Helper::cmsButton('noIcon', 'Cancel', null, 'button', 'btn btn-sm btn-danger mt-1', $linkCancel);

// Row
// $rowEmail       = HTML_Frontend::cmsRowForm('Email', $inputEmail, 		false, 'email', null, 'form-group');
$rowOldPass     = HTML_Frontend::cmsRowForm('Mật Khẩu Cũ', $inputOldPass, false, 'old-password', null, 'form-group');
$rowNewPass     = HTML_Frontend::cmsRowForm('Mật Khẩu Mới', $inputNewPass, false, 'new-password', null, 'form-group');
// $rowOldPass     = HTML::rowChangePass('input', 'Mật Khẩu Cũ', null, $inputOldPass);
// $rowNewPass     = HTML::rowChangePass('input', 'Mật Khẩu Mới', null, $inputNewPass);

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
							<?php echo $rowOldPass . $rowNewPass . $inputToken;?>
							<?php echo $btnSubmit . ' ' . $btnCancel;?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>