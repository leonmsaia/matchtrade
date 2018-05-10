<section class="space--sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ">
                <h2><?php echo $titleSec;?></h2>
                <p>
                  <?php echo $descSec;?>
                </p>
                <hr class="short">
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="masonry">
                    <div class="masonry__container row">
                        <div class="masonry__item col-md-6"></div>
                        <?php if ($filtered_posts->num_rows() > 0): ?>
                          <?php foreach ($filtered_posts->result() as $pst): ?>
                            <div class="masonry__item col-md-6">
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
                      <?php else: ?>
                        <div class="masonry__item col-md-12">
                          <p><?php echo $resultText;?></p>
                        </div>
                      <?php endif; ?>
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
