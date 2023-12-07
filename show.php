
<?php
    require_once "../config.php";
    require_once "../session.php";
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['admin'] = $row["admin"];
    }
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Sản phẩm</li>
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
                    echo '<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="fa fa-plus"></i> Thêm sản phẩm</button>';
                }else{
                    echo '
                            <script>alert("Bạn cần là admin để truy cập link này!")</script>
                            <meta http-equiv="refresh" content="0;URL=index.php">
                        ';
                }
            ?>
                <i class="fas fa-list"></i>
                Danh sách các sản phẩm
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã</th>
                            <th>Hình ảnh</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM product";
                            $result = $mysqli->query($query);
                           
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><img width="150px" height="80px" src='<?php echo $row["img"]; ?>' alt='Product Image'></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["category"] ?></td>
                            <td><?php echo $row["detail"] ?></td>
                            <td>
                            <?php
                                if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                                    echo '
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal_'.$row['id'].'"><i class="fa fa-edit"></i> Sửa</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_'.$row['id'].'"><i class="fa fa-trash"></i> Xóa</button>';
                                }else{
                                    echo '
                                    <button type="button" class="btn btn-outline-info">Cần quyền admin</button>';
                                }
                            ?>      
                            </td>
                        </tr>
                        <!-- Modal xóa sản phẩm -->
                        <div class="modal fade" id="deleteModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteLabel">Xác nhận xóa sản phẩm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa sản phẩm này?
                                        <form method="post">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <button name="delete-product-btn" type="submit" class="btn btn-danger">Xóa</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Modal chỉnh sửa-->
                        <div class="modal fade" id="myModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa sản phẩm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editProductForm" method="post">
                                            <div class="mb-3">
                                                <label for="id_edit" class="form-label">Mã sản phẩm</label>
                                                <input type="text" class="form-control" id="id_edit" name="id_edit" value="<?php echo $row['id']; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="img_edit" class="form-label">Hình ảnh</label>
                                                <input type="text" class="form-control" id="img_edit" name="img_edit" value="<?php echo $row['img']; ?>"required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name_edit" class="form-label">Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="name_edit" value="<?php echo $row['name']; ?>"required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price_edit" class="form-label">Giá</label>
                                                <input type="text" class="form-control" id="price_edit" name="price_edit" value="<?php echo $row['price']; ?>"required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="category_edit" class="form-label">Danh mục: </label>
                                                <select id="category_edit" name="category_edit">
                                                <?php
                                                    $category_query = "SELECT * FROM category";
                                                    $category_result = $mysqli->query($category_query);
                                                    if($category_result && $category_result->num_rows > 0){
                                                        while ($category_row = $category_result->fetch_assoc()){
                                                            echo '
                                                            
                                                                <option value="'.$category_row["value"].'">'.$category_row["value"].'</option>
                                                            
                                                                ';
                                                        }
                                                    }else{
                                                        echo "Vui lòng thêm danh mục";
                                                    }
                                                ?>
                                               </select>
                                                <!-- <input type="text" class="form-control" id="category_edit" name="category_edit" value="<?php echo $row['category']; ?>" required> -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="detail_edit" class="form-label">Mô tả</label>
                                                <input type="text" class="form-control" id="detail_edit" name="detail_edit" value="<?php echo $row['detail']; ?>"  name="detail" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                                                <button name="edit-product-btn" class="btn btn-primary"><i class="fa fa-store"></i> Lưu thay đổi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            if (isset($_POST['edit-product-btn'])) {
                                $product_id = $_POST["id_edit"];
                                $product_name = $_POST["name_edit"];
                                $product_price = $_POST["price_edit"];
                                $product_img = $_POST["img_edit"];
                                $product_category = $_POST["category_edit"];
                                $product_detail = $_POST["detail_edit"];
                            
                                $update = "UPDATE `product` SET `name`=?, `price`=?, `img`=?, `category`=?, `detail`=? WHERE `id`=?";
                                $stmt = $mysqli->prepare($update);
                                
                                if ($stmt) {
                                    // Gán các giá trị vào các tham số
                                    $stmt->bind_param('sssssi', $product_name, $product_price, $product_img, $product_category, $product_detail, $product_id);
                                
                                    // Thực hiện câu lệnh UPDATE
                                    $stmt->execute();
                                
                                    // Đóng prepared statement
                                    $stmt->close();
                                
                                    // Đóng kết nối đến cơ sở dữ liệu
                                    $mysqli->close();
                                    echo '<meta http-equiv="refresh" content="0;URL=product.php">';
                                    die("Cập nhật sản phẩm thành công.");
                                    
                                } else {
                                    die("Cập nhật sản phẩm thất bại: " . $stmt->error);
                                }
                                $stmt->close();
                            }
                            if(isset($_POST['delete-product-btn'])){
                                $delete_id = $_POST['delete_id'];
                                $delete = "DELETE FROM product WHERE id = $delete_id";
                                $result = mysqli_query($mysqli, $delete);
                                if ($result) {
                                    echo '<meta http-equiv="refresh" content="2;URL=product.php">';
                                    die("Xóa sản phẩm thành công.") ;
                                } else {
                                    die( "Xóa sản phẩm thất bại: " . mysqli_error($mysqli));
                                }
                            }
                                }
                            }else{
                                echo "Không có dữ liệu";
                            }
                        ?>
                    </tbody>
                    
                </table>
            <!-- Modal thêm sản phẩm -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addProductForm" method="post">
                                    <div class="mb-3">
                                        <label for="img_add" class="form-label">Hình ảnh</label>
                                        <input type="text" class="form-control" id="img_add" name="img_add" placeholder="URL hình ảnh" name="img" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name_add" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name_add" placeholder="Tên sản phẩm" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price_add" class="form-label">Giá</label>
                                        <input type="text" class="form-control" id="price_add" name="price_add" placeholder="Giá sản phẩm" name="price" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_add" class="form-label">Danh mục: </label>
                                        <select id="category_add"  name="category_add">
                                        <?php
                                            $category_query = "SELECT * FROM category";
                                            $category_result = $mysqli->query($category_query);
                                            if($category_result && $category_result->num_rows > 0){
                                                while ($category_row = $category_result->fetch_assoc()){
                                                    echo '
                                                    
                                                        <option name="category_add" value="'.$category_row["value"].'">'.$category_row["value"].'</option>
                                                        
                                                        ';
                                                }
                                            }else{
                                                echo "Vui lòng thêm danh mục";
                                            }
                                        ?>
                                        </select>
                                        <!-- <input type="text" class="form-control" id="category_edit" name="category_edit" value="<?php echo $row['category']; ?>" required> -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="detail_add" class="form-label">Mô tả</label>
                                        <input type="text" class="form-control" id="detail_add" name="detail_add" placeholder="Mô tả sản phẩm" name="detail" required>
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
        $category = $_POST["category_add"];
        $product_detail = $_POST["detail_add"];
    
        // Kiểm tra xem các trường cần thiết đã được điền hay chưa
        if (empty($product_name) || empty($product_price) || empty($category) || empty($product_img) || empty($product_detail)) {
            echo "Vui lòng điền đầy đủ thông tin sản phẩm.";
        } else {
            // Thực hiện truy vấn để thêm sản phẩm
            $query = "INSERT INTO product (name, price, img, category, detail) VALUES ('$product_name', '$product_price', '$product_img', '$category', '$product_detail')";
            $result = mysqli_query($mysqli, $query);
    
            // Kiểm tra xem việc thêm sản phẩm đã thành công hay chưa
            if ($result) {
                echo "Thêm sản phẩm thành công.";
                echo '<meta http-equiv="refresh" content="0;URL=product.php">';
            } else {
                echo "Thêm sản phẩm thất bại: " . mysqli_error($mysqli);
            }
        }
    }
    
        include "footer.php";
    ?>