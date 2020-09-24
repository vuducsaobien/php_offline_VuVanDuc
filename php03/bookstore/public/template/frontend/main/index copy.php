<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $this->_title;?></title>

    <?= $this->_metaHTTP;?>
    <?= $this->_metaName;?>

    <link rel="icon"          href="images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet"    href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900">

    <?= $this->_cssFiles;?>
</head>

<body>
    <div class="loader_skeleton">
        <div class="typography_section">
            <div class="typography-box">
                <div class="typo-content loader-typo">
                    <div class="pre-loader"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- header start -->
        <?php require_once 'html/header.php' ;?>
    <!-- header end -->

    <!-- Home slider -->
        <?php require_once 'html/home_slider.php' ;?>
    <!-- Home slider end -->

    <!-- Top Collection -->
        <?php require_once 'html/top_collection.php' ;?>
    <!-- Top Collection end-->

    <!-- service layout -->
        <?php require_once 'html/service_layout.php' ;?>
    <!-- service layout  end -->

    <!-- LOAD CONTENT -->
        <!-- Tab product --> 
            <div class="title1 section-t-space title5">
                <h2 class="title-inner1">Danh mục nổi bật</h2>
                <hr role="tournament6">
            </div>

            <section class="p-t-0 j-box ratio_asos">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="theme-tab">
                                <?php
                                    require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php'
                                ;?>     

                                <ul class="tabs tab-title">
                                    <li class="current"><a href="tab-category-1" class="my-product-tab" data-category="1">Bà mẹ
                                            - Em bé</a></li>
                                    <li><a href="tab-category-5" class="my-product-tab" data-category="5">Học Ngoại Ngữ</a></li>
                                    <li><a href="tab-category-3" class="my-product-tab" data-category="3">Công Nghệ Thông
                                            Tin</a></li>
                                </ul>
                                <div class="tab-content-cls">
                                    <div id="tab-category-1" class="tab-content active default">
                                        <div class="no-slider row tab-content-inside">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center"><a href="list.html" class="btn btn-solid">Xem tất cả</a></div>
                                    </div>
                                    <div id="tab-category-5" class="tab-content ">
                                        <div class="no-slider row tab-content-inside">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center"><a href="list.html" class="btn btn-solid">Xem tất cả</a></div>
                                    </div>
                                    <div id="tab-category-3" class="tab-content ">
                                        <div class="no-slider row tab-content-inside">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable4 badge badge-danger"> -35%</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="item.html">
                                                            <img src="images/product.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="#" title="Add to cart"><i class="ti-shopping-cart"></i></a>
                                                        <a href="#" title="Quick View"><i class="ti-search" data-toggle="modal"
                                                                data-target="#quick-view"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="item.html"
                                                        title="Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores reprehenderit incidunt vero aperiam, ipsum natus.">
                                                        <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius,
                                                            quasi ...</h6>
                                                    </a>
                                                    <h4 class="text-lowercase">48,020 đ <del>98,000 đ</del></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center"><a href="list.html" class="btn btn-solid">Xem tất cả</a></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        <!-- Tab product end -->
    <!-- END LOAD CONTENT -->

    <!-- Quick-view modal popup start-->
        <?php require_once 'html/popup.php' ;?>
    <!-- Quick-view modal popup end-->

    <!-- footer -->
        <?php require_once 'html/footer.php' ;?>
    <!-- footer end -->

    <!-- tap to top -->
        <?php require_once 'html/tap_to_top.php' ;?>
    <!-- tap to top end -->

    <!-- script -->
    <?= $this->_jsFiles; ?>
    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
            document.getElementById("search-input").focus();
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
</body>

</html>