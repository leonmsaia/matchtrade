<section class="bg--secondary space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <?php foreach ($tax_information->result() as $txt_nfo): ?>
                <span id="pathData" path="<?php echo base_url();?>" style="display:none;"></span>
                <span id="actualData" status="<?php echo $statusData;?>" style="display:none;"></span>
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Datos de Contacto</h3>
                      </div>
                      <div class="col-md-4">
                        <label>Telefono:</label>
                        <input type="text" name="legal_name" id="legal_name" class="validate-required" value="<?php echo $txt_nfo->company_legal_name;?>" />
                      </div>
                      <div class="col-md-4">
                        <label>E-Mail:</label>
                        <input type="text" name="cuit" id="cuit" class="validate-required" value="<?php echo $txt_nfo->company_cuit;?>" />
                      </div>
                      <div class="col-md-4">
                        <label>Website:</label>
                        <input type="text" name="cuit" id="cuit" class="validate-required" value="<?php echo $txt_nfo->company_cuit;?>" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <?php echo form_open('User/saveCategoryCompany', 'class="row" id="upload_main_pic_form"');?>
                      <input type="hidden" name="user_id" value="<?php echo getMyID();?>">
                      <div class="col-md-12">
                        <hr style="margin-top:20px;">
                        <h3>Categorización</h3>
                      </div>
                      <div class="col-md-4">
                        <label>Rubro:</label>
                        <div class="input-select">
                          <select name="category_id" id="category_id">
                            <option value="Default">Select An Option</option>
                            <?php foreach ($categories_list->result() as $cat): ?>
                              <?php if ($fatherCat == $cat->category_id): ?>
                                <option value="<?php echo $cat->category_id;?>" selected>
                              <?php else: ?>
                                <option value="<?php echo $cat->category_id;?>">
                              <?php endif; ?>
                                <?php echo $cat->category_name;?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Sub-Rubro:</label>
                          </div>
                        </div>
                        <ul id="subcategory_wrapper" class="row">
                          <?php if ($company_sub_categories_complete->num_rows() > 0): ?>
                            <?php $numerator = 0;?>
                            <?php foreach ($company_sub_categories_complete->result() as $subcat): ?>
                              <li class="col-md-6">
                                <div class="input-checkbox">
                                  <input id="checkbox-<?php echo $numerator;?>" type="checkbox" name="subcategory[]" checked value="<?php echo $subcat->sub_category_id;?>"/>
                                  <label for="checkbox-<?php echo $numerator;?>"></label>
                                </div>
                                <span><?php echo $subcat->sub_category_name;?></span>
                              </li>
                            <?php $numerator = 0;?>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <li class="col-md-12">
                              <p>Para ver Sub Rubros primero seleccione un Rubro.</p>
                            </li>
                          <?php endif; ?>
                        </ul>
                      </div>
                      <div class="col-md-9"></div>
                      <div class="col-md-3">
                        <input type="submit" name="" value="Guardar Rubros">
                      </div>
                    <?php echo form_close();?>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <hr style="margin-top:20px;">
                        <h3>Dirección</h3>
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
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
  function getSubCategoriesByFatherID() {
    var father_id = $('#category_id').val();
    var datapath = $('#pathData').attr('path') + 'User/get_sub_category_by_father_id/' + father_id;
    $.ajax({
      url: datapath,
      type: 'GET',
      success:function(res){
        var res = JSON.parse(res);
        if (res.length > 0) {
          var subCategoryContainer = $('#subcategory_wrapper');
          subCategoryContainer.empty();
          for (var i = 0; i < res.length; i++) {
            var subCategorWrapper =
            '<li class="col-md-6">' +
              '<div class="input-checkbox">' +
                '<input id="checkbox-' + i + '" type="checkbox" name="subcategory[]" value="' + res[i].sub_category_id + '"/>' +
                '<label for="checkbox-' + i + '"></label>' +
              '</div>' +
              '<span>' + res[i].sub_category_name + '</span>' +
            '</li>';
            $(subCategoryContainer).append(subCategorWrapper);
          }
        }else{
          var subCategoryContainer = $('#subcategory_wrapper');
          subCategoryContainer.empty();
          var subCategorWrapper =
          '<li class="col-md-12">' +
            '<p>Este rubro no tiene Sub Rubros</p>'
          '</li>';
          $(subCategoryContainer).append(subCategorWrapper);
        }
      }
    })

  };

  $('#category_id').change(function() {
    getSubCategoriesByFatherID();
  });

});
</script>
