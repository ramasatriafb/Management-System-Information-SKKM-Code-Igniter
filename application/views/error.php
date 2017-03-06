<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Satuan Kredit Kegiatan Mahasiswa</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url("assets/img/pens.ico");?>">
    <!-- Bootstrap 3.3.5 -->
    <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>"rel="stylesheet" >
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/AdminLTE.min.css"); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url("assets/plugins/iCheck/square/blue.css"); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>Sistem Informasi Satuan Kredit Kegiatan Mahasiswa</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body"><span class="text-danger"><?php echo validation_errors(); ?></span>
  <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Halaman tidak ditemukan.</h3>
              <p>
                Maaf halaman yang Anda tuju tidak ada. 
                </p><a href="<?php echo site_url('login/index'); ?>">kembali ke halaman login</a> 
              </div>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url("assets/plugins/jQuery/jQuery-2.1.4.min.js"); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url("assets/plugins/iCheck/icheck.min.js"); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
