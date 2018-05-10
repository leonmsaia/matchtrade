<div class="col-lg-4 hidden-sm">
    <div class="sidebar boxed boxed--border boxed--lg bg--secondary">
        <div class="sidebar__widget">
            <h5>Buscar</h5>
            <?php echo form_open('Blog/Search');?>
                <div class="input-icon">
                  <i class="material-icons">search</i>
                  <input type="text" name="query" placeholder="Estoy buscando..." />
                </div>
            <?php echo form_close();?>
        </div>
        <div class="sidebar__widget">
            <h5>Text Widget</h5>
            <p>
                Our new digital products will take your workflow to all-new levels of high productivity. We know you'll find everything you need - and more! Start building with Stack.
            </p>
        </div>
        <div class="sidebar__widget">
            <h5>Categorias</h5>
            <ul>
              <?php foreach ($categories_list->result() as $catlst): ?>
                <li>
                  <a href="<?php echo base_url() . 'blog/category/' . $catlst->blog_category_slug;?>"><?php echo $catlst->blog_category_title;?></a>
                </li>
              <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
