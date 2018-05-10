<?php
  foreach ($data->result() as $stptwo) {
    $advise_id = $stptwo->advise_id;
    $advisePrice = $stptwo->advise_baseprice;
  }
?>
<li>
  <div class="tab__title">
      <span class="h5">Tabla de Comisiones</span>
  </div>
  <div class="tab__content">
    <div class="row" style="margin-bottom: 45px;">
      <div class="col-md-12">
          <span id="pathData" path="<?php echo base_url();?>" style="display:none;"></span>
          <span id="adviseData" adviseID="<?php echo $advise_id;?>" style="display:none;"></span>
          <span id="advisePrice" priceBase="<?php echo $advisePrice;?>" style="display:none;"></span>
          <?php echo form_open('List_Advise/add_base_commission_advise', 'class="row" name="commision_base" id="commision_base"');?>
            <div class="col-md-12">
              <div class="row" style="margin-bottom: 25px;">
                  <input type="hidden" name="advise_id" id="advise_id" value="<?php echo $advise_id;?>">
                <div class="col-md-6">
                  <label>Cantidad a Vender</label>
                  <input type="text" name="qty_base" id="qty_base" placeholder="Cantidad" class="validate-required" />
                  <small>* Cantidad de Venta para Alcanzar Comision</small>
                </div>
                <div class="col-md-6">
                  <label>Porcentaje de Descuento:</label>
                  <input type="text" name="discount_percent" id="discount_percent" placeholder="Descuento" class="validate-required" />
                  <small>* Descuento final para la venta del Producto segun cantidad de compra</small>
                </div>
                <div class="col-md-6">
                  <label>Comision por Unidad:</label>
                  <input type="text" name="commission_percent" id="commission_percent" placeholder="Comision" class="validate-required" />
                  <small>* Comision de Ganancia por la Venta de Una Unidad</small>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <button type="button" class="btn btn--primary" name="saveBaseCommission" id="saveBaseCommission">Guardar Comision</button>
                </div>
              </div>
            </div>
          <?php echo form_close();?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="border--round table--alternate-row">
          <legend>Precio Base: <span><?php echo $advisePrice;?></span></legend>
          <thead>
            <tr>
              <th>Cantidad Vendida</th>
              <th>Porcentaje Descuento de Venta</th>
              <th>Comision por Unidad</th>
              <th>Volumen de Venta Total</th>
              <th>Ganancia Estimada Total</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody id="base_commision_wrapper">
          </tbody>
        </table>
      </div>
    </div>
  </div>
</li>
