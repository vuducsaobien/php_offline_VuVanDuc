<?php
class UserController extends BackendController
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
	}

	// ACTION: LIST GROUP
	public function indexAction()
	{
		$this->_view->_title 		= ucfirst($this->_controllerName) . ' Manager :: List';
		$totalItems				  	= $this->_model->countItem($this->_arrParam);
		$configPagination 		  	= ['totalItemsPerPage'		=> 4, 'pageRange' 	=> 3];
		$this->setPagination($configPagination);
		$this->_view->pagination  	= new Pagination($totalItems, $this->_pagination);

		$this->_view->filterGroup 	= $this->_model->itemInSelectbox($this->_arrParam);

		$this->_view->countActive   = $this->_model->countItem($this->_arrParam, ['task' => 'count-active']);
		$this->_view->countInactive = $this->_model->countItem($this->_arrParam, ['task' => 'count-inactive']);
		
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render($this->_controllerName . '/index');
	}

	// // ACTION: ADD & EDIT GROUP
	public function formAction()
	{
		$this->_view->_title = ucfirst($this->_controllerName) . ' Manager :: Add';
		$this->_view->filterGroup 	= $this->_model->itemInSelectbox($this->_arrParam);

		if (isset($this->_arrParam['id'])) {
			$this->_view->_title = ucfirst($this->_controllerName) . ' Manager :: Edit';
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam);
			if (empty($this->_arrParam['form'])) URL::redirect($this->_arrParam['module'], $this->_arrParam['controller'], 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			$this->_validate->validate($this->_model);
			$this->_arrParam['form'] = $this->_validate->getResult();

			if (!$this->_validate->isValid()) {
				$this->_view->errors = $this->_validate->showErrors();

			} else {
				$task = isset($this->_arrParam['form']['id']) ? 'edit' : 'add';
				$id = $this->_model->saveItem($this->_arrParam, ['task' => $task]);
				$this->redirectAfterSave(['id' => $id]);
			}
		}

		$this->_view->arrParam = $this->_arrParam;
		$this->_view->render($this->_controllerName . '/form');
	}

	public function ajaxChangeGroupAction()
    {
        $result = $this->_model->changeGroup($this->_arrParam);
        echo json_encode($result);
    }

	public function reset_passwordAction() {
		$this->_view->_title = ucfirst($this->_controllerName) . ' Manager :: Reset Password';
		$userInfo	= Session::get('user')['info'];

		if(isset($this->_arrParam['new-password'])){
			if(isset($this->_arrParam['id'])){
				$this->_model->resetPassword($this->_arrParam);
			}else{
				$this->_model->resetPassword($userInfo);
			}
			URL::redirect($this->_arrParam['module'], $this->_controllerName, 'index');
		}
        $this->_view->Items = $this->_model->infoItem($this->_arrParam);
        $this->_view->render("{$this->_controllerName}/reset-password");
    }

}
