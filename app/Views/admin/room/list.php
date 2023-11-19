<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Static Table With Checkboxes</h5>

    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>
                    <label class="customcheckbox m-b-20">
                        <input type="checkbox" id="mainCheckbox"/>
                        <span class="checkmark"></span>
                    </label>
                </th>
                <th scope="col">STT</th>
                <th scope="col">Số phòng</th>
                <th scope="col">Loại phòng</th>
                <th scope="col">Sức chứa</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="customtable">
            <?php foreach ($data["room"] as $index => $loaiphong): ?>
                <?php extract($loaiphong) ?>
                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox"/>
                            <span class="checkmark"></span>
                        </label>
                    </th>

                    <td><?= ++$index ?></td>
                    <td><?= $ten_phong ?></td>
                    <td><?= $ten ?></td>
                    <td><?= $suc_chua ?></td>
                    <td style="display: flex;gap: 5px">
                        <?php foreach ($data["images"] as $item): ?>
                            <?php
                            if ($item["id_phong"] == $id_phong):
                                ?>
                                <img src="<?=  BASE_URL  ?><?= $item["path"] ?>" width="40px" height="40px" style="object-fit: cover">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td><?= $mo_ta ?></td>
                    <td><?= $trang_thai ?></td>
                    <td>
                        <a onclick="return confirm('Are you sure?')"
                           href="<?= BASE_URL . 'RoomController/deleteRoom/' . $id_phong ?>"  type=" button" class="btn
                        btn-danger">Xóa</a>
                        <a type="button" class="btn btn-primary"
                           href=" <?= BASE_URL . 'RoomController/viewRoomUpdate/' . $id_phong ?>">Sửa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a type="button" class="btn btn-info btn-sm ml-2" href="<?= BASE_URL. 'RoomController/createRoom/' ?>">Thêm mới</a>
        <button type="button" class="btn btn-info btn-sm">Xóa</button>
        <button type="button" class="btn btn-info btn-sm">Chọn tất cả</button>
        <button type="button" class="btn btn-info btn-sm">Bỏ chọn tất cả</button>
    </div>
</div>