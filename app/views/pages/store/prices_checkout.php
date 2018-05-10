<?php foreach ($plan_spects->result() as $plan): ?>
<?php foreach ($user_info->result() as $usr): ?>
<?php

  // Calculate and Settings
  $plan_cost = $plan->store_plan_value;
  if ($plan->store_plan_group == 1) {
    $group_plan = 'Plan Proveedor';
  }elseif($plan->store_plan_group == 2){
    $group_plan = 'Plan Vendedor';
  }

  // Callback URLS
  $success_callback = base_url() . 'store/response/mp/success';
  $failure_callback = base_url() . 'store/response/mp/failure';
  $pending_callback = base_url() . 'store/response/mp/pending';

  // MercadoPago Engine
  $mp = new MP("7541711196164994", "LgwtWNlLK1f21IwQo7DT2orxCRxwf27D");
  $preference_data = array(
    "items" => array(
  		array(
  			"title" => 'Plan ' . $plan->store_plan_level . ' de ' . $group_plan,
  			"quantity" => 1,
        "description" => 'Plan ' . $plan->store_plan_level . ' de ' . $group_plan,
  			"currency_id" => $MP_Conf->currency_type,
  			"unit_price" => $plan_cost + $administrative_cost
  		)
  	),
    "payer" => array(
      "name" => $usr->first_name,
      "surname" => $usr->last_name,
      "email" => $usr->email
    ),
    "back_urls" => array(
      "success" => $success_callback,
      "failure" => $failure_callback,
      "pending" => $pending_callback
    ),
    "external_reference" => $transaction_id
  );
  $preference = $mp->create_preference($preference_data);
?>
<div class="main-container">
  <section>
      <div class="container">
          <div class="cart-form">
              <div class="row mt--2">
                  <div class="col-md-12">
                      <h4>Checkout</h4>
                      <p>Detalles de la Compra: Plan <?php echo $plan->store_plan_level;?> de <?php echo $group_plan;?></p>
                      <div class="boxed boxed--border cart-total">
                          <div class="row">
                              <div class="col-6">
                                  <span class="h5">Subtotal de Carrito:</span>
                              </div>
                              <div class="col-6 text-right">
                                  <span>$<?php echo $plan_cost;?></span>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-6">
                                  <span class="h5">Cargos Administrativos:</span>
                              </div>
                              <div class="col-6 text-right">
                                  <span>$<?php echo $administrative_cost;?></span>
                              </div>
                          </div>
                          <hr />
                          <div class="row">
                              <div class="col-6">
                                  <span class="h5">Total:</span>
                              </div>
                              <div class="col-6 text-right">
                                  <span class="h5">$<?php echo $plan_cost + $administrative_cost;?></span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row justify-content-center">
                  <div class="col-md-12 cart-customer-details">
                      <h4>Detalles de Facturación</h4>
                      <div class="row">
                        <div class="col-md-6">
                            <label>Nombre:</label>
                            <input type="text" name="name" value="<?php echo $usr->first_name;?>" readonly/>
                        </div>
                        <div class="col-md-6">
                            <label>Apellido:</label>
                            <input type="text" name="lasname" value="<?php echo $usr->last_name;?>" readonly/>
                        </div>
                        <div class="col-md-6">
                            <label>C.U.I.T.:</label>
                            <input type="text" name="cuit" value="<?php echo $usr->cuit;?>" readonly/>
                        </div>
                        <div class="col-md-6">
                            <label>Domicilio Fiscal:</label>
                            <input type="text" name="adress" value="<?php echo $usr->address;?>" readonly/>
                        </div>
                        <div class="col-md-6">
                            <label>E-Mail:</label>
                            <input type="email" name="email" value="<?php echo $usr->email;?>" readonly/>
                        </div>
                        <div class="col-md-6">
                            <label>Telefono:</label>
                            <input type="text" name="phone" value="<?php echo $usr->phone;?>" readonly/>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="row justify-content-end" style="margin-top:45px;">
                <div class="col-md-12">
                  <hr>
                  <h4>Medios de Pago</h4>
                </div>
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-3 text-right text-center-xs">
                      <?php if ($MP_Conf->sandbox_mode == 1): ?>
                        <a class="btn btn--primary" href="<?php echo $preference['response']['sandbox_init_point']; ?>">
                      <?php else: ?>
                        <a class="btn btn--primary" href="<?php echo $preference['response']['init_point']; ?>">
                      <?php endif; ?>
                      	<span class="btn__text">MercadoPago</span>
                      </a>
                    </div>

                  </div>
                </div>
              </div>
          </div>
      </div>
  </section>

</div>
<?php endforeach; ?>
<?php endforeach; ?>
