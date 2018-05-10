<section class="imagebg image--light cover cover-blocks bg--secondary">
    <div class="background-image-holder hidden-xs">
        <img alt="background" src="<?php echo base_url();?>assets/img/promo-1.jpg" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
          <div class="col-md-12" style="margin-bottom:45px;">
            <h5>Su N° de orden es: <?php echo strtoupper ($reference_id);?></h5>
            <hr>
            <?php if ($payment_response_var == 'success'): ?>
              <h3>La transaccion fue un Exito!</h3>
            <?php elseif($payment_response_var == 'failure'): ?>
              <h3>La transaccion fallo, por favor vuelva a intentar mas tarde o utilice otro medio de pago</h3>
            <?php elseif($payment_response_var == 'pending'): ?>
              <h3>La transaccion esta pendiente, el proveedor <?php echo $payment_provider;?> esta chequeando la misma, por favor espere.</h3>
            <?php endif; ?>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-md-12">

          </div>
        </div>
      </div>
</section>
