<!doctype html>
<html lang="en">

    <?php $this->load->view('layout/assets/head');?>

    <body data-smooth-scroll-offset="77">

        <?php $this->load->view('layout/modules/navbar');?>

        <div class="main-container">

            <?php $this->load->view('pages/' . $page);?>


            <?php $this->load->view('layout/modules/footer');?>

        </div>
        
        <?php $this->load->view('layout/assets/scripts_bottom');?>
    </body>

</html>
