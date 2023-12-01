<div class="row">
    <div class="col-md-12">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="#"><b>Báo cáo doanh thu </b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class='icon  bx bxs-user fa-3x'></i>
            <div class="info">
                <h4>Tổng khách hàng</h4>
                <p><b><?= $data['countAccount'][0]['countAccount'] ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x'></i>
            <div class="info">
                <h4>Tổng số phòng</h4>
                <p><b><?= $data['countRoom'][0]['countRoom'] ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
            <div class="info">
                <h4>Tổng đơn đặt</h4>
                <p><b><?= number_format($data['totalPrice'][0]['luot_dat']) ?></b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class='icon fa-3x bx bxs-info-circle'></i>
            <div class="info">
                <h4>Bị cấm</h4>
                <p><b><?= $data['countAccountBan'][0]['countAccountBan'] ?></b></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
            <div class="info">
                <h4>Tổng thu nhập</h4>
                <p><b><?= $data['totalPrice'][0]['tong_tien'] != null  ? number_format($data['totalPrice'][0]['tong_tien']) : 0 ?>đ</b></p>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div>
                <h3 class="tile-title">Thống KÊ DOANH SỐ</h3>

                <form method="post" action="<?= BASE_URL.'ThongKeController/search' ?>">
                    <div style="display: grid; grid-template-columns: 5fr 5fr 2fr;gap:10px;align-items: end ; margin-bottom: 10px">
                        <div style="">
                            <label>Từ ngày</label>
                            <div class="input-group">
                                <input type="text" class="form-control mydatepicker" data-date-format="dd-mm-yyyy" name="ngay_bat_dau" placeholder="dd/mm/yyyy" value="<?= date('d-m-Y',strtotime($data['dateSearch']['ngay_bat_dau'])) ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                       <div>
                           <label>Đến ngày</label>
                           <div class="input-group">
                               <input type="text" class="form-control" data-date-format="dd-mm-yyyy" id="datepicker-autoclose" name="ngay_ket_thuc" placeholder="dd/mm/yyyy" value="<?= date('d-m-Y',strtotime($data['dateSearch']['ngay_ket_thuc'])) ?>">
                               <div class="input-group-append">
                                   <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                               </div>
                           </div>
                       </div>
                        <button type="submit" style="margin-top: 10px;margin-bottom: 0; width: 100px; height: 40px" class="btn btn-success">Tìm kiếm</button>
                    </div>
                </form>

            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Loại phòng</th>
                        <th>Số lượt đặt</th>
                        <th>Số lượng đặt phòng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data["thongKeData"] as $item): ?>
                        <?php $luong_dat = explode(",", $item['danh_sach_id_phong']) ?>
                        <tr>
                            <td><?= $item['ten'] ?></td>
                            <td><?= $item['luot_dat'] ?></td>
                            <td><?= sizeof($luong_dat) ?></td>
                            <td><?= number_format($item['tong_tien']) ?>đ</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3">Tổng cộng:</th>
                        <td><?= $data['totalPrice'][0]['tong_tien'] != null  ? number_format($data['totalPrice'][0]['tong_tien']) : 0 ?>đ</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://www.gstatic.com/charts/loader.js"></script>

<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Tạo một mảng dữ liệu
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Danh mục');
        data.addColumn('number', 'Số lượng sản phẩm');

        <?php

        $i = 0; // Bắt đầu chỉ mục tại 0
        foreach ($data["thongKeData"] as $data) {
            echo "data.addRow(['" . $data['ten'] . "', " . $data['tong_tien'] . "]);";
            $i++;
        }
        ?>

        // Cài đặt tùy chọn
        var options = {
            title: 'Thống kê sản phẩm theo doanh thu'
        };

        // Vẽ biểu đồ
        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>

