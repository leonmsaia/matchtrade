<li class="active">
    <div class="tab__title">
        <span class="h5">Informacion Basica</span>
    </div>
    <div class="tab__content">
      <div class="row">
        <div class="col-md-12">
            <?php echo form_open('List_Advise/save_basic_advise', 'class="row"');?>
                <input type="hidden" name="author" value="">
                <div class="col-md-4">
                    <label>Nombre:</label>
                    <input type="text" name="advise_name" id="advise_name" placeholder="Nombre del Producto o Titulo de la Publicacion" class="validate-required" />
                </div>
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
                <div class="col-md-4">
                  <label>Imagen Principal:</label>
                  <input type="file" name="name" class="validate-required" />
                </div>
                <div class="col-md-12">
                    <label>Descripcion:</label>
                    <textarea name="advise_desc" id="advise_desc" placeholder="Descripcion Breve de la Publicacion" class="validate-required" rows="4"></textarea>
                </div>
                <div class="col-md-4">
                    <label>Precio Base por Unidad:</label>
                    <input type="text" name="advise_baseprice" id="advise_baseprice" placeholder="Precio unitario del Producto/Servicio a Ofrecer para la Venta" class="validate-required" />
                </div>
                <div class="col-md-4">
                    <label>Cantidad de Unidades:</label>
                    <input type="text" name="advise_qty_base" id="advise_qty_base" placeholder="Cantidad de Unidades Totales Destinadas a la Venta" class="validate-required" />
                </div>
                <div class="col-md-4">
                    <label>Inicio de Publicacion:</label>
                    <input type="text" name="advise_publication_start" id="advise_publication_start" class="datepicker" placeholder="Choose a date" />
                </div>
                <div class="col-md-12">
                  <p><small>* Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small></p>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn--primary">Guardar Datos</button>
                </div>
            <?php echo form_close();?>
        </div>
      </div>
    </div>
</li>
