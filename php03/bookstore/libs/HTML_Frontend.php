<?php
class HTML_Frontend
{
    public static function showProductBox($product, $showName=true, $showDescription=false, $showDiv=false, $divStart=null ,$divEnd=null)
    {
        $bookID     = $product['id'];
        $categoryID = $product['category_id'];

        $link               = URL::createLink('frontend', 'book', 'index', ['book_id' => $bookID, 'category_id' => $categoryID]);
        $price              = self::showPriceProductBox($product['price'], $product['sale_off']);
        
        $shortDescription   = substr($product['description'], 0, 100) .' ...';
        $shortDescription   = $showDescription ? self::showShortDescription($shortDescription) : '';
        $productName        = $showName ? self::showProductName($link, $product['name']) : '';

        $classImage         = 'img-fluid blur-up lazyload bg-img';
        $divStartImage      = '<div class="front">';
        $divEndImage        = '</div>';
        $srcPicture         = self::getSrcPicture($product['picture'], TBL_BOOK);

        $priceOrder         = self::moneyFormat(null, 'price_order', $product['price'], $product['sale_off']);
        $addToCartLink      = URL::createLink('frontend', 'user', 'order', ['book_id' => $bookID, 'price' => $priceOrder]);

        $xhtml = '
            <div class="product-box">
                <div class="img-wrapper">
                    '.self::showSaleOffLabel($product['sale_off']).'
                    '.self::showProductImage($link, $srcPicture, $product['name'], $classImage,  true, $divStartImage, $divEndImage).'
                    <div class="cart-info cart-wrap">
                        '.self::showBtnAddToCartProductBox($addToCartLink).'
                        '.self::showBtnQuickView('URL_ROOT', $bookID).'
                    </div>
                </div>

                <div class="product-detail">
                    '.self::showStarRating().'
                    '.$productName.'
                    '.$shortDescription.'
                    '.$price.'
                </div>
            </div>
        ';
        if($showDiv==true)$xhtml = $divStart.$xhtml.$divEnd;
        return $xhtml;
    }

    public static function showProductMedia($product, $showName=true, $showDescription=false, $showDiv=false, $divStart='<div>' ,$divEnd='</div>')
    {
        $bookID             = $product['id'];
        $categoryID         = $product['category_id'];
        $link               = URL::createLink('frontend', 'book', 'index', ['book_id' => $bookID, 'category_id' => $categoryID]);
        $shortDescription   = substr($product['description'], 0, 100) .' ...';
        $shortDescription   = $showDescription ? self::showShortDescription($shortDescription) : '';
        $productName        = $showName ? self::showProductName($link, $product['name']) : '';
        $srcPicture         = self::getSrcPicture($product['picture'], TBL_BOOK);
        $priceSaleFormat    = self::moneyFormat(null, 'price_sale', $product['price'], $product['sale_off']);
        $xhtml = '
            <div class="media">
                '.self::showProductImage($link, $srcPicture, $product['name'], false).'
                <div class="media-body align-self-center">
                    '.self::showStarRating().'
                    '.$productName.'
                    <h4 class="text-lowercase">'.$priceSaleFormat.'</h4>
                </div>
            </div>
        ';
        if($showDiv==true)$xhtml = $divStart.$xhtml.$divEnd;
        return $xhtml;
    }

    public static function createSlide($source, $booksPerSlide=3, $showDiv=true, $divStart='<div>' ,$divEnd='</div>')
    {
        $totalBook = count($source);
        $totalSlide = ceil($totalBook / $booksPerSlide);
        $xhtml = '';
        if(!empty($source))
        {
            $bookCurrent = 0;
            for($i = 1; $i <= $totalSlide; $i++)
            {
                $xhtml .= $divStart;
                $count = 0;
                for($j = $bookCurrent; $j < $totalBook; $j++, $bookCurrent++)
                {
                    $count++;
                    if($count > $booksPerSlide)
                        break;
                    $xhtml .= self::showProductMedia($source[$j], true, false, false);
                }
                $xhtml .= $divEnd;
            }
            unset($bookCurrent, $count);
        }
        return $xhtml;
    }


    public static function showPriceProductBox($price, $saleOff)
    {
        $priceFormat        = self::moneyFormat($price, null);
        $priceSaleFormat    = self::moneyFormat(null, 'price_sale', $price, $saleOff);

        if($saleOff > 0){
            $xhtml = '<h4 class="text-lowercase">'.$priceSaleFormat.' <del>'.$priceFormat.'</del></h4>';
        }else{
            $xhtml = '<h4 class="text-lowercase">'.$priceFormat.'</h4>';
        }
        return $xhtml;
    }

    public static function showProductName($link, $name, $hTag='6')
    {
        $xhtml = "
            <a href='$link' title='$name'>
                <h$hTag>$name</h$hTag>
            </a>
        ";
        return $xhtml;
    }

    public static function showProductImage($link, $srcPicture, $name, $classImage, $showDiv=false, $divStartImage=null, $divEndImage=null, $style=null)
    {
        $style  = ($style != null) ? 'style="'.$style.'"' : '';

        $xhtml = '
            <a href="'.$link.'">
                <img src="'.$srcPicture.'" class="'.$classImage.'" 
                alt="'.$name.'" title="'.$name.' '.$style.'">
            </a>
        ';
        if($showDiv==true) $xhtml = $divStartImage.$xhtml.$divEndImage;
        return $xhtml;
    }

    public static function getSrcPicture($filePicture, $folder)
    {
        $pictureDefault = UPLOAD_URL . $folder . DS . '98x150-default.jpg';
        $picturePath 	= UPLOAD_URL . $folder . DS . $filePicture;

        $picture = $picturePath;
        if(!file_exists($picturePath)) $picture = $pictureDefault;
        return $picture;
    }

    public static function showSaleOffLabel($saleOff)
    {
        $saleoff = self::moneyFormat($saleOff, 'sale_off');
        $xhtml = '';
        if($saleOff){
            $xhtml = '
            <div class="lable-block">
                <span class="lable4 badge badge-danger"> -'.$saleoff.'</span>
            </div>
            ';
        }
        return $xhtml;
    }

    public static function showBtnAddToCartProductBox($addToCartLink)
    {
        $xhtml = '<a href="'.$addToCartLink.'" title="Add to cart"><i class="ti-shopping-cart"></i></a>';
        return $xhtml;
    }

    public static function showBtnQuickView($root=null, $bookID=null)
    {
        $xhtml = '<a href="#" title="Quick View"><i class="ti-search" data-toggle="modal" data-target="#quick-view"></i></a>';
        return $xhtml;
    }

    public static function showStarRating()
    {
        $xhtml = '
        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        ';
        return $xhtml;
    }

    public static function showShortDescription($shortDescription)
    {
        $xhtml = "<p>$shortDescription</p>";
        return $xhtml;
    }

    public static function moneyFormat($value=null, $options=null, $price=null, $percent=null)
    {
        if($options==null) {
            $result = number_format($value, 0, ',', '.') .' '. MONEY_VALUE;
            
        }elseif($options=='sale_off'){
            $result = $value .'%';

        }elseif($options=='price_sale'){
            $result = $price*(100-$percent)/100;
            $result = number_format($result, 0, ',', '.') . MONEY_VALUE;

        }elseif($options=='price_order'){
            $result = $price*(100-$percent)/100;
        }
        return $result;
    }

    public static function listCategory($arrCategory, $arrParam=null)
    {
        $xhtml = '';
        if(!empty($arrCategory)){
            foreach($arrCategory as $category){
                $link = URL::createLink('frontend', 'book', 'list', ['category_id' => $category['category_id']]);
                $class = 'text-dark';
                if($arrParam['category_id'] == $category['category_id']) $class = 'my-text-primary';

                $xhtml .= '
                <div
                    class="custom-control custom-checkbox collection-filter-checkbox pl-0 category-item">
                    <a class="'.$class.'" href="'.$link.'">'.$category['category_name'].'</a>
                </div>
                ';
                }
            }
        return $xhtml;
    }

    public static function createPaginationPublic($arrPagination, $totalItems)
    {
        $currentPage 		= $arrPagination['currentPage'];
        $totalItemsPerPage 	= $arrPagination['totalItemsPerPage'];
        $totalPage			= ceil($totalItems/$totalItemsPerPage);

        if($totalPage==1){
            $startItem = 1;
            $endItem = $totalItems;
        
            }elseif($totalPage > 1 && $currentPage == 1 ){
                $startItem = 1;
                $endItem	= $currentPage * $totalItemsPerPage;
        
            }elseif($totalPage > 1 && $currentPage > 1 && $currentPage < $totalPage){
                $startItem = ($currentPage-1) * $totalItemsPerPage + 1;
                $endItem	= $currentPage * $totalItemsPerPage;
        
            }elseif($totalPage > 1 && $currentPage == $totalPage){
                $startItem = ($currentPage-1) * $totalItemsPerPage + 1;
                $endItem	= $totalItems;
        }

        $xhtml = "<h5>Showing Items $startItem-$endItem of $totalItems Result</h5>";
        return $xhtml;
    }

    public static function cmsRowForm($lblName, $input, $submit = false, $forLabel, $classLabel, $classDiv = 'col-md-6')
	{
		if ($submit == false) {
			$xhtml = '
			<div class="' . $classDiv . '">
				<label for="' . $forLabel . '" class="' . $classLabel . '">' . $lblName . '</label>
				' . $input . '
			</div>
			';
		} else {
			$xhtml = '
			<div class="form_row">
				' . $input . '
			</div>
			';
		}
		return $xhtml;
	}

    




    
}

