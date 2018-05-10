<section class="imagebg image--light cover cover-blocks bg--secondary">
    <div class="background-image-holder hidden-xs">
        <img alt="background" src="<?php echo base_url();?>assets/img/promo-1.jpg" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 ">
                <div>
                    <h1>Crear Publicacion</h1>
                    <p class="lead">
                        These modular elements can be readily used and customized across pages and in different blocks.
                    </p>
                    <hr class="short">
                    <p>
                        Explore all of Stack's modular elements
                        <br /> at the
                        <a href="elements.html">Element Index Page &rarr;</a>
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
            <span id="pathData" path="<?php echo base_url();?>" style="display:none;"></span>
            <table class="border--round table--alternate-row">
              <legend>Tus Publicaciones Realizadas</legend>
              <thead>
                <tr>
                  <th>N. Ref.</th>
                  <th>Titulo</th>
                  <th>Descripcion Corta</th>
                  <th>Vencimiento</th>
                  <th>Estado</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($my_advises->result() as $madv): ?>
                  <tr>
                    <td><?php echo $madv->advise_code;?></td>
                    <td><?php echo $madv->advise_name;?></td>
                    <td><?php echo $madv->advise_desc;?></td>
                    <td><?php echo calcAdviseVto();?></td>
                    <td><?php echo calcAdviseStatus();?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-12" id="advise_list_wrapper">

                        </div>
                        <div class="col-md-3">
                          <form class="deleteAdvise" name="deleteAdvise" id="deleteAdvise" action="" method="post">
                            <input type="hidden" name="advise_id" id="advise_id" value="<?php echo $madv->advise_id;?>">
                            <input type="submit" name="borrar" value="Borrar">
                          </form>
                        </div>
                        <div class="col-md-3">
                          <a href="<?php echo base_url() . 'advise/edit/' . $madv->advise_code;?>" class="">Editar</a>
                        </div>
                        <div class="col-md-3">
                          <?php $renovado = true; ?>
                          <?php if ($renovado == true): ?>
                            Renovado
                          <?php else: ?>
                            <a href="<?php echo base_url() . 'advise/edit/' . $madv->advise_code;?>" class="">Renovar</a>
                          <?php endif; ?>
                        </div>
                        <div class="col-md-3">
                          <a href="<?php echo base_url() . 'list/advise/' . $madv->advise_code;?>" target="_blank" class="">Ver</a>
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


<script>
  $('.deleteAdvise').submit(function(e) {
      e.preventDefault();
      confirm('¿Seguro que desea eliminar el adviso?');
      var advise_id = $(this).find('input[name="advise_id"]').val();
      $.ajax({
        url:  $('#pathData').attr('path') + 'List_Advise/deleteAdviseByID/',
        data: {'advise_id': advise_id},
        type: 'POST',
        success:function(){
          message = 'Su aviso fue eliminado satisfactoriamente';
          type = 'bg--success';
          wrapper = '#advise_list_wrapper';
          getAdviseBaseCommission();
          makeAlertGreen(message, type, wrapper)
        }
      });
      location.reload();
      return false;
  });
</script>
