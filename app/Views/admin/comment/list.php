<?php
//echo "<pre>";
//print_r($data);
//
//?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">Quản lí bình luận</h5>

    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th style="width: 10%" scope="col">Tên loại phòng</th>
                <th scope="col">Nội dung</th>
                <th style="width: 18%" scope="col">Thời gian</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="customtable">
            <?php foreach ($data as $index => $comment): extract($comment) ?>
                <tr>
                    <td><?= ++$index ?></td>
                    <td><?= $user ?></td>
                    <td><?= $ten ?></td>
                    <td><?= $noi_dung ?></td>
                    <td><?= $thoi_gian ?></td>
                    <td>
                        <a onclick="return confirm('Are you sure?')"
                           href="<?= BASE_URL . 'CommentController/deleteCmt/' . $id ?>" type="button"
                           class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
//
//include "footer.php";
//?>