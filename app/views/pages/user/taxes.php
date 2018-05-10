<section class="bg--secondary space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <?php foreach ($tax_information->result() as $txt_nfo): ?>
                <span id="pathData" path="<?php echo base_url();?>" style="display:none;"></span>
                <span id="actualData" status="<?php echo $statusData;?>" style="display:none;"></span>

                <?php echo form_open('User/saveTaxInformation', 'class="boxed boxed--border" id="upload_main_pic_form"');?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <h3>Datos Basicos de Facturacion</h3>
                        </div>
                        <div class="col-md-4">
                          <label>Razons Social:</label>
                          <input type="text" name="legal_name" id="legal_name" class="validate-required" value="<?php echo $txt_nfo->company_legal_name;?>" />
                        </div>
                        <div class="col-md-4">
                          <label>N° CUIT:</label>
                          <input type="text" name="cuit" id="cuit" class="validate-required" value="<?php echo $txt_nfo->company_cuit;?>" />
                        </div>
                        <div class="col-md-4">
                          <label>Posicion Frente al I.V.A.:</label>
                          <div class="input-select">
                            <select name="tax_position" id="tax_position">
                              <option value="Default">Select An Option</option>
                              <?php if ($txt_nfo->company_tax_position): ?>
                                <?php if ($txt_nfo->company_tax_position == 1): ?>
                                  <option value="1" selected>Responsable Inscripto</option>
                                  <option value="2">Responsable Monotributista</option>
                                  <option value="3">Exento</option>
                                <?php elseif($txt_nfo->company_tax_position == 2): ?>
                                  <option value="1">Responsable Inscripto</option>
                                  <option value="2" selected>Responsable Monotributista</option>
                                  <option value="3">Exento</option>
                                <?php elseif($txt_nfo->company_tax_position == 3): ?>
                                  <option value="1">Responsable Inscripto</option>
                                  <option value="2">Responsable Monotributista</option>
                                  <option value="3" selected>Exento</option>
                                <?php endif; ?>
                              <?php else: ?>
                                <option value="1">Responsable Inscripto</option>
                                <option value="2">Responsable Monotributista</option>
                                <option value="3">Exento</option>
                              <?php endif; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <hr style="margin-top:20px;">
                          <h3>Dirección Fiscal/Legal</h3>
                        </div>
                        <div class="col-md-10">
                          <label>Calle:</label>
                          <input type="text" name="street_adress" id="street_adress" class="validate-required" value="<?php echo $txt_nfo->company_adress_street;?>"/>
                        </div>
                        <div class="col-md-2">
                          <label>Altura:</label>
                          <input type="text" name="number_adress" id="number_adress" class="validate-required" value="<?php echo $txt_nfo->company_adress_number;?>"/>
                        </div>
                        <div class="col-md-4">
                          <label>Pais:</label>
                          <select name="country_selector" id="country_selector">
                            <?php if ($txt_nfo->company_pais != 0): ?>
                              <?php foreach ($company_country->result() as $ctry): ?>
                                <?php if ($txt_nfo->company_pais == $ctry->id): ?>
                                  <option value="<?php echo $ctry->id;?>" selected>
                                <?php else: ?>
                                  <option value="<?php echo $ctry->id;?>">
                                <?php endif; ?>
                                  <?php echo $ctry->nombre;?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Provincia:</label>
                          <select name="province_selector" id="province_selector">
                            <?php if ($txt_nfo->company_province != 0): ?>
                              <?php foreach ($company_province->result() as $prv): ?>
                                <?php if ($txt_nfo->company_province == $prv->id): ?>
                                  <option value="<?php echo $prv->id;?>" selected>
                                <?php else: ?>
                                  <option value="<?php echo $prv->id;?>">
                                <?php endif; ?>
                                  <?php echo $prv->nombre;?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Partido:</label>
                          <select name="party_selector" id="party_selector">
                            <?php if ($txt_nfo->company_partido != 0): ?>
                              <?php foreach ($company_party->result() as $prty): ?>
                                <?php if ($txt_nfo->company_partido == $prty->id): ?>
                                  <option value="<?php echo $prty->id;?>" selected>
                                <?php else: ?>
                                  <option value="<?php echo $prty->id;?>">
                                <?php endif; ?>
                                  <?php echo $prty->nombre;?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Localidad:</label>
                          <select name="locality_selector" id="locality_selector">
                            <?php if ($txt_nfo->company_localidad != 0): ?>
                              <?php foreach ($company_locality->result() as $locl): ?>
                                <?php if ($txt_nfo->company_localidad == $locl->id): ?>
                                  <option value="<?php echo $locl->id;?>" selected>
                                <?php else: ?>
                                  <option value="<?php echo $locl->id;?>">
                                <?php endif; ?>
                                  <?php echo $locl->nombre;?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Barrio:</label>
                          <select name="suburb_selector" id="suburb_selector">
                            <?php if ($txt_nfo->company_barrio != 0): ?>
                              <?php foreach ($company_suburb->result() as $surb): ?>
                                <?php if ($txt_nfo->company_barrio == $surb->id): ?>
                                  <option value="<?php echo $surb->id;?>" selected>
                                <?php else: ?>
                                  <option value="<?php echo $surb->id;?>">
                                <?php endif; ?>
                                  <?php echo $surb->nombre;?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Sub Barrio:</label>
                          <select name="subsuburb_selector" id="subsuburb_selector">
                            <?php if ($txt_nfo->company_pais != 0): ?>
                              <?php foreach ($company_subsuburb->result() as $ssurb): ?>
                                <?php if ($txt_nfo->company_subbarrio == $ssurb->id): ?>
                                  <option value="<?php echo $ssurb->id;?>" selected>
                                <?php else: ?>
                                  <option value="<?php echo $ssurb->id;?>">
                                <?php endif; ?>
                                  <?php echo $ssurb->nombre;?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <hr style="margin-top:20px;">
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                          <input type="submit" name="" value="Guardar Informacion Fiscal">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <hr style="margin-top:20px;">
                      <p>* Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                  </div>
                <?php echo form_close();?>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<script>
  $(document).ready(function() {
    // Render Location Combos
    function getAllCountryComboAjax() {
      var datapath = $('#pathData').attr('path') + 'Location/getAllPaises/';
      $.ajax({
        url: datapath,
        type: 'GET',
        success:function(res){
          var res = JSON.parse(res);
          $('#province_selector').empty();
          $('#party_selector').empty();
          $('#locality_selector').empty();
          $('#suburb_selector').empty();
          $('#subsuburb_selector').empty();
          var defaultSelect = '<option value="">Seleccione una Opcion</option>';
          $('#country_selector').append(defaultSelect);
          if (res.length > 0) {
            $('#country_selector').removeAttr('disabled');
            for (var i = 0; i < res.length; i++) {
              var optionConstruct = '<option value="' + res[i]['id'] + '">' +
              res[i]['nombre'] +
              '</option>';
              $('#country_selector').append(optionConstruct);
            }
          }else{
            $('#country_selector').attr('disabled', 'disabled');
          }
        }
      })
    };
    function getProvinceByCountryComboAjax() {
      var countryID = $('#country_selector').val();
      var datapath = $('#pathData').attr('path') + 'Location/getProvinceByCountryID/' + countryID;
      $.ajax({
        url: datapath,
        type: 'GET',
        success:function(res){
          var res = JSON.parse(res);
          $('#province_selector').empty();
          $('#party_selector').empty();
          $('#locality_selector').empty();
          $('#suburb_selector').empty();
          $('#subsuburb_selector').empty();
          var defaultSelect = '<option value="">Seleccione una Opcion</option>';
          $('#province_selector').append(defaultSelect);
          if (res.length > 0) {
            $('#province_selector').removeAttr('disabled');
            for (var i = 0; i < res.length; i++) {
              var optionConstruct = '<option value="' + res[i]['id'] + '">' +
              res[i]['nombre'] +
              '</option>';
              $('#province_selector').append(optionConstruct);
            }
          }else{
            $('#province_selector').attr('disabled', 'disabled');
          }
        }
      })
    };
    function getPartyByProvinceComboAjax() {
      var provinceID = $('#province_selector').val();
      var datapath = $('#pathData').attr('path') + 'Location/getPartyByProvinceID/' + provinceID;
      $.ajax({
        url: datapath,
        type: 'GET',
        success:function(res){
          var res = JSON.parse(res);
          $('#party_selector').empty();
          $('#locality_selector').empty();
          $('#suburb_selector').empty();
          $('#subsuburb_selector').empty();
          var defaultSelect = '<option value="">Seleccione una Opcion</option>';
          $('#party_selector').append(defaultSelect);
          if (res.length > 0) {
            $('#party_selector').removeAttr('disabled');
            for (var i = 0; i < res.length; i++) {
              var optionConstruct = '<option value="' + res[i]['id'] + '">' +
              res[i]['nombre'] +
              '</option>';
              $('#party_selector').append(optionConstruct);
            }
          }else{
            $('#party_selector').attr('disabled', 'disabled');
          }
        }
      })
    };
    function getLocalityByPartyComboAjax() {
      var partyID = $('#party_selector').val();
      var datapath = $('#pathData').attr('path') + 'Location/getLocaliltyByPartyID/' + partyID;
      $.ajax({
        url: datapath,
        type: 'GET',
        success:function(res){
          var res = JSON.parse(res);
          $('#locality_selector').empty();
          $('#suburb_selector').empty();
          $('#subsuburb_selector').empty();
          var defaultSelect = '<option value="">Seleccione una Opcion</option>';
          $('#locality_selector').append(defaultSelect);
          if (res.length > 0) {
            $('#locality_selector').removeAttr('disabled');
            for (var i = 0; i < res.length; i++) {
              var optionConstruct = '<option value="' + res[i]['id'] + '">' +
              res[i]['nombre'] +
              '</option>';
              $('#locality_selector').append(optionConstruct);
            }
          }else{
            $('#locality_selector').attr('disabled', 'disabled');
          }
        }
      })
    };
    function getSuburbByLocalityComboAjax() {
      var localityID = $('#locality_selector').val();
      var datapath = $('#pathData').attr('path') + 'Location/getSuburbByLocalityID/' + localityID;
      $.ajax({
        url: datapath,
        type: 'GET',
        success:function(res){
          var res = JSON.parse(res);
          $('#suburb_selector').empty();
          $('#subsuburb_selector').empty();
          var defaultSelect = '<option value="">Seleccione una Opcion</option>';
          $('#suburb_selector').append(defaultSelect);
          if (res.length > 0) {
            $('#suburb_selector').removeAttr('disabled');
            for (var i = 0; i < res.length; i++) {
              var optionConstruct = '<option value="' + res[i]['id'] + '">' +
              res[i]['nombre'] +
              '</option>';
              $('#suburb_selector').append(optionConstruct);
            }
          }else{
            $('#suburb_selector').attr('disabled', 'disabled');
          }
        }
      })
    };
    function getSubSuburbByLocalityComboAjax() {
      var localityID = $('#suburb_selector').val();
      var datapath = $('#pathData').attr('path') + 'Location/getSubSuburbByLocalityID/' + localityID;
      $.ajax({
        url: datapath,
        type: 'GET',
        success:function(res){
          var res = JSON.parse(res);
          $('#subsuburb_selector').empty();
          var defaultSelect = '<option value="">Seleccione una Opcion</option>';
          $('#subsuburb_selector').append(defaultSelect);
          if (res.length > 0) {
            $('#subsuburb_selector').removeAttr('disabled');
            for (var i = 0; i < res.length; i++) {
              var optionConstruct = '<option value="' + res[i]['id'] + '">' +
              res[i]['nombre'] +
              '</option>';
              $('#subsuburb_selector').append(optionConstruct);
            }
          }else{
            $('#subsuburb_selector').attr('disabled', 'disabled');
          }
        }
      })
    };
    $('#country_selector').change(function() {
      getAllCountryComboAjax();
      getProvinceByCountryComboAjax();
    });
    $('#country_selector').change(function() {
      getProvinceByCountryComboAjax();
    });
    $('#province_selector').change(function() {
      getPartyByProvinceComboAjax();
    });
    $('#party_selector').change(function() {
      getLocalityByPartyComboAjax();
    });
    $('#locality_selector').change(function() {
      getSuburbByLocalityComboAjax();
    });
    $('#suburb_selector').change(function() {
      getSubSuburbByLocalityComboAjax();
    });
    var statusDataInitial = $('#actualData').attr('status');
    if (statusDataInitial == 'FALSE') {
      getAllCountryComboAjax();
    }
  });
</script>
