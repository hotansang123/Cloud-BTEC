
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

                                    <h4 class="header-title mt-0 mb-3">Nhà sản xuất</h4>

                                    <form data-parsley-validate novalidate method="post">
                                        <div class="form-group">
                                            <label for="">Tên Nhà Sản Xuất</label>
                                            <input type="text" name="name"  parsley-trigger="change" required
                                                   placeholder="Nhập tên nhà sản xuất" class="form-control" id="userName">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thứ Tự</label>
                                            <input  type="number" name="order" parsley-trigger="change" required
                                                   placeholder="Nhập thứ tự nhà sản xuất" class="form-control" id="emailAddress">
                                        </div>
                                        <div class="form-group pl-3">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="showhide" id="" value="1" >
                                            Ẩn Hiện
                                        </label>
                                        </div>
            
                                        <div class="form-group text-right mb-0 ">
                                            <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Thêm">
                                            <a href="?ctrl=nhasanxuat&act=index" clas="btn btn-secondary waves-effect waves-light">Huỷ</a>
                                        </div>

                                    </form>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                </div>
            </div>