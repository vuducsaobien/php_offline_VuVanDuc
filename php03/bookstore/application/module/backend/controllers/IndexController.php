<?php
class IndexController extends Controller{
	public function __construct($arrParams){
		parent::__construct($arrParams);

		$this->_moduleName 		= $this->_arrParam['module'];
        $this->_controllerName  = $this->_arrParam['controller'];
        $this->_actionName 		= $this->_arrParam['action'];
	}

	public function loginAction()
	{
		$userInfo	= Session::get('user');
		if( $userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time() ){
			URL::redirect($this->_moduleName, 'dashboard', 'index');
		}

		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->_title = 'Login Admin';

		if ($this->_arrParam['form']['token'] > 0) {
			$validate	= new Validate($this->_arrParam['form']);
			$username	= $this->_arrParam['form']['username'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";

			$validate->addRule('username', 'existRecord', ['database' => $this->_model, 'query' => $query])
			->addRule('password', 'password', ['action' => 'add']);
			$validate->run();

			if ($validate->isValid() == true) {
				$infoUser		= $this->_model->infoItem($this->_arrParam, ['task' => 'index-admin-login']);
				// $infoUser		= $this->_model->infoItem($this->_arrParam);

				$arraySession	= array(
					'login'		=> true,
					'info'		=> $infoUser,
					'time'		=> time(),
					'group_acp'	=> $infoUser['group_acp'],
					'status'	=> $infoUser['status'],
					'phone'		=> $infoUser['phone'],
					'address'	=> $infoUser['address']
				);
				Session::set('user', $arraySession);
				URL::redirect($this->_moduleName, 'dashboard', 'index');
			} else {
				$this->_view->errors	= $validate->showErrors();
			}
		}

		$this->_view->render('index/login');
	}

	public function logoutAction(){
		Session::delete('user');
		// URL::redirect('backend', 'index', 'login');
		URL::redirect($this->_moduleName, 'index', 'login');

	}

	public function profileAction()
	{
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->_title 		= ucfirst($this->_controllerName) . ' Manager :: My Profile';
		$this->_view->filterGroup 	= $this->_model->itemInSelectbox($this->_arrParam);

		if ($this->_arrParam['form']['token'] > 0) {
			$queryUserName	= "SELECT `id` FROM `" . TBL_USER . "` WHERE `username` = '" . $this->_arrParam['form']['username'] . "'";
			$queryEmail		= "SELECT `id` FROM `" . TBL_USER . "` WHERE `email` = '" . $this->_arrParam['form']['email'] . "'";
			
			if (isset($this->_arrParam['form']['id'])) {
				$queryUserName 	.= " AND `id` <> '" . $this->_arrParam['form']['id'] . "'";
				$queryEmail 	.= " AND `id` <> '" . $this->_arrParam['form']['id'] . "'";
			}

			$validate = new Validate($this->_arrParam['form']);
			$validate
				->addRule('email', 'email-notExistRecord', [
					'database' 	=> $this->_model,
					'query' 	=> $queryEmail
				]);

			$validate->run();
			$this->_arrParam['form'] = $validate->getResult();

			if ($validate->isValid() == false) {
				$this->_view->errors = $validate->showErrors();
			} else {
				// $id = $this->_model->saveItem($this->_arrParam, 'index-admin-profile');
				$id = $this->_model->saveItem($this->_arrParam);
				if ($this->_arrParam['type'] == 'save-close')  URL::redirect($this->_moduleName, 'user', 'index');
				if ($this->_arrParam['type'] == 'save') 	   URL::redirect($this->_moduleName, $this->_controllerName, 'profile', ['id' => $id]);
				// if ($this->_arrParam['type'] == 'save') 	   URL::redirect($this->_moduleName, $this->_controllerName, 'profile', ['id' => $id]);

				// $this->redirectAfterSave(['id' => $id]);
			}
		}
		// $this->_view->render('index/profile');
		$this->_view->render($this->_controllerName . '/profile');

	}

	public function noticeAction(){
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_view->_title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);
		$this->_view->render('index/notice');
	}



}