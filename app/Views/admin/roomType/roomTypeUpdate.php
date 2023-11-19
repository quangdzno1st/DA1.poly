
<form action="<?= BASE_URL.'AdminController/updateRoomType/'. $data['id_loaiphong'] ?>" method="POST">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật loại phòng</h4>
            <label>Tên loại phòng</label>
            <div class="input-group">
                <input type="text" class="form-control" name="roomType" placeholder="name" value="<?= $data['ten'] ?>">
            </div>
            <label>Giá</label>
            <div class="input-group">
                <input type="number" class="form-control" name="price" placeholder="price" value="<?= $data['gia'] ?>">
            </div>
            <input type="hidden" name="id_update1" value="<?=  $data['id_loaiphong'] ?>">
            <label>Sức chứa</label>
            <div class="input-group">
                <input type="number" class="form-control" name="capacity" placeholder="capacity"
                       value="<?= $data['suc_chua'] ?>">
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" name="id_update" class="btn btn-success" >Save<button
                <button type="reset" class="btn btn-primary">Reset</button>
                <a type="submit" class="btn btn-info" href="<?= BASE_URL. 'AdminController/homePage' ?>">Danh sách</a>
            </div>
        </div>
    </div>

</form

