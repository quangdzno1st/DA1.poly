<?php
//echo "<pre>";
//print_r($data);
//
//?>
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
                <th scope="col">Tên</th>
                <th scope="col">Sứa chứa</th>
                <th scope="col">Giá</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Nội thất</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="customtable">
            <?php foreach ($data as $index => $loaiphong): ?>

                <?php extract($loaiphong) ;
                $noithat_array = explode(",", $noithat);
                $images_array = explode(",", $images);
                $images = array_unique($images_array);
                $noithat = array_unique($noithat_array);
                ?>

                <tr>
                    <th>
                        <label class="customcheckbox">
                            <input type="checkbox" class="listCheckbox"/>
                            <span class="checkmark"></span>
                        </label>
                    </th>

                    <td><?= ++$index ?></td>
                    <td><?= $ten ?></td>
                    <td><?= $suc_chua ?></td>
                    <td><?= $gia ?></td>
                    <th>
                        <?php foreach ($images as $image):?>
                            <img src="<?=  BASE_URL  ?><?= $image ?>" width="40px" height="40px" style="object-fit: cover">
                        <?php endforeach; ?>
                    </th>
                    <th>
                        <ul>
                            <?php foreach ($noithat as $item):?>
                                <li style="font-size: 15px"><?= $item ?></li>
                            <?php endforeach; ?>
                        </ul>

                    </th>
                    <td>
                        <a onclick="return confirm('Are you sure?')"
                           href="<?= BASE_URL . 'RoomTypeController/deleteRoomType/' . $id_loaiphong ?>" type="button"
                           class="btn btn-danger">Xóa</a>
                        <a type="button" class="btn btn-primary"
                           href="<?= BASE_URL . 'RoomTypeController/viewUpdateRoomType/' . $id_loaiphong ?>">Sửa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a type="button" class="btn btn-info btn-sm ml-2" href="<?= BASE_URL . 'RoomTypeController/addRoomType' ?>">Thêm
            mới</a>
    </div>
</div>

<?php
//
//include "footer.php";
//?>