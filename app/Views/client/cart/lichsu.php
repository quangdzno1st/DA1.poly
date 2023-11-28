<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>Lịch sử đặt phòng của bạn</h2>
        </div>
    </div>
</section>

<style>
    .container1 {
        max-width: 1200px;
        margin: 0 auto 100px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        color: #007bff;
        text-align: center;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }
</style>
<div class="container1">
    <h2>Lịch sử đặt phòng</h2>
    <table>
        <thead>
        <tr>
            <th>Người đặt</th>
            <th>Loại phòng</th>
            <th>Ngày đặt phòng</th>
            <th>Số lượng phòng</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $item): ?>
            <tr>
                <td><?= $item['user'] ?></td>
                <td><?= $item['ten'] ?></td>
                <td><?= $item['ngay_dat_phong'] ?></td>
                <td><?= $item['count_id_phong'] ?></td>

                <td><?= $item['approve'] == 1 ? "Đặt thành công" : "Chờ xác nhận" ?></td>
                <td><a href="<?= BASE_URL ?>/CartController/detailBook/<?= $item['id_datphong'] ?>">Xem chi tiết</a></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
