<?php
class IndexModel extends BackendModel
{
	protected $_columns = ['id', 'username', 'password', 'email', 'fullname', 'phone', 'address', 'created', 'created_by', 'status', 'group_id', 'modified', 'modified_by'];

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_USER);
	}

	public function itemInSelectbox($arrParam, $option = null){
		if($option == null){
			$query 	= "SELECT `id`, `name` FROM `".TBL_GROUP."`";
			$result = $this->fetchPairs($query);
			ksort($result);
		}	
		return $result;
	}

	public function saveItem($arrParam, $option = null)
	{
		$userInfo	= Session::get('user')['info'];
		$arrParam['form']['modified'] 	 = date(DB_DATETIME_FORMAT);
		$arrParam['form']['modified_by'] = $userInfo['username'];
		$data = array_intersect_key($arrParam['form'], array_flip($this->_columns));

		$result = $this->update($data, [ 
				['id', $arrParam['form']['id'] 
			]] 
		);

		if ($result) {
			Session::set('notify', Helper::createNotify('success', SUCCESS_EDIT));
		} else {
			Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
		}
		$_SESSION['user']['info']['email'] 	  = $arrParam['form']['email'];
		$_SESSION['user']['info']['fullname'] = $arrParam['form']['fullname'];
		$_SESSION['user']['info']['status']	  = $arrParam['form']['status'];
		$_SESSION['user']['info']['group_id'] = $arrParam['form']['group_id'];
		return $arrParam['form']['id'];

	}

	// Backend Model
	/*
		public function infoItem2($arrParam, $option = null){
			if($option == null) {
				$username	= $arrParam['form']['username'];
				$password	= md5($arrParam['form']['password']);
				$query[]	= "SELECT `u`.`id`, `u`.`fullname`, `u`.`status`, `u`.`password`,
				`u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`, `g`.`name`";
				$query[]	= "FROM `user` AS `u` LEFT JOIN `group` AS g ON `u`.`group_id` = `g`.`id`";
				$query[]	= "WHERE `username` = '$username' AND `password` = '$password'";		
				$query		= implode(" ", $query);
				$result		= $this->fetchRow($query);					
				return $result;
			}
		}

	*/
}
