<?php 
$imageURL       = $this->_dirImg;
$module         = $this->arrParam['module'];
$controller     = $this->arrParam['controller'];
$action         = $this->arrParam['action'];

if(!empty($this->booksSpecial)){
	foreach($this->booksSpecial as $book){
		$booksSpecial .= HTML_Frontend::showProductBox($book, false, true);
	}
}

$cart	= Session::get('cart');
?>


<!-- Title-->
<div class="title1 section-t-space title5">
    <h2 class="title-inner1">Sản phẩm nổi bật</h2>
    <hr role="tournament6">
</div>

<!-- Product slider -->
<section class="section-b-space p-t-0 j-box ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-4 product-m no-arrow">
                    <?php echo $booksSpecial ;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product slider end -->

<!-- Giao hàng miễn phí -->
<?php require_once 'elements/service_layout.php'; ?>


<!-- Danh mục nổi bật -->
<?php require_once 'elements/books-categories.php'; ?>
