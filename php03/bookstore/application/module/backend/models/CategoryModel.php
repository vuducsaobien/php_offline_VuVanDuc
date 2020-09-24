<?php
class CategoryModel extends BackendModel
{
	protected $_columnsCategory = [
		'id', 'name', 'picture', 'created', 'created_by', 
		'modified', 'modified_by', 'status', 'ordering'
	];
	protected $fieldSearchAcceptedCategory = ['id', 'name'];

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

	public function ajaxOrdering($params)
	// public function ajaxOrdering($params, $options = [])
    {
        $id 	  	= $params['id'];
		$ordering 	= $params['ordering'];

		$query 		= "UPDATE `$this->table` 
		SET `ordering` = '$ordering', `modified` = '$this->modified', `modified_by` = '$this->modified_by' 
		WHERE `id` = $id";
		
		$this->query($query);
        return [
            'id' 	   => $id,
            'modified'  => HTML::showItemHistory($this->modified_by, $this->modified)
        ];
	}

	/*
		public function countBookUser($params)
		{
			$query[]	= "SELECT COUNT(`b`.`id`) AS `totalBook`, `b`.`category_id`, `c`.`name` AS `category_name`, `c`.`picture` AS `category_picture`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";
			$query[]	= "WHERE `c`.`status` = 'active'";
			$query[]	= "GROUP BY `b`.`category_id`";
			$query[] 	= "ORDER BY `category_id` ASC ";

			// Total Book In Category
			$query[]	= "SELECT COUNT(`b`.`id`) AS `totalBook`, `b`.`category_id`, `c`.`id`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";
			$query[]	= "WHERE `b`.`id` > 0";
			$query[]	= "GROUP BY `b`.`category_id`";

			
			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
	}
	*/

	
}
