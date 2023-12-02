
<?php
//echo "<pre>";
//print_r($data['noiThatData']);
//print_r($data['roomTypeData']);
$id_noithat = $data['roomTypeData'][0]['id_noithat'];
$id_noithat_array = explode(',',$id_noithat);

?>


<form action="<?= BASE_URL . 'RoomTypeController/updateRoomType/' . $data['roomTypeData'][0]['id_loaiphong'] ?>" method="POST"
      enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật loại phòng</h4>
            <label>Tên loại phòng</label>
            <div class="input-group">
                <input type="text" class="form-control" name="roomType" placeholder="name"
                       value="<?= $data['roomTypeData'][0]['ten'] ?>">

            </div>
            <p style="color: #d90e26;text-align: left; margin-top: 10px;margin-bottom: 10px"><?= $data['message']['message']['tenErr'] ?? "" ?></p>

            <label>Giá</label>
            <div class="input-group">
                <input type="number" class="form-control" name="price" placeholder="price"
                       value="<?= $data['roomTypeData'][0]['gia'] ?>">
            </div>
            <p style="color: #d90e26;text-align: left; margin-top: 10px;margin-bottom: 10px"><?= $data['message']['message']['giaErr'] ?? "" ?></p>

            <input type="hidden" name="id_update1" value="<?= $data['roomTypeData'][0]['id_loaiphong'] ?>">
            <label>Sức chứa</label>
            <div class="input-group">
                <input type="number" class="form-control" name="capacity" placeholder="capacity"
                       value="<?= $data['roomTypeData'][0]['suc_chua'] ?>">
            </div>
            <p style="color: #d90e26;text-align: left; margin-top: 10px;margin-bottom: 10px"><?= $data['message']['message']['suc_chua_err'] ?? "" ?></p>

            <label>File Upload</label>

            <div class="input-group">
                <div class="custom-file">
                    <input
                            type="file"
                            class="custom-file-input"
                            id="validatedCustomFile"
                            multiple
                            name="images[]"
                    />
                    <label
                            class="custom-file-label"
                            for="validatedCustomFile"
                    >Choose file...</label
                    >
                    <div class="invalid-feedback">
                        Example invalid custom file feedback
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-light" style="display: grid;grid-template-columns: 1fr 1fr 1fr">
                <?php foreach ($data['imagesData'] as $image): ?>

                    <tr>
                        <td><img src="<?= BASE_URL . $image['path'] ?>" alt="" width="50px" height="50px"
                                 style="object-fit: cover"></td>
                        <td><a href="<?= BASE_URL . 'ImageController/deleteBackUpdate/' . $image['id']  ?>"
                               class="btn btn-warning">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>

                </thead>
            </table>
            <label>Nội thất</label>

            <select name="noithat[]" class="js-example-basic-multiple select2 form-control m-t-15" multiple="multiple">

                <?php foreach ($data['noiThatData'] as $noithat):  ?>

                <option <?= in_array($noithat['id'],$id_noithat_array) ? "selected" : "" ?> value="<?= $noithat['id'] ?>"><?= $noithat['ten_noithat'] ?></option>
                <?php endforeach; ?>
            </select>

            <p style="color: #d90e26;text-align: left; margin-top: 10px;margin-bottom: 10px"><?= $data['message']['message']['noiThat_err'] ?? "" ?></p>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" name="id_update" class="btn btn-success">Save
                    <button
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <a type="submit" class="btn btn-info" href="<?= BASE_URL . 'RoomTypeController/homePage' ?>">Danh
                        sách</a>
            </div>
        </div>
    </div>

</form

