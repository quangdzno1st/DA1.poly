<?php
$ngay_dat_timestamp = strtotime($data[0]['ngay_dat_phong']);
$ngay_tra_timestamp = strtotime($data[0]['ngay_tra_phong']);
$so_ngay_chenh_lech = ($ngay_tra_timestamp - $ngay_dat_timestamp) / (60 * 60 * 24);
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container1 {
        max-width: 800px;
        margin: 30px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        color: #007bff;
    }

    .card {
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-bottom: 1px solid #dee2e6;
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    strong {
        font-weight: bold;
    }

    .payment-info p {
        margin-bottom: 0;
    }

    .payment-info span {
        font-weight: bold;
    }

    .payment-info strong {
        color: #007bff;
    }

    .back-btn {
        display: block;
        margin-top: 20px;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .back-btn:hover {
        background-color: #0056b3;
        color: #FFFFFF;
    }

</style>
<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>Chi tiết book phòng của bạn !</h2>
        </div>
    </div>
</section>
<div class="container1">
    <h2 class="text-center mb-4">Chi tiết đặt phòng</h2>

    <div class="card">
        <div class="card-header">
            Thông tin người dùng
        </div>

        <div class="card-body">
            <p><strong>Họ và tên:</strong> <?= $data[0]['user']  ?></p>
            <p><strong>Địa chỉ:</strong> <?= $data[0]['dia_chi']  ?></p>
            <p><strong>Email:</strong> <?= $data[0]['email']  ?></p>
            <p><strong>Điện thoại:</strong> <?= $data[0]['sdt']  ?></p>
<!--            <p><strong>Ghi chú đơn hàng:</strong> Ghi chú về đơn hàng của bạn, ví dụ: ghi chú đặc biệt cho giao hàng-->
<!--            </p>-->
        </div>
    </div>

    <!-- Thông tin đặt phòng -->
    <div class="card">
        <div class="card-header">
            Thông tin đặt phòng
        </div>
        <div class="card-body">
            <p><strong>Loại phòng:</strong> <?= $data[0]['ten']  ?></p>
            <p><strong>Nội thất:</strong> <?= $data[0]['noithat']  ?></p>
            <p><strong>Số ngày đặt:</strong> <?= $so_ngay_chenh_lech ?></p>
            <p><strong>Số lượng phòng: </strong><?= $data[0]['count_id_phong']  ?> phòng</p>
            <p><strong>Giá:</strong> <?= number_format($data[0]['gia'])  ?>VNĐ/đêm</p>
            <p><strong>Tổng đơn hàng:</strong> <?= number_format($data[0]['tong_tien'])  ?>VNĐ</p>
        </div>

    </div>

    <!-- Phương thức thanh toán -->
    <div class="card">
        <div class="card-header">
            Phương thức thanh toán
        </div>
        <div class="card-body payment-info">
            <p><span>Phương thức thanh toán:</span> <?= $data[0]['hinhthucthanhtoan'] ?></p>
            <p><span>Trạng thái thanh toán:</span> <?= $data[0]['trang_thai'] ?></p>
        </div>
    </div>
    <a href="<?= BASE_URL ?>cartController/thank" class="back-btn">Quay lại</a>
</div>

