<?php
// IndexController
$module     = $this->arrParam['module'];
$controller = $this->arrParam['controller'];
$action     = $this->arrParam['action'];
$item		= $this->Items;

$linkLogout = URL::createLink($module, 'index', 'logout');
$linkViewSite = URL::createLink('frontend', 'index', 'index');

$imageURL	= $this->_dirImg;
$arrMenu	= array(
// array('link' => URL::createLink($module, 'book', 'add')			, 'name' => 'Add new book'		, 'image' => 'icon-48-article-add'),
['link' => URL::createLink($module, 'group', 'index')		, 'name' => 'Group manager'		, 'count' => $item['group']		, 'icon' => 'ion ion-ios-people'],
['link' => URL::createLink($module, 'user', 'index')		, 'name' => 'User manager'		, 'count' => $item['user']		, 'icon' => 'ion ion-ios-person'],
['link' => URL::createLink($module, 'category', 'index')	, 'name' => 'Category manager'	, 'count' => $item['category']	, 'icon' => 'ion ion-clipboard'],
['link' => URL::createLink($module, 'book', 'index')		, 'name' => 'Book manager'		, 'count' => $item['book']		, 'icon' => 'ion ion-ios-book']
);

foreach($arrMenu as $value){
	// $image	= $imageURL .'/header/'.$value['image'].'.png';
	$xhtml .= '
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<h3>'.$value['count'].'</h3>
				<p>'.$value['name'].'</p>
			</div>
			<div class="icon text-white">
			<i class="'.$value['icon'].'"></i>
			</div>
			<a href="'.$value['link'].'" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
';
}
?>

<div class="row justify-content-center">
	<?php echo $xhtml;?>

	<a href="<?php echo $linkLogout ;?>" class="small-box-footer">Logout
	<i class="fas fa-sign-out-alt"></i></a>

	<p> <---------> </p>

	<a href="<?php echo $linkViewSite ;?>" class="small-box-footer">View Site
	<i class="far fa-eye"></i></a>


</div>