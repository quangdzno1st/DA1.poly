

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Order</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Tên phòng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt phòng</th>
                    <th>Ngày trả phòng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Tiền cọc</th>
                    <th>Thực trả</th>
                    <th>Hình thức thanh toán</th>
                    <th>Trạng thái hủy</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $order): extract($order);
                    date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
                    <tr>
                        <td style="padding-top: 50px"><?= $ten_phong ?></td>
                        <td style="padding-top: 50px"><?= $user ?></td>
                        <td style="padding-top: 50px"><?= date('d-m-Y', strtotime($ngay_dat_phong)) ?></td>
                        <td style="padding-top: 50px"><?= date('d-m-Y', strtotime($ngay_tra_phong)) ?></td>
                        <td style="padding-top: 50px"><?= $tong_tien ?></td>
                        <td><?= $trang_thai ?></td>
                        <td style="padding-top: 50px"><?= isset($time_check_in) ? date('Y-m-d H:i:s', strtotime($time_check_in)) : "" ?></td>
                        <td style="padding-top: 50px"><?= isset($time_check_out) ? date('Y-m-d H:i:s', strtotime($time_check_out)) : "" ?></td>
                        <td style="padding-top: 50px"><?= number_format($so_tien_coc) ?>đ</td>
                        <td style="padding-top: 50px"><?= number_format($thuc_tra) ?>đ</td>
                        <td style="padding-top: 50px"><?= $hinhthucthanhtoan ?></td>
                        <td style="padding-top: 50px"><?= $trang_thai_huy ?></td>
                        <td>
                            <?php if ($approve == 0): ?>
                                <a onclick="return confirm('Are you sure ?')" class="btn btn-primary btn-sm"
                                   style="margin-bottom: 5px;"
                                   href="<?= BASE_URL . 'OrderController/approve/' . $id_datphong ?>">Duyệt</a>
                            <?php else: ?>
                                <?php if ($time_check_in == null): ?>
                                    <a <?= $trang_thai_huy !== "Không" ? 'style="display:none;"' :'' ?> onclick="return confirm('Are you sure ?')" class="btn btn-primary btn-sm"
                                       href="<?= BASE_URL . 'OrderController/checkin/' . $id_datphong ?>">Checkin</a>
                                <?php endif; ?>
                                <?php if ($time_check_out == null): ?>
                                    <a <?= empty($time_check_in) ? 'style="display:none;"' :'' ?>  onclick="return confirm('Are you sure ?')"
                                                     class="btn btn-success btn-sm "
                                                     style="margin: 5px 0"
                                                     href="<?= BASE_URL . 'OrderController/checkout/' . $id_datphong ?>">CheckOut</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a <?= $trang_thai_huy !== "Không" ? 'style="display:none;"' :'' ?> onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"
                               href="<?= BASE_URL . 'OrderController/huy/' . $id_datphong ?>">Hủy</a>
                            <a class="btn btn-warning btn-sm"
                               href="<?= BASE_URL . 'OrderController/viewUpdateOrder/' . $id_datphong ?>">Sửa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Tên phòng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt phòng</th>
                    <th>Ngày trả phòng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Tiền cọc</th>
                    <th>Thực trả</th>
                    <th>Hình thức thanh toán</th>
                    <th>Trạng thái hủy</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>