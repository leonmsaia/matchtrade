<section class="imageblock switchable feature-large height-100">
    <div class="imageblock__content col-lg-6 col-md-4 pos-right">
        <div class="background-image-holder">
            <img alt="image" src="<?php echo base_url();?>assets/img/inner-7.jpg" />
        </div>
    </div>
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-lg-5 col-md-7">
                <h2>Crear Cuenta Match&Trade</h2>
                <p class="lead">Inicia hoy tu membresia y comenza a aumentar tu cartera de Clientes. Aprovecha la promocion de los primeros 30 dias gratis!</p>
                <?php echo form_open("User/createUserAction");?>
                    <div class="row">
                        <input type="hidden" name="account_type" value="<?php echo $account_type;?>">
                        <div class="col-12">
                            <input type="text" name="first_name" id="first_name" placeholder="Nombre" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="last_name" id="last_name" placeholder="Apellido" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="dni" id="dni" placeholder="DNI" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="cuit" id="cuit" placeholder="CUIL/CUIT" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="company" id="company" placeholder="Empresa" />
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" id="email" placeholder="E-Mail" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="phone" id="phone" placeholder="Telefono" />
                        </div>
                        <div class="col-12">
                            <input type="password" name="password" id="password" placeholder="Contraseña" />
                        </div>
                        <div class="col-12">
                            <input type="password" name="password_confirm" id="password_confirm" placeholder="Confirmar Contraseña" />
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn--primary type--uppercase">Crear Cuenta</button>
                        </div>
                        <div class="col-12">
                            <span class="type--fine-print">Al crear esta cuenta, esta aceptando los
                                <a href="#">Terminos y Condiciones</a>
                            </span>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>
