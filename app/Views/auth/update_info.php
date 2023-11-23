<?php
foreach ($data['current'] as $value) {
    extract($value);
}
?>
<!-- BODY-LOGIN -->
<section class="body-page page-v1 page-v2">
    <div class="container">
        <div class="content " style="padding-top: 200px;">
            <h2 class="sky-h3" style="margin: 100px 0 50px 0">UPDATE INFO</h2>
            <?php if (!empty($data['messageErr']['message'])) echo "<h2 style='color: #ffd500'>" . $data['messageErr']['message'] . "</h2>" ?>
            <form action="<?= BASE_URL . 'AccountController/updateInfo' ?>" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="<?= $email ?>" title=""
                           placeholder="Email *">
                    <input type="hidden" name="id_khachhang" class="form-control" value="<?= $id_khachhang ?>">
                    <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['messageErr']['emailErr'] ?? "" ?></p>
                    <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['messageErr']['message1'] ?? "" ?></p>
                </div>
                <div class="form-group">
                    <input type="text" name="phoneNumber" class="form-control" value="<?= $sdt ?>" title=""
                           placeholder="PhoneNumber">
                    <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['messageErr']['phoneNumberErr'] ?? "" ?></p>
                </div>
                <div class="form-group">
                    <input type="text" name="address" class="form-control" value="<?= $dia_chi ?>" title=""
                           placeholder="Address">
                </div>
                <button type="submit" class="btn btn-default">UPDATE</button>
            </form>
        </div>
    </div>
</section>
<!-- END/BODY-LOGIN-->
