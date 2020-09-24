<?php

class DashboardModel extends Model
{
	private $_columns = ['id', 'username', 'password', 'email', 'fullname', 'created', 'created_by', 'status', 'group_id', 'modified', 'modified_by'];

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_USER);
	}

	public function countItem($arrParam, $option = null){
		$query[]	= "SELECT COUNT(`id`) AS `total`";
		$query[]	= "FROM `$option`";
		$query[]	= "WHERE `id` > 0";

		$query		= implode(" ", $query);
		$result		= $this->fetchRow($query);
		return $result['total'];
	}




}