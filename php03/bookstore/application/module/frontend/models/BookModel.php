<?php
class BookModel extends Model
{
	// protected $_columnsCategory = [
	// 	'id', 'name', 'description', 'price', 'sale_off', 'picture', 'special',
	// 	'category_id', 'status', 'ordering', 'created', 'created_by',  'modified', 'modified_by'
	// ];
	// protected $fieldSearchAcceptedCategory = ['id', 'name'];

	public function __construct()
	{
		parent::__construct();
		$this->userInfo	   = Session::get('user')['info'];
		$this->setTable(TBL_BOOK);
	}

	public function listItem($arrParam, $options = null)
	{
		$bookID = $arrParam['book_id'];
		$b 		 = '`b`';
		$c 		 = '`c`';

		if($options['task'] == 'all-books-active'){
			$b 		 = '`b`';
			$tableAs = '`b`';

			$query[] = "SELECT $b.`id`, $b.`name`, $b.`picture`, $b.`sale_off`, $b.`special`, $b.`ordering`, $b.`price`, `b`.`category_id`, `c`.`name` AS `category_name`, 
			$b.`description`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";

			$query[] = "WHERE `b`.`status` = 'active'";
			$query[] = "ORDER BY $b.`ordering` ASC ";
		}

		if($options['task'] == 'books-category'){
			$b 		 = '`b`';
			$tableAs = '`b`';

			$query[] = "SELECT $b.`id`, $b.`name`, $b.`picture`, $b.`sale_off`, $b.`special`, $b.`ordering`, $b.`price`, `b`.`category_id`, `c`.`name` AS `category_name`, 
			$b.`description`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";
			
			$query[] = "WHERE $tableAs.`status` = 'active' AND `category_id` = '".$arrParam['category_id']."' ";
			$query[] = "ORDER BY $b.`ordering` ASC ";
			// $query[] = "LIMIT 0, 100";
		}

		if($options['task'] == 'books-special'){
			$b 		 = '`b`';
			$tableAs = '`b`';

			// $query[] = "SELECT $b.`id`, $b.`name`, $b.`picture`, $b.`sale_off`, $b.`special`, $b.`ordering`, $b.`price`, $b.`description`";
			// $query[] = "FROM `".TBL_BOOK."` AS $b";
			$query[] = "SELECT $b.`id`, $b.`name`, $b.`picture`, $b.`sale_off`, $b.`special`, $b.`ordering`, $b.`price`, `b`.`category_id`, `c`.`name` AS `category_name`, 
			$b.`description`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";

			$query[] = "WHERE $tableAs.`status` = 'active' AND $b.`special` = 1 AND $b.`id` <> '$bookID'";
			$query[] = "ORDER BY $b.`ordering` ASC ";
			$query[] = "LIMIT 0, 10";
		}

		if($options['task'] == 'books-relate'){
			$queryCate  = "SELECT `category_id` FROM `".TBL_BOOK."` WHERE `id` = '$bookID'";
			$resultCate	= $this->fetchRow($queryCate);
			$cateID		= $resultCate['category_id'];

			$query[] = "SELECT $b.`id`, $b.`name`, $b.`picture`, $b.`sale_off`, $b.`price`, $b.`description`";
			$query[] = "FROM `".TBL_BOOK."` AS $b";
			$query[] = "WHERE $b.`status` = 'active' AND $b.`category_id` = '$cateID' AND $b.`id` <> '$bookID'";
			$query[] = "ORDER BY $b.`ordering` ASC ";
			$query[] = "LIMIT 0, 5";
		}

		if($options['task'] == 'books-news'){
			$query[] = "SELECT $b.`id`, $b.`name`, $b.`picture`, $b.`sale_off`, $b.`special`, $b.`ordering`, $b.`price`, $b.`description`";

			$query[] = "FROM `".TBL_BOOK."` AS $b";
			$query[] = "WHERE $b.`status` = 'active' AND $b.`id` <> '$bookID'";
			$query[] = "ORDER BY $b.`id` DESC ";
			$query[] = "LIMIT 0, 7";
		}

		if(
			$options['task'] == 'all-books-active' ||
			$options['task'] == 'books-category'
		){
			// PAGINATION
			$pagination			= $arrParam['pagination'];
			$totalItemsPerPage	= $pagination['totalItemsPerPage'];
			if ($totalItemsPerPage > 0) {
				$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
				$query[]	= "LIMIT $position, $totalItemsPerPage";
			}
		}

		// echo $query		= implode(" ", $query);
		// echo '<br>';
		$query		= implode(" ", $query);
		// die('<h3>Die is Called</h3>');
		$result		= $this->fetchAll($query);
		return $result;
	}

	public function countItem($arrParam, $options = null)
	{
		if($options==null){

			$query[]	= "SELECT COUNT(`b`.`id`) AS `totalBook`, `b`.`category_id`, 
			`c`.`name` AS `category_name`, `c`.`picture` AS `category_picture`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";

			$query[]	= "WHERE `b`.`status` = 'active' AND `b`.`category_id` = ".$arrParam['category_id']."    ";

			$query		= implode(" ", $query);
			$result = $this->fetchRow($query)['totalBook'];
		}

		if($options=='all-books-active'){
			$query[]	= "SELECT COUNT(`b`.`id`) AS `totalBook`, `b`.`category_id`, 
			`c`.`name` AS `category_name`, `c`.`picture` AS `category_picture`";
			$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";

			$query[]	= "WHERE `b`.`status` = 'active'";

			$query		= implode(" ", $query);
			$result = $this->fetchRow($query)['totalBook'];
		}
		return $result;
	}

	public function infoItem($arrParam, $option = null)
	{
		if ($option['task'] == null) {
			$query[]	= "SELECT `id`, `status`, `picture`, `ordering`, `name`";
			$query[]	= "FROM `".TBL_CATEGORY."`";
			$query[]	= "WHERE `".TBL_CATEGORY."`.`id` > 0";
			$query[]	= "ORDER BY `id` ASC ";

			$query		= implode(" ", $query);
			$result		= $this->fetchAll($query);
			return $result;
		}

		if ($option['task'] == 'book-info') {
			$query[] 	= "SELECT `id`, `name`, `picture`, `sale_off`, `special`, `ordering`, `price`, `description`";
			$query[]	= "FROM `".TBL_BOOK."`";
			$query[]	= "WHERE `id` = '" . $arrParam['book_id'] . "'";
			$query[]	= "ORDER BY `id` ASC ";

			$query		= implode(" ", $query);
			$result		= $this->fetchRow($query);
			return $result;
		}


	}

	public function countItemCategory($arrParam, $options = null)
    {
		$query[]	= "SELECT COUNT(`b`.`id`) AS `totalBook`, `b`.`category_id`, 
		`c`.`name` AS `category_name`, `c`.`picture` AS `category_picture`, `b`.`status` AS `book_status`, `b`.`ordering`, `c`.`status` AS `category_status`";
		$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";

		if($options['task'] == 'categories-active'){
			$query[]	= "WHERE `c`.`status` = 'active'";
			$query[]	= "GROUP BY `b`.`category_id`";
			$query[] 	= "ORDER BY `c`.`ordering` ASC ";
			// $query[] 	= "LIMIT 0,4";
		}

		$query		= implode(" ", $query);
		// echo $query		= implode(" ", $query);
		// echo '<br>';

		if($options['task'] == null){
			$result 	= $this->fetchRow($query)['category_id'];
		}elseif($options['task'] == 'categories-active'){
			$result		= $this->fetchAll($query);	
		}
		return $result;
	}
	



	
}
