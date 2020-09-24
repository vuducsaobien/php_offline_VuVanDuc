<?php
class CartController extends BackendController
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
	}

	// ACTION: LIST GROUP
	public function indexAction()
	{
		$this->_view->_title 		= ucfirst($this->_controllerName) . ' Manager :: List';

		$totalItems					= $this->_model->countItem($this->_arrParam);
		$configPagination = ['totalItemsPerPage' => 4, 'pageRange' => 3];
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);

		$this->_view->countActive 	= $this->_model->countItem($this->_arrParam, ['task' => 'count-active']);
		$this->_view->countInactive = $this->_model->countItem($this->_arrParam, ['task' => 'count-inactive']);
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam, ['task' => 'cart-list']);

		// $this->_view->render($this->_controllerName . '/index');
		$this->_view->render('cart/index');

	}

	public function ajaxChangeStatusAction()
    {
		$result = $this->_model->ajaxChangeStatusLib($this->_arrParam);
        echo json_encode($result);
    }

	

}
