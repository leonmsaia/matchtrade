<section class="space--sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="masonry">
                    <div class="masonry-filter-container d-flex align-items-center">
                        <span>Categorias:</span>
                        <div class="masonry-filter-holder">
                          <div class="masonry__filters" data-filter-all-text="Todas Las Categorias"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="masonry__container row">
                        <div class="masonry__item col-md-6"></div>
                        <?php foreach ($posts_list->result() as $pst): ?>
                          <div class="masonry__item col-md-6" data-masonry-filter="<?php echo $pst->blog_category_title;?>">
                              <article class="feature feature-1">
                                  <a href="<?php echo base_url() . 'blog/article/' . $pst->blog_post_slug;?>" class="block">
                                      <img class="img-fluid" alt="Image" src="<?php echo $pst->blog_post_mainImage;?>" style="width: 100%;"/>
                                  </a>
                                  <div class="feature__body boxed boxed--border">
                                      <span><?php echo $pst->blog_post_date;?></span>
                                      <h5><?php echo $pst->blog_post_title;?></h5>
                                      <a href="<?php echo base_url() . 'blog/article/' . $pst->blog_post_slug;?>">
                                          Ver Mas
                                      </a>
                                  </div>
                              </article>
                          </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="pagination">
                        <a class="pagination__prev" href="#" title="Previous Page">&laquo;</a>
                        <ol>
                            <li>
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li class="pagination__current">3</li>
                            <li>
                                <a href="#">4</a>
                            </li>
                        </ol>
                        <a class="pagination__next" href="#" title="Next Page">&raquo;</a>
                    </div>
                </div>
            </div>
            <?php $this->load->view('pages/blog/sidebar');?>
        </div>
    </div>
</section>
