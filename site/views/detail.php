
<?php 
if(is_array($sp)){
?>

<!-- Main Content Wrapper Start -->
        <div class="main-content-wrapper">
            <div class="page-content-inner pt--80 pt-md--60">
                <div class="container">
                    <div class="row no-gutters mb--80 mb-md--57">
                        <div class="col-lg-7 product-main-image">
                            <div class="product-image">
                                <div class="product-gallery vertical-slide-nav">
                                    <div class="product-gallery__large-image mb-sm--30">
                                        <div class="product-gallery__wrapper">
                                            <div class="element-carousel main-slider image-popup" data-slick-options='{
                                                "slidesToShow": 1,
                                                "slidesToScroll": 1,
                                                "infinite": true,
                                                "arrows": false, 
                                                "asNavFor": ".nav-slider"
                                            }'>
                                                <?php
                                                      for ($i=0; $i < count(explode(",",$sp['urlHinh'])); $i++) { 
                                                        echo ' <figure class="product-gallery__nav-image--single">
                                                                    <img src="'.PATH_IMG_SITE.explode(",",$sp['urlHinh'])[$i].'" alt="Products">
                                                                </figure>';
                                                    }
                                                ?>
                                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-gallery__nav-image">
                                        <div class="element-carousel nav-slider product-slide-nav slick-center-bottom" data-slick-options='{
                                            "spaceBetween": 10,
                                            "slidesToShow": 3,
                                            "slidesToScroll": 1,
                                            "vertical": true,
                                            "swipe": true,
                                            "verticalSwiping": true,
                                            "infinite": true,
                                            "focusOnSelect": true,
                                            "asNavFor": ".main-slider",
                                            "arrows": true, 
                                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-angle-up" },
                                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-angle-down" }
                                        }' data-slick-responsive='[
                                            {
                                                "breakpoint":1200, 
                                                "settings": {
                                                    "slidesToShow": 2
                                                } 
                                            },
                                            {
                                                "breakpoint":992, 
                                                "settings": {
                                                    "slidesToShow": 3
                                                } 
                                            },
                                            {
                                                "breakpoint":767, 
                                                "settings": {
                                                    "slidesToShow": 4,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":575, 
                                                "settings": {
                                                    "slidesToShow": 3,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":480, 
                                                "settings": {
                                                    "slidesToShow": 2,
                                                    "vertical": false
                                                } 
                                            }
                                        ]'>
                                            <?php
                                                    for ($i=0; $i < count(explode(",",$sp['urlHinh'])); $i++) { 
                                                        echo ' <figure class="product-gallery__nav-image--single">
                                                                    <img src="'.PATH_IMG_SITE.explode(",",$sp['urlHinh'])[$i].'" alt="Products">
                                                                </figure>';
                                                    }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-1 col-lg-5 product-main-details mt-md--50">
                            <div class="product-summary pl-lg--30 pl-md--0">
                        
                                <h3 class="product-title mb--20"><?=$sp['TenDT']?></h3>

                                <div class="product-price-wrapper mb--25">
                                    <span class="giacu"><?=$this->lib->forMatTien($sp['Gia'])?> VNĐ</span>
                                    <br>
                                    <span class="money"><?=$this->lib->forMatTien($sp['GiaKM'])?> VNĐ</span>
                                </div>
                                                    
                                <div class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                                    <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                        <label class="quantity-label" for="qty">Số Lượng:</label>
                                        <div class="quantity">
                                            <input type="number" class="quantity-input" name="qty" id="qty" value="1" min="1">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-shape-square btn-size-sm" onclick='addCart("<?=$sp["slug"]?>")'>
                                       Thêm Vào Giỏ
                                    </button>
                                </div>
                                <div class="product-footer-meta">
                                    <p><span>Nhà Sản Xuất:</span>
                                        <?=$this->model->getOneProducer($sp['idNSX'])['TenNSX']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb--77 mb-md--57">
                        <div class="col-12">
                            <div class="tab-style-2">
                                <div class="nav nav-tabs mb--35 mb-sm--25" id="product-tab" role="tablist">
                                    <a class="nav-link active" id="nav-description-tab" data-toggle="tab" href="#nav-description" role="tab" aria-selected="true">
                                        <span>Mô Tả</span>
                                    </a>
                                    <a class="nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-selected="true">
                                        <span>Thuộc Tính</span>
                                    </a>
                                    <a class="nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-selected="true">
                                        <span>Bình Luận</span>
                                    </a>
                                </div>
                                <div class="tab-content" id="product-tabContent">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab">
                                        <div class="product-description">
                                            <p>
                                                <?=$sp['MoTa']?>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                                        <div class="table-content table-responsive">
                                            <table class="table shop_attributes">
                                                <tbody>
                                                    <tr>
                                                        <th>Màn Hình</th>
                                                        <td><?=$property['ManHinh']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Hệ Điều Hành</th>
                                                        <td><?=$property['HeDieuHanh']?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Camera Sau</th>
                                                        <th><?=$property['CameraSau']?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Camera Trước</th>
                                                        <th><?=$property['CameraTruoc']?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>CPU</th>
                                                        <th><?=$property['CPU']?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>RAM</th>
                                                        <th><?=$property['RAM']?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Bộ Nhớ Trong</th>
                                                        <th><?=$property['BoNhoTrong']?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Thẻ Nhớ</th>
                                                        <th><?=$property['TheNho']?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Thẻ Sim</th>
                                                        <th><?=$property['TheSim']?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Dung Lượng Pin</th>
                                                        <th><?=$property['DungLuongPin']?></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                        <div class="product-reviews">
                                            <h3 class="review__title">Bình Luận</h3>
                                            <ul class="review__list" id="reviewlist">
                                            <?php
                                                foreach ($comments as $row) {
                                                    echo '<li class="review__item">
                                                            <div class="review__container">
                                                                <img src="views/assets/img/logo/avt.png" alt="Review Avatar" class="review__avatar">
                                                                <div class="review__text">
                                                                    <div class="d-flex flex-sm-row flex-column justify-content-between">
                                                                        <div class="review__meta">
                                                                            <strong class="review__author">'.$row['TenKh'].' </strong>
                                                                            <span class="review__dash">-</span>
                                                                            <span class="review__published-date">'.$row['ThoiDiemBL'].'</span>
                                                                        </div>
                                                                    </div>
                                                                    <p class="review__description">'.$row['ThoiDiemBL'].'</p>
                                                                </div>
                                                            </div>
                                                        </li>';
                                                }
                                            ?>
                                               
                                            </ul>
                                            <div class="review-form-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <span class="reply-title">Thêm Bình Luận</span>
                                                    
                                                            <input type="hidden" id="iddt" value="<?=$sp['idDT']?>">
                                                            <input type="hidden" id="iduser" value="<?=$_SESSION['sid']?>">

                                                            <div class="form__group mb--10">
                                                                <label class="form__label d-block" for="email">Bình Luận Của Bạn<span class="required">*</span></label>
                                                                <textarea name="review" id="review" class="form__input form__input--textarea"></textarea>
                                                            </div>
                                                            <div class="form__group mb--20">
                                                                <label class="form__label d-block" for="name">Tên<span class="required">*</span></label>
                                                                <input type="text" name="name" id="name" class="form__input">
                                                            </div>
                                                           
                                                            <div class="form__group">
                                                                <div class="form-row">
                                                                    <div class="col-12">
                                                                        <input type="button" value="Bình Luận" id="comment" class="btn btn-size-md">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb--75 mb-md--55">
                        <div class="col-12">
                            <div class="element-carousel slick-vertical-center" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-angle-double-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-angle-double-right" }
                            }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 2
                                }},
                                {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                }}
                            ]'>
                            <?php 
                                foreach ($spSame as $row) {
                                    if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                        $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                    }else{
                                        $img = PATH_IMG_SITE.'logo.png';
                                    }
                                    $link = ROOT_URL."/dt/".$row['slug'];
                                    echo ' <div class="item">
                                    <div class="ft-product">
                                        <div class="product-inner">
                                            <div class="product-image">
                                                <figure class="product-image--holder">
                                                    <img src="'.$img.'" alt="Product">
                                                </figure>
                                                <a href="'.$link.'" class="product-overlay" onclick="addView('.$row['idDT'].')"></a>
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#productModal" class="action-btn">
                                                        <i class="la la-eye"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="action-btn">
                                                        <i class="la la-heart-o"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="action-btn">
                                                        <i class="la la-repeat"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-title"><a href="'.$link.'">'.$row['TenDT'].'</a></h3>
                                                <div class="product-info-bottom">
                                                    <div class="row">
                                                        <div class="col-lg-6 ">
                                                            <div class="product-price-wrapper">
                                                                <span class="new-price">
                                                                    <span class="money">'.$this->lib->forMatTien($row['GiaKM']).' Đ</span>
                                                                </span>
                                                                <span class="old-price">
                                                                    <span class="money">'.$this->lib->forMatTien($row['Gia']).' Đ</span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <a href="'.$link.'" class="add-to-cart pr--15">
                                                                <i class="la la-plus"></i>
                                                                <span>Mua Ngay</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                }
                            ?>
                               
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper End -->

<?php
}else{
    echo 'Sản phẩm này không có !';
}
?>