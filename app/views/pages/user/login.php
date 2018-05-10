<section class="height-100 imagebg text-center" data-overlay="4">
    <div class="background-image-holder">
        <img alt="background" src="<?php echo base_url();?>assets/img/inner-6.jpg" />
    </div>
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-md-7 col-lg-5">
                <h2>Login to continue</h2>
                <p class="lead">
                    Welcome back, sign in with your existing Stack account credentials
                </p>
                <?php echo form_open("User/loginAction");?>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="logmail" id="logmail" placeholder="Username" />
                        </div>
                        <div class="col-md-12">
                            <input type="password" name="logpass" id="logpass" placeholder="Password" />
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn--primary type--uppercase" type="submit">Login</button>
                        </div>
                    </div>
                <?php echo form_close();?>
                <span class="type--fine-print block">Dont have an account yet?
                    <a href="<?php echo base_url();?>user/type">Crear Cuenta</a>
                </span>
                <span class="type--fine-print block">Olvidaste tu contraseña?
                    <a href="<?php echo base_url();?>user/recover">Recuperar Cuenta</a>
                </span>
            </div>
        </div>
    </div>
</section>
