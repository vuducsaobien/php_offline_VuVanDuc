<?php
class UserController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/main/');
		$this->_templateObj->setFileTemplate('register.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();

		$this->_moduleName = $this->_arrParam['module'];
		$this->_controllerName = $this->_arrParam['controller'];
		$this->_actionName = $this->_arrParam['action'];
	}

	public function change_passwordAction(){
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);

		if (!isset($this->_arrParam['form']['token'])) {
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam , ['task' => 'change-user-info']);

			// if (empty($this->_arrParam['form'])) URL::redirect($this->_moduleName, $this->_controllerName, 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			// $validate = new Validate($this->_arrParam['form']);
			// $validate
			// 	->addRule('fullname', 'string', ['min' => 3, 'max' => 255] )
			// 	->addRule('address', 'string', ['min' => 3, 'max' => 255] )
			// 	->addRule('phone', 'int', ['min' => 3, 'max' => 12] );
			// $validate->run();
			
			// $this->_arrParam['form'] = $validate->getResult();
			// if ($validate->isValid() == false) {
			// 	$this->_view->errors = $validate->showErrors();
			// } else {
				$this->_model->saveItem($this->_arrParam, ['task' => 'edit']);
				// $this->redirectAfterSave(['id' => $id]);
				// if ($this->_arrParam['type'] == 'save-close')   URL::redirect($this->_moduleName, $this->_controllerName, 'index');
				// if ($this->_arrParam['type'] == 'save-new')     URL::redirect($this->_moduleName, $this->_controllerName, 'form');
				// if ($this->_arrParam['type'] == 'save')         URL::redirect($this->_moduleName, $this->_controllerName, 'form', ['id' => $params['id']]);		
			// }
		}


		$this->_view->arrParam = $this->_arrParam;
		$this->_view->setTitle($title);
		$this->_view->render($this->_controllerName . '/change-password');
		// $this->_view->render('user/index');
	}


	public function indexAction(){
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);

		if (!isset($this->_arrParam['form']['token'])) {
			$this->_arrParam['form'] = $this->_model->infoItem($this->_arrParam , ['task' => 'change-user-info']);

			// if (empty($this->_arrParam['form'])) URL::redirect($this->_moduleName, $this->_controllerName, 'index');
		}

		if ($this->_arrParam['form']['token'] > 0) {
			$validate = new Validate($this->_arrParam['form']);
			$validate
				->addRule('fullname', 'string', ['min' => 3, 'max' => 255] )
				->addRule('address', 'string', ['min' => 3, 'max' => 255] )
				->addRule('phone', 'int', ['min' => 3, 'max' => 12] );
			$validate->run();
			
			$this->_arrParam['form'] = $validate->getResult();
			if ($validate->isValid() == false) {
				$this->_view->errors = $validate->showErrors();
			} else {
				$email = $this->_model->saveItem($this->_arrParam, ['task' => 'edit']);
				// $this->redirectAfterSave(['id' => $id]);
				// if ($this->_arrParam['type'] == 'save-close')   URL::redirect($this->_moduleName, $this->_controllerName, 'index');
				// if ($this->_arrParam['type'] == 'save-new')     URL::redirect($this->_moduleName, $this->_controllerName, 'form');
				// if ($this->_arrParam['type'] == 'save')         URL::redirect($this->_moduleName, $this->_controllerName, 'form', ['id' => $params['id']]);		
			}
		}


		$this->_view->arrParam = $this->_arrParam;
		$this->_view->setTitle($title);
		$this->_view->render($this->_controllerName . '/index');
		// $this->_view->render('user/index');
	}

	public function orderAction(){
		$cart	= Session::get('cart');
		$bookID	= $this->_arrParam['book_id'];
		$price	= $this->_arrParam['price'];
		
		if(empty($cart)){
			$cart['quantity'][$bookID]	= 1;
			$cart['price'][$bookID]		= $price;
		}else{
			if(key_exists($bookID, $cart['quantity'])){
				$cart['quantity'][$bookID]	+= 1;
				$cart['price'][$bookID]		= $price * $cart['quantity'][$bookID];
			}else{
				$cart['quantity'][$bookID]	= 1;
				$cart['price'][$bookID]		= $price;
			}
		}
		
		Session::set('cart', $cart);
		URL::redirect($this->_moduleName, 'book', 'index', ['book_id' => $bookID]);
	}

	public function cartAction(){
		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
		$this->_view->_title	= 'My Cart';
		$this->_view->Items		= $this->_model->listItem($this->_arrParam, ['task' => 'books-in-cart']);
		$this->_view->render('user/cart');
	}

	public function historyAction(){
		$title = ucfirst($this->_controllerName) . ' || ' . ucfirst($this->_actionName);
		$this->_view->_title	= 'History';
		$this->_view->Items		= $this->_model->listItem($this->_arrParam, ['task' => 'history-cart']);
		$this->_view->setTitle($title);
		$this->_view->render('user/history');
		// $this->_view->render($this->_controller.'/history');
	}
	
	public function buyAction(){
		$title = ucfirst($this->_controllerName);
		$this->_model->saveItem($this->_arrParam, ['task' => 'submit-cart']);
		// URL::redirect('default', 'index', 'index');
		$this->_view->setTitle($title);
		URL::redirect($this->_moduleName, 'index', 'index');
	}






	
}
