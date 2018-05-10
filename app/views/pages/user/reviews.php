<section class="bg--secondary space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <h3><?php echo $page_title;?></h3>
                    <h5>Referencias Totales: <?php echo $countReference;?> | Score Promedio: <?php echo $myScore;?></h5>
                    <h5>Reseñas Totales: <?php echo $countReview; ?></h5>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <hr>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <?php foreach ($reference->result() as $ref): ?>
                        <div class="col-md-4">
                            <div class="testimonial">
                                <div class="testimonial__body boxed boxed--border bg--secondary">
                                  <h4><?php echo $ref->company_legal_name;?></h4>
                                  <small><?php echo $ref->reference_date;?></small>
                                  <h5><?php echo $ref->advise_name;?></h5>
                                  <h6>Observación:</h6>
                                  <p>
                                    <b><?php echo $ref->reference_title;?></b>
                                    <br>"<?php echo $ref->reference_body; ?>"
                                  </p>
                                  <h6>Respuesta:</h6>
                                  <p>
                                    <b><?php echo $ref->reference_asociated_comment_title;?></b>
                                    <br>"<?php echo $ref->reference_asociated_comment_body;?>"
                                  </p>
                                  <h4>Score: <?php echo $ref->reference_score; ?></h4>
                                  <a href="<?php echo base_url() . 'list/advise/' . $ref->advise_code;?>" target="_blank">Ver Aviso</a>
                                </div>
                            </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
