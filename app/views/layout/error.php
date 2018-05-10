<!doctype html>
<html lang="en">

    <?php $this->load->view('layout/assets/head');?>

    <body data-smooth-scroll-offset="77">

        <?php $this->load->view('layout/modules/navbar');?>

        <div class="main-container">

            <?php $this->load->view('pages/' . $page);?>

        </div>

        <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>

        <?php $this->load->view('layout/assets/scripts_bottom');?>
    </body>

</html>
