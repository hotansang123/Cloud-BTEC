        <!-- Main Content Wrapper Start -->
        <div  class="main-content-wrapper">
            <div class="shop-page-wrapper ptb--80">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8 order-lg-2 mb-md--50">
                            <div class="shop-toolbar mb--50">
                                <div class="row align-items-center">
                                    <div class="col-md-5 mb-sm--30 mb-xs--10">
                                        <div class="shop-toolbar__left">
                                            <div class="product-ordering">
                                                <select class="product-ordering__select nice-select">
                                                    <option value="0">Sắp Xếp</option>
                                                    <option value="1">Relevance</option>
                                                    <option value="2">Name, A to Z</option>
                                                    <option value="3">Name, Z to A</option>
                                                    <option value="4">Price, low to high</option>
                                                    <option value="5">Price, high to low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="shop-toolbar__right d-flex justify-content-md-end justify-content-start flex-sm-row flex-column">
                                            <div class="product-view-mode ml--50 ml-xs--0">
                                                <a class="active" href="#" data-target="grid">
                                                    <img src="views/assets/img/icons/grid.png" alt="Grid">
                                                </a>
                                                <a href="#" data-target="list">
                                                    <img src="views/assets/img/icons/list.png" alt="Grid">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($ProductList != null){ ?>
                            <div class="shop-products">
                                <div class="row">
                                    <?php 
                
                                        foreach ($ProductList as $row) {
                                            if(is_file(PATH_IMG_SITE.explode(",",$row['urlHinh'])[0])){
                                                $img = PATH_IMG_SITE.explode(",",$row['urlHinh'])[0];
                                            }else{
                                                $img = PATH_IMG_SITE.'logo.png';
                                            }
                                            $link = ROOT_URL."/dt/".$row['slug'];
                                            echo '<div class="col-xl-4 col-sm-6 mb--50">
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
                                                    <div class="ft-product-list">
                                                        <div class="product-inner">
                                                            <figure class="product-image">
                                                                <a href="'.$link.'">
                                                                    <img src="'.$img.'" alt="Products">
                                                                </a>
                                                                <div class="product-thumbnail-action">
                                                                    <a data-toggle="modal" data-target="#productModal" class="action-btn quick-view">
                                                                        <i class="la la-eye"></i>
                                                                    </a>
                                                                </div>
                                                            </figure>
                                                            <div class="product-info">
                                                                <h3 class="product-title mb--25">
                                                                    <a href="'.$link.'">'.$row['TenDT'].'</a>
                                                                </h3>
                                                            
                                                                <div class="product-price-wrapper">
                                                                    <span class="new-price">
                                                                        <span class="money">'.$this->lib->forMatTien($row['Gia']).' Đ</span>
                                                                    </span>
                                                                    <span class="old-price">
                                                                        <span class="money">'.$this->lib->forMatTien($row['GiaKM']).' Đ</span>
                                                                    </span>
                                                                </div>
                                                               
                                                                <div class="ft-product-action-list d-flex align-items-center">
                                                                    <a href="'.$link.'" class="btn btn-size-md">Mua Ngay</a>
                                                                    <a href="wishlist.html" class="ml--20 action-btn">
                                                                        <i class="la la-heart-o"></i>
                                                                    </a>
                                                                    <a href="wishlist.html" class="ml--20 action-btn">
                                                                        <i class="la la-repeat"></i>
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
                            <nav class="pagination-wrap">
                                <ul class="pagination">
                                    <?= $Pagination?>
                                </ul>
                            </nav>
                        <?php }else {
                            echo ' <a href="index.php">Không có sản phẩm nào !</a>';
                        } ?>
                        </div>
                        <div class="col-xl-3 col-lg-4 order-lg-1">
                            <aside class="shop-sidebar">
                                <div class="shop-widget mb--40">
                                    <h3 class="widget-title mb--25">Nhà Sản Xuất</h3>
                                    <ul class="widget-list category-list">
                                        <?php
                                            foreach ($producer as $row) {
                                               echo ' <li>
                                                        <a href="?act=cat&id='.$row['idNSX'].'">
                                                            <span class="category-title">'.$row['TenNSX'].'</span>
                                                            <i class="fa fa-angle-double-right"></i>
                                                        </a>
                                                    </li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                   
                                <div class="shop-widget mb--40">
                                    <h3 class="widget-title mb--25">Giá</h3>
                                    <ul class="widget-list price-list">
                                        <li>
                                            <a href="<?=SITE_URL.'index.php?act=cat'.'&to=2000000'?>">
                                            
                                                Dưới 2 triệu
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=SITE_URL.'index.php?act=cat'.'&from=2000000&to=4000000'?>">
                                                Từ 2 triệu - 4 triệu    
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=SITE_URL.'index.php?act=cat'.'&from=4000000&to=8000000'?>">
                                                Từ 4 triệu - 8 triệu
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=SITE_URL.'index.php?act=cat'.'&from=8000000&to=14000000'?>">
                                                Từ 8 triệu - 13 triệu
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="shop-widget mb--40">
                                    <h3 class="widget-title mb--25">Hot nhất</h3>
                                    <form action="" method="POST" id="myForm">
                                        <ul class="widget-list brand-list">
                                            <li>
                                                <a >
                                                    <strong class="color--red font-weight-medium">Hot</strong>
                                                    <span><input type="radio" class="hot" name="hot"  value="1" ></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a >
                                                    <strong class="color--red font-weight-medium">Không Hot</strong>
                                                    <span><input type="radio" class="hot" name="hot"  value="0"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->