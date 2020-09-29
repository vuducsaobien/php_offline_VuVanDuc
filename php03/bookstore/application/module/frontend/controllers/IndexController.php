<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/main/');
		$this->_templateObj->setFileTemplate('notice.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_moduleName = $this->_arrParam['module'];
        $this->_controllerName = $this->_arrParam['controller'];
        $this->_actionName = $this->_arrParam['controller'];
	}

	public function indexAction(){
		$title = 'Book Store || Trang Chủ';

		$this->_templateObj->setFolderTemplate('frontend/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_view->_title = 'Trang chủ | Book Store';
		$this->_view->booksSpecial 		= $this->_model->listItem($this->_arrParam, ['task' => 'books-special']);
		$this->_view->slides 		= $this->_model->listItem($this->_arrParam, ['task' => 'slides-active']);

		$this->_view->categoriesSpecial = $this->_model->listItem($this->_arrParam, ['task' => 'categories-special']);
		$this->_view->booksCategories = $this->_model->listItem($this->_arrParam, ['task' => 'books-category']);

		$this->_view->setTitle($title);
		$this->_view->render($this->_controllerName . '/index');
		// $this->_view->render('index/index');
	}

	public function loginAction()
	{
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);
		$userInfo	= Session::get('user');

		if( $userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time() ){
			URL::redirect('frontend', 'user', 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			$validate	= new Validate($this->_arrParam['form']);

			$email	= $this->_arrParam['form']['email'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `email` = '$email' AND `password` = '$password'";

			$validate->addRule('email', 'existRecord', array('database' => $this->_model, 'query' => $query))
					->addRule('password', 'password', ['action' => 'add']);
			$validate->run();

			if ($validate->isValid() == true) {
				// Click Cart (chưa Login) => UserModel; rồi => IndexModel
				$infoUser		= $this->_model->infoItem($this->_arrParam); // Notice UserModel OR IndexModel Video 11.Login Public P2 11:00 InfoItem
				$arraySession	= array(
					'login'		=> true,
					'info'		=> $infoUser,
					'time'		=> time(),
					'group_acp'	=> $infoUser['group_acp'],
					// 'phone'		=> $infoUser['phone'],
					// 'address'	=> $infoUser['address']
				);
				Session::set('user', $arraySession);
				URL::redirect('frontend', 'user', 'index', null, 'my-account.html');
			} else {
				$this->_view->errors	= $validate->showErrorsPublic();
			}
		}
		$this->_view->setTitle($title);
		$this->_view->render('index/login');
	}

	public function noticeAction(){
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);
		$this->_view->setTitle($title);
		$this->_view->render('index/notice');
	}

	public function registerAction()
	{
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);
		$userInfo	= Session::get('user');
		if( $userInfo['login'] == true && $userInfo['time'] + TIME_LOGIN >= time() ){
			URL::redirect('frontend', 'user', 'index');
		}

		if(isset($this->_arrParam['form']['submit'])){
			URL::checkRefreshPage($this->_arrParam['form']['token'], $this->_moduleName, 'user', $this->_actionName);
			// URL::checkRefreshPage($this->_arrParam['form']['token'], 'frontend', 'user', 'register'); 
			// Register video xem laị
			// checkRefreshPage không cần vì mình đã addRule Validate rồi, nếu F5 lại sẽ trùng username trong database
			$queryUserName	= "SELECT `id` FROM `".TBL_USER."` WHERE `username` = '".$this->_arrParam['form']['username']."'";
			$queryEmail		= "SELECT `id` FROM `".TBL_USER."` WHERE `email` = '".$this->_arrParam['form']['email']."'";
			$validate = new Validate($this->_arrParam['form']);
			$validate
			->addRule('username', 'string-notExistRecord', [
				'database'  => $this->_model, 
				'query' 	=> $queryUserName, 
				'min' 		=> 3, 'max' => 25
			])
			->addRule('password', 'password', ['action' => 'add'])
			->addRule('email', 'email-notExistRecord', ['database' => $this->_model, 'query' => $queryEmail]);
			$validate->run();
			
			$this->_arrParam['form'] = $validate->getResult();
			if ($validate->isValid() == false) {
				$this->_view->errors = $validate->showErrorsPublic();
			} else {
				$this->_model->saveItem($this->_arrParam, ['task' => 'user-register']);
				// URL::redirect('frontend', 'index', 'notice', ['type' => 'register-success']);
				URL::redirect($this->_moduleName, $this->_controllerName, 'notice', ['type' => 'register-success']);
			}
		}
		$this->_view->setTitle($title);
		// $this->_view->render($this->_controllerName . '/register');
		// $this->_view->render('index/register');
		$this->_view->render($this->_controllerName . DS . 'register');
	}

	public function logoutAction()
	{
		Session::delete('user');
		URL::redirect($this->_moduleName, $this->_controllerName, 'index', null, 'index.html');
	}

	public function quickViewAction()
	{
		// echo '<h3>' . __METHOD__ . '</h3>';
		// echo '<pre>$this->_arrParam ';
		// print_r($this->_arrParam);
		// echo '</pre>';

		$result = $this->_model->infoItem($this->_arrParam, ['task' => 'info-book']);
		echo json_encode($result);
	}


	
}