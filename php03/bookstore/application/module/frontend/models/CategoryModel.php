<?php
class CategoryModel extends Model
{
	protected $_columnsCategory = [
		'id', 'name', 'picture', 'created', 'created_by', 
		'modified', 'modified_by', 'status', 'ordering'
	];
	protected $fieldSearchAcceptedCategory = ['id', 'name'];

	public function __construct()
	{
		parent::__construct();
		$this->userInfo	   = Session::get('user')['info'];
		$this->setTable(TBL_CATEGORY);
	}

	public function listItem($arrParam, $option = null)
	{
		$c 		 = '`c`';
		$tableAs = '`c`';

		$query[] = "SELECT $c.`id` AS `category_id`, $c.`name`, $c.`picture`";
		$query[] = "FROM `$this->table` AS $c";
		$query[] = "WHERE $tableAs.`status` = 'active'";
		// $query[] = "ORDER BY `ordering` ASC ";
		$query[] = "ORDER BY `category_id` ASC ";


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

	public function countItem($arrParam, $options = null)
    {
		$query[]	= "SELECT COUNT(`b`.`id`) AS `totalBook`, `b`.`category_id`, 
		`c`.`name`, `c`.`picture`";
		$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";
		$query[]	= "WHERE `c`.`status` = 'active'";
		$query[]	= "GROUP BY `b`.`category_id`";


		if($options=='count-category'){
			$query[] 	= "ORDER BY `category_id` ASC ";
		}

		// PAGINATION
		if($options!=null){
			$pagination			= $arrParam['pagination'];
			$totalItemsPerPage	= $pagination['totalItemsPerPage'];
			if ($totalItemsPerPage > 0) {
				$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
				$query[]	= "LIMIT $position, $totalItemsPerPage";
			}
		}

		$query		= implode(" ", $query);

		if($options==null){
			$resultQuery		= $this->fetchAll($query);
			$result = count($resultQuery);
		}elseif($options=='count-category'){
			$result		= $this->fetchAll($query);	
		}

		return $result;
    }


	
}
