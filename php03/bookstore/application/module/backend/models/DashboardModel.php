<?php

class DashboardModel extends Model
{
	public function __construct()
	{
		parent::__construct();
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