<section class="imagebg image--light cover cover-blocks bg--secondary">
  <div class="container">
      <div class="row">
        <div class="col-md-12" style="margin-bottom:45px;">
          <h3>Su Cantidad de Creditos/Publicaciones es de: </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          <a class="btn btn--primary" href="<?php echo base_url() . 'store/prices';?>">Comprar Planes</a>
        </div>
        <div class="col-md-12">
          <table class="border--round table--alternate-row">
            <legend>Movimientos en Cuenta</legend>
            <thead>
              <tr>
                <th>ID de Movimiento.</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Recibo</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($movements->result() as $mvs): ?>
                <tr>
                  <td>
                    <?php echo $mvs->user_movements_code;?>
                  </td>
                  <td>
                    <?php echo $mvs->user_movement_type_title;?> (<?php echo $mvs->user_movements_desc;?>)
                  </td>
                  <td>
                    <?php echo date('d/m/Y', strtotime($mvs->user_movements_date));?>
                  </td>
                  <td>
                    <?php echo $mvs->user_movements_amount_type;?> <?php echo $mvs->user_movements_amount;?>
                  </td>
                  <td>
                    <a href="#">
                      <i class="material-icons">insert_drive_file</i>
                    </a>
                  </td>
                  <td>
                    <div class="modal-instance">
                    	<a class="modal-trigger" title="Ver" href="#">
                        <i class="material-icons">remove_red_eye</i>
                    	</a>
                    	<div class="modal-container">
                        <div class="modal-content">
                            <div class="boxed boxed--lg">
                                <h3>Detalle de Operacion</h3>
                                <hr class="short">
                                <p class="lead">
                                  Tipo: <?php echo $mvs->user_movement_type_title;?><br>
                                  Detalle: <?php echo $mvs->user_movements_desc;?><br>
                                  Fecha: <?php echo date('d/m/Y', strtotime($mvs->user_movements_date));?><br>
                                  Monto: <?php echo $mvs->user_movements_amount_type;?> <?php echo $mvs->user_movements_amount;?>
                                  <br><br>
                                  <?php if ($mvs->user_movements_type == 1): ?>
                                    Detalle de MercadoPago <br>
                                    <?php $operationSpects = getMPOperationNfo($mvs->user_movements_id);?>
                                    <?php foreach ($operationSpects->result() as $spects): ?>
                                      Tipo de Pago del Movimiento: <?php echo $spects->payment_type;?><br>
                                      Estado del Movimiento: <?php echo $spects->store_mp_operation_reg_status;?><br>
                                      Fecha del Movimiento: <?php echo date('d/m/Y', strtotime($spects->store_mp_operation_reg_date));?><br>
                                      Monto del Movimiento: <?php echo $spects->store_mp_operation_reg_value;?><br>
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                </p>
                            </div>
                        <div class="modal-close modal-close-cross"></div></div>
                    	</div>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</section>
