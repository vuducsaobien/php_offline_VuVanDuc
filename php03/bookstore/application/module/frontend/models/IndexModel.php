<?php
class IndexModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_BOOK);
	}

	public function saveItem($arrParam, $option = null)
	{
		if ($option['task'] == 'user-register') {
			$arrParam['form']['password']		= md5($arrParam['form']['password']);
			$arrParam['form']['register_date']	= date(DB_DATETIME_FORMAT);
			$arrParam['form']['register_ip']	= $_SERVER['REMOTE_ADDR'];
			$arrParam['form']['status']			= 'inactive';

			$data = array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$result = $this->insert($data);
			if ($result) {
				Session::set('notify', Helper::createNotify('success', SUCCESS_ADD));
			} else {
				Session::set('notify', Helper::createNotify('warning', FAIL_ACTION));
			}
			return $this->lastID();
		}
	}

	public function infoItem($arrParam, $option = null){
		if($option == null) {
			$email		= $arrParam['form']['email'];
			$password	= md5($arrParam['form']['password']);

			$query[]	= "SELECT `u`.`id`, `u`.`fullname`, `u`.`status`, `u`.`password`, `u`.`phone`, `u`.`address`,
			`u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`";

			$query[]	= "FROM `user` AS `u` LEFT JOIN `group` AS g ON `u`.`group_id` = `g`.`id`";
			$query[]	= "WHERE `email` = '$email' AND `password` = '$password'";		

			$query		= implode(" ", $query);
			// die('<h3>Die is Called</h3>');
			$result		= $this->fetchRow($query);					
			return $result;
		}
	}

	public function listCategory($arrParam, $option = null){
		if($option == null) {
			$c 		 = '`c`';
			$tableAs = '`c`';

			$query[] = "SELECT $c.`id` AS `category_id`, $c.`name`";
			$query[] = "FROM `".TBL_CATEGORY."` AS $c";
			$query[] = "WHERE $tableAs.`status` = 'active' AND $c.`special` = 1";
			$query[] = "ORDER BY $c.`ordering` ASC ";
			$query[] = "LIMIT 0, 3";

			$query		= implode(" ", $query);
			// die('<h3>Die is Called</h3>');
			$result		= $this->fetchAll($query);					
			return $result;
		}
	}

	public function listItem($arrParam, $options = null)
	{
		if($options['task'] == 'books-special'){
			$b 		 = '`b`';
			$tableAs = '`b`';

			$query[] = "SELECT $b.`id`, $b.`name`, $b.`picture`, $b.`sale_off`, $b.`special`, $b.`ordering`, $b.`price`, $b.`description`";
			$query[] = "FROM `".TBL_BOOK."` AS $b";
			$query[] = "WHERE $tableAs.`status` = 'active' AND $b.`special` = 1";
			$query[] = "ORDER BY $b.`ordering` ASC ";
			$query[] = "LIMIT 0, 6";
		}

		if($options['task'] == 'categories-special' ){
			$c 		 = '`c`';
			$tableAs = '`c`';

			$query[] = "SELECT $c.`id` AS `category_id`, $c.`name`";
			$query[] = "FROM `".TBL_CATEGORY."` AS $c";
			$query[] = "WHERE $tableAs.`status` = 'active' AND $c.`special` = 1";
			$query[] = "ORDER BY $c.`ordering` ASC ";
			$query[] = "LIMIT 0, 4";

		}

		if($options['task'] == 'books-category' ){
			$b 		 = '`b`';
			$c 		 = '`c`';

			// $query[] = "SELECT $c.`id` AS `category_id`, $c.`name`";
			// $query[] = "FROM `".TBL_CATEGORY."` AS $c";
			// $query[] = "WHERE $tableAs.`status` = 'active' AND $c.`special` = 1";
			// $query[] = "ORDER BY $c.`ordering` ASC ";
			// $query[] = "LIMIT 0, 3";
			// $query	 = implode(" ", $query);
			// $temp	 = $this->fetchAll($query);
			

			$listCategorySpecial    = $this->listCategory(null);
            $arrCategorySpecial   = [];
            foreach($listCategorySpecial as $category)
            {
                $arrCategorySpecial[] = ['category_id' => $category['category_id'], 'category_name' => $category['name']];
			}
            $arrTemp = $arrCategorySpecial;

			if(!empty($arrTemp))
            {
                foreach($arrTemp as $key => $item)
                {
                    $query   = [];
					$query[] = "SELECT *";
					$query[] = "FROM `".TBL_BOOK."` AS $b";
					$query[] = "WHERE $b.`category_id` = '{$item['category_id']}'";
					$query[] = "AND $b.`status` = 'active'";
					$query[] = "ORDER BY $b.`ordering` ASC";
					$query[] = "LIMIT 0, 1";

					$query	 = implode(" ", $query);
					$temp	 = $this->fetchAll($query);
                    $arrCategorySpecial[$key]['listBooks'] = $temp;
				}
			}
			// unset($arrTemp);
			return $arrCategorySpecial;
		}

		if($options['task'] != 'books-category' ){
			echo $query		= implode(" ", $query);
			// echo $query		= implode(" ", $query);
			echo  '<br>';
			$result		= $this->fetchAll($query);
			return $result;
		}

	}



}
