
        <!-- Main Content Wrapper Start -->
        <main class="main-content-wrapper">
            <!-- Slider area Start -->
            <section class="homepage-slider mb--75 mb-md--55">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="element-carousel slick-right-bottom" data-slick-options='{
                                "slidesToShow": 1, 
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-arrow-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-arrow-right" }
                            }' data-slick-responsive='[{"breakpoint": 768, "settings": {"arrows": false}}]'>
                                <div class="item">
                                    <div class="single-slide d-flex align-items-center bg-color" data-bg-color="#dbf3f2">
                                        <div class="row align-items-center no-gutters w-100">
                                            <div class="col-xl-7 col-md-6 mb-sm--50">
                                                <figure data-animation="fadeInUp" data-duration=".3s" data-delay=".3s" class="plr--15">
                                                    <img src="views/assets/img/slider/1.png" alt="Slider O1 image" class="mx-auto">
                                                </figure>
                                            </div>
                                            <div class="col-md-6 col-lg-5 offset-lg-1 offset-xl-0">
                                                <div class="slider-content">
                                                    <div class="slider-content__text mb--40 mb-md--30">
                                                        <p class="mb--15" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">#Mới</p>
                                                        <p class="mb--20" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">Lap top sinh viên cấu hình cực mạnh.</p>
                                                        <h1 class="heading__primary lh-pt7" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">Dell inspiron</h1>
                                                    </div>
                                                    <div class="slider-content__btn">
                                                        <a href="#" class="btn btn-outline btn-brw-2" data-animation="fadeInUp" data-duration=".3s" data-delay=".6s">Mua Ngay</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="single-slide d-flex align-items-center bg-color" data-bg-color="#dbf3f2">
                                        <div class="row align-items-center no-gutters w-100">
                                            <div class="col-xl-6 col-md-6 mb-sm--50 order-md-2">
                                                <figure data-animation="fadeInUp" data-duration=".3s" data-delay=".3s" class="pl-15 pr--60">
                                                    <img src="views/assets/img/slider/slider-02-img-01.png" alt="Slider O1 image" class="mx-auto">
                                                </figure>
                                            </div>
                                            <div class="col-md-5 col-lg-5 offset-md-1 order-md-1">
                                                <div class="slider-content">
                                                    <div class="slider-content__text border-color-2 mb--40 mb-md--30">
                                                        <p class="mb--15" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">#Giá Sốc</p>
                                                        <p class="mb--20" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">Giảm giá tất cả các dòng iphone.</p>
                                                        <h1 class="heading__primary lh-pt7" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">Iphone giảm 50%</h1>
                                                    </div>
                                                    <div class="slider-content__btn">
                                                        <a href="#" class="btn btn-outline btn-brw-2 btn-brc-2" data-animation="fadeInUp" data-duration=".3s" data-delay=".6s">Mua ngay</a>
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
            </section>
            <!-- Slider area End -->

            <!-- Top Sale Area Start -->
            <section class="top-sale-area mb--75 mb-md--55">
                <div class="container">
                    <div class="row mb--35 mb-md--23">
                        <div class="col-12 text-center">
                            <h2>Sản Phẩm Hot Nhất</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="element-carousel" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 3
                            }' data-slick-responsive='[
                                {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                                {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                            ]'>
                              <?php 
                                foreach ($getHotPro as $row) {
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
                                                  <a  data-toggle="modal" data-target="#productModal" class="action-btn">
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
                                          <div class="product-info plr--20">
                                              <h3 class="product-title"><a href="'.$link.'">'.$row['TenDT'].'</a></h3>
                                              <div class="product-info-bottom">
                                                  <div class="product-price-wrapper">
                                                      <span class="money">'.$this->lib->forMatTien($row['GiaKM']).' Đ</span>
                                                  </div>
                                                  <a href="'.$link.'" class="add-to-cart">
                                                      <i class="la la-plus"></i>
                                                      <span>Thêm Vào Giỏ</span>
                                                  </a>
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
            </section>
            <!-- Top Sale Area End -->

            <!-- Feature Product Area Start -->
            <section class="feature-product-area mb--75 mb-md--55">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="feature-product bg-color" data-bg-color="#d7fbf9">
                                <!-- <img src="views/assets/img/s" alt=""> -->
                                <div class="feature-product__inner bg-color" data-bg-color="#e9fefd">
                                    <div class="feature-product__info">
                                        <p class="hastag">#Camera</p>
                                        <h2 class="feature-product__title"><a href="product-details.html">CAMERA SẮC NÉT</a></h2>
                                        <a href="shop.html" class="feature-product__btn">Mua Ngay</a>
                                    </div>
                                    <figure class="feature-product__image mb-sm--30">
                                        <a href="product-details.html">
                                            <img src="views/assets/img/sanpham/banner.png" alt="Feature Product">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Feature Product Area End -->

            <!-- Product Tab Area Start -->
            <section class="product-tab-area mb--30 mb-md--10">
                <div class="container">
                    <div class="row mb--28 mb-md--18 mb-sm--33">
                        <div class="col-md-3 text-md-left text-center">
                            <h2>Tất Cả Sản Phẩm</h2>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-style-1">
                                <div class="nav nav-tabs justify-content-md-end justify-content-center" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="new-all-tab" data-toggle="tab" href="#new-all" role="tab" aria-controls="new-all" aria-selected="true">
                                        <span class="nav-text">Tất Cả</span>
                                    </a>
                                    <a class="nav-item nav-link" id="new-wooden-tab" data-toggle="tab" href="#new-wooden" role="tab" aria-controls="new-wooden" aria-selected="false">
                                        <span class="nav-text">Xem Nhiều</span>
                                    </a>
                                    <a class="nav-item nav-link" id="new-furnished-tab" data-toggle="tab" href="#new-furnished" role="tab" aria-controls="new-furnished" aria-selected="false">
                                        <span class="nav-text">Mới Nhất</span>
                                    </a>
                                    <a class="nav-item nav-link" id="new-table-tab" data-toggle="tab" href="#new-table" role="tab" aria-controls="new-table" aria-selected="false">
                                        <span class="nav-text">Bán Chạy</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="product-tab-content">
                                <div class="tab-pane fade show active" id="new-all" role="tabpanel" aria-labelledby="new-all-tab">
                                    <div class="row">
                                      <?php
                                        foreach ($getAllPro as $row) {
                                        if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                            $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                        }else{
                                            $img = PATH_IMG_SITE.'logo.png';
                                        }
                                        $link = ROOT_URL."/dt/".$row['slug'];
                                         echo '<div class="col-lg-3 col-sm-6 mb--45">
                                         <div class="ft-product HTfadeInUp">
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
                                                                        <span class="money">'.$this->lib->forMatTien($row['Gia']).' Đ</span>
                                                                    </span>
                                                                    <span class="old-price">
                                                                        <span class="money">'.$this->lib->forMatTien($row['GiaKM']).' Đ</span>
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
                                <div class="tab-pane fade" id="new-wooden" role="tabpanel" aria-labelledby="new-wooden-tab">
                                    <div class="row">
                                    <?php
                                        foreach ($getAllViewsPro as $row) {
                                        if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                            $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                        }else{
                                            $img = PATH_IMG_SITE.'logo.png';
                                        }
                                        $link = ROOT_URL."/dt/".$row['slug'];
                                         echo '<div class="col-lg-3 col-sm-6 mb--45">
                                         <div class="ft-product HTfadeInUp">
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
                                                                        <span class="money">'.$this->lib->forMatTien($row['Gia']).' Đ</span>
                                                                    </span>
                                                                    <span class="old-price">
                                                                        <span class="money">'.$this->lib->forMatTien($row['GiaKM']).' Đ</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <a href="cart.html" class="add-to-cart pr--15">
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
                                <div class="tab-pane fade" id="new-furnished" role="tabpanel" aria-labelledby="new-furnished-tab">
                                    <div class="row">
                                    <?php
                                        foreach ($getAllNewPro as $row) {
                                        if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                            $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                        }else{
                                            $img = PATH_IMG_SITE.'logo.png';
                                        }
                                        $link = ROOT_URL."/dt/".$row['slug'];
                                         echo '<div class="col-lg-3 col-sm-6 mb--45">
                                         <div class="ft-product HTfadeInUp">
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
                                                                        <span class="money">'.$this->lib->forMatTien($row['Gia']).' Đ</span>
                                                                    </span>
                                                                    <span class="old-price">
                                                                        <span class="money">'.$this->lib->forMatTien($row['GiaKM']).' Đ</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <a href="cart.html" class="add-to-cart pr--15">
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
                                <div class="tab-pane fade" id="new-table" role="tabpanel" aria-labelledby="new-table-tab">
                                    <div class="row">
                                    <?php
                                        foreach ($getAllProSelling as $row) {
                                        if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                            $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                        }else{
                                            $img = PATH_IMG_SITE.'logo.png';
                                        }
                                        $link = ROOT_URL."/dt/".$row['slug'];
                                         echo '<div class="col-lg-3 col-sm-6 mb--45">
                                         <div class="ft-product HTfadeInUp">
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
                                                                        <span class="money">'.$this->lib->forMatTien($row['Gia']).' Đ</span>
                                                                    </span>
                                                                    <span class="old-price">
                                                                        <span class="money">'.$this->lib->forMatTien($row['GiaKM']).' Đ</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <a href="cart.html" class="add-to-cart pr--15">
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
            </section>
            <!-- Product Tab Area End -->

            <!-- Brand Logo Area Start -->
            <div class="brand-logo-area mb--80 mb-md--60">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="brand-log-wrapper bg-color ptb--75" data-bg-color="#e9fefd">
                                <div class="element-carousel" data-slick-options='{
                                    "slidesToShow": 5,
                                    "autoplay": true
                                }' data-slick-responsive='[
                                    {"breakpoint": 1200, "settings": {"slidesToShow": 4}},
                                    {"breakpoint": 992, "settings": {"slidesToShow": 3}},
                                    {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                                    {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                                ]'>
                                    <div class="item">
                                        <figure>
                                            <img src="views/assets/img/sanpham/client-1.png" alt="Brand" class="mx-auto">
                                        </figure>
                                    </div>
                                    <div class="item">
                                        <figure>
                                            <img src="views/assets/img/sanpham/client-2.png" alt="Brand" class="mx-auto">
                                        </figure>
                                    </div>
                                    <div class="item">
                                        <figure>
                                            <img src="views/assets/img/sanpham/client-3.png" alt="Brand" class="mx-auto">
                                        </figure>
                                    </div>
                                    <div class="item">
                                        <figure>
                                            <img src="views/assets/img/sanpham/client-4.png" alt="Brand" class="mx-auto">
                                        </figure>
                                    </div>
                                    <div class="item">
                                        <figure>
                                            <img src="views/assets/img/sanpham/client-5.png" alt="Brand" class="mx-auto">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Brand Logo Area End -->

            <!-- Best Sale Product Area Start -->

            <!-- Best Sale Product Area End -->

            <!-- Blog Area Start -->
            <section class="blog-area mb--70 mb-md--50">
                <div class="container">
                    <div class="row mb--35 mb-md--23">
                        <div class="col-12 text-center">
                            <h2>Bài Viết Mới</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="element-carousel" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 3,
                                "slidesToScroll": 1
                            }' data-slick-responsive='[
                                {"breakpoint": 992, "settings": {"slidesToShow": 2}},
                                {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                            ]'>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog__inner">
                                            <div class="blog__media">
                                                <figure class="image">
                                                    <img src="views/assets/img/sanpham/baiviet1.jpg" alt="Blog" class="w-100">
                                                    <a href="blog-details-image.html" class="item-overlay"></a>
                                                </figure>
                                            </div>
                                            <div class="blog__info">
                                                <h2 class="blog__title"><a href="blog-details-image.html">Giảm ngay 5 triệu khi mua Điện thoại OPPO.</a></h2>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog__inner">
                                            <div class="blog__media">
                                                <figure class="image">
                                                    <img src="views/assets/img/sanpham/baiviet2.jpg" alt="Blog" class="w-100">
                                                    <a href="blog-details-image.html" class="item-overlay"></a>
                                                </figure>
                                            </div>
                                            <div class="blog__info">
                                                <h2 class="blog__title"><a href="blog-details-image.html">Khai trương 68 trung tâm laptop.</a></h2>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog__inner">
                                            <div class="blog__media">
                                                <figure class="image">
                                                    <img src="views/assets/img/sanpham/baiviet3.jpg" alt="Blog" class="w-100">
                                                    <a href="blog-details-image.html" class="item-overlay"></a>
                                                </figure>
                                            </div>
                                            <div class="blog__info">
                                                <h2 class="blog__title"><a href="blog-details-image.html">Mua Điện thoại trả góp 0%.</a></h2>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog Area End -->
        </main>
        <!-- Main Content Wrapper End -->