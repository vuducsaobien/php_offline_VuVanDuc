<?php
class BackendController extends Controller{
	
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_moduleName 		= $this->_arrParam['module'];
		$this->_controllerName 	= $this->_arrParam['controller'];
		$this->_actionName 		= $this->_arrParam['action'];
	}

	// ACTION: MULTI-ACTIVE
	public function multi_activeAction()
	{
		$this->_model->changeStatus($this->_arrParam, ['task' => 'multi-active']);
		URL::redirect($this->_moduleName, $this->_controllerName, 'index');
	}

	// ACTION: MULTI-INACTIVE
	public function multi_inactiveAction()
	{
		$this->_model->changeStatus($this->_arrParam, ['task' => 'multi-inactive']);
		URL::redirect($this->_moduleName, $this->_controllerName, 'index');
	}

	// ACTION: MULTI-DELETE
	public function multi_deleteAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect($this->_moduleName, $this->_controllerName, 'index');
	}
	
	public function redirectAfterSave($params)
    {
        if ($this->_arrParam['type'] == 'save-close')   URL::redirect($this->_moduleName, $this->_controllerName, 'index');
        if ($this->_arrParam['type'] == 'save-new')     URL::redirect($this->_moduleName, $this->_controllerName, 'form');
        if ($this->_arrParam['type'] == 'save')         URL::redirect($this->_moduleName, $this->_controllerName, 'form', ['id' => $params['id']]);
    }



	
	
}