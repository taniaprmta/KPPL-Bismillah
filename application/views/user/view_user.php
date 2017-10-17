<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Pulse Check</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="<?php echo base_url();?>vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">  

</head>

<body class="canvas-menu">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- <div class="sidebar-collapse">
                <a class="close-canvas-menu">
                    <i class="fa fa-times"></i>
                </a>
                
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                                <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                            </span>
                            
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> 
                                    <span class="block m-t-xs"> 
                                        <strong class="font-bold"><?php echo $this->session->userdata('nama'); ?></strong>
                                    </span> 

                                    <span class="text-muted text-xs block"><?php echo $this->session->userdata('nopeg'); ?> 
                                        <b class="caret"></b>
                                    </span>
                                </span>
                            </a>

                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>

                        <div class="logo-element">
                            IN+
                        </div>
                    </li>

                    <li class="active">
                        <a href="<?php echo base_url()?>user">
                            <i class="fa fa-desktop"></i>
                            <span class="nav-label">Persebaran Nilai</span>
                        </a>
                    </li>
                </ul>
            </div> -->
        </nav>

        <div id="page-wrapper" class="gray-bg">

            <div class="row wrapper border-bottom blue-bg page-heading">
                <div class="col-sm-4">
                    <h2><strong>Welcome to Garuda Sincerity.</strong></h2>
                            <a href="<?php echo base_url()?>upload">Home</a>

                </div>
            </div>

            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>

                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Garuda Pulse Check.</span>
                        </li>

                        <li>
                            <a href="<?php echo base_url()?>user/logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row animated fadeInRight">
                    <div class="col-md-3 col-md-offset-1">
                        <div class="ibox-content text-center">
                            <h2><strong>Garuda Sincerity.</strong></h2>
                            <div class="m-b-sm">
                                    <img alt="image" class="img-circle" src="<?php echo base_url();?>assets/foto.png">
                            </div>
                                    <p class="font-bold"><?php echo $this->session->userdata('unit')?></p>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="ibox float-e-margins">
                            <!-- <div class="text-center float-e-margins p-md">
                                <span>Turn on/off color/background or orientation version: </span>
                                <a href="#" class="btn btn-xs btn-primary" id="lightVersion">Light version</a>
                                <a href="#" class="btn btn-xs btn-primary" id="darkVersion">Dark version</a>
                                <a href="#" class="btn btn-xs btn-primary" id="leftVersion">Left version</a>
                            </div> -->

                            <div class="ibox-content" id="ibox-content">
                                <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
                                <?php $y=0; $n=count($bukti_evidence); for ($i=0; $i <$n; $i++) {  ?>
                                    <?php if( $i< $total_label[0]->Jumlah) { ?>

                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <div class="vertical-timeline-content">
                                            <?php echo form_open_multipart('upload/aksi_upload')?>
                                            <div class="form-group">                                     
                                                <h2><?php echo $list_label[$i]->label; ?></h2>
                                                <div class="form-group">                                     
                                                    <input type="hidden" class="form-control" name="hamid" value="<?php echo $i; ?>" >
                                                </div>


                                                <div class="form-group">
                                                    <label>File (Max. ukuran file 2MB)</label>
                                                    <input type="file" name="berkas" >
                                                </div>
                                                 <div class="hr-line-dashed"></div>
                                                 <h4>Here your evidence : </h4>
                                                <?php if($evidence[$i]->bukti!=NULL){?>
                                                <a href="<?php echo base_url(); ?>uploads/<?php echo $evidence[$i]->bukti ?>"><?php echo $evidence[$i]->bukti ?></a>
                                                <?php } ?>                  
                                                <input type="hidden" class="form-control" name="id_evidence" value="<?php echo $evidence[$i]->id_evidence ?>" >                           
                                                <div class="hr-line-dashed"></div>
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-paper-plane"></i>  Submit
                                                </button>
                                            <?php echo form_close()?>
                                             
                                            <span class="vertical-date">
                                                Submit evidence mu untuk  <br/>
                                                <small>meningkatkan level unitmu</small>
                                            </span>
                                            
                                            </div>                                        
                                        </div>
                                    </div>
                                    <?php } ?>
                                <?php $y++; } ?>
                                <?php if( $i< $total_label[0]->Jumlah) { ?>
                                <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon blue-bg">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <div class="vertical-timeline-content">
                                            <?php echo form_open_multipart('upload/aksi_upload')?>
                                            <div class="form-group">                                     
                                                <h2><?php echo $list_label[$i]->label; ?></h2>
                                                <div class="form-group">                                     
                                                    <input type="hidden" class="form-control" name="hamid" value="<?php echo $i; ?>" >
                                                </div>

                                                <div class="form-group">
                                                    <label>File (Max. ukuran file 2MB)</label>
                                                    <input type="file" name="berkas" >
                                                </div>                    
                                                <input type="hidden" class="form-control" name="id_evidence" value="0" >                      
                                                <div class="hr-line-dashed"></div>
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-paper-plane"></i>  Submit
                                                </button>
                                            <?php echo form_close()?>
                                             
                                            <span class="vertical-date">
                                                Submit evidence mu untuk  <br/>
                                                <small>meningkatkan level unitmu</small>
                                            </span>
                                            
                                            </div>                                        
                                        </div>
                                    </div>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer">
                    <strong>Copyright</strong> Garuda Indonesia &copy; 2017
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url()?>js/inspinia.js"></script>
    <script src="<?php echo base_url()?>js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>vendors/nprogress/nprogress.js"></script>

</body>
</html>
