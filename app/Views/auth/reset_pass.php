
    <!-- BODY-LOGIN -->
    <section class="body-page page-v1 page-v2">
        <div class="container">
            <div class="content " style="padding-top: 200px;">
                <h2 class="sky-h3">RESET PASSWORD</h2>
                <?php if (isset($data['msg']['message'])) echo "<h2 style='color: #ffd500'>".$data['msg']['message']."</h2>" ?>
                <form action="<?= BASE_URL.'AccountController/resetPassword' ?>" method="post">
                    <div class="form-group">
                        <input id="password-field" type="password" class="form-control" name="password" placeholder="Password *">
                        <span data-toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['msg']['passwordErr'] ?? "" ?></p>
                        <input type="hidden" name="id_reset" value="<?= $data['id_reset'] ?>">
                    </div>
                    <div class="form-group">
                        <input id="password-field1" type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password *">
                        <span data-toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['msg']['confirmPassErr'] ?? "" ?></p>

                    </div>
                    <button type="submit" class="btn btn-default">REGISTER</button>
                </form>
            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->
