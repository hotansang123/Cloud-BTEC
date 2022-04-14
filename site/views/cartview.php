
<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="page-content-inner ptb--80 pt-md--40 pb-md--60">
        <div class="container">
            <?php 
                if($_SESSION['giohang'] !=null){
            ?>
            <div class="row">
                <div class="col-lg-8 mb-md--50">
                    <form class="cart-form" action="#">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="table-content table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Hình&nbsp;</th>
                                            <th class="text-left">Sản Phẩm</th>
                                            <th>Giá</th>
                                            <th>Số Lượng</th>
                                            <th>Tổng Tiền</th>
                                        </tr>
                                          </thead>
                                        <tbody>
                                            <?php
                                                $subTotal = 0;
                                                $shipping = 30000;
                                            
                                                foreach ($_SESSION['giohang'] as $id => $row){
                                                    // $id = $this->model->getIdProFromSlug($id);
                                                    $subTotal += $row['Gia']*$row['Amount'];
                                                    echo '<tr>
                                            <td class="product-remove text-left"><a href="'.ROOT_URL.'/xoa-khoi-gio/'.$id.''.'"><i class="la la-remove"></i></a></td>
                                            <td class="product-thumbnail text-left ">
                                                <img src="'.PATH_IMG_SITE.$row['image'].'" alt="Product Thumnail">
                                            </td>
                                            <td class="product-name text-left wide-column">
                                                <h3>
                                                    <a href="product-details.html">'.$row['TenDT'].'</a>
                                                </h3>
                                            </td>
                                            <td class="product-price">
                                                <input type="hidden" class="idsp" value="'.$id.'">
                                                <span class="product-price-wrapper">
                                                    <span class="money">'.$this->lib->forMatTien($row['Gia']).' đ</span>
                                                </span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity">
                                                    <input type="number" class="quantity-input getquantity" name="qty" id="qty-1" value="'.$row['Amount'].'" min="1">
                                                </div>
                                            </td>
                                            <td class="product-total-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money totalmoney" >'.$this->lib->forMatTien($row['Gia']*$row['Amount']).' đ</span>
                                                            </span>
                                            </td>
                                        </tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters border-top pt--20 mt--20">
                            <div class="col-sm-6">
                                <div class="coupon">
                                    <input type="text" id="coupon" name="coupon" class="cart-form__input" placeholder="Mã Giảm Giá">
                                    <button type="button" class="cart-form__btn" id="addcoupon">Áp Dụng</button>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <button type="button" class="cart-form__btn" id="delcart">Xoá Giỏ Hàng</button>
                                <button type="button" class="cart-form__btn" id="updatecart">Cập Nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart-totals">
                            <h5 class="font-size-14 font-bold mb--15">Hoá Đơn</h5>
                            <div class="cart-calculator">
                                <div class="cart-calculator__item">
                                    <div class="cart-calculator__item--head">
                                        <span>Tổng Tiền</span>
                                    </div>
                                    <div class="cart-calculator__item--value">
                                        <span id="subtotal"><?=$this->lib->forMatTien($subTotal)?> đ</span>
                                    </div>
                                </div>
                                <div class="cart-calculator__item">
                                    <div class="cart-calculator__item--head">
                                        <span>Phí Ship</span>
                                    </div>
                                    <div class="cart-calculator__item--value">
                                        <span ><?=$this->lib->forMatTien($shipping)?> đ</span>
                                    </div>
                                </div>
                                <?php 
                                if (isset($_SESSION['discount'])) {
                                    $discountPercent = $_SESSION['discount']['persent'];
                                    echo '<div class="cart-calculator__item">
                                        <div class="cart-calculator__item--head">
                                            <span>Giảm Giá</span>
                                        </div>
                                        <div class="cart-calculator__item--value">
                                            <span >'. $discountPercent.'%</span>
                                        </div>
                                    </div>
                                    <div class="cart-calculator__item order-total">
                                        <div class="cart-calculator__item--head">
                                            <span>Tổng Cộng</span>
                                        </div>
                                        <div class="cart-calculator__item--value">
                                                    <span class="product-price-wrapper">
                                                        <span class="money" id="totalbill">'.$this->lib->forMatTien(($subTotal)-($subTotal/100*$discountPercent)+$shipping).' đ</span>
                                                    </span>
                                        </div>
                                    </div>';
                                }else{
                                    echo ' <div class="cart-calculator__item order-total">
                                                <div class="cart-calculator__item--head">
                                                    <span>Tổng Cộng</span>
                                                </div>
                                                <div class="cart-calculator__item--value">
                                                            <span class="product-price-wrapper">
                                                                <span class="money" id="totalbill">'.$this->lib->forMatTien($subTotal+$shipping).' đ</span>
                                                            </span>
                                                </div>
                                            </div>';
                                }
                                
                                ?>
                            </div>
                        </div>
                        <a href="<?=ROOT_URL.'/thanh-toan'?>" class="btn btn-size-md btn-shape-square btn-fullwidth">
                          Thanh Toán
                        </a>
                    </div>
                </div>
            </div>
            <?php } else{?>
                <div class="row">
                    <div class="col-md-12">
                        <a href="?act=cat" class="btn btn-size-md btn-shape-square btn-fullwidth">
                          Chưa có sản phẩm nào trong giỏ hàng mời bạn ghé xem gian hàng!.
                        </a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->