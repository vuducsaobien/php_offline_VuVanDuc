<?php
class CartModel extends BackendModel
{
	protected $_columnsCart = [
		'id', 'username', 'status', 'dates', 'modified', 'modified_by'
	];
	protected $fieldSearchAcceptedCart = ['id', 'username'];

	public function __construct()
	{
		parent::__construct();
	}



}
