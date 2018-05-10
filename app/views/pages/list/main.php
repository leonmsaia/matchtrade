<section class="switchable switchable--switch space--xs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="height-50 imagebg border--round" data-overlay="2">
                    <div class="background-image-holder">
                        <img alt="background" src="<?php echo base_url();?>assets/img/hero-3.jpg" />
                    </div>
                    <div class="pos-vertical-center col-md-6 col-lg-5 pl-5">
                        <h2>Encontra hoy tu proximo socio comercial.</h2>
                        <p class="lead">
                            En Match&Trade encontraras ese producto que tu cartera necesita.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space--sm">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
              <h5>Categorias</h5>
              <ul>
                  <?php foreach ($categories_list->result() as $sKatz): ?>
                    <li>
                      <a href="<?php echo base_url() . 'list/category/' . $sKatz->category_slug?>"><?php echo $sKatz->category_name; ?></a>
                    </li>
                  <?php endforeach ?>
              </ul>
            </div>
            <div class="col-md-10">
                <h1>Ultimos Productos</h1>
                <div class="masonry">
                    <div class="masonry__container row">

                      <?php foreach ($last_publications->result() as $lp): ?>
                        <div class="masonry__item col-md-6 col-lg-3" data-masonry-filter="Computing">
                            <div class="product">
                                <?php if (getIfCompanyVerify($lp->advise_author)): ?>
                                  Verificado
                                <?php endif; ?>
                                <a href="<?php echo base_url() . 'list/advise/' . $lp->advise_code;?>">
                                    <img alt="Image" src="<?php echo base_url() . 'assets/uploads/' . $lp->main_pic;?>" />
                                </a>
                                <a class="block" href="<?php echo base_url() . 'list/advise/' . $lp->advise_code;?>">
                                    <div>
                                        <h5><?php echo $lp->advise_name; ?></h5>
                                        <br>
                                        <span><?php echo $lp->advise_desc; ?></span>
                                    </div>
                                    <p>
                                      <?php echo $lp->advise_qty_base; ?> unidades.
                                      <br>
                                      Precio Base: $<?php echo $lp->advise_baseprice; ?>
                                      <br>
                                      Desde <?php echo getMinimalCommission($lp->advise_id);?>% de Comision
                                    </p>
                                </a>
                            </div>
                        </div>
                      <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
