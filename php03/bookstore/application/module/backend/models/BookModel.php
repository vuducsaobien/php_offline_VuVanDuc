<?php
class BookModel extends BackendModel
{
	protected $_columnsBook 	  	   = [
		'id', 'name', 'description', 'price', 'sale_off', 'picture', 'special',
		'category_id', 'status', 'ordering', 'created', 'created_by',  'modified', 'modified_by'
	];
	
	protected $fieldSearchAcceptedBook = ['id', 'name'];

	public function __construct()
	{
		parent::__construct();
	}

	public function changeCategory($params)
    {
        $id 		= $params['id'];
		$category 	= $params['category_id'];
		$modifiedBy = $this->userInfo['username'];
        $modified   = date(DB_DATETIME_FORMAT);
        $query 		= "UPDATE `$this->table` SET `category_id` = $category, `modified` = '$modified', `modified_by` = '$modifiedBy' WHERE `id` = $id";
        $this->query($query);
        return [
            'id' => $id,
            'modified'  => HTML::showItemHistory($modifiedBy, $modified),
        ];
    }

	public function itemInSelectbox($arrParam, $option = null){
		if($option == null){
			$query 	= "SELECT `id`, `name` FROM `".TBL_CATEGORY."`";
			$result = $this->fetchPairs($query);
			$result['default'] = "- Select Category -";
			ksort($result);
		}	
		return $result;
	}

	public function ajaxOrdering($params)
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

}
