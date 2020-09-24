<?php
class CategoryController extends BackendController
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
		$configPagination = ['totalItemsPerPage' => 20, 'pageRange' => 3];
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->countActive 	= $this->_model->countItem($this->_arrParam, ['task' => 'count-active']);
		$this->_view->countInactive = $this->_model->countItem($this->_arrParam, ['task' => 'count-inactive']);
		// $this->_view->countBookUser = $this->_model->countBookUser($this->_arrParam);
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam);
		$this->_view->render($this->_controllerName . '/index');
	}

	// ACTION: ADD & EDIT GROUP
	public function formAction()
	{
		$this->_view->_title 	 = ucfirst($this->_controllerName) . ' Manager :: Add';
		
		if(!empty($_FILES)) {
			$this->_arrParam['form']['picture'] = $_FILES['picture'];
		}

		if (isset($this->_arrParam['id']) && !isset($this->_arrParam['form']['token'])) {
			$this->_view->_title = ucfirst($this->_controllerName) . ' Manager :: Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if (empty($this->_arrParam['form'])) URL::redirect($this->_moduleName, $this->_controllerName, 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
				
				$validate = new Validate($this->_arrParam['form']);
				$validate
					->addRule('name', 'string', ['min' => 3, 'max' => 255] )
					->addRule('status', 'status', ['deny' => array('default') ])
					->addRule('ordering', 'int', ['min' => 1, 'max' => 100] )
					->addRule('picture', 'file', ['min' => 100, 'max' => 1000000000, 'extension' => ['jpg', 'jpeg', 'png']], false);
				$validate->run();
				
				$this->_arrParam['form'] = $validate->getResult();
				if ($validate->isValid() == false) {
					$this->_view->errors = $validate->showErrors();
				} else {
					$task = (isset($this->_arrParam['form']['id'])) ? 'edit' : 'add';
					$id = $this->_model->saveItem($this->_arrParam, ['task' => $task]);
					$this->redirectAfterSave(['id' => $id]);
				}
			}

			$this->_view->arrParam = $this->_arrParam;
			// $this->_view->render($this->_controllerName . '/form');
			$this->_view->render("{$this->_controllerName}/form");
	}
	
	public function ajaxChangeStatusAction()
    {
		$result = $this->_model->ajaxChangeStatusLib($this->_arrParam);
        echo json_encode($result);
    }

	public function ajaxOrderingAction()
    {
		$result = $this->_model->ajaxOrdering($this->_arrParam);
        echo json_encode($result);
	}	

}
