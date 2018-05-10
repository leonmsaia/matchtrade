<section class="imagebg image--light cover cover-blocks bg--secondary">
    <div class="background-image-holder hidden-xs">
        <img alt="background" src="<?php echo base_url();?>assets/img/promo-1.jpg" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 ">
                <div>
                    <h1>Lista de Matchs</h1>
                    <p class="lead">
                        These modular elements can be readily used and customized across pages and in different blocks.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
          <div class="col-md-12" style="margin-bottom:45px;">
            <h3>Titulo</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-md-12">
            <table class="border--round table--alternate-row">
              <legend>Nuevos Matches</legend>

              <thead>
                <tr>
                  <th>ID de Match.</th>
                  <th>Aviso</th>
                  <th>Usuario</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($matches_list->result() as $mtch): ?>
                  <tr>
                    <td>
                      <?php echo $mtch->match_id;?>
                    </td>
                    <td>
                      <a href="<?php echo base_url() . 'list/advise/' . $mtch->advise_code;?>" target="_blank">
                        <?php echo $mtch->advise_name;?>
                      </a>
                    </td>
                    <td>
                      <?php echo $mtch->first_name;?> | Ver Stats
                    </td>
                    <td>
                      <?php echo date('d/m/y', strtotime($mtch->date));?>
                    </td>
                    <td>
                      <?php if ($mtch->status == 1): ?>
                        Sin Confirmar
                      <?php elseif ($mtch->status == 2): ?>
                        Confirmado
                      <?php elseif ($mtch->status == 3): ?>
                        Vendedor Sin Saldo
                      <?php elseif ($mtch->status == 4): ?>
                        Rechazado por Proveedor
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($mtch->status == 1): ?>
                        <?php echo form_open('User/processMatch');?>
                          <input type="hidden" name="match_id" value="<?php echo $mtch->match_id;?>">
                          <input type="hidden" name="status" value="accept">
                          <input type="submit" value="Aceptar">
                        <?php echo form_close();?>

                        <?php echo form_open('User/processMatch');?>
                          <input type="hidden" name="match_id" value="<?php echo $mtch->match_id;?>">
                          <input type="hidden" name="status" value="reject">
                          <input type="submit" name="" value="Rechazar">
                        <?php echo form_close();?>
                      <?php elseif($mtch->status != 1 AND $mtch->status != 4): ?>
                        <p>Match ya procesado. Por favor aguarde Contacto.</p>
                      <?php elseif($mtch->status == 4): ?>
                        <p>Match ya procesado.</p>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
</section>
