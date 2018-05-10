<?php
  foreach ($data->result() as $stpfive) {
    $advise_id = $stpfive->advise_id;
    $advisePrice = $stpfive->advise_baseprice;
  }
?>
<li>
    <div class="tab__title">
        <span class="h5">Textos Complementarios</span>
    </div>
    <div class="tab__content">
      <div class="row">
        <div class="col-md-12">
          <input type="hidden" name="advise_code" id="advise_code_identifier" value="<?php echo $advise_code;?>">
          <span id="pathData" path="<?php echo base_url();?>" style="display:none;"></span>
          <span id="adviseData" adviseID="<?php echo $advise_id;?>" style="display:none;"></span>
          <span id="advisePrice" priceBase="<?php echo $advisePrice;?>" style="display:none;"></span>
          <?php echo form_open('List_Advise/save_support_txt', 'class="row"');?>
          <input type="hidden" name="advise_id" value="<?php echo $advise_id;?>">
            <?php foreach ($data->result() as $txt_sup): ?>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <label>Subtitulo Principal:</label>
                    <input type="text" name="txt_support_subtitle" id="txt_support_subtitle" placeholder="Nombre del Producto o Titulo de la Publicacion" class="validate-required"/>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Descripcion:</label>
                    <textarea name="txt_support_maintext" id="txt_support_maintext" placeholder="Descripcion Breve de la Publicacion" class="validate-required" rows="4"></textarea>
                  </div>
                </div>
                <div class="row" style="margin-bottom: 45px;">
                  <div class="col-md-6">
                    <label>Subtitulo Secundario (Complementa Imagen):</label>
                    <input type="text" name="txt_support_secondimg_title" id="txt_support_secondimg_title" placeholder="Nombre del Producto o Titulo de la Publicacion" class="validate-required"/>
                  </div>
                  <div class="col-md-6">
                    <label>Descripcion  (Complementa Imagen):</label>
                    <textarea name="txt_support_secondimg_txt" id="txt_support_secondimg_txt" placeholder="Descripcion Breve de la Publicacion" class="validate-required" rows="4"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn--primary">Guardar Datos</button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php echo form_close();?>
          <div class="col-md-12">
            <form class="row" method="post" action="test" id="upload_second_pic_form">
              <div class="col-md-12"><hr class="separate-line"></div>
              <div class="col-md-4">
                <label>Imagen de Soporte:</label>
              </div>
              <div class="col-md-4">
                <input type="file" name="userfile_two" id="userfile_two" size="20" class="validate-required" />
              </div>
              <div class="col-md-4">
                <input type="submit" name="submit" id="submit" value="Guardar Imagen de Soporte" />
              </div>
              <div class="col-md-12" id="second_picture_prod">
                <img alt="background" src="<?php echo base_url();?>assets/img/promo-1.jpg" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</li>
