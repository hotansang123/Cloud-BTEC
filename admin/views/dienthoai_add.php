

<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-10">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Điện Thoại</h4>

                                    <form data-parsley-validate id="formadd" novalidate method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <?php if($message) echo "<h2 class='text-danger'>".$mesage."</h2>";   ?>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hình ảnh</label>
                                           <input type="file" name="img[]" multiple>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Tên Điện Thoại</label>
                                                    <input type="text" name="name"  parsley-trigger="change" required
                                                        placeholder="Nhập tên nhà sản xuất" class="form-control" id="userName">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Giá</label>
                                                    <input  type="number" name="price" parsley-trigger="change" required
                                                        placeholder="Nhập giá" class="form-control" id="emailAddress">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Giảm Giá</label>
                                                    <input  type="number" name="promo" parsley-trigger="change" required
                                                        placeholder="Nhập giảm giá" class="form-control" id="emailAddress">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Thời Điểm Nhập</label>
                                                    <input type="date" name="data" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Số lần xem</label>
                                                    <input type="number" name="views" class="form-control" >
                                                </div>  
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Số lần Mua</label>
                                                    <input type="number" name="buy" class="form-control" >
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Nhà sản xuất</label>
                                                    <select class="form-control" name="idproducer">
                                                        <?php 
                                                            foreach ($producer as $row) {
                                                            echo '<option value='.$row['idNSX'].'>'.$row['TenNSX'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Số lượng tồn kho</label>
                                                    <input type="number" class="form-control" name="inventory">
                                                </div>           
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <input id="remember-1" type="checkbox" name="showhide" value="1" data-parsley-multiple="remember-1">
                                                        <label for="remember-1">Ẩn Hiện ? </label>
                                                    </div>
                                                </div>            
                                            </div>   
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <input id="remember-2" type="checkbox" name="hot" value="1" data-parsley-multiple="remember-1">
                                                        <label for="remember-2">Hot ? </label>
                                                    </div>
                                                </div>           
                                            </div>              
                                        </div>
                                      
                                        
                                      
                                        <textarea id="editor1" style="height: 300px;width:100%" name="detail" >
                                           
                                        </textarea>
                                      
                                        <div class="form-group text-right mb-0 mt-5">
                                            <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Thêm">
                                            <a href="?ctrl=dienthoai&act=index" clas="btn btn-secondary waves-effect waves-light">Huỷ</a>
                                        </div>

                                    </form>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>