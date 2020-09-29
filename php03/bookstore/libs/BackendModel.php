<?php
class BackendModel extends Model
{
	protected $userInfo;
	protected $_columns;
	protected $fieldSearchAccepted;

	protected $modified_by;
	protected $modified;

	public function __construct()
	{
		parent::__construct();
		$this->init();
	}

	public function init(){
		$this->userInfo	   = Session::get('user')['info'];
		$this->modified_by = $this->userInfo['username'];
		$this->modified    = date(DB_DATETIME_FORMAT);

		if (isset($this->_columnsGroup)) {
			$this->setTable(TBL_GROUP);
			$tableName = ucfirst(TBL_GROUP);

		} elseif (isset($this->_columnsUser)) {
			$this->setTable(TBL_USER);
			$tableName = ucfirst(TBL_USER);
			
		} elseif (isset($this->_columnsCategory)) {
			$this->setTable(TBL_CATEGORY);
			$tableName = ucfirst(TBL_CATEGORY);

		} elseif (isset($this->_columnsBook)) {
			$this->setTable(TBL_BOOK);
			$tableName = ucfirst(TBL_BOOK);

		} elseif (isset($this->_columnsCart)) {
			$this->setTable(TBL_CART);
			$tableName = ucfirst(TBL_CART);

		} elseif (isset($this->_columnsSlide)) {
			$this->setTable(TBL_SLIDE);
			$tableName = ucfirst(TBL_SLIDE);
		}

		$_columns 			 		= '_columns' . $tableName;
		$fieldSearchAccepted 		= 'fieldSearchAccepted' . $tableName;
		$this->_columns 			= $this->$_columns;
		$this->fieldSearchAccepted 	= $this->$fieldSearchAccepted;
	}

	public function saveItem($arrParam, $option = null)
	{
		$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if ($option['task'] == 'add') {
			$arrParam['form']['created'] 	  		= date(DB_DATETIME_FORMAT, time());
			$arrParam['form']['created_by']  		= $this->userInfo['username'];
			$arrParam['form']['name']	  	  		= mysqli_real_escape_string($mysqli, $arrParam['form']['name']);
			$arrParam['form']['short_description']  = mysqli_real_escape_string($mysqli, $arrParam['form']['short_description']);
			$arrParam['form']['description']  		= mysqli_real_escape_string($mysqli, $arrParam['form']['description']);

			if ($this->table == TBL_USER) {
				$arrParam['form']['password'] = md5($arrParam['form']['password']);

			} elseif ($this->table == TBL_CATEGORY) {
				require_once LIBRARY_EXT_PATH . 'Upload.php';
				$uploadObj = new Upload();
				$arrParam['form']['picture'] = $uploadObj->uploadFile($arrParam['form']['picture'], TBL_CATEGORY);

			} elseif ($this->table == TBL_BOOK) {
				require_once LIBRARY_EXT_PATH . 'Upload.php';
				$uploadObj = new Upload();
				$arrParam['form']['picture'] = $uploadObj->uploadFile($arrParam['form']['picture'], TBL_BOOK, '98', '150');

			} elseif ($this->table == TBL_SLIDE) {
				require_once LIBRARY_EXT_PATH . 'Upload.php';
				$uploadObj = new Upload();
				$arrParam['form']['picture'] = $uploadObj->uploadFile($arrParam['form']['picture'], TBL_SLIDE, '300', '124');
			}

			$data 	= array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$result = $this->insert($data);
			if ($result) {
				Session::set('notify', Helper::createNotify('success', SUCCESS_ADD));
			} else {
				Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
			}
			return $this->lastID();
		}

		if ($option['task'] == 'edit') {
			unset($arrParam['form']['username']);
			unset($arrParam['form']['email']);

			$arrParam['form']['modified'] 	  		= date(DB_DATETIME_FORMAT, time());
			$arrParam['form']['modified_by']  		= $this->userInfo['username'];
			$arrParam['form']['name']	  	  		= mysqli_real_escape_string($mysqli, $arrParam['form']['name']);
			$arrParam['form']['short_description']  = mysqli_real_escape_string($mysqli, $arrParam['form']['short_description']);
			$arrParam['form']['description']  		= mysqli_real_escape_string($mysqli, $arrParam['form']['description']);

			if ($this->table == TBL_USER) {
				if ($arrParam['form']['password'] != null) {
					$arrParam['form']['password'] = md5($arrParam['form']['password']);
				} else {
					unset($arrParam['form']['password']);
				}
			}

			if ($this->table == TBL_CATEGORY || $this->table == TBL_BOOK || $this->table == TBL_SLIDE) {

				if ($arrParam['form']['picture']['name'] == null) {
					unset($arrParam['form']['picture']);
				} else {
					require_once LIBRARY_EXT_PATH . 'Upload.php';
					$uploadObj = new Upload();

					$uploadObj->removeFile($this->table, $arrParam['form']['hidden_picture']);
					if ($this->table == TBL_CATEGORY) {
						$arrParam['form']['picture'] = $uploadObj->uploadFile($arrParam['form']['picture'], TBL_CATEGORY);
						$uploadObj->removeFile(TBL_CATEGORY, '60x90-' . $arrParam['form']['hidden_picture']);

					} elseif($this->table == TBL_BOOK) {
						$arrParam['form']['picture'] = $uploadObj->uploadFile($arrParam['form']['picture'], TBL_BOOK, '98', '150');
						$uploadObj->removeFile(TBL_BOOK, '98x150-' . $arrParam['form']['hidden_picture']);
					}
				}
			}

			$data 	= array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$result = $this->update($data, array(array('id', $arrParam['form']['id'])));
			if ($result) {
				Session::set('notify', Helper::createNotify('success', SUCCESS_EDIT));
			} else {
				Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
			}
			return $arrParam['form']['id'];
		}
	}

	public function countItem($arrParam, $option = null)
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

		// FILTER : CATEGORY ID
		if (isset($arrParam['filter_category_id']) && $arrParam['filter_category_id'] != 'default') {
			$query[] = "AND `category_id` = {$arrParam['filter_category_id']}";
		}

		// FILTER : SPECIAL
		if (isset($arrParam['filter_special']) && $arrParam['filter_special'] != 'default') {
			$query[] = "AND `special` = {$arrParam['filter_special']}";
		}

		$query		= implode(" ", $query);
		$result = $this->fetchRow($query)['total'];
		return $result;
	}

	public function deleteItem($arrParam, $option = null)
	{
		// echo '<h3>' . __METHOD__ . '</h3>';
		if ($option == null) {
			$ids = [];
			if (isset($arrParam['id'])) $ids = [$arrParam['id']];
			if (isset($arrParam['checkbox'])) $ids = $arrParam['checkbox'];

			if ($this->table == TBL_CATEGORY || 
				$this->table == TBL_BOOK || 
				$this->table == TBL_SLIDE) 
			{
				require_once LIBRARY_EXT_PATH . 'Upload.php';
				$uploadObj 	= new Upload();
				$ids 		= implode(',', $ids);
				$query		= "SELECT `id`, `picture` AS `name` FROM `$this->table` WHERE `id` IN ($ids)";

				$arrImg = $this->fetchPairs($query);
				foreach ($arrImg as $image) {

					$uploadObj->removeFile($this->table, $image);

					if ($this->table == TBL_CATEGORY) {
						$uploadObj->removeFile(TBL_CATEGORY, '60x90-' . $image);

					} elseif($this->table == TBL_BOOK) {
						$uploadObj->removeFile(TBL_BOOK, '98x150-' . $image);

					} elseif($this->table == TBL_SLIDE) {
						$uploadObj->removeFile(TBL_SLIDE, '300x124-' . $image);
					}
				}

				$ids = [];
				if (isset($arrParam['id'])) $ids = [$arrParam['id']];
				if (isset($arrParam['checkbox'])) $ids = $arrParam['checkbox'];
			}

			// DELETE FROM DATABASE
			$result = $this->delete($ids);
			if ($result) {
				Session::set('notify', Helper::createNotify('success', SUCCESS_DELETE));
			} else {
				Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
			}
		}
	}

	public function infoItem($arrParam, $option = null)
	{
		$u 		 = '`u`';
		$g 		 = '`g`';

		if ($option['task'] == null) {

			if ($this->table == TBL_GROUP) {
				$query[]	= "SELECT `id`, `status`, `modified`, `modified_by`, `created`, `created_by`, `name`, `group_acp`, `ordering`";
			} elseif ($this->table == TBL_USER) {
				$query[]	= "SELECT `id`, `status`, `modified`, `modified_by`, `created`, `created_by`, `username`, `email`, `fullname`, `group_id`, `password`";
			} elseif ($this->table == TBL_CATEGORY) {
				$query[]	= "SELECT `id`, `status`, `modified`, `modified_by`, `created`, `created_by`, `picture`, `ordering`, `name`";
			} elseif ($this->table == TBL_BOOK) {
				$query[]	= "SELECT `id`, `status`, `modified`, `modified_by`, `created`, `created_by`, `picture`, `ordering`, `name`, 
				`description`, `price`, `special`, `sale_off`, `category_id`";
			}

			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `id` = '" . $arrParam['id'] . "'";
			$query		= implode(" ", $query);

			$result		= $this->fetchRow($query);
			return $result;
		}

		if ($option['task'] == 'index-admin-login') {
			$username	= $arrParam['form']['username'];
			$password	= md5($arrParam['form']['password']);

			$query[]	= "SELECT $u.`id`, $u.`fullname`, $u.`status`, $u.`password`,
			$u.`email`, $u.`username`, $u.`group_id`, $g.`group_acp`, $g.`name`, $g.`privilege_id`";
			$query[]	= "FROM `user` AS $u LEFT JOIN `group` AS $g ON $u.`group_id` = $g.`id`";
			$query[]	= "WHERE `username` = '$username' AND `password` = '$password'";

			$query		= implode(" ", $query);
			$result		= $this->fetchRow($query);

			if ($result['group_acp'] == 1 && $result['status'] == 'active') {
				$arrPrivilege = explode(',', $result['privilege_id']);
				$strPrivilegeID = '';
				foreach ($arrPrivilege as $privilegeID) $strPrivilegeID .= "'$privilegeID', ";

				$queryP[] = "SELECT `id`, CONCAT(`module`, '-', `controller`, '-',  `action`) AS `name`";
				$queryP[] = "FROM `" . TBL_PRIVELEGE . "` AS `p`";
				$queryP[] = "WHERE `id` IN ($strPrivilegeID'0')";

				$queryP					= implode(" ", $queryP);
				$result['privilege']	= $this->fetchPairs($queryP);
			}
			return $result;
		}
	}

	public function listItem($arrParam, $option = null)
	{
		$u 		 = '`u`';
		$g 		 = '`g`';
		$c 		 = '`c`';
		$b 		 = '`b`';
		$ca 	 = '`ca`';

		if ($this->table == TBL_GROUP) {
			$tableAs = '`g`';
			$query[] = "SELECT $g.`id`, $g.`name`, $g.`group_acp`, $g.`status`, $g.`ordering`, $g.`created`, $g.`created_by`,
				$g.`modified`, $g.`modified_by`";
			$query[] = "FROM `$this->table` AS $g";
			$query[] = "WHERE $tableAs.`id` > '0'";

		} elseif ($this->table == TBL_USER) {
			$tableAs = '`u`';
			$query[] = "SELECT $u.`id`, $u.`username`, $u.`password`, $u.`email`, $u.`fullname`,
				$u.`created`, $u.`created_by`, $u.`status`, $g.`name` AS `group_name`, $u.`group_id`, $u.`modified`, $u.`modified_by`";
			$query[] = "FROM `$this->table` AS $u LEFT JOIN `" . TBL_GROUP . "` AS $g ON $u.`group_id` = $g.`id`";
			$query[] = "WHERE $tableAs.`id` > 0";

		} elseif ($this->table == TBL_CATEGORY) {
			$tableAs = '`c`';
			$query[] = "SELECT $c.`id`, $c.`name`, $c.`picture`, $c.`status`, $c.`ordering`, $c.`created`, $c.`created_by`,
				$c.`modified`, $c.`modified_by`, $c.`special`";

			$query[] = "FROM `$this->table` AS $c";
			$query[] = "WHERE $tableAs.`id` > 0";

		} elseif ($this->table == TBL_BOOK) {
			$tableAs = '`b`';
			$query[] = "SELECT $b.`id`, $b.`name`, $b.`description`, $b.`price`, $b.`sale_off`, $b.`picture`, $b.`special`,
				$b.`category_id`, $b.`status`, $b.`ordering`, $b.`created`, $b.`created_by`, $b.`modified`, $b.`modified_by`";

			$query[] = "FROM `$this->table` AS $b LEFT JOIN `" . TBL_CATEGORY . "` AS $c ON $b.`category_id` = $c.`id`";
			$query[] = "WHERE $tableAs.`id` > 0";

		} elseif ($this->table == TBL_CART) {
			$tableAs = '`ca`';
			$query[] = "SELECT $ca.`id`, $ca.`username`, $ca.`books`, $ca.`prices`, $ca.`quantities`, 
				$ca.`pictures`, $ca.`status`, $ca.`date`";

			$query[] = "FROM `$this->table` AS $ca";

		} elseif ($this->table == TBL_SLIDE) {
			$query[] = "SELECT `id`, `name`, `picture`, `status`, `ordering`, 
				`created`, `created_by`, `modified`, `modified_by`";

			$query[] = "FROM `$this->table`";
			$query[] = "WHERE `id` > '0'";
		}

		// FILTER : KEYWORD SEARCH
		if (!empty($arrParam['search'])) {
			$keyword     		 = "'%{$arrParam['search']}%'";
			$query[] 	 		 = "AND (";

			foreach ($this->fieldSearchAccepted as $field) {
				$query[] = "$tableAs.`$field` LIKE $keyword";
				$query[] = "OR";
			}

			array_pop($query);
			$query[] = ")";
		}

		// FILTER : STATUS
		if (isset($arrParam['status']) && $arrParam['status'] != 'all') {
			$query[] = "AND $tableAs.`status` = '{$arrParam['status']}'";
		}

		// FILTER : GROUP ACP
		if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
			$query[] = "AND $tableAs.`group_acp` = {$arrParam['filter_group_acp']}";
		}

		// FILTER : GROUP ID
		if (isset($arrParam['filter_group_id']) && $arrParam['filter_group_id'] != 'default') {
			$query[] = "AND $tableAs.`group_id` = '{$arrParam['filter_group_id']}'";
		}

		// FILTER : CATEGORY ID
		if (isset($arrParam['filter_category_id']) && $arrParam['filter_category_id'] != 'default') {
			$query[] = "AND $tableAs.`category_id` = '{$arrParam['filter_category_id']}'";
		}

		// FILTER : SPECIAL
		if (isset($arrParam['filter_special']) && $arrParam['filter_special'] != 'default') {
			$query[] = "AND $tableAs.`special` = '{$arrParam['filter_special']}'";
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

	public function bulkAction($arrParam, $options = null)
	{
		$ids 			= $arrParam['checkbox'];
		$ids 			= implode("','", $ids);
		$ids 			= "('$ids')";
		$modified 	  	= $this->modified;
		$modified_by 	= $this->modified_by;

		if ($options['task'] == 'multi-active') {
			$stateName 	= 'status';
			$state 		= 'active';
		}

		if ($options['task'] == 'multi-inactive') {
			$stateName 	= 'status';
			$state 		= 'inactive';
		}

		if ($options['task'] == 'multi-special') {
			$stateName 	= 'special';
			$state 		= '1';
		}

		if ($options['task'] == 'multi-unspecial') {
			$stateName 	= 'special';
			$state 		= '0';
		}

		$query  = "UPDATE `$this->table` SET `$stateName` = '$state', `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` IN $ids";
		$this->query($query);

		if ($this->affectedRows()) {
			Session::set('notify', Helper::createNotify('success', SUCCESS_CHANGE));
		} else {
			Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
		}
	}

	public function ajaxChangeState($arrParam, $options = null)
	{
		$id         	= $arrParam['id'];

		$modified 	  	= $this->modified;
		$modified_by 	= $this->modified_by;

		if ($options['task'] == null) {

			if (isset($arrParam['group_acp'])) {
				$stateName 	= 'group_acp';
				$state 		= ($arrParam['group_acp'] == 0) ? 1 : 0;

			} elseif (isset($arrParam['status'])) {
				$stateName 	= 'status';
				$state 		= ($arrParam['status'] == 'inactive') ? 'active' : 'inactive';

			} elseif (isset($arrParam['special'])) {
				$stateName 	= 'special';
				$state 		= ($arrParam['special'] == 0) ? 1 : 0;

			} elseif (isset($arrParam['ordering'])) {
				echo 2222222222222;
				die('<h3>Die is Called</h3>');
				$stateName 	= 'ordering';
				$state			= $arrParam['ordering'];
			}

			$query  = "UPDATE `$this->table` SET `$stateName` = '$state', `modified` = '$modified', `modified_by` = '$modified_by' WHERE `id` = '$id'";
			$this->query($query);
			return [
				'id'        => $id,
				'state'     => $state,
				'modified'  => HTML::showItemHistory($modified_by, $modified),
				'link'      => URL::createLink($arrParam['module'], $arrParam['controller'], 'ajaxChangeStatus', ['id' => $id, "$stateName" => $state])
			];
		}
	}
}
