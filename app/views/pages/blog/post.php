<?php foreach ($post_info->result() as $pst): ?>
<?php
  $post_id = $pst->blog_post_id;
?>
  <section>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8">
                  <article>
                      <div class="article__title text-center">
                          <h1 class="h2"><?php echo $pst->blog_post_title;?></h1>
                          <span><?php echo $pst->blog_post_date;?> en </span>
                          <span>
                              <a href="<?php echo base_url() . 'blog/category/' . $pst->blog_category_slug;?>"><?php echo $pst->blog_category_title;?></a>
                          </span>
                      </div>
                      <div class="article__body" style="margin-bottom:15px;">
                          <img class="img-fluid" alt="Image" src="<?php echo $pst->blog_post_mainImage;?>" style="width:100%;" />
                      </div>
                      <div class="article__body">
                        <?php echo $pst->blog_post_body;?>
                      </div>
                      <div class="article__share text-center">
                          <a class="btn bg--facebook btn--icon" href="#">
                              <span class="btn__text">
                                  <i class="socicon socicon-facebook"></i>
                                  Compartir en Facebook
                              </span>
                          </a>
                          <a class="btn bg--twitter btn--icon" href="#">
                              <span class="btn__text">
                                  <i class="socicon socicon-twitter"></i>
                                  Compartir en Twitter
                              </span>
                          </a>
                      </div>
                  </article>
              </div>
          </div>
      </div>
  </section>
<?php endforeach; ?>

<section class="space--sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <?php if ($post_comments->num_rows() > 0): ?>
                  <div class="comments">
                    <h3><?php echo $comments_number;?> Comentarios</h3>
                    <ul class="comments__list">
                      <?php foreach ($post_comments->result() as $comment): ?>
                        <li>
                          <div class="comment">
                            <div class="comment__body" style="width:100%;">
                              <h5 class="type--fine-print"><?php echo $comment->first_name;?></h5>
                              <div class="comment__meta">
                                <span><?php echo $comment->blog_post_comment_date;?></span>
                              </div>
                              <p>
                                <?php echo $comment->blog_post_comment_text;?>
                              </p>
                            </div>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php else: ?>
                  <div class="comments">
                    <h3>Aun no hay comentarios en este articulo!</h3>
                    <p>Comentá primero</p>
                  </div>
                <?php endif; ?>
                <div class="comments-form">
                  <?php if ($this->ion_auth->logged_in()): ?>
                      <h4>Dejar un Comentario</h4>
                      <?php echo form_open('Blog/save_comment', 'class="row"');?>
                          <div class="col-md-12">
                              <label>Comentario:</label>
                              <input type="hidden" name="post_id" value="<?php echo $post_id;?>" readonly>
                              <textarea rows="4" name="message" placeholder="Comentario..."></textarea>
                          </div>
                          <div class="col-md-3">
                              <button class="btn btn--primary" type="submit">Enviar Comentario</button>
                          </div>
                      <?php echo form_close();?>
                  </div>
                <?php else: ?>
                  <h4>Solo las personas registradas pueden comentar!</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section class="bg--secondary">
    <div class="container">
        <div class="row text-block">
            <div class="col-md-12">
                <h3>Quizas esto te interese...</h3>
            </div>
        </div>
        <div class="row">
          <?php foreach ($related_posts->result() as $rel): ?>
            <div class="col-md-4">
                <article class="feature feature-1">
                    <a href="<?php echo base_url() . 'blog/article/' . $rel->blog_post_slug;?>" class="block">
                        <img class="img-fluid" alt="<?php echo $rel->blog_post_title;?>" src="<?php echo $rel->blog_post_mainImage;?>" style="width:100%;"/>
                    </a>
                    <div class="feature__body boxed boxed--border">
                        <span><?php echo $rel->blog_post_title;?></span>
                        <h5><?php echo $rel->blog_post_excerpt;?></h5>
                        <a href="<?php echo base_url() . 'blog/article/' . $rel->blog_post_slug;?>">
                            Ver Mas
                        </a>
                    </div>
                </article>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
</section>
