<?php
class CategoryController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/main/');
		$this->_templateObj->setFileTemplate('notice.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_moduleName = $this->_arrParam['module'];
		$this->_controllerName = $this->_arrParam['controller'];
		$this->_actionName = $this->_arrParam['action'];
	}

	// ACTION: LIST GROUP
	public function indexAction()
	{
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);
		$totalItems	 = $this->_model->countItem($this->_arrParam);
		$this->_view->totalItems['totalItems'] = $totalItems;

		$configPagination = ['totalItemsPerPage' => 2, 'pageRange' => 3];
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);

		$this->_view->listCategory = $this->_model->countItem($this->_arrParam, 'count-category');

		$this->_view->setTitle($title);
		// $this->_view->Items 		= $this->_model->listItem($this->_arrParam);
		$this->_view->render($this->_controllerName . '/index');
	}


}
