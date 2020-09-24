<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
$module         = $this->arrParam['module'];
$controller     = $this->arrParam['controller'];
$action         = $this->arrParam['action'];

$imageURL       = $this->_dirImg;
$linkHome       = URL::createLink('frontend', 'index', 'index');
$linkCategory   = URL::createLink('frontend', 'category', 'index');
$linkBook       = URL::createLink('frontend', 'book', 'list');

$linkRegister   = URL::createLink('frontend', 'index', 'register');
$linkLogin      = URL::createLink('frontend', 'index', 'login');
$linkLogout     = URL::createLink('backend', 'dashboard', 'logout');

$arrayMenu		= [];
if($userObj['login'] == false){
    $arrayMenu[] = ['link' => URL::createLink('frontend', 'index', 'login'), 	'name' => 'Đăng nhập'];
    $arrayMenu[] = ['link' => URL::createLink('frontend', 'index', 'register'), 'name' => 'Đăng ký'];
}else{
    $arrayMenu[] = ['link' => URL::createLink('frontend', 'index', 'logout'),   'name' => 'Logout'];
}


if($userInfo['group_acp'] == 1 && $userInfo['status'] == 'active'){
    $arrayMenu[] = ['link' => URL::createLink('backend', 'dashboard', 'index'),   'name' => 'Admin Control Panel']; 
}

foreach($arrayMenu as $menu){
    $xhtml .= '
        <li><a href="'.$menu['link'].'">'.$menu['name'].'</a></li>
    ';
}

$query[]	= "SELECT COUNT(`b`.`id`) AS `totalBook`, `b`.`category_id`, `c`.`name` AS `category_name`, `c`.`picture` AS `category_picture`";
$query[]	= "FROM `".TBL_BOOK."` AS `b` LEFT JOIN `".TBL_CATEGORY."` AS `c` ON `b`.`category_id` = `c`.`id`";
$query[]	= "WHERE `c`.`status` = 'active'";
$query[]	= "GROUP BY `b`.`category_id`";
$query[] 	= "ORDER BY `c`.`ordering` ASC ";
$query		= implode(" ", $query);
$listCats   = $model->fetchAll($query);

$xhtmlCats  = '';
if (!empty($listCats)) {
    foreach($listCats as $value){
        $link = URL::createLink('frontend', 'book', 'list', ['category_id' => $value['category_id']]);
        $xhtmlCats .= '<li><a href="'.$link.'">'.$value['category_name'].'</a></li>';
    }
}

$classHome= '';
$classBook= '';
$classCategory= '';

if($controller=='index') $classHome = 'class="my-menu-link active"';
if($controller=='book') $classBook = 'class="my-menu-link active"';
if($controller=='category') $classCategory = 'class="my-menu-link active"';

?>
<header class="my-header sticky">
    <div class="mobile-fix-option"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="brand-logo">
                            <a href="<?php echo $linkHome ;?>">
                                <h2 class="mb-0" style="color: #5fcbc4">BookStore</h2>
                            </a>
                        </div>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="<?php echo $linkHome ;?>" <?php echo $classHome ;?>>Trang chủ</a></li>
                                    <li><a href="<?php echo $linkBook ;?>" <?php echo $classBook ;?>>Sách</a></li>
                                    <li>
                                        <a href="<?php echo $linkCategory ;?>" <?php echo $classCategory ;?>>Danh mục</a>
                                        <ul><?php echo $xhtmlCats ;?></ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="top-header">
                            <ul class="header-dropdown">
                                <li class="onhover-dropdown mobile-account">
                                    <img src="<?php echo $imageURL;?>/avatar.png" alt="avatar">
                                    <ul class="onhover-show-div">
                                        <?php echo $xhtml ;?>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search">
                                        <div>
                                            <img src="<?php echo $imageURL;?>/search.png" onclick="openSearch()"
                                                class="img-fluid blur-up lazyload" alt="">
                                            <i class="ti-search" onclick="openSearch()"></i>
                                        </div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div>
                                                <span class="closebtn" onclick="closeSearch()"
                                                    title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form action="" method="GET">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            name="search" id="search-input"
                                                                            placeholder="Tìm kiếm sách...">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div>
                                            <a href="cart.html" id="cart" class="position-relative">
                                                <img src="<?php echo $imageURL;?>/cart.png" class="img-fluid blur-up lazyload"
                                                    alt="cart">
                                                <i class="ti-shopping-cart"></i>
                                                <span class="badge badge-warning">0</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
