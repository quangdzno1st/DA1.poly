
    <!-- BODY-LOGIN -->
    <section class="body-page page-v1 page-v2">
        <div class="container">
            <div class="content " style="padding-top: 200px;">
                <h2 class="sky-h3">REGISTER FORM</h2>
                <h5 class="p-v1">If you no have account in The Lotus Hotel! Register and feeling</h5>
                <?php if (isset($data['message'])) echo "<h2 style='color: #ffd500'>".$data['message']."</h2>" ?>

                <form action="<?= BASE_URL.'AccountController/handleRegister' ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="User Name *">
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['nameErr'] ?? "" ?></p>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="" title="" placeholder="Email *">
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['emailErr'] ?? "" ?></p>

                    </div>
                    <div class="form-group">
                        <input type="text" name="phoneNumber" class="form-control" value="" title="" placeholder="PhoneNumber">
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['phoneNumberErr'] ?? "" ?></p>

                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" value=""  title=""
                               placeholder="Address">

                    </div>
                    <div class="form-group">
                        <input id="password-field" type="password" class="form-control" name="password" placeholder="Password *">
                        <span data-toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['passwordErr'] ?? "" ?></p>

                    </div>
                    <div class="form-group">
                        <input id="password-field1" type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password *">
                        <span data-toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <p style="color: #ffd500;text-align: left; margin-top: 10px;margin-bottom: 0"><?= $data['confirmPassErr'] ?? "" ?></p>

                    </div>
                    <button type="submit" class="btn btn-default">REGISTER</button>
                </form>
            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->
