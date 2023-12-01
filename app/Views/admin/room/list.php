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
    </div>
</div>