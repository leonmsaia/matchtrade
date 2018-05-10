<section class="imagebg image--light cover cover-blocks bg--secondary">
    <div class="background-image-holder hidden-xs">
        <img alt="background" src="<?php echo base_url();?>assets/img/promo-1.jpg" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 ">
                <div>
                    <h1>Editar Publicacion</h1>
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
              <div class="tabs-container" data-content-align="left">
                  <ul class="tabs">
                    <?php $this->load->view('pages/list/edit_advise_form/step_one');?>
                    <?php $this->load->view('pages/list/edit_advise_form/step_two');?>
                    <?php $this->load->view('pages/list/edit_advise_form/step_three');?>
                    <?php $this->load->view('pages/list/edit_advise_form/step_four');?>
                    <?php $this->load->view('pages/list/edit_advise_form/step_five');?>
                    <?php $this->load->view('pages/list/edit_advise_form/step_six');?>
                  </ul>
              </div>
          </div>
        </div>
      </div>
</section>

<script>
  function makeAlertGreen(message, type, wrapper){
    var alertMockup = '<div class="alert ' + type + '">' +
      '<div class="alert__body">' +
        '<span>' + message + '</span>' +
      '</div>' +
      '<div class="alert__close">×</div>' +
    '</div>'
    $(wrapper).append(alertMockup);
  }

  function addAdviseBaseCommission(){
    $.ajax({
      url: $('#commision_base').attr("action"),
      type: $('#commision_base').attr("method"),
      data: $('#commision_base').serialize(),
      success:function(){
        message = 'Su comision fue agregada satisfactoriamente';
        type = 'bg--success';
        wrapper = '#commision_base';
        getAdviseBaseCommission();
        makeAlertGreen(message, type, wrapper)
      }
    });
  }

  function deleteAdviseBaseCommission(baseCommisionID){
    $.ajax({
      url:  $('#pathData').attr('path') + 'List_Advise/delete_base_commission_advise/' + baseCommisionID,
      type: 'POST',
      success:function(){
        message = 'Su comision fue eliminada satisfactoriamente';
        type = 'bg--success';
        wrapper = '#commision_base';
        getAdviseBaseCommission();
        makeAlertGreen(message, type, wrapper)
      }
    });
  }

  function getAdviseBaseCommission(){
    $('#base_commision_wrapper').empty();
    var datapath = $('#pathData').attr('path') + 'List_Advise/get_base_commission_advise_list/' + $('#adviseData').attr('adviseID');
    $.ajax({
      url: datapath,
      type: 'GET',
      success:function(data){
        var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
          var totalEarn = data[i]['qty_base'] * $('#advisePrice').attr('priceBase');
          var discountedPrice = ((100 - data[i]['discount_percent']) * totalEarn)/100;
          var rowList = '<tr>' +
            '<td>' + data[i]['qty_base'] + '</td>' +
            '<td>' + data[i]['discount_percent'] + '%</td>' +
            '<td>' + data[i]['commission_percent'] + '%</td>' +
            '<td>' + discountedPrice + '</td>' +
            '<td>' + (data[i]['commission_percent'] * discountedPrice)/100 + '</td>' +
            '<td>' +
              '<button class="btn btn--primary" onclick="deleteAdviseBaseCommission(' + data[i]['base_commission_id'] + ')" id="deleteBaseCommission" type="button" name="button">' +
                'Borrar' +
              '</button>' +
            '</td>' +
          '</tr>';
          $('#base_commision_wrapper').append(rowList);
        }
      }
    });
  }

  $('#saveBaseCommission').click(function() {
    addAdviseBaseCommission();
  });

  function addSupportTab(){
    $.ajax({
      url: $('#support_tab').attr("action"),
      type: $('#support_tab').attr("method"),
      data: $('#support_tab').serialize(),
      success:function(){
        message = 'Su tab fue agregada satisfactoriamente';
        type = 'bg--success';
        wrapper = '#support_tab';
        getSupportTab();
        makeAlertGreen(message, type, wrapper)
      }
    });
  }

  function deleteSupportTab(baseCommisionID){
    $.ajax({
      url:  $('#pathData').attr('path') + 'List_Advise/delete_base_commission_advise/' + baseCommisionID,
      type: 'POST',
      success:function(){
        message = 'Su comision fue eliminada satisfactoriamente';
        type = 'bg--success';
        wrapper = '#commision_base';
        getAdviseBaseCommission();
        makeAlertGreen(message, type, wrapper)
      }
    });
  }

  function getSupportTab(){
    $('#support_tab_wrapper').empty();
    var datapath = $('#pathData').attr('path') + 'List_Advise/get_support_tab_list/' + $('#adviseData').attr('adviseID');
    $.ajax({
      url: datapath,
      type: 'GET',
      success:function(data){
        var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
          var rowList = '<tr>' +
            '<td>' + data[i]['tab_support_title'] + '</td>' +
            '<td>' + data[i]['tab_support_text'] + '</td>' +
            '<td>' + data[i]['tab_support_order'] + '</td>' +
            '<td>' +
              '<button class="btn btn--primary" onclick="deleteAdviseBaseCommission()" id="deleteBaseCommission" type="button" name="button">' +
                'Borrar' +
              '</button>' +
            '</td>' +
          '</tr>';
          $('#support_tab_wrapper').append(rowList);
        }
      }
    });
  }

  $('#saveSupportTab').click(function() {
    addSupportTab();
  });

  function getSupportTxts(){
    var datapath = $('#pathData').attr('path') + 'List_Advise/get_support_txt/' + $('#adviseData').attr('adviseID');
    $.ajax({
      url: datapath,
      type: 'GET',
      success:function(data){
        var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
          $('#txt_support_subtitle').val(data[i]['txt_support_subtitle']);
          $('#txt_support_maintext').html(data[i]['txt_support_maintext']);
          $('#txt_support_secondimg_title').val(data[i]['txt_support_secondimg_title']);
          $('#txt_support_secondimg_txt').html(data[i]['txt_support_secondimg_txt']);
        }
      }
    });
  }

  function getMainPicture() {
    var datapath = $('#pathData').attr('path') + 'List_Advise/get_support_img/' + $('#adviseData').attr('adviseID');
    $.ajax({
      url: datapath,
      type: 'GET',
      success:function(data){
        var data = JSON.parse(data);
        var imagePath = '<?php echo base_url();?>assets/uploads/' + data[0]['main_pic'];
        var imageHolder = '<img src="' + imagePath + '"/>';
        $('#main_picture_prod').empty();
        $('#main_picture_prod').html(imageHolder);
      }
    });
  }

  function getSecondaryPicture() {
    var datapath = $('#pathData').attr('path') + 'List_Advise/get_support_img/' + $('#adviseData').attr('adviseID');
    $.ajax({
      url: datapath,
      type: 'GET',
      success:function(data){
        var data = JSON.parse(data);
        var imagePath = '<?php echo base_url();?>assets/uploads/' + data[0]['second_pic'];
        var imageHolder = '<img src="' + imagePath + '"/>';
        $('#second_picture_prod').empty();
        $('#second_picture_prod').html(imageHolder);
      }
    });
  }

  $('#upload_main_pic_form').submit(function(e) {
      e.preventDefault();
      var uploadPath = '<?php echo base_url();?>' + 'upload/uploadMainPic/';
      var advise_code = $('#advise_code_identifier').val();
      $.ajaxFileUpload({
          url: uploadPath,
          secureuri: false,
          fileElementId: 'userfile',
          data: {'advise_code': advise_code},
          dataType: 'JSON'
      });
      location.reload();
      return false;
  });

  $('#upload_second_pic_form').submit(function(e) {
      e.preventDefault();
      var uploadPath = '<?php echo base_url();?>' + 'upload/uploadSecondaryPic/';
      var advise_code = $('#advise_code_identifier').val();
      $.ajaxFileUpload({
          url: uploadPath,
          secureuri: false,
          fileElementId: 'userfile_two',
          data: {'advise_code': advise_code},
          dataType: 'JSON'
      });
      location.reload();
      return false;
  });

  $('#upload_slide_pic_form').submit(function(e) {
      e.preventDefault();
      var uploadPath = '<?php echo base_url();?>' + 'upload/uploadSlidePic/';
      var advise_code = $('#advise_code_identifier').val();
      var slide_order = $('#slide_order').val();
      $.ajaxFileUpload({
          url: uploadPath,
          secureuri: false,
          fileElementId: 'slide_pic',
          data: {'advise_code': advise_code, 'slide_order': slide_order},
          dataType: 'JSON'
      });
      location.reload();
      return false;
  });


  $('#delete_img_slide_form').submit(function(e) {
      e.preventDefault();
      var advise_id = $(this).find('input[name="advise_id"]').val();
      var img_order = $(this).find('input[name="img_order"]').val();
      $.ajax({
        url:  $('#pathData').attr('path') + 'List_Advise/delete_img_slide_advise/',
        data: {'advise_id': advise_id,  'img_order': img_order},
        type: 'POST',
        success:function(){
          message = 'Su comision fue eliminada satisfactoriamente';
          type = 'bg--success';
          wrapper = '#commision_base';
          getAdviseBaseCommission();
          makeAlertGreen(message, type, wrapper)
        }
      });
      location.reload();
      return false;
  });


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

  $(document).ready(function() {
    getAdviseBaseCommission();
    getSupportTab();
    getSupportTxts();
    getMainPicture();
    getSecondaryPicture();
  });
</script>
