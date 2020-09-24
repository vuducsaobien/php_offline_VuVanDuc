<?php
// HEAD
require_once 'elements/head.php';

    $xhtml = '';
    if(!empty($this->Items)){
        foreach($this->Items as $key => $value){
            $cartID = $value['id'];
            $date   = date(TIMEDATE_FORMAT, strtotime($value['date']));

            $arrBookID		= json_decode($value['books']);
            $arrPrice		= json_decode($value['prices']);
            $arrName		= json_decode($value['names']);
            $arrQuantity	= json_decode($value['quantities']);
            $arrPicture		= json_decode($value['pictures']);
            
            $tableContent	= '';
            $totalPrice     = 0;
            foreach($arrBookID as $keyB => $valueB){
                $name       = $arrName[$keyB];
                $price      = HTML_Frontend::moneyFormat($arrPrice[$keyB]);
                $quantity   = $arrQuantity[$keyB];

                $totalPriceBook     = HTML_Frontend::moneyFormat($arrPrice[$keyB] * $arrQuantity[$keyB]);
                $totalPrice         += $arrPrice[$keyB] * $arrQuantity[$keyB];
                $totalPriceFormat   = HTML_Frontend::moneyFormat($totalPrice);

                $filePicture    = $arrPicture[$keyB];
                $folder         = TBL_BOOK;
                $pictureDefault = UPLOAD_URL . $folder . DS . '98x150-default.jpg';
                $picturePath 	= UPLOAD_URL . $folder . DS . $filePicture;
        
                $picture = $picturePath;
                if(!file_exists($picturePath)) $picture = $pictureDefault;
                
                $tableContent .= '
                    <tr>
                        <td>
                            <a href="#">
                                <img src="'.$picture.'" alt="'.$name.'" style="width: 80px">
                            </a>
                        </td>

                        <td style="min-width: 200px">'.$name.'</td>
                        <td style="min-width: 100px">'.$price.'</td>
                        <td>'.$quantity.'</td>
                        <td style="min-width: 150px">'.$totalPriceBook.'</td>
                    </tr>
                ';
            }

            $xhtml .= '
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><button style="text-transform: none;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Kv4z8GH">
                            Mã đơn hàng: '.$cartID.'
                            </button>&nbsp;&nbsp;Thời gian: '.$date.'
                        </h5>
                    </div>

                    <div id="Kv4z8GH" class="collapse" data-parent="#accordionExample">
                        <div class="card-body table-responsive">
                            <table class="table btn-table">

                                    <thead>
                                        <td>Hình ảnh</td>
                                        <td>Tên sách</td>
                                        <td>Giá</td>
                                        <td>Số lượng</td>
                                        <td>Thành tiền</td>
                                    </thead>

                                    <tbody>'.$tableContent.'</tbody>

                                    <tfoot>
                                        <tr class="my-text-primary font-weight-bold">
                                            <td colspan="4" class="text-right">Tổng: </td>
                                            <td>'.$totalPriceFormat.'</td>
                                        </tr>
                                    </tfoot>

                            </table>
                        </div>
                    </div>

                </div>
            ';



        }
    }else{
        $xhtml = '
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
        ';
    }
?>

<!-- TITLE -->
<?php require_once 'elements/title.php' ;?>

<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">

			<!-- MENU -->
			<?php require_once 'elements/menu.php' ;?>

            <div class="col-lg-9">
                <div class="accordion theme-accordion" id="accordionExample">
                    <div class="accordion theme-accordion" id="accordionExample">

                    <?php echo $xhtml;
                        /*
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button style="text-transform: none;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#rIgdYJf">
                                        Mã đơn hàng: rIgdYJf</button>&nbsp;&nbsp;Thời gian: 03/09/2020 10:07:21</h5>
                                </div>

                                <!-- <div id="rIgdYJf" class="collapse" data-parent="#accordionExample" style=""> -->
                                <div id="rIgdYJf" class="collapse" data-parent="#accordionExample">

                                    <div class="card-body table-responsive">
                                        <table class="table btn-table">

                                            <thead>
                                                <tr>
                                                    <td>Hình ảnh</td>
                                                    <td>Tên sách</td>
                                                    <td>Giá</td>
                                                    <td>Số lượng</td>
                                                    <td>Thành tiền</td>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>
                                                    <a href="#"><img src="<?php echo $imageURL; ?>/product.jpg" alt="Kiến Trúc Hướng Dòng Thông Gió Tự Nhiên (Tái Bản)" style="width: 80px"></a></td>
                                                    <td style="min-width: 200px">Kiến Trúc Hướng Dòng Thông Gió Tự Nhiên
                                                        (Tái Bản)</td>
                                                    <td style="min-width: 100px">70,550 đ</td>
                                                    <td>1</td>
                                                    <td style="min-width: 150px">70,550 đ</td>
                                                </tr>
                                                <tr></tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="my-text-primary font-weight-bold">
                                                    <td colspan="4" class="text-right">Tổng: </td>
                                                    <td>70,550 đ</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><button style="text-transform: none;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#Kv4z8GH">Mã đơn hàng:
                                            Kv4z8GH</button>&nbsp;&nbsp;Thời gian: 30/08/2020 21:56:20</h5>
                                </div>

                                <!-- <div id="Kv4z8GH" class="collapse" data-parent="#accordionExample" style=""> -->
                                <div id="Kv4z8GH" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body table-responsive">
                                        <table class="table btn-table">

                                            <thead>
                                                <tr>
                                                    <td>Hình ảnh</td>
                                                    <td>Tên sách</td>
                                                    <td>Giá</td>
                                                    <td>Số lượng</td>
                                                    <td>Thành tiền</td>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><a href="#"><img src="<?php echo $imageURL; ?>/product.jpg" alt="Giáo Trình Hán Ngữ 1 - Tập 1 - Quyển Thượng (Phiên Bản Mới)" style="width: 80px"></a></td>
                                                    <td style="min-width: 200px">Giáo Trình Hán Ngữ 1 - Tập 1 - Quyển Thượng
                                                        (Phiên Bản Mới)</td>
                                                    <td style="min-width: 100px">53,400 đ</td>
                                                    <td>1</td>
                                                    <td style="min-width: 150px">53,400 đ</td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><img src="<?php echo $imageURL; ?>/product.jpg" alt="Giải Thích Ngữ Pháp Tiếng Anh (Bài Tập Và Đáp Án)" style="width: 80px"></a></td>
                                                    <td style="min-width: 200px">Giải Thích Ngữ Pháp Tiếng Anh (Bài Tập Và
                                                        Đáp Án)</td>
                                                    <td style="min-width: 100px">139,500 đ</td>
                                                    <td>1</td>
                                                    <td style="min-width: 150px">139,500 đ</td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><img src="<?php echo $imageURL; ?>/product.jpg" alt="Hackers Ielts: Writing" style="width: 80px"></a></td>
                                                    <td style="min-width: 200px">Hackers Ielts: Writing</td>
                                                    <td style="min-width: 100px">162,520 đ</td>
                                                    <td>1</td>
                                                    <td style="min-width: 150px">162,520 đ</td>
                                                </tr>
                                            </tbody>
                                            
                                            <tfoot>
                                                <tr class="my-text-primary font-weight-bold">
                                                    <td colspan="4" class="text-right">Tổng: </td>
                                                    <td>355,420 đ</td>
                                                </tr>
                                            </tfoot>

                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0"><button style="text-transform: none;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#kqxfDul">Mã đơn hàng:
                                            kqxfDul</button>&nbsp;&nbsp;Thời gian: 30/08/2020 21:20:14</h5>
                                </div>

                                <!-- <div id="kqxfDul" class="collapse" data-parent="#accordionExample" style=""> -->
                                <div id="kqxfDul" class="collapse" data-parent="#accordionExample">

                                    <div class="card-body table-responsive">
                                        <table class="table btn-table">

                                            <thead>
                                                <tr>
                                                    <td>Hình ảnh</td>
                                                    <td>Tên sách</td>
                                                    <td>Giá</td>
                                                    <td>Số lượng</td>
                                                    <td>Thành tiền</td>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td><a href="#"><img src="<?php echo $imageURL; ?>/product.jpg" alt="Giáo Trình Kỹ Thuật Lập Trình C Căn Bản Và Nâng Cao" style="width: 80px"></a></td>
                                                    <td style="min-width: 200px">Giáo Trình Kỹ Thuật Lập Trình C Căn Bản Và
                                                        Nâng Cao</td>
                                                    <td style="min-width: 100px">101,250 đ</td>
                                                    <td>1</td>
                                                    <td style="min-width: 150px">101,250 đ</td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><img src="<?php echo $imageURL; ?>/product.jpg" alt="Kiến Trúc Hướng Dòng Thông Gió Tự Nhiên (Tái Bản)" style="width: 80px"></a></td>
                                                    <td style="min-width: 200px">Kiến Trúc Hướng Dòng Thông Gió Tự Nhiên
                                                        (Tái Bản)</td>
                                                    <td style="min-width: 100px">70,550 đ</td>
                                                    <td>1</td>
                                                    <td style="min-width: 150px">70,550 đ</td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#"><img src="<?php echo $imageURL; ?>/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh" style="width: 80px"></a>
                                                    </td>
                                                    <td style="min-width: 200px">Cẩm Nang Cấu Trúc Tiếng Anh</td>
                                                    <td style="min-width: 100px">48,020 đ</td>
                                                    <td>1</td>
                                                    <td style="min-width: 150px">48,020 đ</td>
                                                </tr>
                                                <tr></tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="my-text-primary font-weight-bold">
                                                    <td colspan="4" class="text-right">Tổng: </td>
                                                    <td>219,820 đ</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        */
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>