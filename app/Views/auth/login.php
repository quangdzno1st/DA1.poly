
    <!-- BODY-LOGIN -->
    <section class="body-page page-v1">
        <div class="container">
            <div class="content">
                <h2 class="sky-h3">LOGIN ACCOUNT</h2>
                <h5 class="p-v1">Lorem Ipsum is simply dummy text of the printing</h5>
                <?php if (isset($data['message'])) echo "<h3 style='color: #ffd500'>".$data['message']."</h3>" ?>
                <form action="<?= BASE_URL.'AccountController/handleLogin' ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
                        <span class="fa fa-fw fa-eye field-icon toggle-password " data-toggle="#password-field"></span>
                    </div>
                    <button type="submit" class="btn btn-default">LOGIN</button>
                </form>
                <p>I don’t have an account &nbsp;- &nbsp; Forgot Password</p>
            </div>
        </div>
    </section>
    <!-- END/BODY-LOGIN-->
