<?php
    require_once "../session.php";
    require_once "../config.php";
    $sql = "SELECT * FROM statitics";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
?>  
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bảng điều khiển</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Thống kê doanh thu</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-money-bill"></i> Doanh thu ngày</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="small text-white"><?php echo $row["day"]." VNĐ" ?></p>
                    <!-- <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"><i class="fas fa-sack-dollar"></i> Doanh thu tháng</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    <p class="small text-white"><?php echo $row["month"]." VNĐ" ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><i class="fas fa-eye"></i> Số lượng sản phẩm</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="small text-white"><?php echo $row["productNumber"] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body"><i class="fas fa-cart-shopping"></i> Số lượng đã bán</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="small text-white"><?php echo $row["soldProductNumber"] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</main>