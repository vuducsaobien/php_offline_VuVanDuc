<?php
$module         = $this->arrParam['module'];
$controller     = $this->arrParam['controller'];
$action         = $this->arrParam['action'];

$linkMyAccount      = URL::createLink($module, 'user', 'index');
$linkChangePass     = URL::createLink($module, 'user', 'change_password');
$linkHistory        = URL::createLink($module, 'user', 'history');
$linkLogout         = URL::createLink($module, 'index', 'logout');

$imageURL           = $this->_dirImg;
$userObj 		    = Session::get('user');
$userInfo			= $userObj['info'];

$error 				= $this->errors;