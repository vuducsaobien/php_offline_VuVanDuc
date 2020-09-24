<?php
class UserModel extends Model
{
	private $_columns 	  	   = [
		'id', 'username', 'email', 'fullname', 'password', 'created', 
		'created_by', 'status', 'group_id', 'modified', 'modified_by', 'address', 'phone'
	];

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_USER);

		$userObj 			= Session::get('user');
		$this->_userInfo 	= $userObj['info'];
	}

	public function infoItem($arrParam, $option = null){
		$email		= $arrParam['form']['email'];

		if($option == null) {
			$password	= md5($arrParam['form']['password']);

			$query[]	= "SELECT `u`.`id`, `u`.`fullname`, `u`.`status`, `u`.`password`, `u`.`phone`, `u`.`address`,
			`u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`";

			$query[]	= "FROM `".TBL_USER."` AS `u` LEFT JOIN `".TBL_GROUP."` AS g ON `u`.`group_id` = `g`.`id`";
			$query[]	= "WHERE `email` = '$email' AND `password` = '$password'";		
		}

		if($option['task'] == 'change-user-info') {
			$query[]	= "SELECT `u`.`id`, `u`.`fullname`, `u`.`phone`, `u`.`address`, `u`.`email`, `u`.`username` ";

			$query[]	= "FROM `".TBL_USER."` ";
			$query[]	= "WHERE `u`.`email` = '$email' ";		
		}

			$query		= implode(" ", $query);
			$result		= $this->fetchRow($query);					
			return $result;
	}

	public function listItem($arrParam, $option = null){
		if($option['task'] == 'books-in-cart'){
			$cart	= Session::get('cart');
			$result	= [];
			if(!empty($cart)){
				$ids	= "(";
				foreach($cart['quantity'] as $key => $value) $ids .= "'$key', ";
				$ids	.= " '0')" ;
			
				$query[]	= "SELECT `id`, `name`, `picture`";
				$query[]	= "FROM `".TBL_BOOK."` ";
				$query[]	= "WHERE `status`  = 'active' AND `id` IN $ids";
				$query[]	= "ORDER BY `ordering` ASC";
		
				$query		= implode(" ", $query);
				$result		= $this->fetchAll($query);

				foreach($result as $key => $value){
					$result[$key]['quantity']	= $cart['quantity'][$value['id']];
					$result[$key]['totalprice']	= $cart['price'][$value['id']];
					$result[$key]['price']		= $result[$key]['totalprice'] / $result[$key]['quantity'];
				}
			}
			return $result;
		}
		
		if($option['task'] == 'history-cart'){
			$username	= $this->_userInfo['username'];

			$query[]	= "SELECT `id`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`";
			$query[]	= "FROM `".TBL_CART."`";
			$query[]	= "WHERE `username` = '$username'";
			$query[]	= "ORDER BY `date` ASC";
		
			echo $query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
				
			return $result;
			echo '<pre>';
			print_r($result);
			echo '</pre>';
		}
	}

	public function saveItem($arrParam, $option = null){
	
		if($option['task'] == 'submit-cart'){
			$id			= $this->randomString(7);
			$username	= $this->_userInfo['username'];
			$books		= json_encode($arrParam['form']['book_id'], JSON_UNESCAPED_UNICODE );
			$prices		= json_encode($arrParam['form']['price'], JSON_UNESCAPED_UNICODE );
			$quantities	= json_encode($arrParam['form']['quantity'], JSON_UNESCAPED_UNICODE );
			$names		= json_encode($arrParam['form']['name'], JSON_UNESCAPED_UNICODE );
			$pictures	= json_encode($arrParam['form']['picture'], JSON_UNESCAPED_UNICODE );
			$date		= date(DB_DATETIME_FORMAT);
			
			$query	= "INSERT INTO `".TBL_CART."`(
					`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`)
			VALUES ('$id', '$username', '$books', '$prices', '$quantities', '$names', '$pictures', 'inactive', '$date')";
			$this->query($query);
			Session::delete('cart');
		}

		if ($option['task'] == 'edit') {
			$userInfo 			= Session::get('user')['info'];

			$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			// unset($arrParam['form']['email']);

			$arrParam['form']['modified'] 	  = date(DB_DATETIME_FORMAT);
			$arrParam['form']['modified_by']  = $userInfo['username'];

			$arrParam['form']['fullname']	= mysqli_real_escape_string($mysqli, $arrParam['form']['fullname']);
			$arrParam['form']['phone']  	= mysqli_real_escape_string($mysqli, $arrParam['form']['phone']);
			$arrParam['form']['address']  	= mysqli_real_escape_string($mysqli, $arrParam['form']['address']);

			$data 	= array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$result = $this->update($data, [ ['email', $arrParam['form']['email']] ]    );

			if ($result) {
				Session::set('notify', Helper::createNotify('success', SUCCESS_EDIT));
			} else {
				Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
			}
		}
	
	}
	
	private function randomString($length = 5){
	
		$arrCharacter = array_merge(range('a','z'), range(0,9), range('A','Z'));
		$arrCharacter = implode('', $arrCharacter);
		$arrCharacter = str_shuffle($arrCharacter);
	
		$result		= substr($arrCharacter, 0, $length);
		return $result;
	}


}
