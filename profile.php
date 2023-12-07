<?php
    require_once "../config.php";
    require_once "../session.php";
    $_SESSION['control'] = "profile";
?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
            if(isset($_SESSION['dangnhapthanhcong'])){
                include "nav.php";
        ?>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php
                    include "aside.php";
                ?>
            </div>
            <div class="container d-flex justify-content-center">
            <div class="col-md-6">
                <br><br><br><br>
                <form action="public/edit_user.php" method="POST">
                    <div class="mb-3">
                        <label for="user" class="form-label">Username</label>
                        <input type="user" class="form-control" id="user" name="user" placeholder="user hiện tại" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="newEmail" placeholder="abc@gmal.comm" value="<?php echo $_SESSION['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Mật khẩu cũ" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Mật khẩu mới" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Xác nhận mật khẩu mới" required>
                    </div>
                    <button type="submit" name="edit-user-btn" class="btn btn-primary">Lưu thông tin</button>
                </form>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <?php
            }else{
                echo '
                <script>alert("Vui lòng đăng nhập!");</script>
                <meta http-equiv="refresh" content="0;URL=../login.php">';
            }
        ?>
    </body>
</html>
