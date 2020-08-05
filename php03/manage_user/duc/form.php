<?php
	require_once 'class/Validate.class.php'; 
	require_once 'class/HTML.class.php'; 
	require_once 'connect.php'; 
	session_start();

	$success 	 = '';
	// Khi name, ordering đã đúng(Sau khi check Error). 
	// Giữ lại dữ liệu cho name, ordering
	// $outValidate = $validate->getResult();
	$error 			= '';
	if(isset($_GET['id'])) $id = $_GET['id'];
	
	$action			= $_GET['action'];
	$flagRedirect	= false;
	$titlePage		= '';
	$time			= time();
	
	if($action == 'edit'){
	// $id = mysqli_real_escape_string($id); // Attack ịnection
	// Load info từ file cũ
		$query = "SELECT `name`, `status`, `ordering` FROM `user` WHERE id = '" . $id . "'";
		$outValidate	= $database->singleRecord($query);
		$linkForm		= 'form.php?action=edit&id=' . $id;
		// edit.php?action=edit&id=900 id = 900 ko tồn tại
		if(empty($outValidate)) $flagRedirect	= true;		
		$titlePage		= 'EDIT USER';
	}else if($action == 'add'){
		$linkForm		= 'form.php?action=add';
		$titlePage		= 'ADD USER';
	}else{
		$flagRedirect	= true;
	}
	
	// Redirect page
	if($flagRedirect == true) {
		header('location: error.php');
		exit();
	}
	
	if(!empty($_POST)){
		if($_SESSION['token'] == $_POST['token']){ // refresh page
			unset($_SESSION['token']);
			header('location: ' . $linkForm);
			exit();
		}else{
			$_SESSION['token'] = $_POST['token'];
		}
		
		$source   = array(
			'username' 	=> $_POST['username'],
			'email' 	=> $_POST['email'],
			'password'  => $_POST['password'],
			'birthday'  => $_POST['birthday'],
			'status'	=> $_POST['status'], 
			'ordering'	=> $_POST['ordering'],
			'group_id'   => $_POST['group_id']
		);
		$validate = new Validate($source);
		// $validate = new Validate($_POST);

		// Check error name, ordering
		$validate->addRule('username', 'string', 2, 50);
		$validate->addRule('email', 'email');
		$validate->addRule('password', 'password');
		// $validate->addRule('birthday', 'date', array('start' => '01/01/1980', 'end' => date('d/m/Y', time())) );
		$validate->addRule('birthday', 'date', '01/01/1980', date('d/m/Y', time()) );
		$validate->addRule('status', 'status');
		$validate->addRule('ordering', 'int', 1, 10);
		$validate->addRule('group_id', 'status');

		$validate->run();
		$outValidate = $validate->getResult();

		// Show error name, ordering
		if(!$validate->isValid()){
			$error = $validate->showErrors();
		}else{
			if($action == 'edit'){
				$where = array(array('id', $id));
				$database->update($outValidate, $where);
			}else if($action == 'add'){
				// check error (đã đúng) -> insert vào database
				$database->insert($outValidate);
				// Sau khi Update thành công vào database, giữ lại name, ordering ở Form
				$outValidate = [];
			}
			$success = '<div class="success">Success</div>'; 
		}
	}
	
	// Tạo select box STATUS tự động
	$arrStatus 	= array(2=> 'Select status', 1 => 'Active', 0 => 'Inactive' );
	$status		= HTML::createSelectbox($arrStatus, 'status', @$outValidate['status']);

	// Tạo select box Group_Name tự động

	// C1
	// $query		= "SELECT `id`, `name` FROM `group`";
	// $arrGroup	= $database->listSelectBox($query);
	// $groupID 	= @HTML::createSelectbox($arrGroup, 'group_id', $outValidate['group_id']);

	// C2
	$query		= "SELECT `id`, `name` FROM `group`";
	$groupID 	= $database->createSelectbox($query, 'group_id', @$outValidate['group_id']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title><?php echo $titlePage; ?></title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
</head>
<body>
	<?php
	echo	
		'<div id="wrapper">
			<div class="title">'.$titlePage.'</div>
			<div id="form">
				' . $error. $success . '   
				<form action="'.$linkForm.'" method="post" name="add-form">

					<div class="row">
						<p>User Name</p>
						<input type="text" name="username" value="'.@$outValidate['username'].'">
					</div>
					<div class="row">
						<p>Email</p>
						<input type="text" name="email" value="'.@$outValidate['email'].'">
					</div>
					<div class="row">
						<p>Password</p>
						<input type="password" name="password" value="'.@$outValidate['password'].'">
					</div>
					<div class="row">
						<p>Birthday</p>
						<input type="text" id="birthday" name="birthday" value="'.@$outValidate['birthday'].'">
					</div>

					<div class="row">
						<p>Ordering</p>
						<input type="text" name="ordering" value="'.@$outValidate['ordering'].'">
					</div>

					<div class="row">
						<p>Status</p>
						'.$status.'
					</div>
					

					<div class="row">
						<p>Group ID</p>
						'.$groupID.'
					</div>
					
					<div class="row">
						<input type="submit" value="Save" name="submit">
						<input type="button" value="Cancel" name="cancel" id="cancel-button">
						<input type="hidden" value="'.$time.'" name="token" />
					</div>
													
				</form>    
			</div>
		</div>';
	?>
</body>
</html>
