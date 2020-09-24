<?php
class BookController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/main/');
		$this->_templateObj->setFileTemplate('list.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_moduleName = $this->_arrParam['module'];
		$this->_controllerName = $this->_arrParam['controller'];
		$this->_actionName = $this->_arrParam['action'];
	}

	// ACTION: LIST GROUP
	public function listAction()
	{
		$this->_view->listCategories  = $this->_model->countItemCategory($this->_arrParam, ['task' =>'categories-active']);
		$this->_view->booksSpecial 		= $this->_model->listItem($this->_arrParam, ['task' => 'books-special']);

		if(isset($this->_arrParam['category_id'])){
			$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName) . ' in Category';

			$totalItems					= $this->_model->countItem($this->_arrParam);
			$this->_view->totalItems 		= $totalItems;
			$configPagination 			= ['totalItemsPerPage' => 6, 'pageRange' => 3];
			$this->setPagination($configPagination);
			$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);

			$this->_view->booksCategory = $this->_model->listItem($this->_arrParam, ['task' => 'books-category']);
		}else{
			$title 		= ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);

			$totalItems	= $this->_model->countItem($this->_arrParam, 'all-books-active');
			$this->_view->totalItems 	= $totalItems;
			$configPagination 		 	= ['totalItemsPerPage' => 12, 'pageRange' => 3];
			$this->setPagination($configPagination);
			$this->_view->pagination 	= new Pagination($totalItems, $this->_pagination);
	
			$this->_view->booksActive   = $this->_model->listItem($this->_arrParam, ['task' =>'all-books-active']);
			}

		$this->_view->setTitle($title);
		$this->_view->render($this->_controllerName . '/list');
	}

	// ACTION: DETAIL INFO BOOK
	public function indexAction()
	{
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);
		$this->_view->bookInfo  = $this->_model->infoItem($this->_arrParam, ['task' =>'book-info']);
		$this->_view->bookRelate  = $this->_model->listItem($this->_arrParam, ['task' =>'books-relate']);
		$this->_view->booksSpecial 		= $this->_model->listItem($this->_arrParam, ['task' => 'books-special']);
		$this->_view->booksNews 		= $this->_model->listItem($this->_arrParam, ['task' => 'books-news']);

		$this->_view->setTitle($title);
		$this->_view->render($this->_controllerName . '/index');
	}
	


}
