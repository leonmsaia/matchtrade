<li>
    <div class="tab__title">
        <span class="h5">Soporte Slider</span>
    </div>
    <div class="tab__content">

      <div class="row">
        <div class="col-md-12">
            <form class="row" method="post" action="test" id="upload_slide_pic_form">
              <input type="hidden" name="advise_code" id="advise_code_identifier" value="<?php echo $advise_code;?>">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6" style="padding-left: 15px;">
                      <label>Imagen:</label>
                      <input type="file" name="slide_pic" id="slide_pic" class="validate-required" />
                    </div>
                    <div class="col-md-6" style="padding-right: 15px;">
                      <label>Orden del Slide:</label>
                      <div class="input-number">
                        <input type="number" name="slide_order" id="slide_order" placeholder="Quantity" value="1" min="1" max="10" />
                        <div class="input-number__controls">
                          <span class="input-number__increase"><i class="stack-up-open"></i></span>
                          <span class="input-number__decrease"><i class="stack-down-open"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4" style="margin:25px 0px 25px 0px;">
                      <input type="submit" class="btn btn--primary" value="Guardar Slide">
                    </div>
                  </div>
                </div>
            </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <table class="border--round table--alternate-row">
            <legend>Lista de Imagenes en Slider (Carousel)</legend>
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Orden</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($advise_img_slide_support->result() as $imgsld): ?>
                <tr>
                  <td>
                    <img alt="background" src="<?php echo base_url() . 'assets/uploads/' . $imgsld->img_path;?>" />
                  </td>
                  <td><?php echo $imgsld->img_order;?></td>
                  <td>
                    <form class="delete_img_slide_form" id="delete_img_slide_form" name="delete_img_slide_form" action="test" method="post">
                      <input type="hidden" name="advise_id" id="advise_id" value="<?php echo $imgsld->advise_id;?>">
                      <input type="hidden" name="img_order" id="img_order" value="<?php echo $imgsld->img_order;?>">
                      <input type="submit" class="btn__text" id="deleteSlide" name="deleteSlide" value="Borrar">
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>
</li>
