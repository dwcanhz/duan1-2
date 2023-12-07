<?php
require_once "config.php";
require_once "session.php";

if(isset($_POST["query"])){
    $query = $_POST["query"];
    // Truy vấn cơ sở dữ liệu
    $sql = "SELECT * FROM product WHERE `name` LIKE '%$query%'";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<p>".$row["name"]."</p>";
        }
    } else {
        echo "Không tìm thấy kết quả.";
    }

    // Đóng kết nối cơ sở dữ liệu
    $mysqli->close();
}
?>
