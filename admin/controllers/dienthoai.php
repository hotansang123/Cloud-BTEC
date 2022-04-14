<?php 
require_once "models/dienthoai.php"; 
require_once "models/nhasanxuat.php"; 
require_once "../lib/myfunctions.php"; 
class DienThoai{
    function __construct()
    {
        $this->model = new Model_dienThoai();
        $this->modelNSX = new Model_nhaSanXuat();
        $this->lib = new lib();
        $act = "index";

        if(isset($_GET["act"])==true) $act = $_GET['act'];

        switch ($act) {
            case 'index':
                $this->index();
                break;
            case 'addnew':
                $this->addNew();
                break; 
            case 'edit':
                $this->addNew();
                break;
            case 'update':
        
                break;
            case 'delete':
                $this->delete();
                break;   
            default:
         
                break;
        }

    }
    function index()
    {   
    
        if (isset($_GET['Page'])) $CurrentPage = $_GET['Page']; else $CurrentPage = 1;
     
        
        $TotalProduct = $this->model->countAllPhone();

        if($TotalProduct == 0) $TotalProduct =1;
  
        $ProductList = $this->model-> GetProductList($CurrentPage);


        $Pagination =  $this->model->Page($TotalProduct, $CurrentPage);

        $page_title ="Danh sách nhà sản xuất";
        $page_file = "views/dienthoai_index.php";
        require_once "views/layout.php";
    }
    function addNew()
    {  
        if(isset($_GET['id'])&&($_GET['act']='dienthoai')){
            $oneRecode = $this->model->showOnePhone($_GET['id']);
            $producer = $this->modelNSX->listRecords();
            $page_title ="Sửa Điện Thoại";
            $page_file = "views/dienthoai_edit.php";
        }else{
            $producer = $this->modelNSX->listRecords();
            $page_title ="Thêm Điện Thoại";
            $page_file = "views/dienthoai_add.php";
        }

        if(isset($_POST['them'])&&$_POST['them'])
        {

            $name =$this->lib->stripTags($_POST['name']);
            $price = $_POST['price'];
            $promo = $_POST['promo'];
            $img = $_FILES['img'];
            $imgs = $this->lib->checkUpLoadMany($img);
            $date = $_POST['data'];
            $views = $_POST['views'];
            $buy = $_POST['buy'];
            $idproducer = $_POST['idproducer'];
            $inventory = $_POST['inventory'];
            $showHide = $_POST['showhide'];
            $hot = $_POST['hot'];
            $detail = $_POST['detail'];
            $slug = $this->lib->slug($name);
            

            settype($price,"float");
            settype($promo,"int");
            settype($views,"int");
            settype($buy,"int");
            settype($idproducer,"int");
            settype($inventory,"int");
            settype($showHide,"int");
            settype($hot,"int");
            
            $_SESSION['message'] = "";
            if($name == ""){
                $_SESSION['message'] = "Bạn chưa nhập tên";
            } 
            elseif($price == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập giá";
            }
            elseif($promo == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập giảm giá";
            }
            elseif($img == "")
            {
                $_SESSION['message'] = "Bạn chưa chọn ảnh";
            }
            elseif($date == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập ngày nhập hàng";
            }
            elseif($date == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập ngày nhập hàng";
            }
            elseif($idproducer == "")
            {
                $_SESSION['message'] = "Bạn chưa chọn nhà sản xuất";
            }
            if($_SESSION['message']){
                header("location: ?ctrl=thongbao");
            }
            else
            {
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    settype($id,"int");
                    $this->edit($name,$price,$promo,$imgs,$date,$detail,$views,$buy,$hot,$idproducer,$showHide, $inventory,$slug,$id);
                
                }else
                {
                    $this->store($name,$price,$promo,$imgs,$date,$detail,$views,$buy,$hot,$idproducer,$showHide, $inventory,$slug);
                }    
            }

           
        }
     
        require_once "views/layout.php";
    }//thêm mới dữ liệu vào db


    function store($name,$price,$promo,$imgs,$date,$detail,$views,$buy,$hot,$idproducer,$showHide, $inventory,$slug){   
        $idLastPhone = $this->model->addNewPhone($name,$price,$promo,$imgs,$date,$detail,$views,$buy,$hot,$idproducer,$showHide, $inventory,$slug);
        if($idLastPhone != null)
        {
            echo "<script>alert('Thêm thành công')</script>";
            header("location: ?ctrl=thuoctinh&act=addnew&id=$idLastPhone");
        }else
        {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    function edit($name,$price,$promo,$imgs,$date,$detail,$views,$buy,$hot,$idproducer,$showHide, $inventory,$slug,$id)
    {
        if($this->model->editPhone($name,$price,$promo,$imgs,$date,$detail,$views,$buy,$hot,$idproducer,$showHide, $inventory,$slug,$id))
        {
            echo "<script>alert('Sửa thành công')</script>";
            header("location: ?ctrl=dienthoai&act=index");
        }else
        {
            echo "<script>alert('Sửa thất bại')</script>";
        }
        require_once "views/layout.php";
    }

    function delete()
    {
        if(isset($_GET['id'])&&($_GET['ctrl']=='dienthoai')){
            $id = $_GET['id'];
            settype($id,"int");
            
            if($this->model->deletePhone($id)){
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=dienthoai&act=index");
            }else{
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }
}
?>