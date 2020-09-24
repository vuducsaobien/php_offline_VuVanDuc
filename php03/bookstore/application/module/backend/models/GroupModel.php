<?php
class GroupModel extends BackendModel
{
	protected $_columnsGroup = [
		'id', 'name', 'group_acp', 'created', 'created_by', 
		'modified', 'modified_by', 'status', 'ordering'
	];
	protected $fieldSearchAcceptedGroup = ['id', 'name'];

	public function __construct()
	{
		parent::__construct();
	}

	public function ajaxChangeStatusLib2($params)
    {
		echo '<pre>';
		print_r($params);
		echo '</pre>';
		die;
		echo '<h3>Die is Called</h3>';
		$modified = $this->modified;
		$modifiedBy = $this->modified_by;
		$id 		= $params['id'];
		if(isset($params['group_acp'])){
			$groupACP 	= ($params['group_acp']==0) ? 1 : 0;
			echo $query 		= "UPDATE `$this->table` 
			SET `group_acp` = '$groupACP', `modified` = '$modified', `modified_by` = '$modifiedBy' 
			WHERE `id` = $id";	

		}elseif(isset($params['status'])){
			$status 	= ($params['status'] == 'inactive') ? 'active' : 'inactive';
			$query 		= "UPDATE `$this->table` 
			SET `status` = '$status', `modified` = '$modified', `modified_by` = '$modifiedBy' 
			WHERE `id` = $id";	
		}
		
		$this->query($query);
        return [
			'id'        => $id,
			'state'     => $groupACP,
			'modified'  => HTML::showItemHistory($modifiedBy, $modified),
			'link'      => URL::createLink($params['module'], $params['controller'], 'changeGroupACP', ['id' => $id, 'group_acp' => $groupACP])
        ];
	}
	
	public function ajaxChangeStatusLib($arrParam, $options = null)
    {
        $userName = Session::get('user')['info']['username'];
        if ($options['task'] == null) {
            $id         = $arrParam['id'];
            $groupACP   = $arrParam['group_acp'] == 0 ? 1 : 0;
            $modifiedBy = $userName;
			$modified   = date(DB_DATETIME_FORMAT, time());
		    $query = "UPDATE `$this->table` SET `group_acp` = $groupACP, `modified` = '$modified', `modified_by` = '$modifiedBy' WHERE `id` = $id";
			$this->query($query);
			
            return [
                'id'        => $id,
                'state'     => $groupACP,
                'modified'  => HTML::showItemHistory($modifiedBy, $modified),
                'link'      => URL::createLink($arrParam['module'], $arrParam['controller'], 'ajaxChangeStatus', ['id' => $id, 'group_acp' => $groupACP])
            ];
        }
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

}
