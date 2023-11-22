<?php
include '../view/header.php';
include '../model/user.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'lienhe':
            include '../view/lienhe.php';
            break;

        case 'sanpham':
            include '../view/sanpham.php';
            break;

        case 'dangnhap':
            if (isset($_POST['login'])) {
                $user_login = get_user_by_name($_POST['email']);
                if (!($user_login)) {
                    header('location: index.php?act=dangnhap&error1=Bạn chưa đăng ký');
                } else {
                    if (password_verify($_POST['password'], $user_login['password'])) {
                        $userLogin['id'] = $user_login['id'];
                        $userLogin['name'] = $user_login['name'];
                        $userLogin['address'] = $user_login['address'];
                        $userLogin['phone'] = $user_login['phone'];
                        $userLogin['userName'] = $user_login['userName'];
                        $userLogin['address'] = $user_login['address'];
                        $userLogin['email'] = $user_login['email'];
                        $userLogin['password'] = $user_login['password'];
                        $userLogin['is_Admin'] = $user_login['is_Admin'];
                        $_SESSION['user'] = $userLogin;
                     
        
                        header("location:index.php");
                    } else {
                        header('location: index.php?act=dangnhap&error2=Sai mật khẩu');
                    }
                }
            }
            include '../view/dangnhap.php';
            break;
        case 'dangky':
            if (isset($_POST['register'])) {
                $name = $_POST['name_user'];
        
                $address = $_POST['address'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];
                $image = $_FILES['image']['name'];
                // $groupProduct_Id=$_POST['groupProduct_Id'];
                //upload ảnh
                $folder = "../uploads/";
                $targerupload = $folder . basename($_FILES['image']['name']);
                $targetupload = $folder . basename($_FILES['image']['name']);
        
                $email = $_POST['email'];
                $password = $_POST['password'];
                if (strlen($_POST['password']) < 8) {
                    header('location: index.php?act=dangky&error1=Mật khẩu phải trên 8 ký tự');
                    return;
                }
                $user_db = get_user_by_name($email);
                if ($user_db) {
                    header('location: index.php?act=dangky&error4=Tài khoản này đã tồn tại!!');
        
                } else {  
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetupload)) {
                        add_user($name,$address,$phone,$email,password_hash($password, PASSWORD_BCRYPT),$gender,$image);
                        header('location: index.php?act=dangnhap');
                    }
                }
            }
            include '../view/dangky.php';
            break;
        case 'giohang':
            include '../view/giohang.php';
            break;
            case 'chitietsanpham':
                include '../view/chitietsanpham.php';
                break;
        case 'login' :
           
          

        default:
            # code...
            break;
    }
} else {
    $categories =get_full_categoriess();
    $productBestSl=get_products_bestseller();
   $products=get_all_product();
   
    include '../view/home.php';
}



include '../view/footer.php';



?>
