<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <base href="/asmphp2/site/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Beck - Furniture eCommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="views/assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="views/assets/img/icon.png">

    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="views/assets/css/vendor.css">

    <!-- style css -->
    <link rel="stylesheet" href="views/assets/css/main.css">
    <link rel="stylesheet" href="views/assets/css/SweetAlert2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- Preloader Start -->
    <div class="ft-preloader active">
        <div class="ft-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ft-child ft-bounce1"></div>
            <div class="ft-child ft-bounce2"></div>
            <div class="ft-child ft-bounce3"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Start -->
        <header class="header">
            <div class="header__inner fixed-header">
                <div class="header__main">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="header__main-inner">
                                    <div class="header__main-left">
                                        <div class="logo">
                                            <a href="<?=ROOT_URL?>" class="logo--normal">
                                                <img src="views/assets/img/logo/logo.png" alt="Logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="header__main-center">
                                        <nav class="main-navigation text-center d-none d-lg-block">
                                            <ul class="mainmenu">
                                                <li class="mainmenu__item menu-item-has-children">
                                                    <a href="<?=ROOT_URL?>" class="mainmenu__link">
                                                        <span class="mm-text">Trang Chủ</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="index.html">
                                                                <span class="mm-text">Về Chúng Tôi</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="index-02.html">
                                                                <span class="mm-text">Sản Phẩm</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mainmenu__item menu-item-has-children megamenu-holder">
                                                    <a href="shop.html" class="mainmenu__link">
                                                        <span class="mm-text">Về Chúng Tôi</span>
                                                    </a>
                                                    
                                                </li>
                                                <li class="mainmenu__item menu-item-has-children">
                                                    <a class="mainmenu__link">
                                                        <span class="mm-text">Danh Mục</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <?php
                                                            foreach ($producer as $row) {
                                                                $link = ROOT_URL."/nsx/".$row['slug'];
                                                               echo ' <li class="menu-item-has-children">
                                                                            <a href="'. $link.'">
                                                                                <span class="mm-text">'.$row['TenNSX'].'</span>
                                                                            </a>
                                                                        </li>';
                                                            }
                                                        ?>
                                                    </ul>
                                                </li>

                                                <li class="mainmenu__item menu-item-has-children">
                                                    <a href="#" class="mainmenu__link">
                                                        <span class="mm-text">Bài Viết</span>
                                                    </a>
                                                </li>
                                                
                                                <li class="mainmenu__item menu-item-has-children">
                                                    <a class="mainmenu__link">
                                                        <span class="mm-text"> <i class="fa fa-user" aria-hidden="true"></i></span>
                                                        <?php if(isset($_SESSION['suser']) )echo $_SESSION['suser'] ?>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <?php if($_SESSION['sid']){ ?>
                                                        <li>
                                                        <a href="<?=ROOT_URL.'/doi-mat-khau'?>">
                                                            <span class="mm-text">Đổi mật khẩu</span>
                                                        </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?=ROOT_URL.'/dang-xuat'?>">
                                                                <span class="mm-text">Đăng xuất</span>
                                                            </a>
                                                        </li>
                                                        <?php }else{?>
                                                            <li>
                                                            <a href="<?=ROOT_URL.'/dang-nhap-dang-ky'?>">
                                                                <span class="mm-text">Đăng Nhập</span>
                                                            </a>
                                                        </li>
                                                        <?php }?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="header__main-right">
                                        <div class="header-toolbar-wrap">
                                            <div class="header-toolbar">
                                            
                                                <div class="header-toolbar__item header-toolbar--search-btn">
                                                    <a href="#searchForm" class="header-toolbar__btn toolbar-btn">
                                                        <i class="la la-search"></i>
                                                    </a>
                                                
                                                </div>
                                                <div class="header-toolbar__item header-toolbar--minicart-btn">
                                                    <a href="#miniCart" class="header-toolbar__btn toolbar-btn">
                                            
                                                        <i class="la la-shopping-cart"></i>
                                                        <span><?php if(isset($_SESSION['giohang'])) count($_SESSION['giohang'])?></span>
                                                    </a>
                                                </div>
                                                <div class="header-toolbar__item d-block d-lg-none">
                                                    <a href="#offcanvasMenu" class="header-toolbar__btn toolbar-btn menu-btn">
                                                        <div class="hamburger-icon">
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>
                                                    </a>
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
        </header>
        <!-- Header End -->

        <?php if (file_exists($viewFile)) require_once "$viewFile";?>
        
        <!-- Footer Start-->
        <footer class="footer bg-color" data-bg-color="#f4f8fa">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="row border-bottom pt--70 pb--70">
                        <div class="col-lg-3 col-sm-6 offset-md-1 offset-lg-0 mb-md--45">
                            <div class="footer-widget">
                                <div class="textwidget">
                                    <figure class="footer-logo mb--30">
                                        <img src="views/assets/img/logo/logo.png" alt="Logo">
                                    </figure>
                                    <p>Website được Q.Nhân làm ra và nó thể hiện sự chỉnh chu từng sản phẩm, dẳng cấp tới từng chi tiết, không được 10 điểm hơi phí. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-3 offset-lg-1 offset-sm-2 mb-md--45">
                            <div class="footer-widget">
                                <h3 class="widget-title mb--35 mb-sm--20">MENU</h3>
                                <div class="footer-widget">
                                    <ul class="footer-menu">
                                        <li><a href="index.html">Về Chúng Tôi</a></li>
                                        <li><a href="blog.html">Bài Viết</a></li>
                                        <li><a href="#">Hướng Dẫn Mua Hàng</a></li>
                                        <li><a href="contact-us.html">Liên Hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4 offset-md-1 offset-lg-0 mb-xs--45">
                            <div class="footer-widget">
                                <h3 class="widget-title mb--35 mb-sm--20">Sản Phẩm</h3>
                                <div class="footer-widget">
                                    <ul class="footer-menu">
                                        <li><a href="#">Điện Thoại</a></li>
                                        <li><a href="#">Máy Tính</a></li>
                                        <li><a href="#">Đồng Hồ</a></li>
                                        <li><a href="#">Phụ kiện</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-4 mb-xs--45">
                            <div class="footer-widget">
                                <h3 class="widget-title mb--35 mb-sm--20">Trợ Giúp</h3>
                                <div class="footer-widget">
                                    <ul class="footer-menu">
                                        <li><a href="#">Đổi Trả</a></li>
                                        <li><a href="#">Phản Hồi</a></li>
                                        <li><a href="#">Khiếu Nại</a></li>
                                        <li><a href="#">Báo Lỗi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="footer-widget">
                                <h3 class="widget-title mb--35 mb-sm--20">Mạng Xã Hội</h3>
                                <div class="footer-widget">
                                    <ul class="footer-menu">
                                        <li><a href="#">Facebook</a></li>
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="#">Linkedin</a></li>
                                        <li><a href="#">Medium</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container-fluid">
                    <div class="row border-top ptb--20">
                        <div class="col-12 text-center">
                            <p class="copyright-text">Q.Nhân - Đỉnh cao của công nghệ</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End-->

        <!-- OffCanvas Menu Start -->
        <div class="offcanvas-menu-wrapper" id="offcanvasMenu">
            <div class="offcanvas-menu-inner">
                <a href="" class="btn-close">
                    <i class="la la-remove"></i>
                </a>
                <nav class="offcanvas-navigation">
                    <ul class="offcanvas-menu">
                        <li class="menu-item-has-children active">
                            <a href="#">Home</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="index.html">Homepage 01</a>
                                </li>
                                <li>
                                    <a href="index-02.html">Homepage 02</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="shop.html">Shop</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Shop Grid</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop-fullwidth.html">Full Width</a>
                                        </li>
                                        <li>
                                            <a href="shop.html">Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="shop-right-sidebar.html">Right Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="shop-three-columns.html">Three Columns</a>
                                        </li>
                                        <li>
                                            <a href="shop-four-columns.html">Four Columns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop List</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop-list.html">Full Width</a>
                                        </li>
                                        <li>
                                            <a href="shop-list-sidebar.html">Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="shop-list-right-sidebar.html">Right Sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Product Details</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="product-details.html">Tab Style 1</a>
                                        </li>
                                        <li>
                                            <a href="product-details-tab-style-2.html">Tab Style 2</a>
                                        </li>
                                        <li>
                                            <a href="product-details-tab-style-3.html">Tab Style 3</a>
                                        </li>
                                        <li>
                                            <a href="product-details-gallery-left.html">Gallery Left</a>
                                        </li>
                                        <li>
                                            <a href="product-details-gallery-right.html">Gallery Right</a>
                                        </li>
                                        <li>
                                            <a href="product-details-sticky-left.html">Sticky Left</a>
                                        </li>
                                        <li>
                                            <a href="product-details-sticky-right.html">Sticky Right</a>
                                        </li>
                                        <li>
                                            <a href="product-details-slider-box.html">Slider Box</a>
                                        </li>
                                        <li>
                                            <a href="product-details-slider-full-width.html">Slider Box Full Width</a>
                                        </li>
                                        <li>
                                            <a href="product-details-affiliate.html">Affiliate Proudct</a>
                                        </li>
                                        <li>
                                            <a href="product-details-variable.html">Variable Proudct</a>
                                        </li>
                                        <li>
                                            <a href="product-details-group.html">Group Product</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog.html">Blog</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="blog.html">Blog Right Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="blog-01-column.html">Blog 01 column</a>
                                        </li>
                                        <li>
                                            <a href="blog-02-columns.html">Blog 02 columns</a>
                                        </li>
                                        <li>
                                            <a href="blog-03-columns.html">Blog 03 columns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Blog Details</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-details-audio.html">Audio Blog Details</a>
                                        </li>
                                        <li>
                                            <a href="blog-details-gallery.html">Gallery Blog Details</a>
                                        </li>
                                        <li>
                                            <a href="blog-details-image.html">image Blog Details</a>
                                        </li>
                                        <li>
                                            <a href="blog-details-video.html">Video Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="my-account.html">My Account</a>
                                </li>
                                <li>
                                    <a href="checkout.html">Checkout</a>
                                </li>
                                <li>
                                    <a href="cart.html">Cart</a>
                                </li>
                                <li>
                                    <a href="compare.html">Compare</a>
                                </li>
                                <li>
                                    <a href="order-tracking.html">Track Order</a>
                                </li>
                                <li>
                                    <a href="wishlist.html">Wishlist</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact-us.html">Contact Us</a>
                        </li>
                    </ul>
                    <div class="site-info vertical">
                        <div class="site-info__item">
                            <a href="tel:+01223566678"><strong>+01 2235 666 78</strong></a>
                            <a href="mailto:Support@contixs.com">Support@furtrate.com</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- OffCanvas Menu End -->

        <!-- Mini Cart Start -->
        <aside class="mini-cart" id="miniCart">
            <div class="mini-cart-wrapper">
                <div class="mini-cart__close">
                    <a href="#" class="btn-close"><i class="la la-remove"></i></a>
                </div>
                <div class="mini-cart-inner">
                    <h3 class="mini-cart__heading mb--45">Giỏ Hàng</h3>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list">
                            <?php
                                  $subTotal = 0;
                                  $shipping = 30000;
                                  foreach ($_SESSION['giohang'] as $id => $row){
                                    $subTotal += $row['Gia']*$row['Amount'];
                                      echo '<li class="mini-cart__product">
                                            <a href="?act=cart&what=remove&id='.$id.''.'" class="mini-cart__product-remove">
                                                <i class="la la-remove"></i>
                                            </a>
                                            <div class="mini-cart__product-image">
                                                <img src="'.PATH_IMG_SITE.$row['image'].'" alt="products">
                                            </div>
                                            <div class="mini-cart__product-content">
                                                <a class="mini-cart__product-title" href="product-details.html">'.$row['TenDT'].'</a>
                                                <span class="mini-cart__product-quantity">'.$row['Amount'].' x '.$this->lib->forMatTien($row['Gia']).' đ</span>
                                            </div>
                                        </li>';
                                  }
                            ?>
                        </ul>
                        <?php if(isset($_SESSION['discount'])){
                            $discountPercent = $_SESSION['discount']['persent'];
                            ?>
                        <div class="mini-cart__total">
                            <span>Giảm Giá</span>
                            <span class="ammount"><?=$discountPercent?> %</span>
                        </div>
                        <?php }?>
                        <?php if(isset($_SESSION['giohang'])){?>
                        <div class="mini-cart__total">
                            <span>Tổng Tiền</span>
                            <span class="ammount"><?=$this->lib->forMatTien(($subTotal+$shipping)-($subTotal/100*$discountPercent))?> đ</span>
                        </div>
                       <?php }else{
                           echo 'Chưa có sản phẩm nào ! <br>';
                       } ?>
                        <div class="mini-cart__buttons">
                            <a href="<?=ROOT_URL.'/gio-hang'?>" class="btn btn-fullwidth btn-bg-primary mb--20">Xem Giỏ Hàng</a>
                            <a href="<?=ROOT_URL.'/thanh-toan'?>" class="btn btn-fullwidth btn-bg-primary">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Mini Cart End -->

        <!-- Searchform Popup Start -->
        <div class="searchform__popup" id="searchForm">
            <a href="#" class="btn-close"><i class="la la-remove"></i></a>
            <div class="searchform__body">
                <p>Nhập từ khoá để tìm kiếm</p>
                <form class="searchform" method="GET" action="">
                    <input type="text" name="q" id="popup-search" class="searchform__input" placeholder="Từ khoá tìm kiếm...">
                    <button type="submit" class="searchform__submit"><i class="la la-search"></i></button>
                </form>
            </div>
       
        </div>
      
        <!-- Searchform Popup End -->

        <!-- Qicuk View Modal Start -->

        <!-- Qicuk View Modal End -->

        <!-- Global Overlay Start -->
        <div class="global-overlay"></div>
        <!-- Global Overlay End -->

        <!-- Global Overlay Start -->
        <a class="scroll-to-top" href=""><i class="la la-angle-double-up"></i></a>
        <!-- Global Overlay End -->
    </div>
    <!-- Main Wrapper End -->


    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="views/assets/js/vendor.js"></script>

    <!-- Main JS -->
    <script src="views/assets/js/main.js"></script>
    <script src="views/assets/js/SweetAlert2.js"></script>
    <script src="views/assets/ajax/cart.js"></script>
    <script src="views/assets/ajax/main.js"></script>
    <script src="views/assets/ajax/login.js"></script>
    <script src="views/assets/ajax/signup.js"></script>
</body>

</html>