<?php
$message	= '';
switch ($this->arrParam['type']) {
	case 'register-success':
		$message	= 'Tài khoản của bạn đã được tạo thành công. Xin vui lòng chờ kích hoạt từ người quản trị!';
		break;
	case 'not-permission':
		$message	= 'Bạn không có quyền truy cập vào chức năng đó!';
		break;
	case 'not-url':
		$message	= 'Đường dẫn không hợp lệ!';
		break;
}
Session::delete('user');

?>

<div class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="page-title">
					<!-- <h2 class="py-2">Không tìm thấy trang yêu cầu</h2> -->
				</div>
			</div>
		</div>
	</div>
</div>
<section class="p-0">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="error-section">
					<!-- <h1>404</h1> -->
					<h3><?php echo $message; ?></h3>
					<a href="index.php?module=backend&controller=index&action=login" class="btn btn-solid">Quay lại trang chủ</a>
				</div>
			</div>
		</div>
	</div>
</section>