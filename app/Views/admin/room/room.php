<form action="<?= BASE_URL. 'RoomController/insertRoom' ?>" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới phòng</h4>
            <h3> <?= $data['message']['status'] ?? "" ?></h3>
            <label>Tên phòng</label>
            <div class="input-group">
                <input type="text" class="form-control" name="nameRoom" placeholder="name">
            </div>
            <p style="color: #d90e26;text-align: left; margin-top: 10px;margin-bottom: 10px"><?= $data['message']['message'] ?? "" ?></p>
            <label >Loại phòng</label>
            <select name="roomType"
                    class="select2 form-control custom-select"
                    style="width: 100%; height: 36px"
            >
                <?php foreach ($data['roomType'] as $item): ?>
                    <option value="<?= $item['id_loaiphong'] ?>"><?= $item['ten'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a type="submit" class="btn btn-info" href="<?= BASE_URL.'RoomController/homePage' ?>">Danh sách</a>
            </div>
        </div>
    </div>

</form>