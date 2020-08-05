<?php
	require_once 'connect.php';
	session_start();
	echo '<pre>';
	print_r($_GET);
	echo '</pre>';
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	// MULTI DELETE
	$filterByStatus = '';
	if(isset($_GET['search'])){
		$searchValue = $_GET['search'];
	}

	if(isset($_GET['filter-by-status'])){
		$filterByStatus = $_GET['filter-by-status'];
	}

	if(isset($_GET['clear'])){
		header('location: index.php');
	}
	
	$messageDelete = '';
	if(isset($_POST['token'])){
		if($_SESSION['token'] == $_POST['token']){ // refresh page
			unset($_SESSION['token']);
			header('location: ' . $_SERVER['PHP_SELF']);
			exit();
		}else{
			$_SESSION['token'] = $_POST['token'];
		}
		$checkbox	= $_POST['checkbox'];
		if(!empty($checkbox)){
			$total = $database->delete($checkbox);
			$messageDelete = '<div class="success">Có '.$total.' dòng được xóa!</div>';
		}else{
			$messageDelete = '<div class="notice">Bạn vui lòng chọn vào các dòng muốn xóa!</div>';
		}
	}
	
	$query[] 	= "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
	$query[] 	= "FROM `group` AS `g` LEFT JOIN `user` AS `u` ON `g`.`id` = `u`.`group_id`";
	$query[] 	= "WHERE `g`.`id` > 0"; 

	if(isset($searchValue)){
		$query[] 	= "AND `g`.`name` LIKE '%$searchValue%'  ";
	}

	if($filterByStatus != ''){
		$query[] 	= "AND `g`.`status` = '$filterByStatus'";
	}

	$query[] 	= "GROUP BY `g`.`id`";
	echo $filterByStatus;
	echo $query		= implode(" ", $query);
	
	$list		= $database->listRecord($query);
	$xhtml = '';
	if(!empty($list)){
		$i = 0;
		foreach($list as $item){
			$row	= ($i % 2 == 0) ? 'odd' : 'even';
			$id		= $item['id'];
			$status	= ($item['status']==0) ? 'Inactive' : 'Active';
			$xhtml .= '<div class="row '.$row.'">
			            	<p class="no"><input type="checkbox" name="checkbox[]" value="'.$id.'"></p>
			                <p class="name">'.$item['name'].'</p>
			                <p class="id">'.$id.'</p>
			                <p class="size">'.$status.'</p>
			                <p class="size">'.$item['ordering'].'</p>
			                <p class="size">'.$item['total'].'</p>
			                <p class="action">
			                	<a href="form.php?action=edit&id='.$id.'">Edit</a> |
	                			<a href="delete.php?id='.$id.'">Delete</a>
			                </p>
			            </div>';	
			$i++;
		}
	}else{
		$xhtml = '<div class="success">Dữ liệu đang cập nhật';
	}
	
	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Manage Group</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/my-js.js"></script>
</head>
<body>
	<div id="wrapper">
    	<div class="title">Manage Group</div>
        <div class="list">  
        	<?php echo $messageDelete;?> 

			<form action="#" method="get" name="form-search" id="form">
	            	<p class="no"><input type="text" name="search"/></p>
					<input type="submit" value="Search" />
					<input type="submit" name="clear" value="Clear" />

			<select name="filter-by-status">
				<option value="default">Chon status</option>
				<option value="1" <?= ($filterByStatus == '1') ? 'selected="selected"' : '' ?>>Active</option>
				<option value="0" <?php echo ($filterByStatus == '0') ? 'selected="selected"' : '' ?>>Inactive</option>
			</select>

	    	</form>



			<?php
			// <?= <=> echo
			if($filterByStatus == '1') echo 'selected="selected"'; 
				else '';
			?>


			<form action="#" method="post" name="main-form" id="main-form">
	         	<div class="row" style="text-align: center; font-weight: bold;">
	            	<p class="no"><input type="checkbox" name="check-all" id="check-all" /></p>
	                <p class="name">Group Name</p>
	                <p class="id">ID</p>
	                <p class="size">Status</p>
	                <p class="size">Ordering</p>
	                <p class="size">Members</p>
	                <p class="action">Action</p>
	            </div>
	            <input type="hidden" value="<?php echo time();?>" name="token" />
	         	<?php echo $xhtml;?>
	    	</form>
    	</div>
        <div id="area-button">
        	<a href="form.php?action=add">Add Group</a>
        	<a id="multy-delete" href="#">Delete Group</a>
        </div>
    </div>
</body>
</html>
