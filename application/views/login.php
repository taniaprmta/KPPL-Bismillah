<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/gi.ico">
    <title>Garuda Indonesia Group | Login</title>

    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">

</head>
<body class="gray-bg" style="display: table;
    position: relative;
    width: 100%;
    height: 100%;
    background: url(assets/login_background.png) no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;">

    <div class="col-md-4 col-md-offset-8">
        <div class="loginscreen animated fadeInDown">
            <div class="middle-box text-center pull-right" style="background-color: white; padding:50px; margin: 60px 100px 100px 0">
                <div class="ibox float-e-margins">
                    <div class="box-content">
                        <h2>Pulse Check</h2>

                        <p><strong>Login in.</strong> To submit your evidence.</p>
                            <div class="panel-body">
                                <form class="m-t" role="form" action="<?php echo base_url()."login/unit"?>" method="POST">
                                    <div class="form-group">
                                        <label>Kode Unit</label>
                                        <input type="text" class="form-control" placeholder="Contoh: JKTIDE" name="unit" required="">
                                    </div>
                                    <button type="submit" class="btn btn-info block full-width m-b">Login</button>

                                    <!-- <p class="text-muted text-center">
                                        <small>Masukkan kode unit tempat anda bekerja untuk melakukan submit evidence after training anda</small>
                                    </p> -->
                                </form>                                     
                            </div>
                            
                        <div class="hr-line-dashed" style="border-color: #b2b2b2"></div>
                        <strong>Copyright</strong> &copy; 2017 Garuda Indonesia. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Mainly scripts -->
    <script src="<?php echo base_url();?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>js/inspinia.js"></script>
    <script src="<?php echo base_url();?>js/plugins/pace/pace.min.js"></script>
</body>

</html>
