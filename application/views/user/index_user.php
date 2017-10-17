<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Garuda Indonesia Group</title>

    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo base_url()?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url()?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo base_url()?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/legend.css" rel="stylesheet">
</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="#" class="navbar-brand">Garuda Indonesia</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a aria-expanded="false" role="button" href="<?php echo base_url()?>user"> Dashboard</a>
                    </li>
                    <li>
                        <a aria-expanded="false" role="button" href="<?php echo base_url()?>user/edit"> My Action</a>
                    </li>
                    <?php if ($this->session->userdata('level')=='VP' || $this->session->userdata('level')=='DIR') {?>
                    <li>
                        <a aria-expanded="false" role="button" href="<?php echo base_url()?>user/monitor"> Action Monitoring</a>
                    </li>   
                    <?php } ?>
                </ul>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                           <h4><i class="fa fa-map-marker"></i>  Unit <?php echo $this->session->userdata('unit') ?> </h4>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>user/logout">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="container">
            <div class="row">
                <a href="<?php echo base_url()?>user/cetak" type="button" class="btn btn-primary btn-xs">Cetak</a>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">Comparison</span>
                            <h5>Engagement Score</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <medium>Your score in percentage</medium>
                                    <h1 class="no-margins text-navy" style="font-size: 70px;"><?php if ($score==0){ echo '0';} else echo $score[0]->rata_rata?></h1>
                                    <div class="font-bold"><h3><?php echo $this->session->userdata('unit');?></h3></div>
                                </div>
                                <div class="col-md-9">
                                <?php if ($this->session->userdata('level')=='Manager') {?>
                                    <!-- Level Manager -->
                                    <ul class="stat-list">
                                        <li>
                                            <h3 class="no-margins ">CORPORATE</h3>
                                            <small>Level Corporate</small>
                                            <div class="stat-percent"><?php echo $corporate[0]->rata_dir?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo $corporate[0]->rata_dir?>%;" class="progress-bar progress-bar-primary"></div>
                                            </div>
                                        </li>
                                        <?php $b=count($perbandingan); for ($i=$b-1; $i >=0; $i--) {  ?>
                                        <li>
                                            <h3 class="no-margins "><?php echo $perbandingan[$i]->satuan?></h3>
                                            <small>Level <?php echo $perbandingan[$i]->leveling?></small>
                                            <div class="stat-percent"><?php if ($perbandingan[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan[$i]->rata_rata?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php if ($perbandingan[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan[$i]->rata_rata?>%;" class="<?php if ($perbandingan[$i]->satuan == $this->session->userdata('unit')) {?>progress-bar progress-bar-danger <?php } else { ?>progress-bar progress-bar-primary<?php } ?>"></div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } elseif ($this->session->userdata('level')=='SM') {?>
                                    <!-- Level Manager -->
                                    <ul class="stat-list">
                                        <li>
                                            <h3 class="no-margins ">CORPORATE</h3>
                                            <small>Level Corporate</small>
                                            <div class="stat-percent"><?php echo $corporate[0]->rata_dir?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo $corporate[0]->rata_dir?>%;" class="progress-bar progress-bar-primary"></div>
                                            </div>
                                        </li>
                                        <?php $b=count($perbandingan_sm); for ($i=$b-1; $i >=0; $i--) {  ?>
                                        <li>
                                            <h3 class="no-margins "><?php echo $perbandingan_sm[$i]->satuan?></h3>
                                            <small>Level <?php echo $perbandingan_sm[$i]->leveling?></small>
                                            <div class="stat-percent"><?php if ($perbandingan_sm[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan_sm[$i]->rata_rata?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php if ($perbandingan_sm[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan_sm[$i]->rata_rata?>%;" class="<?php if ($perbandingan_sm[$i]->satuan == $this->session->userdata('unit')) {?>progress-bar progress-bar-danger <?php } else { ?>progress-bar progress-bar-primary<?php } ?>"></div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } elseif($this->session->userdata('level')=='VP'){?>
                                    <!-- Level Vice President -->
                                    <ul class="stat-list">
                                        <li>
                                            <h3 class="no-margins ">CORPORATE</h3>
                                            <small>Level Corporate</small>
                                            <div class="stat-percent"><?php echo $corporate[0]->rata_dir?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo $corporate[0]->rata_dir?>%;" class="progress-bar progress-bar-primary"></div>
                                            </div>
                                        </li>
                                        <?php $b=count($perbandingan_vp); for ($i=$b-1; $i >=0; $i--) {  ?>
                                        <li>
                                            <h3 class="no-margins "><?php echo $perbandingan_vp[$i]->satuan?></h3>
                                            <small>Level <?php echo $perbandingan_vp[$i]->leveling?></small>
                                            <div class="stat-percent"><?php if ($perbandingan_vp[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan_vp[$i]->rata_rata?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php if ($perbandingan_vp[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan_vp[$i]->rata_rata?>%;" class="<?php if ($perbandingan_vp[$i]->satuan == $this->session->userdata('unit')) {?>progress-bar progress-bar-danger <?php } else { ?>progress-bar progress-bar-primary<?php } ?>"></div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } elseif($this->session->userdata('level')=='Direktur'){?>
                                    <!-- Level Vice President -->
                                    <ul class="stat-list">
                                        <li>
                                            <h3 class="no-margins ">CORPORATE</h3>
                                            <small>Level Corporate</small>
                                            <div class="stat-percent"><?php echo $corporate[0]->rata_dir?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php echo $corporate[0]->rata_dir?>%;" class="progress-bar progress-bar-primary"></div>
                                            </div>
                                        </li>
                                        <?php $b=count($perbandingan_dir); for ($i=0; $i < $b; $i++) {  ?>
                                        <li>
                                            <h3 class="no-margins "><?php echo $perbandingan_dir[$i]->satuan?></h3>
                                            <small>Level Direktur</small>
                                            <div class="stat-percent"><?php if ($perbandingan_dir[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan_dir[$i]->rata_rata?>%</div>
                                            <div class="progress progress-mini">
                                                <div style="width: <?php if ($perbandingan_dir[$i]->rata_rata == NULL) {echo 0;} else echo $perbandingan_dir[$i]->rata_rata?>%;" class="<?php if ($perbandingan_dir[$i]->satuan == $this->session->userdata('unit')) {?>progress-bar progress-bar-danger <?php } else { ?>progress-bar progress-bar-primary<?php } ?>"></div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="ibox float-e-margins" >
                        <div class="ibox-title">
                            <h5>Engagement Level Information</h5>
                        </div>
                        <?php if ($score == 0){ ?>
                        <div class="ibox-content">
                            <h4 class="text-navy">Data penilaian belum tersedia</h4>
                        </div>
                        <?php } else { ?>
                            <?php if ($score[0]->rata_rata>=85){  ?>
                                <div class="ibox-content">
                                    <h4>Category <span class="label label-primary">Highly Engaged</span></h4>
                                    <p style="font-size: 14px;">
                                        Karyawan memiliki komitmen dan ketertarikan <strong>sangat kuat</strong> terhadap perusahaan.
                                    </p>
                                    <div class="hr-line-dashed"></div>
                                    <h5 class="text-navy">Rekomendasi</h5>
                                    <p style="font-size: 14px;">
                                        <strong>Pertahankan</strong>
                                    </p>
                                </div>
                            <?php } elseif ($score[0]->rata_rata>=75 && $score[0]->rata_rata<85){  ?>
                                <div class="ibox-content">
                                    <h4>Category <span class="label label-primary">Engaged</span></h4>
                                    <p style="font-size: 14px;">
                                        Karyawan memiliki komitmen dan ketertarikan <strong>sangat kuat</strong> terhadap perusahaan.
                                    </p>
                                    <div class="hr-line-dashed"></div>
                                    <h5 class="text-navy">Rekomendasi</h5>
                                    <p style="font-size: 14px;">
                                        <strong>Pelihara</strong>
                                    </p>
                                </div>
                            <?php } elseif ($score[0]->rata_rata>=65 && $score[0]->rata_rata<75){  ?>
                                <div class="ibox-content">
                                    <h4>Category <span class="label label-warning">Disengaged</span></h4>
                                    <p style="font-size: 14px;">
                                        Karyawan memiliki komitmen dan ketertarikan <strong>yang rendah</strong> terhadap perusahaan.
                                    </p>
                                    <div class="hr-line-dashed"></div>
                                    <h5 style="color: #f7be3b;">Rekomendasi</h5>
                                    <p style="font-size: 14px;">
                                        <strong>Tingkatkan</strong>
                                    </p>
                                </div>
                            <?php } elseif ($score[0]->rata_rata>=55 && $score[0]->rata_rata<65){  ?>
                                <div class="ibox-content">
                                    <h4>Category <span class="label label-warning">Disengaged</span></h4>
                                    <p style="font-size: 14px;">
                                        Karyawan memiliki komitmen dan ketertarikan <strong>yang rendah</strong> terhadap perusahaan.
                                    </p>
                                    <div class="hr-line-dashed"></div>
                                    <h5 style="color: #f7be3b;">Rekomendasi</h5>
                                    <p style="font-size: 14px;">
                                        <strong>Perlu Diwaspadai</strong>
                                    </p>
                                </div>
                            <?php } else {  ?>
                                <div class="ibox-content">
                                    <h4>Category <span class="label label-danger">Highly Disengaged</span></h4>
                                    <p style="font-size: 14px;">
                                        Karyawan memiliki komitmen dan ketertarikan <strong>yang rendah</strong> terhadap perusahaan.
                                    </p>
                                    <div class="hr-line-dashed"></div>
                                    <h5 style="color: #E84A5F;">Rekomendasi</h5>
                                    <p style="font-size: 14px;">
                                        <strong>Perlu Perbaikan</strong>
                                    </p>
                                </div>
                            <?php } ?>
                        <?php } ?>    
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-3">
                                    <h1 style="font-size: 40px;">Engagement</h1>
                                    <h1 style="font-size: 40px;">Dimensions</h1>
                                    <h1 style="font-size: 40px;">Score</h1>
                                    <h4 class="text-navy">For <?php echo $this->session->userdata('unit');?> Unit</h4>
                                    </div>
                                    <div class="col-lg-9">
                                        <div id="score"></div>
                                    </div>                               
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                
                                <div class="row">
                    <div class="col-lg-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Engagement Dimension Score</h5>
                            </div>
                            <div class="ibox-content">
                              <h2>TOP 3</h2>
                              <medium>Tiga dimensi dengan nilai tertinggi.</medium>
                              
                              <ul class="todo-list m-t">
                                  <?php $b=0; for ($i=0; $i < 3; $i++) { $b++; ?>
                                  <li>
                                      <span style="color:#07926d"><?php echo $b?></span>
                                      <span class="m-l-xs"><?php echo $nilai_dimensi[$i]->kriteria?></span>
                                      <small class="label label-primary" style="font-size: 12px;"></i> <?php echo $nilai_dimensi[$i]->nilai?></small>
                                  </li>
                                  <?php } ?>                         
                              </ul>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                    <h5>Top 3 Recomendation </h5>
                                    <small class="text-navy"> &nbsp; Masuk ke menu My Action untuk mengubah aksi.</small>
                            </div>

                            <?php $b=0; for ($i=0; $i < 3; $i++) { $b++; ?>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-xs-1 text-center">
                                        <div class="i-checks"><label> <input id="opsi<?php echo $b?>" type="radio" value="1" name="i-checks"> </label></div>
                                    </div>
                                    <div class="col-xs-9">
                                        <p><?php echo $nilai_dimensi[$i]->top?></p>
                                    </div>
                                    <div class="col-xs-2 text-center">
                                        <?php if ($cek_top==0) { ?>
                                            <div id="tampil_opsi<?php echo $b?>" style="display: none;">
                                                <button type="button" class="btn btn-primary btn-xs table-hover" data-toggle="modal" data-target="#<?php echo $i ?>">Add Action</button>
                                            </div>
                                       <?php } else { ?>
                                            <div id="tampil_opsi<?php echo $b?>" style="display: none;">
                                                <button type="button" disabled="true" class="btn btn-primary btn-xs table-hover" data-toggle="modal" data-target="#<?php echo $i ?>">Add Action</button>
                                            </div>
                                       <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Add Action <small class="text-navy"> Boleh diisi salah satu.</small></h4>
                                  </div>
                                  <div class="modal-body">
                                        <!-- Isi Modal -->
                                        <div class="box-body">
                                            <div class="tabs-container">

                                                <div class="tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a data-toggle="tab" href="#tab-1"> Tindak Lanjut 1</a></li>
                                                        <li class=""><a data-toggle="tab" href="#tab-2">Tidak Lanjut 2</a></li>
                                                        <li class=""><a data-toggle="tab" href="#tab-3">Tidak Lanjut 3</a></li>
                                                    </ul>
                                                    <div class="tab-content ">
                                                        <div id="tab-1" class="tab-pane active">
                                                            <div class="panel-body">
                                                                <div class="alert alert-success alert-dismissable" id="result1" style="display:block;">
                                                                </div>                                                               
                                                                <form id="myForm1" method="post" action="user/action_top1">
                                                                  <div class="row" style="margin-left: 0;">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Rekomendasi</label>
                                                                        <textarea disabled="true" style="height: 100px;" type="text" class="form-control " required name="rekomendasi" placeholder="Rekomendasi" value="<?php echo $nilai_dimensi[$i]->top;?>"><?php echo $nilai_dimensi[$i]->top; ?></textarea>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input style="height: 100px;" type="hidden" class="form-control " required name="id_rekomendasi" value="<?php echo $nilai_dimensi[$i]->id; ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Aksi</label>
                                                                        <textarea style="height: 100px;" type="text" class="form-control " required name="aksi" placeholder="Tuliskan aksi yang akan anda lakukan disini"></textarea>
                                                                      </div>
                                                                    </div>                   
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="form-group">
                                                                        <label>Kode Unit</label>
                                                                        <input type="text" class="form-control " disabled="true" name="unit" placeholder="Unit" value="<?php echo $this->session->userdata('unit') ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php if ($this->session->userdata('level')=='MGR' || $this->session->userdata('level')=='SM' || $this->session->userdata('level')=='VP') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_staf as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } elseif ($this->session->userdata('level')=='DIR') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_vp as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } ?>                                            
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                      <div class="form-group">
                                                                        <label>Frekuensi (Berapa Kali Perbulan)</label>
                                                                        <input type="text" class="form-control" name="frekuensi" placeholder="Sekali sebulan">
                                                                      </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Tanggal Mulai Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="waktu_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Batas Tanggal Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="batas_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>                                      
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div id="tab-2" class="tab-pane">
                                                            <div class="panel-body">
                                                                <div class="alert alert-success alert-dismissable" id="result2" style="display:block;">
                                                                </div>                                                               
                                                                <form id="myForm2" method="post" action="user/action_top2">
                                                                  <div class="row" style="margin-left: 0;">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Rekomendasi</label>
                                                                        <textarea disabled="true" style="height: 100px;" type="text" class="form-control " required name="rekomendasi" placeholder="Rekomendasi" value="<?php echo $nilai_dimensi[$i]->top;?>"><?php echo $nilai_dimensi[$i]->top; ?></textarea>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input style="height: 100px;" type="hidden" class="form-control " required name="id_rekomendasi" value="<?php echo $nilai_dimensi[$i]->id; ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Aksi</label>
                                                                        <textarea style="height: 100px;" type="text" class="form-control " required name="aksi" placeholder="Tuliskan aksi yang akan anda lakukan disini"></textarea>
                                                                      </div>
                                                                    </div>                   
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="form-group">
                                                                        <label>Kode Unit</label>
                                                                        <input type="text" class="form-control " disabled="true" name="unit" placeholder="Unit" value="<?php echo $this->session->userdata('unit') ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php if ($this->session->userdata('level')=='MGR' || $this->session->userdata('level')=='SM' || $this->session->userdata('level')=='VP') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_staf as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } elseif ($this->session->userdata('level')=='DIR') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_vp as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } ?>                                            
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                      <div class="form-group">
                                                                        <label>Frekuensi (Berapa Kali Perbulan)</label>
                                                                        <input type="text" class="form-control" name="frekuensi" placeholder="Sekali sebulan">
                                                                      </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Tanggal Mulai Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="waktu_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Batas Tanggal Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="batas_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>                                      
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div id="tab-3" class="tab-pane">
                                                            <div class="panel-body">
                                                                <div class="alert alert-success alert-dismissable" id="result3" style="display:block;">
                                                                </div>                                                               
                                                                <form id="myForm3" method="post" action="user/action_top3">
                                                                  <div class="row" style="margin-left: 0;">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Rekomendasi</label>
                                                                        <textarea disabled="true" style="height: 100px;" type="text" class="form-control " required name="rekomendasi" placeholder="Rekomendasi" value="<?php echo $nilai_dimensi[$i]->top;?>"><?php echo $nilai_dimensi[$i]->top; ?></textarea>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input style="height: 100px;" type="hidden" class="form-control " required name="id_rekomendasi" value="<?php echo $nilai_dimensi[$i]->id; ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Aksi</label>
                                                                        <textarea style="height: 100px;" type="text" class="form-control " required name="aksi" placeholder="Tuliskan aksi yang akan anda lakukan disini"></textarea>
                                                                      </div>
                                                                    </div>                   
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="form-group">
                                                                        <label>Kode Unit</label>
                                                                        <input type="text" class="form-control " disabled="true" name="unit" placeholder="Unit" value="<?php echo $this->session->userdata('unit') ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php if ($this->session->userdata('level')=='MGR' || $this->session->userdata('level')=='SM' || $this->session->userdata('level')=='VP') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_staf as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } elseif ($this->session->userdata('level')=='DIR') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_vp as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } ?>                                            
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                      <div class="form-group">
                                                                        <label>Frekuensi (Berapa Kali Perbulan)</label>
                                                                        <input type="text" class="form-control" name="frekuensi" placeholder="Sekali sebulan">
                                                                      </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Tanggal Mulai Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="waktu_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Batas Tanggal Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="batas_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>                                      
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- End of Tab -->
                                        
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Engagement Dimension Score</h5>
                            </div>
                            <div class="ibox-content">
                              <h2>Bottom 3</h2>
                              <medium>Tiga dimensi dengan nilai terendah.</medium>
                              
                              <ul class="todo-list m-t">
                                  <?php $b=0; for ($i=6; $i > 3; $i--) { $b++; ?>
                                  <li>
                                      <span style="color:#e23650"><?php echo $b?></span>
                                      <span class="m-l-xs"><?php echo $nilai_dimensi[$i]->kriteria?></span>
                                      <small class="label label-danger" style="font-size: 12px;"></i> <?php echo $nilai_dimensi[$i]->nilai?></small>
                                  </li>
                                  <?php } ?>                         
                              </ul>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                    <h5>Bottom 3 Recomendation </h5>
                                    <small style="color: #f7be3b;"> &nbsp; Masuk ke menu My Action untuk mengubah aksi.</small>
                            </div>

                            <?php $b=0; for ($i=6; $i > 3; $i--) { $b++; ?>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-xs-1 text-center">
                                        <div class="i-checks"><label> <input id="option<?php echo $b?>" type="radio" value="1" name="i-checks"> </label></div>
                                    </div>
                                    <div class="col-xs-9">
                                        <p><?php echo $nilai_dimensi[$i]->bottom?></p>
                                    </div>
                                    <div class="col-xs-2 text-center">
                                        <?php if ($cek_bottom==0) { ?>
                                            <div id="tampil_option<?php echo $b?>" style="display: none;">
                                                <button type="button" class="btn btn-warning btn-xs table-hover" data-toggle="modal" data-target="#<?php echo $i ?>">Add Action</button>
                                            </div>
                                       <?php } else { ?>
                                            <div id="tampil_option<?php echo $b?>" style="display: none;">
                                                <button type="button" disabled="true" class="btn btn-warning btn-xs table-hover" data-toggle="modal" data-target="#<?php echo $i ?>">Add Action</button>
                                            </div>
                                       <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Add Action <small class="text-navy"> Boleh diisi salah satu.</small></h4>
                                  </div>
                                  <div class="modal-body">
                                        <!-- Isi Modal -->
                                        <div class="box-body">
                                            <div class="tabs-container">

                                                <div class="tabs-left">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a data-toggle="tab" href="#tab-4"> Tindak Lanjut 1</a></li>
                                                        <li class=""><a data-toggle="tab" href="#tab-5">Tidak Lanjut 2</a></li>
                                                        <li class=""><a data-toggle="tab" href="#tab-6">Tidak Lanjut 3</a></li>
                                                    </ul>
                                                    <div class="tab-content ">
                                                        <div id="tab-4" class="tab-pane active">
                                                            <div class="panel-body">
                                                                <div class="alert alert-success alert-dismissable" id="result4" style="display:block;">
                                                                </div>                                                               
                                                                <form id="myForm4" method="post" action="user/action_bottom1">
                                                                  <div class="row" style="margin-left: 0;">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Rekomendasi</label>
                                                                        <textarea disabled="true" style="height: 100px;" type="text" class="form-control " required name="rekomendasi" placeholder="Rekomendasi" value="<?php echo $nilai_dimensi[$i]->bottom;?>"><?php echo $nilai_dimensi[$i]->bottom; ?></textarea>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input style="height: 100px;" type="hidden" class="form-control " required name="id_rekomendasi" value="<?php echo $nilai_dimensi[$i]->id; ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Aksi</label>
                                                                        <textarea style="height: 100px;" type="text" class="form-control " required name="aksi" placeholder="Tuliskan aksi yang akan anda lakukan disini"></textarea>
                                                                      </div>
                                                                    </div>                   
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="form-group">
                                                                        <label>Kode Unit</label>
                                                                        <input type="text" class="form-control " disabled="true" name="unit" placeholder="Unit" value="<?php echo $this->session->userdata('unit') ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php if ($this->session->userdata('level')=='MGR' || $this->session->userdata('level')=='SM' || $this->session->userdata('level')=='VP') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_staf as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } elseif ($this->session->userdata('level')=='DIR') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_vp as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } ?>                                            
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                      <div class="form-group">
                                                                        <label>Frekuensi (Berapa Kali Perbulan)</label>
                                                                        <input type="text" class="form-control" name="frekuensi" placeholder="Sekali sebulan">
                                                                      </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Tanggal Mulai Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="waktu_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Batas Tanggal Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="batas_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>                                      
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div id="tab-5" class="tab-pane">
                                                            <div class="panel-body">
                                                                <div class="alert alert-success alert-dismissable" id="result5" style="display:block;">
                                                                </div>                                                               
                                                                <form id="myForm5" method="post" action="user/action_bottom2">
                                                                  <div class="row" style="margin-left: 0;">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Rekomendasi</label>
                                                                        <textarea disabled="true" style="height: 100px;" type="text" class="form-control " required name="rekomendasi" placeholder="Rekomendasi" value="<?php echo $nilai_dimensi[$i]->bottom;?>"><?php echo $nilai_dimensi[$i]->bottom; ?></textarea>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input style="height: 100px;" type="hidden" class="form-control " required name="id_rekomendasi" value="<?php echo $nilai_dimensi[$i]->id; ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Aksi</label>
                                                                        <textarea style="height: 100px;" type="text" class="form-control " required name="aksi" placeholder="Tuliskan aksi yang akan anda lakukan disini"></textarea>
                                                                      </div>
                                                                    </div>                   
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="form-group">
                                                                        <label>Kode Unit</label>
                                                                        <input type="text" class="form-control " disabled="true" name="unit" placeholder="Unit" value="<?php echo $this->session->userdata('unit') ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php if ($this->session->userdata('level')=='MGR' || $this->session->userdata('level')=='SM' || $this->session->userdata('level')=='VP') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_staf as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } elseif ($this->session->userdata('level')=='DIR') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_vp as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } ?>                                            
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                      <div class="form-group">
                                                                        <label>Frekuensi (Berapa Kali Perbulan)</label>
                                                                        <input type="text" class="form-control" name="frekuensi" placeholder="Sekali sebulan">
                                                                      </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Tanggal Mulai Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="waktu_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Batas Tanggal Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="batas_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>                                      
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div id="tab-6" class="tab-pane">
                                                            <div class="panel-body">
                                                                <div class="alert alert-success alert-dismissable" id="result6" style="display:block;">
                                                                </div>                                                               
                                                                <form id="myForm6" method="post" action="user/action_bottom3">
                                                                  <div class="row" style="margin-left: 0;">
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Rekomendasi</label>
                                                                        <textarea disabled="true" style="height: 100px;" type="text" class="form-control " required name="rekomendasi" placeholder="Rekomendasi" value="<?php echo $nilai_dimensi[$i]->bottom;?>"><?php echo $nilai_dimensi[$i]->bottom; ?></textarea>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input style="height: 100px;" type="hidden" class="form-control " required name="id_rekomendasi" value="<?php echo $nilai_dimensi[$i]->id; ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                      <div class="form-group">
                                                                        <label>Aksi</label>
                                                                        <textarea style="height: 100px;" type="text" class="form-control " required name="aksi" placeholder="Tuliskan aksi yang akan anda lakukan disini"></textarea>
                                                                      </div>
                                                                    </div>                   
                                                                  </div>
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                      <div class="form-group">
                                                                        <label>Kode Unit</label>
                                                                        <input type="text" class="form-control " disabled="true" name="unit" placeholder="Unit" value="<?php echo $this->session->userdata('unit') ?>">
                                                                      </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php if ($this->session->userdata('level')=='MGR' || $this->session->userdata('level')=='SM' || $this->session->userdata('level')=='VP') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_staf as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } elseif ($this->session->userdata('level')=='DIR') { ?>
                                                                                <div class="form-group">
                                                                                    <label>Penanggung Jawab</label>
                                                                                      <select class="form-control" name="penanggung_jawab">
                                                                                        <?php foreach ($list_vp as $a) : ?>
                                                                                        <option value="<?php echo $a->nopeg?>"><?php echo $a->nama?></option>
                                                                                        <?php endforeach ?>
                                                                                      </select>
                                                                                </div>
                                                                        <?php } ?>                                            
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                      <div class="form-group">
                                                                        <label>Frekuensi (Berapa Kali Perbulan)</label>
                                                                        <input type="text" class="form-control" name="frekuensi" placeholder="Sekali sebulan">
                                                                      </div>
                                                                    </div>
                                                                
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Tanggal Mulai Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="waktu_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group" id="data_1">
                                                                            <label>Batas Tanggal Pelaksanaan</label>
                                                                            <div class="input-group date">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" class="form-control" name="batas_pelaksanaan">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>                                      
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane "></i>  Submit</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- End of Tab -->
                                        
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Gender </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>                            
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" style="position: relative">
                                <div id="gender"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Lokasi </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="lokasi"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Usia </h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="stat-list">
                                            <li>
                                                <?php 
                                                if ($Husia[0]->Jumlah==0) {
                                                    $nilai1=0;
                                                    $nilai2=0;
                                                    $nilai3=0;
                                                    $nilai4=0;
                                                    $nilai5=0;
                                                } else {
                                                    $nilai1=$usia[0]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai2=$usia[1]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai3=$usia[2]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai4=$usia[3]->Jumlah/$Husia[0]->Jumlah;
                                                    $nilai5=$usia[4]->Jumlah/$Husia[0]->Jumlah;
                                                }                                            
                                                ?>
                                                <h3 class="no-margins">18-30 tahun</h3>
                                                <h4><?php echo $usia[0]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai1*100,0,".","."); ?>% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai1*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>                                        
                                            <li>
                                                <h3 class="no-margins ">31-40 tahun</h3>
                                                <h4><?php echo $usia[1]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai2*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai2*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>                                            
                                                <h3 class="no-margins ">41-50 tahun</h3>
                                                <h4><?php echo $usia[2]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai3*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai3*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">51-58 tahun</h3>
                                                <h4><?php echo $usia[3]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai4*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai4*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">> 58 tahun</h3>
                                                <h4><?php echo $usia[4]->Jumlah;?></h4>
                                                <div class="stat-percent"><?php echo number_format($nilai5*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($nilai5*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Generasi </h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="stat-list">
                                            <li>
                                                <?php 
                                                if ($Hgenerasi[0]->Jumlah==0) {
                                                    $v1=0;
                                                    $v2=0;
                                                    $v3=0;
                                                    $v4=0;
                                                } else {
                                                    $v1=$generasi[0]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                    $v2=$generasi[1]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                    $v3=$generasi[2]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                    $v4=$generasi[3]->Jumlah/$Hgenerasi[0]->Jumlah;
                                                }                                            
                                                ?>
                                                <h3 class="no-margins">Baby Boomers</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v1*100,0,".","."); ?>% <i class="fa fa-level-up text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v1*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>                                        
                                            <li>
                                                <h3 class="no-margins ">Gen X</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v2*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v2*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">Gen Y</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v3*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v3*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h3 class="no-margins ">Gen Z</h3>
                                                <small><?php echo $generasi[0]->Jumlah;?></small>
                                                <div class="stat-percent"><?php echo number_format($v4*100,0,".","."); ?>% <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <?php echo number_format($v4*100,0,".","."); ?>%; height: 100%;" class="progress-bar"></div>
                                                </div>
                                            </li>                                        
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>    
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Profesi </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="profesi"></div>
                                <div id="lprofesi" class="donut-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Posisi </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="posisi"></div>
                                <div id="lposisi" class="donut-legend"></div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Pendidikan </h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div id="pendidikan"></div>
                                <div id="lpendidikan" class="donut-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Status Pegawai </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="status"></div>
                            <div id="lstatus" class="donut-legend"></div>
                        </div>
                    </div>
                </div>
                </div>


            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url();?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url();?>js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url();?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Morris -->
    <script src="<?php echo base_url()?>js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>js/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url()?>js/muter.js"></script>

    <!-- EayPIE -->
    <script src="<?php echo base_url();?>js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- svg Donut-->    
    <script src="<?php echo base_url()?>js/jquery.svgDoughnutChart.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url();?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url();?>js/demo/sparkline-demo.js"></script>

    <!-- Data picker -->
   <script src="<?php echo base_url();?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo base_url();?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo base_url();?>js/plugins/daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript">
        Morris.Bar({
        element: 'score',
        data: [
        {y: '<?php echo $nilai_dimensi[0]->kriteria;?>', a: <?php echo $nilai_dimensi[0]->nilai; ?>},
        {y: '<?php echo $nilai_dimensi[1]->kriteria;?>', a: <?php echo $nilai_dimensi[1]->nilai; ?>},
        {y: '<?php echo $nilai_dimensi[2]->kriteria;?>', a: <?php echo $nilai_dimensi[2]->nilai; ?>},
        {y: '<?php echo $nilai_dimensi[3]->kriteria;?>', a: <?php echo $nilai_dimensi[3]->nilai; ?>},
        {y: '<?php echo $nilai_dimensi[4]->kriteria;?>', a: <?php echo $nilai_dimensi[4]->nilai; ?>},
        {y: '<?php echo $nilai_dimensi[5]->kriteria;?>', a: <?php echo $nilai_dimensi[5]->nilai; ?>},
        {y: '<?php echo $nilai_dimensi[6]->kriteria;?>', a: <?php echo $nilai_dimensi[6]->nilai; ?>},
       
      ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Score',],
        hideHover: 'auto',
        resize: true,
        gridTextSize:'10px',
        gridTextFamily:'open sans',
        xLabelAngle: 50,
        barColors: function (row, series, type) {
        console.log("--> "+row.label, series, type);
        if(row.label == "<?php echo $nilai_dimensi[0]->kriteria;?>") return "#65a56a";
        else if(row.label == "<?php echo $nilai_dimensi[1]->kriteria;?>") return "#95c48b";
        else if(row.label == "<?php echo $nilai_dimensi[2]->kriteria;?>") return "#bbe098";
        else if(row.label == "<?php echo $nilai_dimensi[3]->kriteria;?>") return "#fcd58d";
        else if(row.label == "<?php echo $nilai_dimensi[4]->kriteria;?>") return "#FF847C";
        else if(row.label == "<?php echo $nilai_dimensi[5]->kriteria;?>") return "#E84A5F";
        else if(row.label == "<?php echo $nilai_dimensi[6]->kriteria;?>") return "#d1273e";
        }

        });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
       $('input[type="radio"]').click(function() {
           if($(this).attr('id') == 'option1') {
                $('#tampil_option1').show();
                $('#tampil_option2').hide();
                $('#tampil_option3').hide();            
           }
           else if($(this).attr('id') == 'option2') {
                $('#tampil_option2').show();
                $('#tampil_option1').hide();
                $('#tampil_option3').hide();            
           }
           else if($(this).attr('id') == 'option3') {
                $('#tampil_option3').show();
                $('#tampil_option2').hide();
                $('#tampil_option1').hide();            
           }
           else {
                $('#tampil_option1').hide();
                $('#tampil_option2').hide();
                $('#tampil_option3').hide();   
           }
       });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
       $('input[type="radio"]').click(function() {
           if($(this).attr('id') == 'opsi1') {
                $('#tampil_opsi1').show();
                $('#tampil_opsi2').hide();
                $('#tampil_opsi3').hide();            
           }
           else if($(this).attr('id') == 'opsi2') {
                $('#tampil_opsi2').show();
                $('#tampil_opsi1').hide();
                $('#tampil_opsi3').hide();            
           }
           else if($(this).attr('id') == 'opsi3') {
                $('#tampil_opsi3').show();
                $('#tampil_opsi1').hide();
                $('#tampil_opsi2').hide();            
           }
           else {
                $('#tampil_opsi1').hide();
                $('#tampil_opsi2').hide();
                $('#tampil_opsi3').hide();   
           }
       });
    });
    </script>

    <script type="text/javascript">
        Morris.Donut({
          element: 'posisi',
          resize: true, 
          colors: ['#87d6c6', '#54cdb4','#1ab394'],
          data: [
            {label: "Non Struktural", value: <?php echo $posisi[0]->Jumlah; ?>},
            {label: "Pimpinan Unit Kerja", value: <?php echo $posisi[1]->Jumlah; ?>},
            {label: "Struktural", value: <?php echo $posisi[2]->Jumlah; ?>}
          ],
          hideHover: 'auto'
        });
    </script>
    <script type="text/javascript">
        Morris.Bar({
        element: 'usia',
        horizontal: true,
        data: [{ y: '18-30', a: <?php echo $usia[0]->Jumlah; ?>},
            { y: '31-40', a: <?php echo $usia[1]->Jumlah; ?>},
            { y: '41-50', a: <?php echo $usia[2]->Jumlah; ?>},
            { y: '51-58', a: <?php echo $usia[3]->Jumlah; ?>},          
            { y: '>58', a: <?php echo $usia[4]->Jumlah; ?>} ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Series A',],
        hideHover: 'auto',
        resize: true,
        barColors: ['#1ab394'],

        });
    </script>
    <script type="text/javascript">
        Morris.Bar({
        element: 'generasi',
        data: [
        {y: 'Baby Boomers', a: <?php echo $generasi[0]->Jumlah; ?>},
        {y: 'X', a: <?php echo $generasi[1]->Jumlah; ?>},
        {y: 'Y', a: <?php echo $generasi[2]->Jumlah; ?>},
        {y: 'Z', a: <?php echo $generasi[3]->Jumlah; ?>}
       
      ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Series A',],
        hideHover: 'auto',
        resize: true,
        barColors: ['#5adee2'],

        });
    </script>
    <script>
        <?php 
        if (count($lokasi)==1){
            $prosen = 100;
            if ($lokasi[0]->lokasi=="Back Office") {
                $pt= $lokasi[0]->Jumlah." Orang Back Office";
                $nt= "Null";
            }
            else 
                $pt= $lokasi[0]->Jumlah." Orang Head Office";
                $nt= "Null";
        }
        else {
            $prosenB = $lokasi[0]->Jumlah/($lokasi[0]->Jumlah+$lokasi[1]->Jumlah)*100; 
            $prosenH = $lokasi[1]->Jumlah/($lokasi[0]->Jumlah+$lokasi[1]->Jumlah)*100; 
            if ($prosenB>$prosenH)
            {
                $prosen = $prosenB;
                $pt = $lokasi[0]->Jumlah." Orang Head Office";
                $nt = $lokasi[1]->Jumlah." Orang Back Office";
            } 
            else 
            { 
                $prosen = $prosenH;
                $pt = $lokasi[0]->Jumlah." Orang Head Office";
                $nt = $lokasi[1]->Jumlah." Orang Back Office";
            }
        }
        ?>
        $('#lokasi').doughnutChart({
        positiveColor: "#3BB0D6",
        negativeColor: "#ff3838",
        backgroundColor: "white",
        percentage: <?php echo $prosen?>,
        size: 250,
        doughnutSize: 0.35,
        innerText: '<?php echo number_format($prosen,0,".",".")."%";?>',
        innerTextOffset: 12,
        Title: "Responden by Lokasi",
        positiveText: "<?php echo $pt?>",
        negativeText: "<?php echo $nt?>"
    });
    </script>
    <script>
        <?php 
        if (count($gender)==1){
            $prosen = 100;
            if ($gender[0]->gender=="LAKI-LAKI") {
                $pt= $gender[0]->Jumlah." Orang Laki-laki";
                $nt= "Null";
            }
            else 
                $pt= $gender[0]->Jumlah." Orang Perempuan";
                $nt= "Null";
        }
        else {
            $prosenL = $gender[0]->Jumlah/($gender[0]->Jumlah+$gender[1]->Jumlah)*100; 
            $prosenP = $gender[1]->Jumlah/($gender[0]->Jumlah+$gender[1]->Jumlah)*100; 
            if ($prosenL>$prosenP)
            {
                $prosen = $prosenL;
                $pt = $gender[0]->Jumlah." Orang Laki-laki";
                $nt = $gender[1]->Jumlah." Orang Perempuan";
            } 
            else 
            { 
                $prosen = $prosenP;
                $pt = $gender[0]->Jumlah." Orang Laki-laki";
                $nt = $gender[1]->Jumlah." Orang Perempuan";
            }
        }
        ?>
        $('#gender').doughnutChart({
        positiveColor: "#3BB0D6",
        negativeColor: "#ff3838",
        backgroundColor: "white",
        percentage: <?php echo $prosen?>,
        size: 250,
        doughnutSize: 0.35,
        innerText: '<?php echo number_format($prosen,0,".",".")."%";?>',
        innerTextOffset: 12,
        Title: "Responden by Gender",
        positiveText: "<?php echo $pt?>",
        negativeText: "<?php echo $nt?>"
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'status',

          <?php $pembagi=$Hstatus[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    foreach ($status as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->status_pegawai; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lstatus').append(legendItem)
          })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'profesi',
          <?php $pembagi=$Hprofesi[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    $pembagi=$Hprofesi[0]->Hasil; 
                    foreach ($profesi as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->profesi; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lprofesi').append(legendItem)
          })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'posisi',

          <?php $pembagi=$Hposisi[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    $pembagi=$Hposisi[0]->Hasil; 
                    foreach ($posisi as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->posisi; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lposisi').append(legendItem)
          })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
          var color_array = ['#00b6ff','#1af22c', '#ff3838', '#F28C4B', '#7E6F6A', '#36AFB2', '#9c6db2', '#d24a67', '#89a958', '#00739a', '#BDBDBD'];
          var browsersChart = Morris.Donut({
            element: 'pendidikan',

          <?php $pembagi=$Hpendidikan[0]->Hasil;?>
          formatter: function (value, data) { return (Math.round((value/<?php echo $pembagi;?> *100)*10)/10) + '%'; },
            data   : [<?php
                    
                    foreach ($pendidikan as $key => $value) {
                    ?>
                      {value: <?php echo $value->Jumlah; ?>, label: '<?php echo $value->pendidikan; ?>', formatted: '<?php echo $value->Jumlah; ?>' },
                   <?php 
                    }
                   ?>],
            colors: color_array
          });
          browsersChart.options.data.forEach(function(label, i){            
            var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<i>&nbsp;</i>');
            legendItem.find('i').css('backgroundColor', browsersChart.options.colors[i]);
            $('#lpendidikan').append(legendItem)
          })
        });
    </script> 
    <script>
        $(document).ready(function() {

            $().ajaxStart(function() {
                $('#result1').hide();
            }).ajaxStop(function() {
                $('#result1').show('');
            });

            $('#myForm1').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#result1').html(data);
                    }
                })
                return false;
            });
        })

    </script> 
    <script>
        $(document).ready(function() {

            $().ajaxStart(function() {
                $('#result2').hide();
            }).ajaxStop(function() {
                $('#result2').show('');
            });

            $('#myForm2').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#result2').html(data);
                    }
                })
                return false;
            });
        })

    </script>
    <script>
        $(document).ready(function() {

            $().ajaxStart(function() {
                $('#result3').hide();
            }).ajaxStop(function() {
                $('#result3').show('');
            });

            $('#myForm3').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#result3').html(data);
                    }
                })
                return false;
            });
        })

    </script>
    <script>
        $(document).ready(function() {

            $().ajaxStart(function() {
                $('#result4').hide();
            }).ajaxStop(function() {
                $('#result4').show('');
            });

            $('#myForm4').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#result4').html(data);
                    }
                })
                return false;
            });
        })

    </script> 
    <script>
        $(document).ready(function() {

            $().ajaxStart(function() {
                $('#result5').hide();
            }).ajaxStop(function() {
                $('#result5').show('');
            });

            $('#myForm5').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#result5').html(data);
                    }
                })
                return false;
            });
        })

    </script>
    <script>
        $(document).ready(function() {

            $().ajaxStart(function() {
                $('#result6').hide();
            }).ajaxStop(function() {
                $('#result6').show('');
            });

            $('#myForm6').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#result6').html(data);
                    }
                })
                return false;
            });
        })

    </script>
</body>
</html>
    