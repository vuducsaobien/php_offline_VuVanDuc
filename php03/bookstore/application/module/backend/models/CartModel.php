<?php
class CartModel extends BackendModel
{
	protected $_columnsCart = [
		'id', 'name', 'created', 'created_by', 
		'modified', 'modified_by', 'status'
	];
	protected $fieldSearchAcceptedCart = ['id', 'name'];

	public function __construct()
	{
		parent::__construct();
	}

	public function ajaxChangeStatusLib($params)
    {
		$id 		= $params['id'];
		if(isset($params['group_acp'])){
			$groupACP 	= ($params['group_acp']==0) ? 1 : 0;
			$query 		= "UPDATE `$this->table` 
			SET `group_acp` = '$groupACP', `modified` = '$this->modified', `modified_by` = '$this->modified_by' 
			WHERE `id` = $id";	
		}elseif(isset($params['status'])){
			$status 	= ($params['status']=='inactive') ? 'active' : 'inactive';
			$query 		= "UPDATE `$this->table` 
			SET `status` = '$status', `modified` = '$this->modified', `modified_by` = '$this->modified_by' 
			WHERE `id` = $id";	
		}
		
		$this->query($query);
        return [
            'id' 	   => $id,
            'modified'  => HTML::showItemHistory($this->modified_by, $this->modified)
        ];
	}
	
	// public function countItem($arrParam, $option = null)
	// {
	// 	$query[]	= "SELECT COUNT(`id`) AS `total`";
	// 	$query[]	= "FROM `$this->table`";
	// 	$query[]	= "WHERE `id` > 0";

	// 	if ($option == null) {
	// 	    if (isset($arrParam['status']) && $arrParam['status'] != 'all')
	// 	 	$query[] = "AND `status` = '{$arrParam['status']}'";
    //     }

	// 	if ($option['task'] == 'count-active') {
	// 		$query[] = "AND `status` = 'active'";
	// 	}

	// 	if ($option['task'] == 'count-inactive') {
	// 		$query[] = "AND `status` = 'inactive'";
	// 	}

	// 	// FILTER : KEYWORD SEARCH
	// 	if (!empty($arrParam['search'])) {
	// 		$query[] 	 = "AND (";
	// 		$keyword     = "'%{$arrParam['search']}%'";
	// 		// foreach ($this->fieldSearchAccepted as $field) {
	// 		foreach ($this->fieldSearchAccepted as $field) {
	// 			$query[] = "`$field` LIKE $keyword";
	// 			$query[] = "OR";
	// 		}
	// 		array_pop($query);
	// 		$query[] = ")";
	// 	}

	// 	// FILTER : STATUS
	// 	if (isset($arrParam['status']) && $arrParam['status'] != 'all') {
	// 		$query[] = "AND `status` = '{$arrParam['status']}'";
	// 	}	

	// 	$query		= implode(" ", $query);
	// 	$result = $this->fetchRow($query)['total'];
	// 	return $result;
	// }



}
