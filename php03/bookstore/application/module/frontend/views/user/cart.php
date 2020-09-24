<!-- HEAD -->
<?php require_once 'elements/head.php' ;?>

<!-- TITLE -->
<?php require_once 'elements/title.php' ;?>

<?php
$linkCategory  = URL::createLink($module, 'category', 'index');
$linkSubimtForm	= URL::createLink($module, $controller, 'buy');

// DUC
if(!empty($this->Items)){
	$total = 0;
	foreach($this->Items as $key => $value){
		$bookID 		= $value['id'];
		$quantity 		= $value['quantity'];

		$price 			= HTML_Frontend::moneyFormat($value['price'], null);
		$totalPriceBook = HTML_Frontend::moneyFormat($value['totalprice'], null);
		$total 			+= $value['totalprice'];
		$totalFormat 	= HTML_Frontend::moneyFormat($total, null);

		$srcPicture     = HTML_Frontend::getSrcPicture($value['picture'], TBL_BOOK);
		$link           = URL::createLink($module, 'book', 'index', ['book_id' => $bookID, 'category_id' => $categoryID]);
		$classImage     = '';
		$image 			= HTML_Frontend::showProductImage($link, $srcPicture, $value['name'], $classImage);
		$name 			= HTML_Frontend::showProductName($link, $value['name'], '4');

		$inputBookID	= Helper::cmsInput('hidden', 'form[book_id][]', "input_book_id_'.$bookID.'", null, $bookID);
		$inputPrice		= Helper::cmsInput('hidden', 'form[price][]', "input_price_'.$bookID.'", null, $value['price']);
		$inputQuantity	= Helper::cmsInput('hidden', 'form[quantity][]', "input_quantity_'.$bookID.'", null, $value['quantity']);
		$inputName		= Helper::cmsInput('hidden', 'form[name][]', "input_name_'.$bookID.'", null, $value['name']);
		$inputPicture	= Helper::cmsInput('hidden', 'form[picture][]', "input_picture_'.$bookID.'", null, $value['picture']);

		$xhtmlOrder .= '
			<tr>
				<td>'.$image.'</td>

				<td><a href="'.$link.'">'.$value['name'].'</a>
					<div class="mobile-cart-content row">
						<div class="col-xs-3">
							<h2 class="td-color text-lowercase">
								<a href="'.$link.'" class="icon"><i class="ti-close"></i></a>
							</h2>
						</div>
					</div>
				</td>

				<td>
					<h2 class="text-lowercase">'.$price.'</h2>
				</td>

				<td><a href="'.$link.'" class="icon"><i class="ti-close"></i></a></td>

				<td>
					<div class="qty-box">
						<div class="input-group">
							<input readonly type="number" name="quantity" value="'.$quantity.'" class="form-control input-number" id="quantity-'.$quantity.'" min="1">
						</div>
					</div>
				</td>

				<td><a href="'.$link.'" class="icon"><i class="ti-arrow-right"></i></a></td>
				
				<td>
					<h2 class="td-color text-lowercase">'.$totalPriceBook.'</h2>
				</td>
			</tr>
			'. $inputBookID . $inputPrice . $inputQuantity . $inputName . $inputPicture.'
		';
	}
?>

<form action="<?php echo $linkSubimtForm;?>" method="POST" name="admin-form" id="admin-form">
	<section class="cart-section section-b-space">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<table class="table cart-table table-responsive-xs">
						<thead>
							<tr class="table-head">
								<th scope="col">Hình ảnh</th>
								<th scope="col">Tên sách</th>
								<th scope="col">Giá</th>
								<th scope="col"></th>
								<th scope="col">Số Lượng</th>
								<th scope="col"></th>
								<th scope="col">Thành tiền</th>
							</tr>
						</thead>

						<tbody>
							<?php echo $xhtmlOrder ;?>

							<!-- <tr>
								<td>
									<a href="item.html">
										<img src="<?php echo $imageURL;?>/product.jpg" alt="Chờ Đến Mẫu Giáo Thì Đã Muộn">
									</a>
								</td>

								<td><a href="item.html">Chờ Đến Mẫu Giáo Thì Đã Muộn</a>
									<div class="mobile-cart-content row">

										<div class="col-xs-3">
											<div class="qty-box">
												<div class="input-group">
													<input type="number" name="quantity" value="1" class="form-control input-number" id="quantity-10" min="1">
												</div>
											</div>
										</div>

										<div class="col-xs-3">
											<h2 class="td-color text-lowercase">
												<a href="#" class="icon"><i class="ti-close"></i></a>
											</h2>
										</div>

									</div>
								</td>

								<td>
									<h2 class="text-lowercase">48,300 đ</h2>
								</td>

								<td><a href="#" class="icon"><i class="ti-close"></i></a></td>

								<td>
									<div class="qty-box">
										<div class="input-group">
											<input type="number" name="quantity" value="1" class="form-control input-number" id="quantity-10" min="1">
										</div>
									</div>
								</td>

								<td><a href="#" class="icon"><i class="ti-arrow-right"></i></a></td>


								<td>
									<h2 class="td-color text-lowercase">48,300 đ</h2>
								</td>
								</tr>
								<input type="hidden" name="form[book_id][]" value="10" id="input_book_id_10">
								<input type="hidden" name="form[price][]" value="48300" id="input_price_10">
								<input type="hidden" name="form[quantity][]" value="1" id="input_quantity_10">
								<input type="hidden" name="form[name][]" value="Chờ Đến Mẫu Giáo Thì Đã Muộn" id="input_name_10">
								<input type="hidden" name="form[picture][]" value="product.jpg" id="input_picture_10"> -->
								
								<!-- <tr>
									<td>
										<a href="item.html"><img src="<?php echo $imageURL;?>/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
									</td>
									<td>
										<a href="item.html">Cẩm Nang Cấu Trúc Tiếng Anh</a>
										<div class="mobile-cart-content row">
											<div class="col-xs-3">
												<div class="qty-box">
													<div class="input-group">
														<input type="number" name="quantity" value="1" class="form-control input-number" id="quantity-47" min="1">
													</div>
												</div>
											</div>
											<div class="col-xs-3">
												<h2 class="td-color text-lowercase">48,020 đ</h2>
											</div>
											<div class="col-xs-3">
												<h2 class="td-color text-lowercase">
													<a href="#" class="icon"><i class="ti-close"></i></a>
												</h2>
											</div>
										</div>
									</td>
									<td>
										<h2 class="text-lowercase">48,020 đ</h2>
									</td>
									<td>
										<div class="qty-box">
											<div class="input-group">
												<input type="number" name="quantity" value="1" class="form-control input-number" id="quantity-47" min="1">
											</div>
										</div>
									</td>
									<td><a href="#" class="icon"><i class="ti-close"></i></a></td>
									<td>
										<h2 class="td-color text-lowercase">48,020 đ</h2>
									</td>
								</tr>
								<input type="hidden" name="form[book_id][]" value="47" id="input_book_id_47">
								<input type="hidden" name="form[price][]" value="48020" id="input_price_47">
								<input type="hidden" name="form[quantity][]" value="1" id="input_quantity_47">
								<input type="hidden" name="form[name][]" value="Cẩm Nang Cấu Trúc Tiếng Anh" id="input_name_47">
							<input type="hidden" name="form[picture][]" value="product.jpg" id="input_picture_47"> -->
						</tbody>

					</table>

					<table class="table cart-table table-responsive-md">
						<tfoot>
							<tr>
								<td>Tổng :</td>
								<td>
									<h2 class="text-lowercase"><?php echo $totalFormat;?></h2>
								</td>
							</tr>
						</tfoot>
					</table>

				</div>
			</div>
			<div class="row cart-buttons">
				<div class="col-6"><a href="<?php echo $linkCategory;?>" class="btn btn-solid">Tiếp tục mua sắm</a></div>
				<div class="col-6"><button type="submit" class="btn btn-solid">Đặt hàng</button></div>
			</div>
		</div>
	</section>
</form>

<?php
	}else{
	?>
	<section class="p-0">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="error-section">
						<h4>Bạn chưa mua sắm gì cả ??</h4>
						<a href="index.php?module=frontend&controller=index&action=index" class="btn btn-solid">Quay lại trang chủ</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		}
?>