<section class="bg--secondary space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
              <?php foreach ($user_nfo->result() as $usr): ?>
                <?php if ($usr->group_id == 3 OR $usr->group_id == 4): ?>
                  <div class="boxed boxed--lg boxed--border">
                      <div class="text-block text-center">
                          <div class="avatar_container">
                            <div class="row">
                              <div class="col-md-12" style="margin-bottom:15px;">
                                <img alt="avatar" src="<?php echo base_url();?>assets/img/avatar-round-3.png" class="image--md" />
                              </div>
                              <div class="col-md-2"></div>
                              <div class="col-md-8">
                                <div class="row">
                                  <input type="file" class="col-md-5" name="" value="">
                                  <div class="col-md-2"></div>
                                  <input type="submit" class="col-md-5" name="" value="Guardar">
                                </div>
                              </div>
                              <div class="col-md-2"></div>
                            </div>
                          </div>
                          <hr>
                          <span class="h5">
                            <div class="row">
                              <div class="col-md-6">
                                <span class="type--fine-print block">Nombre:</span>
                                <input type="text" name="" value="<?php echo $usr->first_name;?>">
                              </div>
                              <div class="col-md-6">
                                <span class="type--fine-print block">Apellido:</span>
                                <input type="text" name="" value="<?php echo $usr->last_name;?>">
                              </div>
                            </div>
                          </span>
                          <span class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <span class="type--fine-print block">Compañia:</span>
                              <input type="text" name="" value="<?php echo $usr->company;?>">
                            </div>
                            <div class="col-md-4"></div>
                          </span>
                          <span class="label">
                            <?php if ($usr->name == 'provider'): ?>
                              Proveedor
                            <?php else: ?>
                              Vendedor
                            <?php endif; ?>
                          </span>
                      </div>
                      <div class="text-block clearfix text-center">
                          <ul class="row row--list">
                              <li class="col-md-4">
                                  <span class="type--fine-print block">Usuario:</span>
                                  <span><?php echo $usr->username;?></span>
                              </li>
                              <li class="col-md-4">
                                <span class="type--fine-print block">Miembro Desde:</span>
                                <span><?php echo date('d/m/Y', $usr->created_on);?></span>
                              </li>
                              <li class="col-md-4">
                                  <span class="type--fine-print block">D.N.I.:</span>
                                  <input type="text" name="" value="<?php echo $usr->dni;?>">
                              </li>
                              <li class="col-md-4">
                                  <span class="type--fine-print block">E-Mail:</span>
                                  <input type="text" name="" value="<?php echo $usr->email;?>">
                              </li>
                              <li class="col-md-4">
                                  <span class="type--fine-print block">CUIT:</span>
                                  <input type="text" name="" value="<?php echo $usr->cuit;?>">
                              </li>
                              <li class="col-md-4">
                                  <span class="type--fine-print block">Telefono:</span>
                                  <input type="text" name="" value="<?php echo $usr->phone;?>">
                              </li>
                              <li class="col-md-12" style="margin-top:25px;">
                                <div class="row">
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4"></div>
                                  <div class="col-md-4">
                                    <input type="submit" name="" value="Guardar">
                                  </div>
                                </div>
                              </li>
                          </ul>
                      </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
