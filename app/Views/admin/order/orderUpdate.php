<div class="card">
    <form class="form-horizontal" method="post"
          action="<?= BASE_URL . 'OrderController/updateOrder/' . $data['orderData'][0]['id_datphong'] ?>">
        <div class="card-body">
            <h4 class="card-title">Cập nhật thông tin đặt phòng</h4>
            <div class="form-group row">
                <label
                        for="name"
                        class="col-sm-3 text-right control-label col-form-label"
                >Tên khách hàng</label
                >
                <div class="col-md-9">
                    <select name="khachhang"
                            class="select2 form-control custom-select"
                            style="width: 100%; height: 36px"
                    >
                        <?php foreach ($data['accountData'] as $account): ?>
                            <option <?= $data['orderData'][0]['id_khachhang'] == $account['id_khachhang'] ? "selected" : "" ?>
                                    value="<?= $account['id_khachhang'] ?>"><?= $account['user'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class="form-group row">
                <label
                        class="col-sm-3 text-right control-label col-form-label"
                >Trạng thái thanh toán</label
                >
                <div class="col-sm-9">
                    <input
                            name="status"
                            type="text"
                            class="form-control"
                            placeholder="Trạng thái thanh toán"
                            value="<?= $data['orderData'][0]['trang_thai'] ?>"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label
                        class="col-sm-3 text-right control-label col-form-label"
                >Tiền cọc (VND)</label
                >
                <div class="col-sm-9">
                    <input
                            name="price"
                            type="text"
                            class="form-control"
                            placeholder="Tiền cọc"
                            value="<?= number_format($data['orderData'][0]['so_tien_coc']) ?>"

                    />
                </div>
            </div>

            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
    </form>
</div>