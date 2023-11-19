<?php
//include "model/pdo.php";
//include "model/roomType.php";
//include "header.php";
//include "sidebar.php";
//    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//        $name = $_POST['roomType'];
//        $price = $_POST['price'];
//        $capacity = $_POST['capacity'];
//
//        createLoai($name, $price, $capacity);
//    }
//?>
<form action="<?= BASE_URL. 'RoomTypeController/insertRoomType' ?>" method="POST">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm mới loại phòng</h4>
            <label>Tên loại phòng</label>
            <div class="input-group">
                <input type="text" class="form-control" name="roomType" placeholder="name">
            </div>
            <label>Giá</label>
            <div class="input-group">
                <input type="number" class="form-control" name="price" placeholder="price">
            </div>
            <label>Sức chứa</label>
            <div class="input-group">
                <input type="number" class="form-control" name="capacity" placeholder="capacity">
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a  href="<?= BASE_URL. 'AdminController/homePage' ?>"  type="button" class="btn btn-danger">Danh sách</a>
            </div>
        </div>
    </div>

</form

