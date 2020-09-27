<?php
class UserModel extends BackendModel
{
	protected $_columnsUser 	  	   = [
		'id', 'username', 'email', 'fullname', 'password', 'created', 
		'created_by', 'status', 'group_id', 'modified', 'modified_by'
	];
	
	protected $fieldSearchAcceptedUser = ['id', 'username', 'email', 'fullname'];

	public function __construct()
	{
		parent::__construct();
	}

	// public function resetPassword($params, $options = [])
	public function resetPassword($params)
    {
		$id 		 = $params['id'];
		$newPassword = md5($params['new-password']);
		$modifiedBy  = $this->userInfo['username'];
        $modified    = date(DB_DATETIME_FORMAT);

		$query = "UPDATE `$this->table` SET `password` = '$newPassword', `modified` = '$modified', `modified_by` = '$modifiedBy' WHERE `id` = '$id'";

        $this->query($query);
        $result = $this->affectedRows();
        if ($result) {
            if ($result) {
                Session::set('notify', Helper::createNotify('success', SUCCESS_RESET_PASSWORD));
            } else {
                Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
            }
        }
	}

	public function changeGroup($params)
    {
        $id 		= $params['id'];
		$groupId 	= $params['group_id'];
		$modifiedBy = $this->userInfo['username'];
        $modified   = date(DB_DATETIME_FORMAT);
        $query 		= "UPDATE `$this->table` SET `group_id` = $groupId, `modified` = '$modified', `modified_by` = '$modifiedBy' WHERE `id` = $id";
        $this->query($query);
        return [
            'id' => $id,
            'modified'  => HTML::showItemHistory($modifiedBy, $modified),
        ];
    }

	public function itemInSelectbox($arrParam, $option = null){
		if($option == null){
			$query 	= "SELECT `id`, `name` FROM `".TBL_GROUP."`";
			$result = $this->fetchPairs($query);
			$result['default'] = "- Select Group -";
			ksort($result);
		}
		
		return $result;
	}


}
