<?php foreach ($advise_baseic_info->result() as $adv_bs): ?>

  <section class="text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1><?php echo $adv_bs->advise_name;?></h1>
                  <p><?php echo $adv_bs->advise_desc;?></p>
                  <?php if (getIfCompanyVerify($adv_bs->advise_author)): ?>
                    <h5>
                      Proveedor Verificado
                        <span class="modal-instance">
                          <small class="modal-trigger">¿Que es esto?</small>
                          <div class="modal-container">
                            <div class="modal-content">
                                  <div class="boxed boxed--lg">
                                      <h2>Texto de Proveedor Verificado</h2>
                                      <hr class="short">
                                      <p class="lead">Test </p>
                                  </div>
                              <div class="modal-close modal-close-cross"></div>
                            </div>
                          </div>
                        </span>
                    </h5>

                  <?php endif; ?>
              </div>
          </div>
      </div>
  </section>


  <section>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8 text-center">
                <?php foreach ($advise_img_support->result() as $mnpc): ?>
                  <img alt="Image" src="<?php echo base_url() . 'assets/uploads/' . $mnpc->main_pic;?>" />
                <?php endforeach; ?>
              </div>
          </div>
      </div>
  </section>

  <?php foreach ($advise_txt_support->result() as $spt_txt): ?>
  <section>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8">
                  <h2 class="text-center"><?php echo $spt_txt->txt_support_subtitle;?></h2>
                  <p class="lead">
                      <?php echo $spt_txt->txt_support_maintext;?>
                  </p>
              </div>
          </div>
      </div>
  </section>

  <section class="switchable bg--secondary">
      <div class="container">
          <div class="row justify-content-around">
              <div class="col-md-7">
                <?php foreach ($advise_img_support->result() as $mnpc_two): ?>
                  <img alt="Image" src="<?php echo base_url() . 'assets/uploads/' . $mnpc_two->second_pic;?>" />
                <?php endforeach; ?>
              </div>
              <div class="col-md-5 col-lg-4">
                  <div class="switchable__text">
                      <h3><?php echo $spt_txt->txt_support_secondimg_title;?></h3>
                      <p class="lead">
                        <?php echo $spt_txt->txt_support_secondimg_txt;?>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <?php endforeach; ?>

  <section>
      <div class="container">
          <div class="row justify-content-around">
              <div class="col-md-7 col-lg-6">
                  <div class="slider border--round boxed--border" data-paging="true" data-arrows="true">
                      <ul class="slides">
                        <?php foreach ($advise_img_slide_support->result() as $imgsld): ?>
                          <li>
                            <img alt="Image" src="<?php echo base_url() . 'assets/uploads/' . $imgsld->img_path;?>" />
                          </li>
                        <?php endforeach; ?>
                      </ul>
                  </div>
              </div>

              <div class="col-md-5 col-lg-4">
                  <ul class="accordion accordion-2 accordion--oneopen">
                    <?php $tabsCounterEach = 0;?>
                    <?php foreach ($advise_baseic_tabs->result() as $tbs): ?>
                      <?php if ($tabsCounterEach == 0): ?>
                        <li class="active">
                      <?php else: ?>
                        <li>
                      <?php endif; ?>
                          <div class="accordion__title">
                              <span class="h5"><?php echo $tbs->tab_support_title;?></span>
                          </div>
                          <div class="accordion__content">
                              <?php echo $tbs->tab_support_text;?>
                          </div>
                      </li>
                      <?php $tabsCounterEach++;?>
                    <?php endforeach; ?>
                  </ul>
              </div>
          </div>
      </div>
  </section>

  <section class="text-center space--lg">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <h2>Tabla de Comisiones</h2>
                <div class="row">
                  <div class="col-md-12">
                    <table class="border--round table--alternate-row">
                      <?php
                        $basePrice = $adv_bs->advise_baseprice;
                      ?>
                      <legend>Precio Base: <span><?php echo $basePrice;?></span></legend>
                      <thead>
                        <tr>
                          <th>Cantidad Vendida</th>
                          <th>Porcentaje Descuento de Venta</th>
                          <th>Comision por Unidad</th>
                          <th>Volumen de Venta Total</th>
                          <th>Ganancia Estimada Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($advise_baseic_commisions->result() as $bs_com): ?>
                          <?php
                            $totalEarn = $bs_com->qty_base * $basePrice;
                            $discountedPrice = ((100 - $bs_com->discount_percent) * $totalEarn) / 100;
                            $totalEarnCalculated = ($bs_com->commission_percent * $discountedPrice) / 100;
                          ?>
                          <tr>
                            <td><?php echo $bs_com->qty_base;?></td>
                            <td><?php echo $bs_com->discount_percent;?>%</td>
                            <td><?php echo $bs_com->commission_percent;?>%</td>
                            <td><?php echo $discountedPrice;?></td>
                            <td><?php echo $totalEarnCalculated;?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </section>

  <section class="elements-title space--xxs text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h2>Terminos y Condiciones</h2>
              </div>
          </div>
      </div>

  </section>

  <div class="tabs-container text-center" data-content-align="left">
      <ul class="tabs">
        <?php $counter = 0;?>
        <?php foreach ($advise_terms_support->result() as $trm): ?>
          <?php if ($counter == 0): ?>
            <li class="active">
          <?php else: ?>
            <li>
          <?php endif; ?>
              <div class="tab__title">
                  <span class="h5"><?php echo $trm->term_title;?></span>
              </div>
              <div class="tab__content">
                  <?php if ($trm->term_high == 0): ?>
                    <section class="switchable ">
                  <?php else: ?>
                    <section class="switchable bg--secondary">
                  <?php endif; ?>
                      <div class="container">
                          <div class="row justify-content-between">
                              <div class="col-md-12">
                                  <div class="text-block">
                                      <p><?php echo $trm->term_text;?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
          </li>
          <?php $counter++;?>
        <?php endforeach; ?>
      </ul>
  </div>

  <section class="text-center space--lg">
      <div class="container">
        <?php if ($this->ion_auth->logged_in()): ?>
          <div class="row">
              <div class="col-md-12" id="form_match_wrapper">
                <?php if ($prevMatch == true): ?>
                  <h3>Ya envio su match a este aviso</h3>
                <?php else: ?>
                  <h2>¿Deseas Contactarte con Ellos?</h2>
                  <?php echo form_open('List_Advise/match_request', 'id="match_req_form" class="row justify-content-center"');?>
                  <input type="hidden" id="list_advise_id" name="list_advise_id" value="<?php echo $adv_bs->advise_id;?>">
                  <input type="hidden" id="provider_id" name="provider_id" value="<?php echo $provider_id;?>">
                  <div class="col-md-5">
                    <button type="submit" id="send_match_btn" class="btn btn--primary">Enviar Match</button>
                  </div>
                  <?php echo form_close();?>
                  <span class="type--fine-print">
                    Leer los <a href="#"> <b>Terminos y Condiciones del Sitio</b></a>
                  </span>
                <?php endif; ?>
              </div>
              <div id="alert_form_match" class="col-md-12" style="margin-top:45px; display:none;">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4 alert bg--success">
                    <div class="alert__body">
                      <span>Se envio tu Match!</span>
                    </div>
                    <div class="alert__close">×</div>
                  </div>
                  <div class="col-md-4"></div>
                </div>
              </div>
          </div>
        <?php else: ?>
          <div class="row">
            <div class="col-md-12">
              <h4>Debes estar logeado para poder contactar la Empresa.</h4>
            </div>
          </div>
        <?php endif; ?>

      </div>
  </section>

  <section class="text-center space--lg">
      <div class="container">
        <h3>Referencias del Proveedor</h3>
        <div class="row">
            <div class="col-lg-8 col-md-10">
                <div class="slider" data-paging="true">
                    <ul class="slides">
                      <?php foreach ($advise_author_references->result() as $ref): ?>
                        <?php if ($ref->reference_score >= 5): ?>
                          <li>
                              <div class="testimonial">
                                  <blockquote>
                                      &ldquo; <?php echo $ref->reference_body;?> &rdquo;
                                  </blockquote>
                                  <h5><?php echo $ref->reference_title;?></h5>
                              </div>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
      </div>
  </section>

  <section>
      <div class="container">
          <div class="row">

              <div class="col-md-12">
                  <div class="text-block">
                      <h3>Productos Relacionados</h3>
                  </div>
              </div>

              <?php foreach ($advises_relations->result() as $rel): ?>
                <div class="col-md-4">
                    <div class="product">
                        <a href="<?php echo base_url() . 'list/advise/' . $rel->advise_code;?>">
                            <img alt="Image" src="<?php echo base_url() . 'assets/uploads/' . $rel->main_pic;?>" />
                        </a>
                        <a class="block" href="<?php echo base_url() . 'list/advise/' . $rel->advise_code;?>">
                            <div>
                                <h5><?php echo $rel->advise_name; ?></h5>
                                <br>
                                <span><?php echo $rel->advise_desc; ?></span>
                            </div>
                            <p>
                              <?php echo $rel->advise_qty_base; ?> unidades.
                              <br>
                              Precio Base: $<?php echo $rel->advise_baseprice; ?>
                              <br>
                              Desde <?php echo getMinimalCommission($rel->advise_id);?>% de Comision
                            </p>
                        </a>
                    </div>
                </div>
              <?php endforeach; ?>

          </div>
      </div>
  </section>

<?php endforeach; ?>

<script>

  $('#match_req_form').submit(function(event) {
    event.preventDefault();
    var list_advise_id = $('#list_advise_id').val();
    var provider_id = $('#provider_id').val();
    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      data: {'list_advise_id': list_advise_id, 'provider_id': provider_id},
      success:function(){
        $('#alert_form_match').show();
        var appendedAdvise = '<h3>Ya envio su match a este aviso</h3>';
        $('#form_match_wrapper').empty();
        $('#form_match_wrapper').append(appendedAdvise);
      }
    });
    return false;
  });
</script>
