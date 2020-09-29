<?php
class DashboardController extends Controller

{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_moduleName 		= $this->_arrParam['module'];
		$this->_controllerName  = $this->_arrParam['controller'];
		$this->_actionName 		= $this->_arrParam['controller'];
	}

	public function indexAction()
	{
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$totalItems['group']	= $this->_model->countItem($this->_arrParam, 'group');
		$totalItems['user']		= $this->_model->countItem($this->_arrParam, 'user');
		$totalItems['book']		= $this->_model->countItem($this->_arrParam, 'book');
		$totalItems['category']	= $this->_model->countItem($this->_arrParam, 'category');
		$totalItems['cart']		= $this->_model->countItem($this->_arrParam, 'cart');
		$totalItems['slide']	= $this->_model->countItem($this->_arrParam, 'slide');

		$this->_view->Items = $totalItems;
		$this->_view->_title = 'DashBoard';
		$this->_view->render('dashboard/index');
	}


}
