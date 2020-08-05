<?php
	$searchName = Helper::searchPost('searchName');
	$searchID 	= Helper::searchPost('searchID');

	if(!empty($this->items)){
		foreach($this->items as $value){

			$resultName = str_replace($searchName, "<mark>$searchName</mark>", $value['name']);
			$status = Helper::showIconStatus($value['status']);
			$id		= $value['id'];
			
			$xhtml .= '<div class="row" id="item-'.$id.'">
							<p class="w-10"><input type="checkbox" name="checkbox[]" value="'.$id.'"/></p>
							<p>'.$resultName.'</p>
							<p class="w-10">'.$id.'</p>
							<p class="w-10">'.$status.'</p>
							<p class="w-10">'.$value['ordering'].'</p>
							<p class="w-10">'.$value['total'].'</p>
							<p class="w-10 action">
								<a href="#">Edit</a> |
								<a href="javascript:deleteItem('.$id.')">Delete</a> 
							</p>
						</div>';
		}
	}
		// $count = Helper::countStatus($this->items);
		$countActive 	= Helper::countValue($this->items, 'status', 1);
		$countInActive  = Helper::countValue($this->items, 'status', 0);
		// $countAll		= $countActive + $countInActive;

		// $arrValue  = array(1, 0);
		// $countAll  = Helper::countValue($this->items, 'status', $arrValue);
		// <span><u>Group Active:</u> '. $countActive.' groups</span>
		// <span><u>Group InActive:</u> '. $countInActive.' groups</span>
		// <span><u>Group Total:</u> '. $countAll.' groups</span>

	echo'
	<div class="content">
		<div class="list">
			'.$countActive.'
			'.$countInActive.'
		</div><br>

		<div id="dialog-confirm" title="Thông báo!" style="display: none;">
			<p>Bạn có chắc muốn xóa phần tử này hay không?</p>
		</div>

		<form action="#" method="post" name="form-search" id="form">
			<p class="no">
				<input type="text" name="searchName" value="'.$searchName.'" placeholder="Type Name Here" />
			</p><br>

			<p class="no">
				<input type="text" name="searchID" value="'.$searchID.'" placeholder="Type ID Here"/>
			</p><br>

			<input type="submit" value="Search" />
			<input type="submit" name="clear" value="Clear" />
		</from>

		<div class="list">
			<div class="row head">
				<p class="w-10"><input type="checkbox" name="check-all" id="check-all"/></p>
				<p>Group Name</p>
				<p class="w-10">ID</p>
				<p class="w-10">Status</p>
				<p class="w-10">Ordering</p>
				<p class="w-10">Member</p>
				<p class="w-10 action">Action</p>
			</div>
			'.$xhtml.'
		</div>
	</div>
	';
?>