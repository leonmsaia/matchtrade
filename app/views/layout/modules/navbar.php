<div class="nav-container">
    <div class="via-1518848839120" via="via-1518848839120" vio="vendedor">
        <div class="bar bg--dark bar--sm visible-sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <a href="index.html">
                          <img class="logo logo-dark" alt="logo" src="<?php echo base_url();?>assets/img/logo-dark.png">
                          <img class="logo logo-light" alt="logo" src="<?php echo base_url();?>assets/img/logo-light.png">
                        </a>
                    </div>
                    <div class="col-9 col-md-10 text-right">
                        <a href="#" class="hamburger-toggle" data-toggle-class="#menu3;hidden-xs hidden-sm"> <i class="icon icon--sm stack-interface stack-menu"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="bar bar--sm bg--dark" id="menu3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 hidden-xs hidden-sm order-lg-1">
                        <div class="bar__module">
                            <a href="<?php echo base_url();?>">
                              <img class="logo logo-dark" alt="logo" src="<?php echo base_url();?>assets/img/logo-dark.png">
                              <img class="logo logo-light" alt="logo" src="<?php echo base_url();?>assets/img/logo-light.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-3">
                    </div>
                    <div class="col-lg-7 text-right text-left-xs order-lg-4">
                        <div class="bar__module">
                            <ul class="menu-horizontal text-left">
                                <li> <a href="<?php echo base_url();?>about">Nosotros</a></li>
                                <li> <a href="<?php echo base_url();?>blog">Blog</a></li>
                                  <?php if ($this->ion_auth->logged_in()): ?>
                                    <li> <a href="<?php echo base_url();?>list">Directorio</a></li>
                                  <?php else: ?>
                                    <li> <a href="<?php echo base_url();?>store/payCost">Precios</a></li>
                                  <?php endif ?>
                                <li> <a href="<?php echo base_url();?>contact">Contacto</a></li>
                                <?php if ($this->ion_auth->logged_in()): ?>
                                  <li class="dropdown">
                                    <span class="dropdown__trigger">
                                      Usuario
                                    </span>
                                      <div class="dropdown__container">
                                          <div class="container">
                                              <div class="row">
                                                  <div class="dropdown__content col-lg-2">
                                                      <ul class="menu-vertical">
                                                          <li><a href="<?php echo base_url();?>user/dashboard">Dashboard</a></li>
                                                          <li><a href="<?php echo base_url();?>user/profile">Mi Perfil</a></li>
                                                          <li><a href="<?php echo base_url();?>user/settings">Seguridad</a></li>
                                                          <li><a href="<?php echo base_url();?>User/logUserOut">Salir</a></li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </li>
                                  <?php if ($this->ion_auth->in_group('sales')): ?>
                                    <li class="dropdown">
                                      <span class="dropdown__trigger">
                                        Ventas
                                      </span>
                                        <div class="dropdown__container">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="dropdown__content col-lg-2">
                                                        <ul class="menu-vertical">
                                                            <li><a href="<?php echo base_url();?>">Ver mis Matchs</a></li>
                                                            <li><a href="<?php echo base_url();?>">Mis Reseñas</a></li>
                                                            <li><a href="<?php echo base_url();?>">Mis Referencias</a></li>
                                                            <li><a href="<?php echo base_url();?>user/tax">Informacion Fiscal</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                  <?php endif; ?>
                                  <?php if ($this->ion_auth->in_group('provider')): ?>
                                    <li class="dropdown">
                                      <span class="dropdown__trigger">
                                        Proovedor
                                      </span>
                                        <div class="dropdown__container">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="dropdown__content col-lg-2">
                                                        <ul class="menu-vertical">
                                                            <li><a href="<?php echo base_url();?>user/matchList">Ver mis Matchs</a></li>
                                                            <li><a href="<?php echo base_url();?>advise/my_advises">Ver mis Avisos</a></li>
                                                            <li><a href="<?php echo base_url();?>advise/create">Crear Aviso</a></li>
                                                            <li><a href="<?php echo base_url();?>user/company">Datos de Mi Compañia</a></li>
                                                            <li><a href="<?php echo base_url();?>user/tax">Informacion Fiscal</a></li>
                                                            <li><a href="<?php echo base_url();?>user/movements">Movimientos de Cuenta</a></li>
                                                            <li><a href="<?php echo base_url();?>user/reviews">Mis Reseñas</a></li>
                                                            <li><a href="<?php echo base_url();?>user/references">Mis Referencias</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                  <?php endif; ?>
                                <?php else: ?>
                                  <li> <a href="<?php echo base_url();?>user/login">Iniciar Sesion</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
