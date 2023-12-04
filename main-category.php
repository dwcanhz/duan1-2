<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">danh mục</li>
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
                    echo '<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fa fa-plus"></i> Thêm danh mục</button>';
                }
            ?>
                <i class="fas fa-list"></i>
                Danh sách danh mục
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Chức năng</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM category";
                            $result = $mysqli->query($query);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["value"] ?></td>
                            <td><?php echo $row["detail"] ?></td>
                            <td>
                            <?php
                                if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
                                    echo '
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_'.$row['value'].'"><i class="fa fa-trash"></i> Xóa</button>';
                                }else{
                                    echo '
                                    <button type="button" class="btn btn-outline-info">Cần quyền admin</button>';
                                }
                            ?>      
                            </td>
                        </tr>
                        <!-- Modal xóa danh mục -->
                        <div class="modal fade" id="deleteModal_<?php echo $row['value']; ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteLabel">Xác nhận xóa danh mục</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa danh mục này?
                                        <form method="post">
                                            <input type="hidden" name="delete_value" value="<?php echo $row['value']; ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <button name="delete-category-btn" type="submit" class="btn btn-danger">Xóa</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['delete-category-btn'])){
                                $delete_value = $_POST['delete_value'];
                                $delete = "DELETE FROM category WHERE `value` = '$delete_value'";
                                $result = mysqli_query($mysqli, $delete);
                                if ($result) {
                                    echo '<meta http-equiv="refresh" content="0;URL=category.php">';
                                    die("Xóa danh mục thành công.") ;
                                } else {
                                    die( "Xóa danh mục thất bại: " . mysqli_error($mysqli));
                                }
                            }
                                }
                            }else{
                                echo "Không có dữ liệu";
                            }
                        ?>
                    </tbody>
                    
                </table>
                    <!-- Modal thêm danh mục -->
                    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addCategoryForm" method="post">
                                        <div class="mb-3">
                                            <label for="value_add" class="form-label">Mã danh mục</label>
                                            <input type="text" class="form-control" id="value_add" name="value_add" placeholder="Ví dụ: banh-ngot">
                                            <label for="detail_add" class="form-label">Tên danh mục</label>
                                            <input class="form-control" name="detail_add" type="text" placeholder="Ví dụ: Bánh đồng xu phô mai">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                                            <button name="add-category-btn" class="btn btn-primary"><i class="fa fa-add"></i> Thêm</button>
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
    if (isset($_POST['add-category-btn'])) {
        $category_add = $_POST['value_add'];
        $detail_add = $_POST['detail_add'];
        // Thực hiện truy vấn để thêm danh mục
        $check_valid = "SELECT * FROM category WHERE `value`='$category_add'";
        $valid = mysqli_query($mysqli, $check_valid);
        if($valid && $valid->num_rows > 0){
            echo '<meta http-equiv="refresh" content="0;URL=category.php">';
            echo "<script> alert('Danh mục đã tồn tại!'); </script>";
        }else{
            $query = "INSERT INTO category (value, detail) VALUES ('$category_add', '$detail_add')";
            $result = mysqli_query($mysqli, $query);

            // Kiểm tra xem việc thêm danh mục đã thành công hay chưa
            if ($result) {
                echo '<meta http-equiv="refresh" content="0;URL=category.php">';
                die("Thêm danh mục thành công.");
            } else {
                echo "Thêm danh mục thất bại: " . mysqli_error($mysqli);
            }
        }
        
        
    }
    
        include "footer.php";
    ?>