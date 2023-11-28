<div class="card">
    <div class="card-body">
        <h5 class="card-title">Order</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Vai Trò</th>
                    <th>Ban</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $acc): extract($acc) ?>
                    <tr>
                        <td style="padding-top: 50px"><?= $user ?></td>
                        <td style="padding-top: 50px"><?= $email ?></td>
                        <td><?= $sdt ?></td>
                        <td style="padding-top: 50px"><?= $dia_chi ?></td>
                        <td style="padding-top: 50px"><?= $role == 0 ? "Nguời dùng" : "Admin" ?></td>
                        <td style="padding-top: 50px"><?= $ban == 0 ? "Đang hoạt động" : "Đã bị khóa" ?></td>
                        <td>
                            <a onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"
                               href="<?= BASE_URL . 'AccountController/deleteAccount/' . $id_khachhang ?>">Xóa</a>
                            <a onclick="return confirm('Are you sure ?')" class="btn btn-success btn-sm"
                                    href="<?= BASE_URL . 'AccountController/banAccount/' . $id_khachhang ?>"><?= $ban == 0 ? "Ban" : "Unban" ?></a>
                            <a class="btn btn-warning btn-sm"
                               href="<?= BASE_URL . 'AccountController/viewUpdateAccount/' . $id_khachhang ?>">Sửa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Username</th>
                    <th>email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Vai Trò</th>
                    <th>Ban</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>