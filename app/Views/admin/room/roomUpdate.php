<form action="<?= BASE_URL . 'RoomController/updateRoom/' .$data['room']['id_phong'] ?>" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới phòng</h4>
            <label>Tên phòng</label>
            <div class="input-group">
                <input type="text" class="form-control" name="nameRoom" placeholder="name"
                       value="<?= $data["room"]["ten_phong"] ?>">
            </div>
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

            <table class="table" >
                <thead class="thead-light" style="display: grid;grid-template-columns: 1fr 1fr 1fr">
                <?php foreach ($data["images"] as $image): ?>

                   <tr>
                       <td><img src="<?= BASE_URL .$image['path'] ?>" alt="" width="40px" height="40px" style="object-fit: cover"></td>
                       <td ><a href="<?= BASE_URL.'ImageController/deleteBackUpdate/'.$image['id'] ?>" class="btn btn-warning">Xóa</a></td>
                   </tr>
                <?php endforeach; ?>

                </thead>
            </table>

            <label
                    for="cono1"
                    class=" text-right control-label col-form-label"
            >Mô tả</label
            >
            <div>
                <textarea class="form-control" name="desc"><?= $data["room"]["mo_ta"] ?></textarea>
            </div>
            <label>Loại phòng</label>
            <select name="roomType"
                    class="select2 form-control custom-select"
                    style="width: 100%; height: 36px"
            >
                <?php foreach ($data["roomType"] as $item): ?>
                    <option <?php echo $item['id_loaiphong'] == $data["room"]["id_phong"] ?>
                            value="<?= $item['id_loaiphong'] ?>"><?= $item['ten'] ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a type="submit" class="btn btn-info" href="<?= BASE_URL . 'RoomController/homePage' ?>">Danh sách</a>
            </div>
        </div>
    </div>

</form>