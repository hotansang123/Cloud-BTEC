<?php
require_once "../../../system/config.php";
require_once "../../../system/database.php";
require_once "../../models/home.php";
$model = new Model_home;
session_start();
switch ($_POST['action']) {
    case 'addCart':
        $array = array();

        if (isset($_SESSION['giohang']) == false) {
            $_SESSION['giohang'] = [];
        }

        $spFromDb = $model->getOnePro($_POST['idsp']);
        $spInCart = $_SESSION['giohang'][$_POST['idsp']];

        if ($spInCart != null) {
            $soLuong = $spInCart['Amount'] + $_POST['quantity'];
        } else {
            $soLuong = $_POST['quantity'];
        }

        $_SESSION['giohang'][$_POST['idsp']] = [
            'TenDT' => $spFromDb['TenDT'],
            'Gia' => $spFromDb['GiaKM'],
            'Amount' => $soLuong,
            'image' => $spFromDb['urlHinh'],
        ];

        $array['statusCode'] = 1;

        echo json_encode($array);

        break;
    case 'updateQtt':
        $array = array();

        $idsp = explode(',', $_POST['idsp']);

        $quantity = explode(',', $_POST['quantity']);

        $array['data'] = [];

        for ($i = 0; $i < count($idsp); $i++) {
            $id = $idsp[$i];
            $_SESSION['giohang'][$id]['Amount'] = $quantity[$i];

            array_push($array['data'], $_SESSION['giohang'][$id]);
        }
        if (isset($_SESSION['discount']['persent'])) {
            $array['discount'] = $_SESSION['discount']['persent'];
        }
        $array['statusCode'] = 1;

        echo json_encode($array);

        break;

    case 'addCoupon':
        $array = array();

        $couponCode = $model->getCouponCode($_POST['couponCode']);

        if ($couponCode == null) {
            $array['statusCode'] = 0;
            $array['message'] = 'Mã giảm giá không tồn tại hoặc đã hết hạn';

        } else {
            $totalPriceFromCart = 0;

            $array['statusCode'] = 1;

            foreach ($_SESSION['giohang'] as $row) {
                $totalPriceFromCart += $row['Gia'] * $row['Amount'];
            }

            $array['discountCouponApplied'] = $_POST['couponCode'];
            $array['persentDiscount'] = $_POST['discount'];
            $array['totalPriceAfterDiscount'] = ($totalPriceFromCart + 30000) - ($totalPriceFromCart / 100 * $couponCode['discount']);

            $_SESSION['discount']['persent'] = $couponCode['discount'];
            $_SESSION['discount']['couponCode'] = $_POST['couponCode'];
        }
        echo json_encode($array);

        break;
    case 'delCart':
        $array = array();
        unset($_SESSION['giohang']);
        unset($_SESSION['discount']);
        $array['statusCode'] = 1;
        echo json_encode($array);
        break;
    default:
        # code...
        break;
}
