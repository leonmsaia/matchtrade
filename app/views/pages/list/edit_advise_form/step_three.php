<?php
  foreach ($data->result() as $stptwo) {
    $advise_id = $stptwo->advise_id;
    $advisePrice = $stptwo->advise_baseprice;
  }
?>
<li>
    <div class="tab__title">
        <span class="h5">Soporte de Tabs</span>
    </div>
    <div class="tab__content">
      <div class="row"  style="margin-bottom: 45px;">
        <div class="col-md-12">
            <span id="pathData" path="<?php echo base_url();?>" style="display:none;"></span>
            <span id="adviseData" adviseID="<?php echo $advise_id;?>" style="display:none;"></span>

            <?php echo form_open('List_Advise/saveSupportTab', 'class="row" name="support_tab" id="support_tab"');?>
                <input type="hidden" name="advise_id" id="advise_id" value="<?php echo $advise_id;?>">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Titulo de Tab:</label>
                      <input type="text" name="tab_title" id="tab_title" placeholder="Nombre del Producto o Titulo de la Publicacion" class="validate-required" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label>Orden de Tab:</label>
                      <div class="input-number">
                        <input type="number" name="tab_order" id="tab_order" placeholder="Quantity" value="1" min="1" max="10" />
                        <div class="input-number__controls">
                          <span class="input-number__increase"><i class="stack-up-open"></i></span>
                          <span class="input-number__decrease"><i class="stack-down-open"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Texto de Tab:</label>
                      <textarea name="tab_txt" id="tab_txt" placeholder="Descripcion Breve de Tab" class="validate-required" rows="4"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn--primary" name="saveSupportTab" id="saveSupportTab">Guardar Tab</button>
                </div>
            <?php echo form_close();?>

        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="border--round table--alternate-row">
            <legend>Lista de Tabs</legend>
            <thead>
              <tr>
                <th>Titulo de Tab</th>
                <th>Texto de Tab</th>
                <th>Orden de Tab</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody id="support_tab_wrapper"></tbody>
          </table>
        </div>
      </div>
    </div>
</li>
