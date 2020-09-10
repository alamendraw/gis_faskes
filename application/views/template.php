<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="GIS">
    <meta name="keywords" content="Murfa Surya Mahardika">
    <meta name="author" content="GIS">
    <title>Gis Faskes</title>

    <?php $this->load->view('css');?> 

</head>
 
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <?php $this->load->view('menu');?>
 
    <div class="app-content content">

        <?php $this->load->view('header');?>

        <div class="content-wrapper">
            <div class="content-header row"> </div>
            <div >
                <?php echo $output;?>
            </div>
        </div>
    </div> 

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">&copy; 2020<a class="text-bold-800 grey darken-2" href="http://www.msmgroup.co.id/
" target="_blank">MSM,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block"> <!-- text --> </span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


   <?php $this->load->view('js');?>

</body>
<!-- END: Body-->

</html>
 