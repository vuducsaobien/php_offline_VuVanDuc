<?php
class Group_Model extends Model{
	
	public function __construct(){
		parent::__construct();
		$this->setTable('group');
	}
	
	public function listItems($options = null){

		$searchName = Helper::searchPost('searchName');
		$searchID 	= Helper::searchPost('searchID');

		$query[] 	= "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
		$query[] 	= "FROM `group` AS `g` LEFT JOIN `user` AS `u` ON `g`.`id` = `u`.`group_id`";
		
		$query[] 	= "WHERE `g`.`name` LIKE '%$searchName%' ";
		if($searchID!=null) 
			$query[] = "AND `g`.`id` = '$searchID' ";

		$query[] 	= "GROUP BY `g`.`id`";
		$query[] 	= "ORDER BY  `g`.`name` ASC, `g`.`id` DESC";

		echo $query		= implode(" ", $query);
		
		$result		= $this->listRecord($query);
		return $result;
	}
	
	public function deleteItem($id, $options = null){
		$this->delete(array($id));
	}
}