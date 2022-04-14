<?php 
require_once "models/thuoctinh.php"; 

require_once "../lib/myfunctions.php"; 
class Thuoctinh{
    function __construct()
    {
        $this->model = new Model_thuoctinh();
        $this->lib = new lib();
        $act = "index";

        if(isset($_GET["act"])==true) $act = $_GET['act'];

        switch ($act) {
            case 'addnew':
                $this->addNew();
                break; 
            case 'edit':
                $this->addNew();
                break;  
            default:
                break;
        }

    }

    function addNew()
    {  
      
        if(isset($_GET['idedit'])&&($_GET['act']=='edit')){
            $oneRecode = $this->model->showOneProperty($_GET['idedit']);
            $page_title ="Sửa Thuộc Tính";
            $page_file = "views/thuoctinh_edit.php";
        }else{
            $page_title ="Thêm Thuộc Tính";
            $page_file = "views/thuoctinh_add.php";
        }

        if(isset($_POST['them'])&&$_POST['them'])
        {
            $iddt = $_GET['id'];
            $screen =$this->lib->stripTags($_POST['screen']);
            $operatingsystem  = $_POST['operatingsystem'];
            $rearcamera = $_POST['rearcamera'];
            $frontcamera = $_POST['frontcamera'];
            $cpu = $_POST['cpu'];
            $ram = $_POST['ram'];
            $memory = $_POST['memory'];
            $memorystick = $_POST['memorystick'];
            $sim = $_POST['sim'];
            $battery = $_POST['battery'];

          
            settype($iddt,"int");
            settype($memorystick,"int");
      
            
            $_SESSION['message'] = "";
            if($screen == ""){
                $_SESSION['message'] = "Bạn chưa nhập thông số màn hình";
            } 
            elseif($operatingsystem == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số hệ điều hành";
            }
            elseif($rearcamera == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập  thông số camera sau";
            }
            elseif($frontcamera == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số camera trước";
            }
            elseif($cpu == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số CPU";
            }
            elseif($ram == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số RAM";
            }
            elseif($memory == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số bộ nhớ trong";
            }
            elseif($memorystick == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số thẻ nhớ";
            }
            elseif($sim == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số sim";
            } 
            elseif($battery == "")
            {
                $_SESSION['message'] = "Bạn chưa nhập thông số dung lượng pin";
            }
            if($_SESSION['message']){
                header("location: ?ctrl=thongbao");
            }
            else
            {
                if(isset($_GET['idedit']))
                {
                    $idedit = $_GET['id'];
                    settype($idedit,"int");
                    $this->edit($screen,$operatingsystem,$rearcamera,$frontcamera,$cpu,$ram,$memory,$memorystick,$sim,$battery,$idedit);
                
                }else
                {
                    $this->store($iddt,$screen,$operatingsystem,$rearcamera,$frontcamera,$cpu,$ram,$memory,$memorystick,$sim,$battery);
                }    
            }
        }
        require_once "views/layout.php";
    }//thêm mới dữ liệu vào db


    function store($iddt,$screen,$operatingsystem,$rearcamera,$frontcamera,$cpu,$ram,$memory,$memorystick,$sim,$battery){   
    
        if($this->model->addProperty($iddt,$screen,$operatingsystem,$rearcamera,$frontcamera,$cpu,$ram,$memory,$memorystick,$sim,$battery))
        {
            echo "<script>alert('Thêm thành công')</script>";
            header("location: ?ctrl=dienthoai&act=index");
        }else
        {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    function edit($screen,$operatingsystem,$rearcamera,$frontcamera,$cpu,$ram,$memory,$memorystick,$sim,$battery,$idedit)
    {
        if($this->model->editProperty($screen,$operatingsystem,$rearcamera,$frontcamera,$cpu,$ram,$memory,$memorystick,$sim,$battery,$idedit))
        {
            echo "<script>alert('Sửa thành công')</script>";
            header("location: ?ctrl=dienthoai&act=index");
        }else
        {
            echo "<script>alert('Sửa thất bại')</script>";
        }
        require_once "views/layout.php";
    }
}
?>