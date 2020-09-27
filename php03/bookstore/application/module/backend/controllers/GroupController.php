<?php
class GroupController extends BackendController
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
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam);

		$this->_view->render($this->_controllerName . '/index');
	}

	// ACTION: ADD & EDIT GROUP
	public function formAction()
	{
		$this->_view->_title 	 = ucfirst($this->_controllerName) . ' Manager :: Add';

		if (isset($this->_arrParam['id']) && !isset($this->_arrParam['form']['token'])) {
			$this->_view->_title = ucfirst($this->_controllerName) . ' Manager :: Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);

			if (empty($this->_arrParam['form'])) URL::redirect($this->_moduleName, $this->_controllerName, 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			$this->_validate->validate();
			$this->_arrParam['form'] = $this->_validate->getResult();

			if ($this->_validate->isValid() == false) {
				$this->_view->errors = $this->_validate->showErrors();
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
	
	public function ajaxOrderingAction()
    {
		$result = $this->_model->ajaxOrdering($this->_arrParam);
        echo json_encode($result);
	}
	

}
