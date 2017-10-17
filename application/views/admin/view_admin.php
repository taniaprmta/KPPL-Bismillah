<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Garuda Indonesia Group</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    
</head>

<body class="canvas-menu">
    <div id="wrapper">
        <!--<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <a class="close-canvas-menu"><i class="fa fa-times"></i></a>
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                                <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                            </span>
                            
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> 
                                    <span class="block m-t-xs"> 
                                        <strong class="font-bold">Admin</strong>
                                    </span> 

                                    <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> 
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
                        <a href="#">
                            <i class="fa fa-desktop"></i> 
                            <span class="nav-label">Survey</span>  
                            <span class="pull-right label label-primary">SPECIAL</span>
                        </a>

                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>admin/forms">Forms</a></li>
                            <li><a href="<?php echo base_url()?>admin/construct">Construct</a></li>
                            <li><a href="<?php echo base_url()?>admin">Question</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>-->

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <!--<div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#">
                            <i class="fa fa-bars"></i>
                        </a>

                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" 
                                       placeholder="Search for something..." 
                                       class="form-control" 
                                       name="top-search" 
                                       id="top-search">
                            </div>
                        </form>
                    </div>-->

                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Garuda Pulse Check.</span>
                        </li>

                        <li>
                            <a href="<?php echo base_url()?>admin/logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Garuda Indonesia Group</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <a href="<?php echo base_url()?>admin">Home</a>
                        </li>
                        <li>
                            <a>Admin</a>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content  animated fadeInRight article">
                <div class="row">
                    <!-- JKTDC -->                    
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">            
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDC</b></h2>
                                <div>
                                    <canvas id="radarChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>                    

                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <p>
                                            <button type="button" 
                                                    class="btn btn-block btn-outline btn-primary" 
                                                    data-toggle="modal" 
                                                    data-target="#myModal">
                                                <i class="fa fa-wrench"></i> Pengaturan Level
                                            </button>
                                        </p>

                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10%;">No.</th>
                                                <th class="text-center" style="width: 60%;">Level</th>
                                                <th class="text-center" style="width: 25%;">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php $n=0; foreach($list_label as $row =>$value) : $n++;?>
                                            <tr class="gradeX">
                                                <td class="text-center" style="width: 10%;"><?php echo $n; ?></td>
                                                <td><?=$value->label; ?></td>
                                                <td class="text-center">                                                       
                                                        
                                                        <button type="button" class="btn btn-xs btn-primary table-hover" data-toggle="modal" data-target="#myModal<?php echo $value->id ?>">Edit</button>

                                                        <?=anchor( 'admin/delete/' . $value->id,
                                                           'Hapus',
                                                           ['class'=>'btn btn-xs btn-danger',
                                                           'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
                                                        ])?>
                                                </td>
                                            </tr>
                                            <?php 
                                                $id=$value->id;
                                                if($this->input->post('is_submitted')){
                                                    $label      =set_value('label');
                                                } else {
                                                    $label      =$value->label;
                                                }
                                            ?>
                                            <!-- Modal Edit -->
                                            <div class="modal inmodal" id="myModal<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <i class="fa fa-laptop modal-icon"></i>
                                                            <h4 class="modal-title">Edit Level</h4>
                                                            <small class="font-bold">Sesuaikan level dengan ketentuan dari training yang telah dijalankan.</small>
                                                        </div>
                                                        <?php echo form_open_multipart('admin/edit/'.$id) ?>
                                                        <div class="modal-body">
                                                            <p><strong>Level</strong> : Kalkulasi dari semua evidence yang telah disubmit oleh masing-masing unit, semakin banyak evidence yang telah disubmit oleh masing-masing unit akan membuat level unit tersebut semakin meningkat.</p>
                                                                    <div class="form-group">
                                                                        <label>Edit Level Input</label> 
                                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                                        <input type="text" 
                                                                               name="label" 
                                                                               value="<?= $label; ?>" 
                                                                               class="form-control">
                                                                    </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        <?php echo form_close() ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </tbody>
                                    <?php endforeach; ?>
                                        <!-- Modal Tambah Label -->
                                        <div class="modal inmodal" id="myModal" 
                                             tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Tambah Level</h4>
                                                        <small class="font-bold">Input level yang ada dari setiap training yang telah dijalankan.</small>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url(). 'admin/tambah_label'?>" method="post">
                                                            <p><strong>Level</strong> : Kalkulasi dari semua evidence yang telah disubmit oleh masing-masing unit, semakin banyak evidence yang telah disubmit oleh masing-masing unit akan membuat level unit tersebut semakin meningkat.</p>
                                                            <div class="form-group">
                                                                <label>Level Input</label> 
                                                                <input type="text" placeholder="Enter your level" class="form-control" name="label">
                                                            </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- JKTDE -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDE</b></h2>
                                <div>
                                    <canvas id="radarChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JKTDF -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDF</b></h2>
                                <div>
                                    <canvas id="radarChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JKTDG -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDG</b></h2>
                                <div>
                                    <canvas id="radarChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JKTDN -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDN</b></h2>
                                <div>
                                    <canvas id="radarChart6"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <!-- JKTDI -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDI</b></h2>
                                <div>
                                    <canvas id="radarChart5"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JKTDO -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDO</b></h2>
                                <div>
                                    <canvas id="radarChart7"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JKTDO -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKT48</b></h2>
                                <div>
                                    <canvas id="radarChart7"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JKTDR -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDR</b></h2>
                                <div>
                                    <canvas id="radarChart8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JKTDZ -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2>Direktorat <b>JKTDZ</b></h2>
                                <div>
                                    <canvas id="radarChart9"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>                                       
                </div>

                <div class="hr-line-dashed"></div>

                <div class="row">
                    <!-- SINAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>SINAM</b></h2>
                                <div>
                                    <canvas id="radarChart11"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SYDAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>SYDAM</b></h2>
                                <div>
                                    <canvas id="radarChart17"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TYOAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>TYOAM</b></h2>
                                <div>
                                    <canvas id="radarChart12"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SHAAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>SHAAM</b></h2>
                                <div>
                                    <canvas id="radarChart10"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MESAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>MESAM</b></h2>
                                <div>
                                    <canvas id="radarChart14"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SUBAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>SUBAM</b></h2>
                                <div>
                                    <canvas id="radarChart15"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- UPGAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>UPGAM</b></h2>
                                <div>
                                    <canvas id="radarChart16"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>                    

                    <!-- JKTAM -->
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>JKTAM</b></h2>
                                <div>
                                    <canvas id="radarChart13"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>LON&AMS</b></h2>
                                <div>
                                    <canvas id="radarChart18"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>   

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">                        
                            <div class="ibox-content">
                                <h2><b>JED&MED</b></h2>
                                <div>
                                    <canvas id="radarChart19"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>                                                   
                </div>

                <div class="row">
                <!-- KNOB CHART _-->
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <h3 class="font-bold no-margins">
                                        Average Tiap Direktorat
                                    </h3>
                            
                                    <small>Garuda Indonesia</small>
                                </div>

                                <div class="m-t-sm">
                                    <div class="row">                                
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDC[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?>
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDC</div>
                                        </div>
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDE[0]->Evidence,2,".","."); ?>                   
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDE</div>
                                        </div>
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDF[0]->Evidence,2,".","."); ?>                  
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDF</div>
                                        </div>
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDG[0]->Evidence,2,".","."); ?>                  
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDG</div>
                                        </div>                                
                                    </div>

                                    <div class="row">                                
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDI[0]->Evidence,2,".","."); ?>                  
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDI</div>
                                        </div>
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDN[0]->Evidence,2,".","."); ?>                  
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDN</div>
                                        </div>
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDO[0]->Evidence,2,".","."); ?>                  
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDO</div>
                                        </div>                               
                                    </div>

                                    <div class="row">                                
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDR[0]->Evidence,2,".","."); ?>                  
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDR</div>
                                        </div>
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTDZ[0]->Evidence,2,".","."); ?>                  
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTDZ</div>
                                        </div>                             
                                    </div>
                                </div>
                            
                                <div class="m-t-md">                            
                                    <small>
                                        <strong>Keterangan:</strong> Setiap chart akan menampilkan average dari masing-masing level tiap unit yang ada
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>
                                    <h3 class="font-bold no-margins">
                                        Average Tiap BO
                                    </h3>
                                
                                    <small>Garuda Indonesia</small>
                                </div>

                                <div class="m-t-sm">
                                    <div class="row">
                                        <!-- SINAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgSINAM[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">SINAM</div>
                                        </div>

                                        <!-- SYDAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgSYDAM[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">SYDAM</div>
                                        </div>

                                        <!-- TYOAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgTYOAM[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">TYOAM</div>
                                        </div>

                                        <!-- SHAAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgSHAAM[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">SHAAM</div>
                                        </div>                                                                                     
                                    </div>

                                    <div class="row">
                                        <!-- MESAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgMESAM[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">MESAM</div>
                                        </div>

                                        <!-- SUBAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgSUBAM[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">SUBAM</div>
                                        </div>
                                        
                                        <!-- UPGAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgUPGAM[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">UPGAM</div>
                                        </div>

                                        <!-- JKTAM -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJKTAM[0]->Evidence,2,".","."); ?>              
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">JKTAM</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- LON&AMS -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgLON_AMS[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4"
                                                data-readonly="true">                  
                                            <div class="knob-label">LON&AMS</div>
                                        </div>

                                        <!-- JED&MED -->
                                        <div class="col-xs-6 col-md-3 text-center">
                                            <input type="text" class="knob"                                             
                                                value=<?php echo number_format($avgJED_MED[0]->Evidence,2,".","."); ?>
                                                data-min="0" 
                                                data-max=<?php echo $total_label[0]->Jumlah;?> 
                                                data-width="90" 
                                                data-height="100" 
                                                data-fgColor= "#4286f4" 
                                                data-readonly="true">                  
                                            <div class="knob-label">JED&MED</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="m-t-md">                            
                                    <small>
                                        <strong>Keterangan:</strong> Setiap chart akan menampilkan average dari masing-masing level tiap BO yang ada
                                    </small>
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
    <script src="<?php echo base_url()?>js/jquery-2.1.1.js"></script>
    <script>
        $('body.canvas-menu .sidebar-collapse').slimScroll({
                        height: '100%',
                        railOpacity: 0.9
                    });
    </script>
    <script src="<?php echo base_url();?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url();?>js/plugins/chartJs/Chart.min.js"></script>

    <!-- Knob -->
    <script src="<?php echo base_url()?>js/plugins/knob/jquery.knob.js"></script>

    <script type="text/javascript">
        //KNOB CHART//
        $(".knob").knob(
        {
            draw: function () 
                {
                    // "tron" case
                    if (this.$.data('skin') == 'tron') 
                        {
                            var a = this.angle(this.cv)  // Angle
                            , sa = this.startAngle          // Previous start angle
                            , sat = this.startAngle         // Start angle
                            , ea                            // Previous end angle
                            , eat = sat + a                 // End angle
                            , r = true;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                            && (sat = eat - 0.3)
                            && (eat = eat + 0.3);

                            if (this.o.displayPrevious) 
                                {
                                    ea = this.startAngle + this.angle(this.value);
                                    this.o.cursor
                                    && (sa = ea - 0.3)
                                    && (ea = ea + 0.3);
                                    this.g.beginPath();
                                    this.g.strokeStyle = this.previousColor;
                                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                    this.g.stroke();
                                }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                }
        });
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDC[0]->Unit; ?>", 
                 "<?php echo $dirJKTDC[1]->Unit; ?>", 
                 "<?php echo $dirJKTDC[2]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDC[0]->bukti; ?>,
                       <?php echo $dirJKTDC[1]->bukti; ?>,
                       <?php echo $dirJKTDC[2]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart1").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDE[0]->Unit; ?>", 
                 "<?php echo $dirJKTDE[1]->Unit; ?>", 
                 "<?php echo $dirJKTDE[2]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDE[0]->bukti; ?>,
                       <?php echo $dirJKTDE[1]->bukti; ?>,
                       <?php echo $dirJKTDE[2]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart2").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDF[0]->Unit; ?>", 
                 "<?php echo $dirJKTDF[1]->Unit; ?>",
                 "<?php echo $dirJKTDF[2]->Unit; ?>",
                 "<?php echo $dirJKTDF[3]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDF[0]->bukti; ?>, 
                       <?php echo $dirJKTDF[1]->bukti; ?>, 
                       <?php echo $dirJKTDF[2]->bukti; ?>, 
                       <?php echo $dirJKTDF[3]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart3").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDG[0]->Unit; ?>", 
                 "<?php echo $dirJKTDG[1]->Unit; ?>", 
                 "<?php echo $dirJKTDG[2]->Unit; ?>",
                 "<?php echo $dirJKTDG[3]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDG[0]->bukti; ?>, 
                       <?php echo $dirJKTDG[1]->bukti; ?>, 
                       <?php echo $dirJKTDG[2]->bukti; ?>,
                       <?php echo $dirJKTDG[3]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart4").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDI[0]->Unit; ?>", 
                 "<?php echo $dirJKTDI[1]->Unit; ?>", 
                 "<?php echo $dirJKTDI[2]->Unit; ?>",
                 "<?php echo $dirJKTDI[3]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDI[0]->bukti; ?>, 
                       <?php echo $dirJKTDI[1]->bukti; ?>, 
                       <?php echo $dirJKTDI[2]->bukti; ?>, 
                       <?php echo $dirJKTDI[3]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart5").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDN[0]->Unit; ?>", "<?php echo $dirJKTDN[1]->Unit; ?>",
                 "<?php echo $dirJKTDN[2]->Unit; ?>", "<?php echo $dirJKTDN[3]->Unit; ?>",
                 "<?php echo $dirJKTDN[4]->Unit; ?>", "<?php echo $dirJKTDN[5]->Unit; ?>",
                 "<?php echo $dirJKTDN[6]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDN[0]->bukti ?>, <?php echo $dirJKTDN[1]->bukti ?>,
                       <?php echo $dirJKTDN[2]->bukti; ?>, <?php echo $dirJKTDN[3]->bukti; ?>,
                       <?php echo $dirJKTDN[4]->bukti; ?>, <?php echo $dirJKTDN[5]->bukti; ?>,
                       <?php echo $dirJKTDN[6]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart6").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
</script>

<script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDO[0]->Unit; ?>", 
                 "<?php echo $dirJKTDO[1]->Unit; ?>", 
                 "<?php echo $dirJKTDO[2]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDO[0]->bukti; ?>,
                       <?php echo $dirJKTDO[1]->bukti; ?>,
                       <?php echo $dirJKTDO[2]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart7").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDR[0]->Unit; ?>", 
                 "<?php echo $dirJKTDR[1]->Unit; ?>", 
                 "<?php echo $dirJKTDR[2]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDR[0]->bukti; ?>,
                       <?php echo $dirJKTDR[1]->bukti; ?>,
                       <?php echo $dirJKTDR[2]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart8").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $dirJKTDZ[0]->Unit; ?>", 
                 "<?php echo $dirJKTDZ[1]->Unit; ?>", 
                 "<?php echo $dirJKTDZ[2]->Unit; ?>",
                 "<?php echo $dirJKTDZ[3]->Unit; ?>",
                 "<?php echo $dirJKTDZ[4]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $dirJKTDZ[0]->bukti; ?>,
                       <?php echo $dirJKTDZ[1]->bukti; ?>,
                       <?php echo $dirJKTDZ[2]->bukti; ?>,
                       <?php echo $dirJKTDZ[3]->bukti; ?>,
                       <?php echo $dirJKTDZ[4]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart9").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitSHAAM[0]->Unit; ?>", 
                 "<?php echo $unitSHAAM[1]->Unit; ?>", 
                 "<?php echo $unitSHAAM[2]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitSHAAM[0]->bukti; ?>, 
                       <?php echo $unitSHAAM[1]->bukti; ?>, 
                       <?php echo $unitSHAAM[2]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart10").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitSINAM[0]->Unit; ?>", 
                 "<?php echo $unitSINAM[1]->Unit; ?>",
                 "<?php echo $unitSINAM[2]->Unit; ?>",
                 "<?php echo $unitSINAM[3]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitSINAM[0]->bukti ?>, 
                       <?php echo $unitSINAM[1]->bukti ?>,
                       <?php echo $unitSINAM[2]->bukti ?>,
                       <?php echo $unitSINAM[3]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart11").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitTYOAM[0]->Unit; ?>", 
                 "<?php echo $unitTYOAM[1]->Unit; ?>",
                 "<?php echo $unitTYOAM[2]->Unit; ?>", 
                 "<?php echo $unitTYOAM[3]->Unit; ?>",
                 "<?php echo $unitTYOAM[4]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitTYOAM[0]->bukti ?>, 
                       <?php echo $unitTYOAM[1]->bukti ?>,
                       <?php echo $unitTYOAM[2]->bukti ?>, 
                       <?php echo $unitTYOAM[3]->bukti ?>,
                       <?php echo $unitTYOAM[4]->bukti ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart12").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitJKTAM[0]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitJKTAM[0]->bukti ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart13").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitMESAM[0]->Unit; ?>", 
                 "<?php echo $unitMESAM[1]->Unit; ?>",
                 "<?php echo $unitMESAM[2]->Unit; ?>", 
                 "<?php echo $unitMESAM[3]->Unit; ?>",
                 "<?php echo $unitMESAM[4]->Unit; ?>", 
                 "<?php echo $unitMESAM[5]->Unit; ?>",
                 "<?php echo $unitMESAM[6]->Unit; ?>", 
                 "<?php echo $unitMESAM[7]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitMESAM[0]->bukti ?>, 
                       <?php echo $unitMESAM[1]->bukti ?>,
                       <?php echo $unitMESAM[2]->bukti ?>, 
                       <?php echo $unitMESAM[3]->bukti ?>,
                       <?php echo $unitMESAM[4]->bukti ?>, 
                       <?php echo $unitMESAM[5]->bukti ?>,
                       <?php echo $unitMESAM[6]->bukti ?>, 
                       <?php echo $unitMESAM[7]->bukti ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart14").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitSUBAM[0]->Unit; ?>", 
                 "<?php echo $unitSUBAM[1]->Unit; ?>",
                 "<?php echo $unitSUBAM[2]->Unit; ?>", 
                 "<?php echo $unitSUBAM[3]->Unit; ?>",
                 "<?php echo $unitSUBAM[4]->Unit; ?>", 
                 "<?php echo $unitSUBAM[5]->Unit; ?>",
                 "<?php echo $unitSUBAM[6]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitSUBAM[0]->bukti ?>, 
                       <?php echo $unitSUBAM[1]->bukti ?>,
                       <?php echo $unitSUBAM[2]->bukti ?>, 
                       <?php echo $unitSUBAM[3]->bukti ?>,
                       <?php echo $unitSUBAM[4]->bukti ?>, 
                       <?php echo $unitSUBAM[5]->bukti ?>,
                       <?php echo $unitSUBAM[6]->bukti ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart15").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitUPGAM[0]->Unit; ?>", 
                 "<?php echo $unitUPGAM[1]->Unit; ?>",
                 "<?php echo $unitUPGAM[2]->Unit; ?>", 
                 "<?php echo $unitUPGAM[3]->Unit; ?>",
                 "<?php echo $unitUPGAM[4]->Unit; ?>", 
                 "<?php echo $unitUPGAM[5]->Unit; ?>",
                 "<?php echo $unitUPGAM[6]->Unit; ?>", 
                 "<?php echo $unitUPGAM[7]->Unit; ?>",
                 "<?php echo $unitUPGAM[8]->Unit; ?>", 
                 "<?php echo $unitUPGAM[9]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitUPGAM[0]->bukti ?>, 
                       <?php echo $unitUPGAM[1]->bukti ?>,
                       <?php echo $unitUPGAM[2]->bukti ?>, 
                       <?php echo $unitUPGAM[3]->bukti ?>,
                       <?php echo $unitUPGAM[4]->bukti ?>, 
                       <?php echo $unitUPGAM[5]->bukti ?>,
                       <?php echo $unitUPGAM[6]->bukti ?>, 
                       <?php echo $unitUPGAM[7]->bukti ?>,
                       <?php echo $unitUPGAM[8]->bukti ?>, 
                       <?php echo $unitUPGAM[9]->bukti ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart16").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitSYDAM[0]->Unit; ?>", 
                 "<?php echo $unitSYDAM[1]->Unit; ?>", 
                 "<?php echo $unitSYDAM[2]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitSYDAM[0]->bukti; ?>,
                       <?php echo $unitSYDAM[1]->bukti; ?>,
                       <?php echo $unitSYDAM[2]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart17").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitLON_AMS[0]->Unit; ?>", 
                 "<?php echo $unitLON_AMS[1]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitLON_AMS[0]->bukti; ?>,
                       <?php echo $unitLON_AMS[1]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart18").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
    $(function () {
        var radarData = {
        labels: ["<?php echo $unitJED_MED[0]->Unit; ?>", 
                 "<?php echo $unitJED_MED[1]->Unit; ?>"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.2)",
                strokeColor: "rgba(26,179,148,1)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [<?php echo $unitJED_MED[0]->bukti; ?>,
                       <?php echo $unitJED_MED[1]->bukti; ?>]
            }
        ]
    };

    var radarOptions = {
        scaleShowLine: true,
        angleShowLineOut: true,
        scaleShowLabels: false,
        scaleBeginAtZero: true,
        angleLineColor: "rgba(0,0,0,.1)",
        angleLineWidth: 1,
        pointLabelFontFamily: "'Arial'",
        pointLabelFontStyle: "normal",
        pointLabelFontSize: 10,
        pointLabelFontColor: "#666",
        pointDot: true,
        pointDotRadius: 3,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    }

    var ctx = document.getElementById("radarChart19").getContext("2d");
    var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);

});
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div style="margin-top:5px;"><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field"> Remove</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        }); 
    </script>

    <script type="text/javascript">
    <?php 
    for ($i=1;$i<=count($list_pertanyaan);$i++) {
    ?>
        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap<?php echo $i?>"); //Fields wrapper
            var add_button      = $(".add_field_button<?php echo $i?>"); //Add button ID
            
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div style="margin-top:5px;"><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field<?php echo $i?>"> Remove</a></div>'); //add input box
                }
            });
            
            $(wrapper).on("click",".remove_field<?php echo $i?>", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        }); 
    <?php } ?>
    </script>

</body>

</html>
