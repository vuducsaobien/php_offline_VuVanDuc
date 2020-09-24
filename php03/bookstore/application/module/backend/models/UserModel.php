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

	/* BACKED MODEL */
	/*

		public function countItem2($arrParam, $option = null)
		{
			$query[]	= "SELECT COUNT(`id`) AS `total`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `id` > 0";

			if ($option == null) {
				if (isset($arrParam['status']) && $arrParam['status'] != 'all')
				$query[] = "AND `status` = '{$arrParam['status']}'";
			}

			if ($option['task'] == 'count-active') {
				$query[] = "AND `status` = 'active'";
			}

			if ($option['task'] == 'count-inactive') {
				$query[] = "AND `status` = 'inactive'";
			}

			// FILTER : KEYWORD SEARCH
			if (!empty($arrParam['search'])) {
				$query[] 	 = "AND (";
				$keyword     = "'%{$arrParam['search']}%'";
				foreach ($this->fieldSearchAccepted as $field) {
					$query[] = "`$field` LIKE $keyword";
					$query[] = "OR";
				}
				array_pop($query);
				$query[] = ")";
			}

			// FILTER : STATUS
			if (isset($arrParam['status']) && $arrParam['status'] != 'all') {
				$query[] = "AND `status` = '{$arrParam['status']}'";
			}

			// FILTER : GROUP ACP
			if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
				$query[] = "AND `group_acp` = {$arrParam['filter_group_acp']}";
			}

			$query		= implode(" ", $query);
			$result = $this->fetchRow($query)['total'];
			return $result;
		}

		public function listItem2($arrParam, $option = null)
		{
			$query[] = "SELECT `u`.`id`, `u`.`username`, `u`.`password`, `u`.`email`, `u`.`fullname`,
			`u`.`created`, `u`.`created_by`, `u`.`modified`, `u`.`modified_by`, `u`.`status`, `g`.`name` AS `group_name`, `u`.`group_id`";
			$query[] = "FROM `$this->table` AS `u`LEFT JOIN `".TBL_GROUP."` AS `g` ON `u`.`group_id` = `g`.`id`";
			$query[]	= "WHERE `u`.`id` > 0";

			// FILTER : KEYWORD SEARCH
			if (!empty($arrParam['search'])) {
				$keyword     		 = "'%{$arrParam['search']}%'";
				$query[] 	 		 = "AND (";
				// $fieldSearchAccepted = ($this->table==TBL_GROUP) ? $this->searchAcceptedGroup : $this->searchAcceptedUser;

				foreach ($this->fieldSearchAccepted as $field) {
					$query[] = "`$field` LIKE $keyword";
					$query[] = "OR";
				}

				array_pop($query);
				$query[] = ")";
			}

			// FILTER : STATUS
			if (isset($arrParam['status']) && $arrParam['status'] != 'all') {
				$query[] = "AND `status` = '{$arrParam['status']}'";
			}

			// FILTER : GROUP ACP
			if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
				$query[] = "AND `group_acp` = {$arrParam['filter_group_acp']}";
			}

			// FILTER : GROUP ID
			if (isset($arrParam['filter_group_id']) && $arrParam['filter_group_id'] != 'default') {
				$query[] = "AND `group_id` = '{$arrParam['filter_group_id']}'";
			}

			// SORT
			if (!empty($arrParam['sort_field']) && !empty($arrParam['sort_order'])) {
				$sort_field	= $arrParam['sort_field'];
				$sort_order	= $arrParam['sort_order'];
				$query[]	= "ORDER BY `$sort_field` $sort_order";
			} else {
				$query[]	= "ORDER BY `id` DESC ";
			}

			// PAGINATION
			$pagination			= $arrParam['pagination'];
			$totalItemsPerPage	= $pagination['totalItemsPerPage'];
			if ($totalItemsPerPage > 0) {
				$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
				$query[]	= "LIMIT $position, $totalItemsPerPage";
			}

			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}

		public function infoItem2($arrParam, $option = null)
		{
			if ($option['task'] == null) {
				// $query[]	= "SELECT `id`, `username`, `email`, `fullname`, `status`, `group_id`, `password`";

				$query[]	= "SELECT `id`, `username`, `password`, `email`, `fullname`, `status`, `group_id`, `password`, `modified`, `modified_by`";

				$query[]	= "FROM `$this->table`";
				$query[]	= "WHERE `id` = '" . $arrParam['id'] . "'";
				$query		= implode(" ", $query);
				$result		= $this->fetchRow($query);

				return $result;
			}
		}

		public function saveItem2($arrParam, $option = null)
		{
			if ($option['task'] == 'add') {
				$arrParam['form']['created'] 	= date(DB_DATETIME_FORMAT);
				$arrParam['form']['created_by'] = $this->userInfo['username'];

				$arrParam['form']['password']	= md5($arrParam['form']['password']);

				$data = array_intersect_key($arrParam['form'], array_flip($this->_columnsUser));
				$result = $this->insert($data);

				if ($result) {
					Session::set('notify', Helper::createNotify('success', SUCCESS_ADD));
				} else {
					Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
				}
				return $this->lastID();
			}

			if ($option['task'] == 'edit') {
				$arrParam['form']['modified'] 	  = date(DB_DATETIME_FORMAT);
				$arrParam['form']['modified_by']  = $this->userInfo['username'];

				if($arrParam['form']['password'] != null){
					$arrParam['form']['password'] = md5($arrParam['form']['password']);
				}else{
					unset($arrParam['form']['password']);
				}

				$data = array_intersect_key($arrParam['form'], array_flip($this->_columnsUser));
				$result = $this->update($data, array(array('id', $arrParam['form']['id'])));
				
				if ($result) {
					Session::set('notify', Helper::createNotify('success', SUCCESS_EDIT));
				} else {
					Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
				}

				return $arrParam['form']['id'];
			}
		}


	*/


}
