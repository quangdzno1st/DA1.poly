
<div class="card">
    <form class="form-horizontal" method="post"
          action="<?= BASE_URL . 'AccountController/updateAccount/' .$data['accountData'][0]['id_khachhang'] ?>">
        <div class="card-body">
            <h4 class="card-title">Cập nhật thông tin khách hàng</h4>
            <?php if (isset($data['message'])): ?>
            <h3>Cập nhật tài khoản thành công</h3>
            <?php endif; ?>
            <div class="form-group row">
                <label
                        for="name"
                        class="col-sm-3 text-right control-label col-form-label"
                >Tên khách hàng</label
                >
                <div class="col-sm-9">
                    <input
                            name="username"
                            type="text"
                            class="form-control"
                            placeholder="Tên khách hàng"
                            value="<?= $data['accountData'][0]['user'] ?>"
                    />
                <p style="color: #ff0000;text-align: left; margin-top: 10px;margin-bottom: 0"><?=$data['message']['nameErr'] ?? "" ?></p>
                </div>


            </div>
            <div class="form-group row">
                <label
                        class="col-sm-3 text-right control-label col-form-label"
                >Email</label
                >
                <div class="col-sm-9">
                    <input
                            name="email"
                            type="text"
                            class="form-control"
                            placeholder="Email"
                            value="<?= $data['accountData'][0]['email'] ?>"

                    />
                <p style="color: #ff0000;text-align: left; margin-top: 10px;margin-bottom: 0"><?=$data['message']['emailErr'] ?? "" ?></p>
                </div>

            </div>
            <div class="form-group row">
                <label
                        class="col-sm-3 text-right control-label col-form-label"
                >Số điện thoại</label
                >
                <div class="col-sm-9">
                    <input
                            name="phone"
                            type="text"
                            class="form-control"
                            placeholder="Số điện thoại"
                            value="<?= $data['accountData'][0]['sdt'] ?>"

                    />
                <p style="color: #ff0000;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['message']['phoneNumberErr'] ?? "" ?></p>
                </div>

            </div>
            <div class="form-group row">
                <label
                        class="col-sm-3 text-right control-label col-form-label"
                >Địa chỉ</label
                >
                <div class="col-sm-9">
                    <input
                            name="address"
                            type="text"
                            class="form-control"
                            placeholder="Địa chỉ"
                            value="<?= $data['accountData'][0]['dia_chi'] ?>"

                    />
                </div>
            </div>

            <div class="form-group row">
                <label
                        for="name"
                        class="col-sm-3 text-right control-label col-form-label"
                >Vai trò</label
                >
                <div class="col-md-9">
                    <select name="vaiTro"
                            class="select2 form-control custom-select"
                            style="width: 100%; height: 36px"
                    >
                       <option value="0" <?= $data['accountData'][0]['role'] == 0 ? 'selected' : "" ?> >Người dùng</option>
                       <option value="1" <?= $data['accountData'][0]['role'] == 1 ? 'selected' : "" ?> >Admin</option>
                    </select>
                </div>

            </div>

            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <a type="submit" class="btn btn-info" href="<?= BASE_URL . 'AccountController/accountManager' ?>">Danh sách</a>
                </div>
            </div>
    </form>
</div>