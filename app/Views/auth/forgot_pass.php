
    <!-- BODY-LOGIN -->
    <section class="body-page page-v1 page-v2">
        <div class="container">
            <div class="content " style="padding-top: 200px;">
                <h2 class="sky-h3">FORGOT PASSWORD</h2>
                <?php if (isset($data['msg'])) echo "<h2 style='color: #ffd500'>".$data['msg']."</h2>" ?>
                <form action="<?= BASE_URL.'AccountController/sendMail' ?>" method="post">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="" title="" placeholder="Email *">
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['emailErr'] ?? "" ?></p>
                    </div>
                    <button type="submit" class="btn btn-default">REGISTER</button>
                </form>
            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->
