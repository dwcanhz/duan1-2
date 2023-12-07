<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
        <!-- <div class="card mb-4">
            <div class="card-body">
                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                .
            </div>
        </div> -->
        
        <div class="card mb-4">
            <div class="card-header">
            <?php
                if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                    // echo '<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="fa fa-plus"></i> Thêm món</button>';
                }
            ?>
                <i class="fas fa-list"></i>
                Danh sách user
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>username</th>
                            <th>admin</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>username</th>
                            <th>admin</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM users";
                            $result = $mysqli->query($query);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["username"] ?></td>
                            <td><?php echo $row["admin"] ?></td>
                            <td>
                            <?php
                                if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                                    echo '
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal_'.$row["username"].'"><i class="fa fa-edit"></i> Sửa</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_'.$row["username"].'"><i class="fa fa-trash"></i> Xóa</button>
                                    ';
                                }else{
                                    echo '
                                    <button type="button" class="btn btn-outline-info">Cần quyền admin</button>';
                                }
                            ?>      
                            </td>
                        </tr>
                        <!-- Modal xóa user -->
                        <div class="modal fade" id="deleteModal_<?php echo $row["username"]; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteLabel">Xác nhận xóa user</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa user này?
                                        <form method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row["username"]; ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <button name="delete-user-btn" type="submit" class="btn btn-danger">Xóa</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Modal chỉnh sửa-->
                        <div class="modal fade" id="myModal_<?php echo $row["username"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa user</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editProductForm" method="post">
                                            <div class="mb-3">
                                                <label for="id_edit" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="id_edit" name="user_edit" value="<?php echo $row["username"]; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="level_edit" class="form-label">Level: </label>
                                                <select name="level_edit">
                                                    <option value="0">Member</option>
                                                    <option value="1">Admin</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="rereset-password-btn">Password sau khi reset sẽ là: 123456</label>
                                                <button class="btn btn-success" name="reset-password-btn"><i class="fa fa-refresh"></i> Reset password</button>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                                                <button name="edit-user-btn" class="btn btn-primary"><i class="fa fa-store"></i> Lưu thay đổi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            if (isset($_POST['edit-user-btn'])) {
                                $user_edit = $_POST['user_edit'];
                                $level_edit = $_POST['level_edit'];
                                $query = "UPDATE `users` SET `admin`='$level_edit' WHERE `username`='$user_edit'";
                                $result = $mysqli->query($query);
                                if($result){
                                    if ($result) {
                                        echo '<script>alert("Cập nhật thành công");</script>
                                                    <meta http-equiv="refresh" content="0;URL=user.php">
                                                ';
                                        
                                    } else {
                                        echo '<script>alert("Cập nhật thất bại");</script>
                                                    <meta http-equiv="refresh" content="0;URL=user.php">
                                                ';
                                    }
                                }
                            }
                            if(isset($_POST['reset-password-btn'])){
                                $user_edit = $_POST['user_edit'];
                                $passwordReset = md5("123456");
                                $query = "UPDATE `users` SET `password`='$passwordReset' WHERE `username`='$user_edit'";
                                $result = $mysqli->query($query);
                                if($result){
                                    if ($result) {
                                        echo '<script>alert("Cập nhật thành công");</script>
                                                    <meta http-equiv="refresh" content="0;URL=user.php">
                                                ';
                                        
                                    } else {
                                        echo '<script>alert("Cập nhật thất bại");</script>
                                                    <meta http-equiv="refresh" content="0;URL=user.php">
                                                ';
                                    }
                                }
                            }
                            if(isset($_POST['delete-user-btn'])){
                                $username = $_POST['delete_id'];
                                $delete = "DELETE FROM users WHERE `username` = '$username'";
                                $result = mysqli_query($mysqli, $delete);
                                if ($result) {
                                    echo '<meta http-equiv="refresh" content="2;URL=user.php">';
                                    die("Xóa user thành công.") ;
                                } else {
                                    die( "Xóa user thất bại: " . mysqli_error($mysqli));
                                }
                            }
                                }
                            }else{
                                echo "Không có dữ liệu";
                            }
                        ?>
                    </tbody>
                    
                </table>
                    <!-- Modal thêm user -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm user</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addProductForm" method="post">
                                            <div class="mb-3">
                                                <label for="img_add" class="form-label">Hình ảnh</label>
                                                <input type="text" class="form-control" id="img_add" name="img_add" placeholder="URL hình ảnh" name="img" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name_add" class="form-label">Tên user</label>
                                                <input type="text" class="form-control" name="name_add" placeholder="Tên user" name="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price_add" class="form-label">Giá</label>
                                                <input type="text" class="form-control" id="price_add" name="price_add" placeholder="Giá user" name="price" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="detail_add" class="form-label">Mô tả</label>
                                                <input type="text" class="form-control" id="detail_add" name="detail_add" placeholder="Mô tả user" name="detail" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                                                <button name="add-product-btn" class="btn btn-primary"><i class="fa fa-add"></i> Thêm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</main>
    <?php
    if (isset($_POST['add-product-btn'])) {
        $product_name = $_POST["name_add"];
        $product_price = $_POST["price_add"];
        $product_img = $_POST["img_add"];
        $product_detail = $_POST["detail_add"];
    
        // Kiểm tra xem các trường cần thiết đã được điền hay chưa
        if (empty($product_name) || empty($product_price) || empty($product_img) || empty($product_detail)) {
            echo "Vui lòng điền đầy đủ thông tin user.";
        } else {
            // Thực hiện truy vấn để thêm user
            $query = "INSERT INTO product (name, price, img, detail) VALUES ('$product_name', '$product_price', '$product_img', '$product_detail')";
            $result = mysqli_query($mysqli, $query);
    
            // Kiểm tra xem việc thêm user đã thành công hay chưa
            if ($result) {
                echo "Thêm user thành công.";
                echo '<meta http-equiv="refresh" content="0;URL=user.php">';
            } else {
                echo "Thêm user thất bại: " . mysqli_error($mysqli);
            }
        }
    }
    
        include "footer.php";
    ?>