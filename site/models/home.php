<?php 

 use SendGrid\Mail\Mail;
 use SendGrid\Mail\TypeException;
class Model_home extends Model_db{
    
    function getHotPro($sosp=3){ 
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1 AND Hot=1 ORDER BY idDT DESC LIMIT 0, $sosp";
        return $this->result1(0,$sql);
     }
     function getAllPro($sosp=4){ 
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY idDT ASC LIMIT 0, $sosp";
        return $this->result1(0,$sql);
     }
     function getAllNewPro($sosp=4){
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1 ORDER BY idDT DESC LIMIT 0, $sosp";
        return $this->result1(0,$sql);
     }
     function getAllViewsPro($sosp=4){
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1  ORDER BY SoLanXem DESC LIMIT 0, $sosp";
        return $this->result1(0,$sql);
     }
     function getAllProSelling($sosp=4){
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1  ORDER BY SoLanMua DESC LIMIT 0, $sosp";
        return $this->result1(0,$sql);
     }
    function getOnePro($slug){   
        $sql = "SELECT * FROM dienthoai WHERE AnHien=1 AND slug=?";
        return $this->result1(1,$sql,$slug);
    }
    function getProperty($slug){ 
        $sql = "SELECT * FROM dienthoai WHERE slug = ?";
        $kq =  $this->result1(1,$sql,$slug)['idDT'];
        $sql = "SELECT * FROM thuoctinhdt WHERE idDT=?";
        return $this->result1(1,$sql,$kq);
    }
    function getOneProducer($id){
      $sql = "SELECT * FROM nhasanxuat WHERE idNSX=?";
      return $this->result1(1,$sql,$id);
    }
    function getAllProducer(){
      $sql = "SELECT * FROM nhasanxuat";
      return $this->result1(0,$sql);
    }
    function getSamePro($slug){
      $sql = "SELECT * FROM dienthoai WHERE slug != ? ORDER BY idDT DESC LIMIT 4";
      return $this->result1(0,$sql,$slug);
    }
    function getCouponCode($coupon){
       $sql ="SELECT * FROM coupon WHERE coupon = ? AND expiredate > ?";
       return $this->result1(1,$sql,$coupon,time());
    }

    function luudonhangnhe($idDH, $hoten, $email,$phone,$address,$note,$keyBill){            
        if ($idDH==-1){
        $sql = "INSERT INTO donhang SET ThoiDiemDatHang=Now(),TenNguoiNhan=?, emailNguoiNhan=?
         ,dienthoai=?,DiaChiNguoiNhan=?,AnHien=1,GhiChuCuaKhach=?,keybill=?";          
        $kq= $this->getLastId($sql,$hoten,$email,$phone,$address,$note,$keyBill);
        if ($kq == null) return false;
        else return $kq;
      } 
      else
       {
        $sql = "UPDATE donhang SET ThoiDiemDatHang=Now(),TenNguoiNhan=?, emailNguoiNhan=?
        ,dienthoai=?,DiaChiNguoiNhan=?,AnHien=1,GhiChuCuaKhach=?,keybill=? WHERE idDH=?";              
         $kq= $this->exec1($sql,$hoten,$email,$phone,$address,$note,$keyBill,$idDH);
         
      if ($kq == null) return false;
            else return $idDH;
      }
    }

   function luugiohangnhe($idDH, $giohang){
      $sql = "DELETE FROM donhangchitiet WHERE idDH=?";
      $this->exec1($sql,$idDH);
      foreach ($giohang as $idDT=>$dt){
         $image = $dt['image'];
         $tenDT = $dt['TenDT'];
         $gia= $dt['Gia'];
         $Amount= $dt['Amount'];
        $sql = "INSERT INTO donhangchitiet(idDH,idDT,TenDT,Gia,SoLuong,urlHinh) VALUE(?,?,?,?,?,?)";
        $kq =$this->exec1($sql,$idDH,$idDT,$tenDT,$gia,$Amount,$image);
      }
      if($kq){
          return true;
      }
   }

   function getProductByIdPro($id){
      $sql = "SELECT * FROM dienthoai WHERE idNSX = ?";
      return $this->result1(0,$sql,$id);
   }

   public function Page (int $TotalProduct, int $CurrentPage)
   {
       $LimitPage = 5; // 5 s???n ph???m 2 trang

       $PagedHTML = ''; // kh???i t???o

       $CurrentQuery = $_GET; //query hi???n t???i

       $NextQuery = $_GET; //next query
       $PrevQuery = $_GET; // query tr?????c

       $LastQuery = $_GET; // query tr?????c ????y
       $FirstQuery = $_GET; // query ?????u ti??n

       $IsLastButtonHidden = '';
       $IsNextButtonHidden = '';

       $IsFirstButtonHidden = '';
       $IsPreviousButtonHidden = '';

       $TotalPage = ceil($TotalProduct / PAGE_SIZE); // t???ng s??? page

       if($CurrentPage === 1)
       {
           $IsFirstButtonHidden = 'hidden';
           $IsPreviousButtonHidden = 'hidden';
       }
       // n???u page == 1 th?? kh??ng cho quay v??? trang tr?????c

       if ((int) $CurrentPage === (int) $TotalPage)
       {
           $IsLastButtonHidden = 'hidden';
           $IsNextButtonHidden = 'hidden';
       }
       // n???u t???ng s??? page hi???n t???i == current page th?? kh??ng c?? ti???p t???c

       $NextQuery['Page'] = $CurrentPage + 1;     //t???o ra query ti???p theo
       $LastQuery['Page'] = $TotalPage; // t???o ra query cu???i
  


       $NextButton = '<li class="'.$IsNextButtonHidden.' page-item"><a class="page-number" href="?'.http_build_query($NextQuery).'">></a></li>';
       $LastButton = '<li class="'.$IsLastButtonHidden.' page-item"><a class="page-number" href="?'.http_build_query($LastQuery).'">>|</a></li>';

       $PrevQuery['Page'] = $CurrentPage - 1; //tr??? v??? trang tr?????c
       $FirstQuery['Page'] = 1; // tr??? v??? trang 1

       $PreviousButton = '<li class="'.$IsFirstButtonHidden.' page-item"><a class="page-number" href="?'.http_build_query($PrevQuery).'"><</a></li>';
       $FirstButton = '<li class="'.$IsPreviousButtonHidden.' page-item"><a class="page-number" href="?'.http_build_query($FirstQuery).'">|<</a></li>';
       // tr??? v??? trang tr?????c
       // tr??? v??? trang ????u
       $PagedHTML .= $FirstButton.$PreviousButton;
       //t???o html
       if ($CurrentPage <= $TotalPage && $TotalPage >= 1) // n???u page hi???n t???i nh??? h??n ho???c b???ng t???ng s??? page v?? v?? t???ng s??? page >=1
       {
           $PageBreak = 1; // break page

           if ($CurrentPage > ($LimitPage / 2)) // n???u page hi???n t???i l???n hon 5/2 
           {
               $CurrentQuery['Page'] = 1; // page hi???n t???i b???ng 1 

               $PagedHTML .= '<li class="page-item"><a class="page-number" href="?'.http_build_query($CurrentQuery).'">1</a></li>'; // trang ?????u
               $PagedHTML .= '<li class="page-item"><a class="page-number">...</a></li>'; // ?????n ....
           }

           $Loop = $CurrentPage; // l???p = page hi???n t???i
          
           while ($Loop <= $TotalPage) // curren page => t???ng s??? page
           {
               if ($PageBreak < $LimitPage) // n???u pagebreak ++ n???u pagebreak < 5 (limit page)
               {
                   $CurrentQuery['Page'] = $Loop; // g??n l???i cho current query

                   if ($CurrentPage === $Loop) // n???u currentpage == loop
                   {
                       $PagedHTML .= '<li class="current page-item"><a class="page-number" href="?'.http_build_query($CurrentQuery).'">'.$Loop.'</a></li>';
                   } else $PagedHTML .= '<li class="page-item"><a class="page-number" href="?'.http_build_query($CurrentQuery).'">'.$Loop.'</a></li>';
               }

               $PageBreak++;
               $Loop++;
           }

           if ($CurrentPage < ($TotalPage - ($LimitPage / 2))) 
           {
               $CurrentQuery['Page'] = $TotalPage;

               $PagedHTML .= '<li class="page-item"><a class="page-number"  href="?'.http_build_query($CurrentQuery).'">...</a></li>';
               $PagedHTML .= '<li class="page-item"><a class="page-number" href="?'.http_build_query($CurrentQuery).'">'.$TotalPage.'</a></li>';
           }
       }

       return $PagedHTML.$NextButton.$LastButton;
   }

   function countAllPhone($slug,$from,$to,$hot,$query)
   {
      $sql = "SELECT idNSX FROM nhasanxuat WHERE slug=?";
      $idDT = $this->result1(1,$sql,$slug)['idNSX'];

       $sql = "SELECT count(*) AS sodong FROM dienthoai WHERE idDT != 0";
         if ($idDT != NULL)
         {
            $sql .= " AND idNSX =".$idDT; 
         }
         if ($from != NULL)
         {
            $sql .= " AND Gia >= ".$from; 
         }
         if ($to != NULL)
         {
            $sql .= " AND Gia <= ".$to; 
         }
         if ($hot != NULL)
         {
             $sql .= " AND Hot = ".$hot; 
         }
         if($query != NULL)
         {
            $sql .= ' AND TenDT LIKE "%'.$query.'%"';
         }
       return $this->result1(1,$sql)['sodong'];
   }
   function GetProductList($slug,$CurrentPage,$from,$to,$hot,$query){
      $sql = "SELECT idNSX FROM nhasanxuat WHERE slug=?";
      $idDT = $this->result1(1,$sql,$slug)['idNSX'];

      $sql = "SELECT * FROM dienthoai WHERE idDT != 0";
      if ($idDT != NULL)
      {
        $sql .= " AND idNSX = ".$idDT; 
      }
      if ($from != NULL)
      {
          $sql .= " AND Gia >= ".$from; 
      }
      if ($to != NULL)
      {
          $sql .= " AND Gia <= ".$to; 
      }
      if ($hot != NULL)
      {
          $sql .= " AND Hot = ".$hot; 
      }
      if($query != NULL)
      {
          $sql .= ' AND TenDT LIKE "%'.$query.'%" ';
      }
      if ($CurrentPage !== 0)
      {
          $sql .= " GROUP BY idDT LIMIT ".($CurrentPage - 1) * PAGE_SIZE.", ".PAGE_SIZE;
      }
      
      return $this->result1(0,$sql);
  }

  function addNewView($idsp){
      $sql = "UPDATE dienthoai SET SoLanXem=SoLanXem+1 WHERE idDT = ?";
      return $this->exec1($sql,$idsp);
  }

  function addComment($review,$name,$iddt,$iduser){
    $time = date("Y-m-d H:i:s");
    if($iduser != null){
        $sql = "INSERT INTO binhluan(NoiDungBl,TenKh,idDT,idUser,ThoiDiemBL,AnHien) VALUE(?,?,?,?,?,?)";
        return $this->getLastId($sql,$review,$name,$iddt,$iduser,$time,1);
    }else{
        $sql = "INSERT INTO binhluan(NoiDungBl,TenKh,idDT,ThoiDiemBL,AnHien) VALUE(?,?,?,?,?)";
        return $this->getLastId($sql,$review,$name,$iddt,$time,1);
    }
  }
  
  function getAllComment($slug){
      
    $sql = "SELECT * FROM dienthoai WHERE slug = ?";
    $kq =  $this->result1(1,$sql,$slug)['idDT'];
    $sql = "SELECT * FROM binhluan WHERE idDT = ? ORDER BY idDT DESC";
    return $this->result1(0,$sql,$kq);
  }
  function getOneComment($id){
    $sql = "SELECT * FROM binhluan WHERE idBL = ?";
    return $this->result1(1,$sql,$id);
  }
  function getLastIdBill()
  {
    $sql = "SELECT idDH FROM donhang ORDER BY idDH DESC LIMIT 1";
    return $this->result1(1,$sql)['idDH'];
  }

  function sendMailBill($BillID,$UserMail)
  {
        $lib = new lib();
        require_once "../lib/vendor/autoload.php";
        $Mailer = new \SendGrid\Mail\Mail();

        $CurrentDate = time();
        try
        {
            $Mailer -> setFrom('tranquangnhan1606@gmail.com', 'Tr???n Quang Nh??n');
        }
        catch (TypeException $Error)
        {
            $lib -> LogFile($Error -> getMessage(), 'Active Mail Sender.', get_defined_vars());
            return false;
        }

        if ($_SESSION['suser']) $UserName = $_SESSION['suser']; else $UserName = '';

        $Mailer -> addTo($UserMail, $UserName);
        $Mailer -> setSubject(" H??a ????n ???? ???????c t???o.");

        $Mailer -> addDynamicTemplateData('UserName', $UserName);
        $Mailer -> addDynamicTemplateData('BillID', $BillID);
        $Mailer -> setTemplateId('d-037a50d7007145dba5f8cdf166813f85');

        $Sender = new \SendGrid('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');

        try
        {
            $Result = $Sender -> send($Mailer);
            $lib-> LogFile('Log Mail Result', '\Model\User\Register.SendMail', $Result);
        }
        catch (\Exception $Error)
        { 
            $lib-> LogFile($Error -> getMessage(), '\Model\User\Register.SendMail', get_defined_vars());
            return false;
        }
  }
  function getProductFromIdBill($id){
      $sql ="SELECT idDH FROM donhang WHERE keybill =?";
      $kq = $this->result1(1,$sql,$id)['idDH'];
      if($kq){
          $sql="SELECT * FROM donhangchitiet WHERE idDH = ?";
          return $this->result1(0,$sql,$kq);
      }else{
          return NULL;
      }
  }
//   function getIdProFromSlug($slug){
//       $sql = "SELECT idDT FROM dienthoai WHERE slug=?";
//       return $this->result1(1,$sql,$slug)['idDT'];
//   }
}