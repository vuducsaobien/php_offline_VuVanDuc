<?php 
	// ====================== PATHS ===========================
	define ('DS'				, '/');
	define ('ROOT_PATH'			, dirname(__FILE__));						// Định nghĩa đường dẫn đến thư mục gốc
	define ('LIBRARY_PATH'		, ROOT_PATH . DS . 'libs' . DS);			// Định nghĩa đường dẫn đến thư mục thư viện
	define ('LIBRARY_EXT_PATH'	, LIBRARY_PATH . 'extends' . DS);			// Định nghĩa đường dẫn đến thư mục thư viện
	define ('PUBLIC_PATH'		, ROOT_PATH . DS . 'public' . DS);			// Định nghĩa đường dẫn đến thư mục public							
	define ('UPLOAD_PATH'		, PUBLIC_PATH  . 'files' . DS);				// Định nghĩa đường dẫn đến thư mục upload
	define ('SCRIPT_PATH'		, PUBLIC_PATH  . 'scripts' . DS);				// Định nghĩa đường dẫn đến thư mục upload
	define ('APPLICATION_PATH'	, ROOT_PATH . DS . 'application' . DS);		// Định nghĩa đường dẫn đến thư mục application							
	define ('MODULE_PATH'		, APPLICATION_PATH . 'module' . DS);		// Định nghĩa đường dẫn đến thư mục module							
	define ('BLOCK_PATH'		, APPLICATION_PATH . 'block' . DS);			// Định nghĩa đường dẫn đến thư mục block							
	define ('TEMPLATE_PATH'		, PUBLIC_PATH . 'template' . DS);			// Định nghĩa đường dẫn đến thư mục template							
	
	// define	('URL_ROOT'			, DS);
	// define	('URL_ROOT_NAME'	, 'php_offline_VuVanDUC' . DS . 'php03' . DS . 'bookstore' . DS);
	define	('URL_ROOT'			, DS . 'php_offline_VuVanDUC' . DS . 'php03' . DS . 'bookstore' . DS);
	// define	('URL_APPLICATION'	, URL_ROOT . URL_ROOT_NAME .  'application' . DS);
	// define	('URL_PUBLIC'		, URL_ROOT . URL_ROOT_NAME . 'public' . DS);
	define	('URL_APPLICATION'	, URL_ROOT . 'application' . DS);
	define	('URL_PUBLIC'		, URL_ROOT . 'public' . DS);
	define	('URL_UPLOAD'		, URL_PUBLIC . 'files' . DS);
	define	('URL_TEMPLATE'		, URL_PUBLIC . 'template' . DS);

	define	('DEFAULT_MODULE'		, 'frontend');
	define	('DEFAULT_CONTROLLER'	, 'index');
	define	('DEFAULT_ACTION'		, 'index');

	// ====================== DATABASE ===========================
	define ('DB_HOST'			, 'localhost');
	define ('DB_USER'			, 'root');						
	define ('DB_PASS'			, '');						
	define ('DB_NAME'			, 'bookstore');						
	define ('DB_TABLE'			, 'group');
		
	// define ('DB_HOST'			, 'localhost');
	// define ('DB_USER'			, 'ducvuphp03_bookstore');						
	// define ('DB_PASS'			, '3y4lg35p');						
	// define ('DB_NAME'			, 'ducvuphp03_bookstore');						
	// define ('DB_TABLE'			, 'group');			


	// ====================== DATABASE TABLE===========================
	define ('TBL_GROUP'			, 'group');
	define ('TBL_USER'			, 'user');
	define ('TBL_PRIVELEGE'		, 'privilege');
	define ('TBL_CATEGORY'		, 'category');
	define ('TBL_BOOK'			, 'book');
	define ('TBL_CART'			, 'cart');
	define ('TBL_SLIDE'			, 'slide');
	
	// ====================== CONFIG ===========================
	define ('TIME_LOGIN'		 , 7200);
	define('DB_DATETIME_FORMAT',    'Y-m-d H:i:s');
	// define('DEFAULT_TIMEZONE',      'Asia/Ho_Chi_Minh');
	define('DEFAULT_TIMEZONE',      'Asia/Krasnoyarsk'); //+7.00
	define('DATETIME_FORMAT',       'd-m-Y H:i:s');
	define('TIMEDATE_FORMAT',       'H:i:s || d-m-Y');
	define('MONEY_VALUE',       'đ');

	?>