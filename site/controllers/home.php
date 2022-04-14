<?php 
require_once "../system/config.php";
require_once "../system/database.php";
require_once "../lib/myfunctions.php";

require_once "models/home.php"; 
require_once "models/user.php";
class Home{
    function __construct()   {
        $this->model = new model_home();
        $this->modelUser = new Model_user();
        $this->lib = new lib();
       
        if(isset($_GET['q'])){
            $this->cat();
         }
        $act = "home";
        if(isset($_GET["act"])==true) $act=$_GET["act"];
        switch ($act) {    
	      case "home": $this->home(); break;
         case "detail": $this->detail(); break;
         case "cart": $this->cart(); break;
         case "cartview": $this->cartView(); break;
         case "checkout": $this->checkout(); break;
         case "savebill": $this->saveBill(); break;
         case "thankyou": $this->thankYou(); break;
         case "cat": $this->cat(); break;
         case "vnpay": $this->vnpay(); break;
         case "ttthanhcong": $this->ttthanhcong(); break;
         case "loginregister": $this->loginRegister();break;
         case "active":$this->active();break;
         case "logout":$this->logout();break; 
         case "forgotpass":$this->forgotPass();break;
         case "changepass":$this->changePass();break;
         case "viewbill":$this->viewBill();break;
        }
        
     }

     function home()
     {
        $producer = $this->model->getAllProducer();
        $getHotPro =  $this->model->getHotPro();
        $getAllPro = $this->model->getAllPro();
        $getAllNewPro = $this->model->getAllNewPro();
        $getAllViewsPro = $this->model->getAllViewsPro();
        $getAllProSelling = $this->model->getAllProSelling();

        $page_title ="Danh sách nhà sản xuất";
        $viewFile = "views/home.php";
        require_once "views/layout.php";  
     }

     function detail()
     {
        $producer = $this->model->getAllProducer();
   
        $slug = $_GET['slug'];
      
        $sp = $this->model->getOnePro($slug);   
        
        $spSame = $this->model->getSamePro($slug);   

        $property = $this->model->getProperty($slug);   

        $comments = $this->model->getAllComment($slug);
      
        $viewFile = "views/detail.php";     
        require_once "views/layout.php";  
     }

     function cat(){

         $producer = $this->model->getAllProducer();
      
         $slug = $_GET['slug'];
         
         if(isset($_GET['to'])) $to = $_GET['to']; else $to = NULL;
         if(isset($_GET['from'])) $from = $_GET['from']; else $from = NULL;
         if(isset($_POST['hot'])) $hot = $_POST['hot']; else $hot = NULL;

         if (isset($_GET['Page'])) $CurrentPage = $_GET['Page']; else $CurrentPage = 1;
         
         if(isset($_GET['q'])) $query = $_GET['q']; else $query = NULL;

         $TotalProduct = $this->model->countAllPhone($slug,$from,$to,$hot,$query);
 
         if($TotalProduct == 0) $TotalProduct =1;
   
         $ProductList = $this->model-> GetProductList($slug,$CurrentPage,$from,$to,$hot,$query);
 
 
         $Pagination =  $this->model->Page($TotalProduct, $CurrentPage);

         $viewFile ="views/shop.php";
         require_once "views/layout.php";
     }

     function cartView(){
         $producer = $this->model->getAllProducer();

         $viewFile ="views/cartview.php";
         require_once "views/layout.php";
     }

     function cart()
     {
         $id = $_GET['id'];
        
         $what = "";
         if(isset($_GET['what'])) $what = $_GET['what'];
        
         if ($what=="remove")
         {
            unset($_SESSION['giohang'][$id]);
            header("location: ". ROOT_URL."/gio-hang");
         }
     }

      function checkout()
      {
         $producer = $this->model->getAllProducer();
         $viewFile ="views/checkout.php";
         require_once "views/layout.php";
      }

      function saveBill()
      {
         $producer = $this->model->getAllProducer();

         $hoten = trim(strip_tags($_POST['name']));
         $email = trim(strip_tags($_POST['email']));
         $phone = trim(strip_tags($_POST['phone']));
         $address = trim(strip_tags($_POST['address']));
         $note = trim(strip_tags($_POST['note']));
         $methodpay = $_POST['payment-method'];
         $keyBill = $this->model->getLastIdBill(). rand(1000,1000); 

         if (isset($_SESSION['idDH']))
            $idDH= $_SESSION['idDH'];
         else $idDH="-1";
         
         echo $idDH.'cũ';

         $idDH = $this->model->luudonhangnhe($idDH, $hoten, $email,$phone, $address,$note,$keyBill);
         
         echo $idDH.'mới';
       
         if($methodpay == 'vnpay'){
            if ($idDH){
               $_SESSION['idDH'] = $idDH;
               $giohang = $_SESSION['giohang'];
               $this->model->luugiohangnhe($idDH, $giohang);
               header("location: " . SITE_URL."?act=vnpay&idhd=".$idDH."");
            }
         }else{
            if ($idDH){
               $_SESSION['idDH'] = $idDH;
               
               $giohang = $_SESSION['giohang'];
               $this->model->luugiohangnhe($idDH, $giohang);
               $this->model->sendMailBill($keyBill,$email);
               header('location: '.ROOT_URL.'/cam-on');
            }  
         }
      }
      function vnpay()
      {
         
         $viewFile ="views/vnpay/vnpay.php";
         require_once "views/layout.php";
      }
      function ttthanhcong()
      {
           unset($_SESSION['giohang']);
           unset($_SESSION['discount']);
         $viewFile ="views/vnpay/vnpay_return.php";
         require_once "views/layout.php";
      }
      
      function thankYou()
      {
         $producer = $this->model->getAllProducer();
         $viewFile ="views/thankyou.php";
         require_once "views/layout.php";
      }

      function loginRegister()
      {

         $viewFile ="views/login-register.php";
         require_once "views/layout.php";
      }
      function active()
      {
         
        $userId =  $_GET['userid'];
        $token = $_GET['token'];
        if($this->modelUser->selectRanDomKey($userId) == $_GET['token']){
         $this->modelUser->setThanhVien($userId);

         echo '<script>window.location.href="index.php"</script>';
        }else{
           echo 'Mày hack à ?';
        }
      
      }
      function logout()
      {
         unset($_SESSION['suser']);
         unset($_SESSION['sid']);
         header('location: '.ROOT_URL.'');
      }
      function forgotPass(){

         $viewFile ="views/forgotpass.php";
         require_once "views/layout.php";
      }
      function changePass()
      {
         $viewFile ="views/changepass.php";
         require_once "views/layout.php";
      }
      function viewBill(){
        
         $getProductFromIdBill = $this->model->getProductFromIdBill($_GET['id']);
         $getInfoBill = $this->modelUser->getInfoBill($_GET['id']);
         $viewFile ="views/viewbill.php";
         require_once "views/layout.php";
      }
}
?>