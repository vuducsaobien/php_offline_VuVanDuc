<?php
// HEAD
require_once 'elements/head.php';

$dataForm = $userInfo;
if($this->arrParam['form']['token'] > 0 ) $dataForm = $this->arrParam['form'];

// Input
$inputEmail         = Helper::cmsInput('text', 'form[email]', 'form[email]', 'form-control', $dataForm['email'], null, null, 'readonly');
$inputFullName     = Helper::cmsInput('text', 'form[fullname]', 'form[fullname]', 'form-control', $dataForm['fullname']);
$inputPhone     = Helper::cmsInput('number', 'form[phone]', 'form[phone]', 'form-control', $dataForm['phone']);
$inputAddress     = Helper::cmsInput('text', 'form[address]', 'form[address]', 'form-control', $dataForm['address']);
$inputToken        = Helper::cmsInput('hidden', 'form[token]', 'form[token]', null, time());

// Row
$RowEmail         = HTML_Frontend::cmsRowForm('Email', $inputEmail, false, 'email', null, 'form-group');
$RowFullName       = HTML_Frontend::cmsRowForm('Họ Tên', $inputFullName, false, 'fullname', null, 'form-group');
$RowPhone           = HTML_Frontend::cmsRowForm('Số Điện Thoại', $inputPhone, false, 'phone', 'required', 'form-group');
$RowAddress       = HTML_Frontend::cmsRowForm('Địa Chỉ', $inputAddress, false, 'address', null, 'form-group');
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
							<?php echo $RowEmail . $RowFullName . $RowPhone .$RowAddress .$inputToken;?>
							<button type="submit" id="submit" name="submit" value="Cập nhật thông tin" class="btn btn-solid btn-sm">Cập nhật thông tin</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>