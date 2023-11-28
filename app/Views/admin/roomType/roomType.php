<form action="<?= BASE_URL . 'RoomTypeController/insertRoomType/' ?>" method="POST"
      enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật loại phòng</h4>
            <label>Tên loại phòng</label>
            <div class="input-group">
                <input type="text" class="form-control" name="roomType" placeholder="name"
                      >
            </div>
            <label>Giá</label>
            <div class="input-group">
                <input type="number" class="form-control" name="price" placeholder="price"
                      >
            </div>
            <input type="hidden" name="id_update1" >
            <label>Sức chứa</label>
            <div class="input-group">
                <input type="number" class="form-control" name="capacity" placeholder="capacity"
                      >
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


            <label>Nội thất</label>
            <select name="noithat[]" class="js-example-basic-multiple select2 form-control m-t-15" multiple="multiple">

                <?php foreach ($data as $noithat):  ?>
                    <option value="<?= $noithat['id'] ?>"><?= $noithat['ten_noithat'] ?></option>
                <?php endforeach; ?>
            </select>

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

