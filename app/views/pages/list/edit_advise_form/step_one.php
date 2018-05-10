<li class="active">
    <div class="tab__title">
        <span class="h5">Informacion Basica</span>
    </div>
    <div class="tab__content">
      <div class="row">
        <div class="col-md-12">
            <?php if ($page == 'list/edit_advise'): ?>
              <?php echo form_open('List_Advise/edit_basic_advise', 'class="row"');?>
            <?php elseif($page == 'list/create_advise'): ?>
              <?php echo form_open('List_Advise/save_basic_advise', 'class="row"');?>
            <?php endif; ?>
                <?php foreach ($data->result() as $dt): ?>
                  <?php if ($page == 'list/edit_advise'): ?>
                    <input type="hidden" name="advise_code" id="advise_code_identifier" value="<?php echo $advise_code;?>">
                  <?php endif; ?>
                  <input type="hidden" name="author" value="">
                  <div class="col-md-4">
                      <label>Nombre:</label>
                      <input type="text" name="advise_name" id="advise_name" placeholder="Nombre del Producto o Titulo de la Publicacion" class="validate-required" value="<?php echo $dt->advise_name;?>" />
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Rubro:</label>
                        <div class="input-select">
                          <select name="category_id" id="category_id">
                            <option value="Default">Select An Option</option>
                            <?php foreach ($categories_list->result() as $cat): ?>
                              <?php if ($dt->advise_category == $cat->category_id): ?>
                                <option value="<?php echo $cat->category_id;?>" selected>
                              <?php else: ?>
                                <option value="<?php echo $cat->category_id;?>">
                              <?php endif; ?>
                                <?php echo $cat->category_name;?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Sub-Rubro:</label>
                          </div>
                        </div>
                        <ul id="subcategory_wrapper" class="row">
                          <?php if ($advise_sub_category->num_rows() > 0): ?>
                            <?php $numerator = 0;?>
                            <?php foreach ($advise_sub_category->result() as $subcat): ?>
                              <li class="col-md-6">
                                <div class="input-checkbox">
                                  <input id="checkbox-<?php echo $numerator;?>" type="checkbox" name="subcategory[]" checked value="<?php echo $subcat->sub_category_id;?>"/>
                                  <label for="checkbox-<?php echo $numerator;?>"></label>
                                </div>
                                <span><?php echo $subcat->sub_category_name;?></span>
                              </li>
                            <?php $numerator = 0;?>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <li class="col-md-12">
                              <p>Para ver Sub Rubros primero seleccione un Rubro.</p>
                            </li>
                          <?php endif; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <label>Descripcion:</label>
                      <textarea name="advise_desc" id="advise_desc" placeholder="Descripcion Breve de la Publicacion" class="validate-required" rows="4"><?php echo $dt->advise_desc;?></textarea>
                  </div>
                  <div class="col-md-4">
                      <label>Precio Base por Unidad:</label>
                      <input type="text" name="advise_baseprice" id="advise_baseprice" placeholder="Precio unitario del Producto/Servicio a Ofrecer para la Venta" class="validate-required" value="<?php echo $dt->advise_baseprice;?>" />
                  </div>
                  <div class="col-md-4">
                      <label>Cantidad de Unidades:</label>
                      <input type="text" name="advise_qty_base" id="advise_qty_base" placeholder="Cantidad de Unidades Totales Destinadas a la Venta" class="validate-required" value="<?php echo $dt->advise_qty_base;?>"/>
                  </div>
                  <div class="col-md-4">
                      <label>Inicio de Publicacion:</label>
                      <input type="text" name="advise_publication_start" id="advise_publication_start" class="datepicker" placeholder="Choose a date" value="<?php echo $dt->advise_publication_start;?>"/>
                  </div>
                  <div class="col-md-12">
                    <p><small>* Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small></p>
                  </div>
                  <div class="col-md-4">
                      <button type="submit" class="btn btn--primary">Guardar Datos</button>
                  </div>
                <?php endforeach; ?>
            <?php echo form_close();?>
        </div>
      </div>
      <?php if ($page == 'list/edit_advise'): ?>
        <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-12">
            <form class="row" method="post" action="test" id="upload_main_pic_form">
              <div class="col-md-4">
                <label>Imagen Principal:</label>
              </div>
              <div class="col-md-4">
                <input type="file" name="userfile" id="userfile" size="20" class="validate-required" />
              </div>
              <div class="col-md-4">
                <input type="submit" name="submit" id="submit" value="Guardar Foto Principal" />
              </div>
            </form>
          </div>
          <div class="col-md-12" id="main_picture_prod">
            <img alt="background" src="<?php echo base_url();?>assets/img/promo-1.jpg" />
          </div>
          <div class="col-md-12">
            <p><small>* Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small></p>
          </div>
        </div>
      <?php endif; ?>

    </div>
</li>
