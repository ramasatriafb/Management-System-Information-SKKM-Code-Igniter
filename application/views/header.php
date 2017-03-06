<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Satuan Kredit Kegiatan Mahasiswa</title>
        <link rel="shortcut icon" href="<?php echo base_url("assets/img/pens.ico");?>">
   
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url("assets/dist/css/AdminLTE.min.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url("assets/dist/css/skins/_all-skins.min.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url("assets/plugins/iCheck/flat/blue.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url("assets/plugins/morris/morris.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url("assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url("assets/plugins/datepicker/datepicker3.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url("assets/plugins/daterangepicker/daterangepicker.css"); ?>" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"); ?>" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/datatables/dataTables.bootstrap.css"); ?>">
        <script src="<?php echo base_url("assets/plugins/chart/jquery.2.0.js"); ?>"></script>
<script src="<?php echo base_url("assets/plugins/chart/rapa.js"); ?>"></script>
<script src="<?php echo base_url("assets/plugins/chart/morris.js"); ?>"></script>
<link href="<?php echo base_url("assets/plugins/chart/morris.css"); ?>"  rel="stylesheet" type="text/css" />
    

        <link href="<?php echo base_url("assets/DataTable/jquery.dataTables.css"); ?>" rel="stylesheet" /> 
        <style type="text/css" class="init"></style>
        <script src="<?php echo base_url("assets/DataTable/jquery.js"); ?>"></script>
        <script src="<?php echo base_url("assets/DataTable/jquery.dataTables.js"); ?>"></script>
        <script src="<?php echo base_url("assets/DataTable/shCore.js"); ?>"></script>
        <script src="<?php echo base_url("assets/DataTable/demo.js"); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/daterangepicker/daterangepicker.css"); ?>">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/iCheck/all.css"); ?>">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/colorpicker/bootstrap-colorpicker.min.css"); ?>">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/timepicker/bootstrap-timepicker.min.css"); ?>">
       
        <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
      $(function () {
        $("#example3").DataTable();
        $('#example4').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
         function fcek(){
       var checkboxes = document.getElementsByName("inputcek[]");
       if (document.getElementById("cek").checked) {
         for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
             checkboxes[i].checked = true;
           }
         }
       } else {
         for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
             checkboxes[i].checked = false;
           }
         }
       }
  }
    function getkelasMahasiswa(id)
            {
                //alert('this id value :'+id);
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('administrator/getkelasMahasiswa').'/';?>'+id,
                    data: id='ID',
                    success: function(data){
                        //alert(data);
                        $('#kelasMahasiswa').html(data);
                },
});
    function fcek(){
       var checkboxes = document.getElementsByName("inputcek[]");
       if (document.getElementById("cek").checked) {
         for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
             checkboxes[i].checked = true;
           }
         }
       } else {
         for (var i = 0; i < checkboxes.length; i++) {
           if (checkboxes[i].type == 'checkbox') {
             checkboxes[i].checked = false;
           }
         }
       }
  }
}


    function getkelasMahasiswa1(id)
            {
                //alert('this id value :'+id);
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('administrator/getkelasMahasiswa1').'/';?>'+id,
                    data: id='id',
                    success: function(data){
                        //alert(data);
                        $('#kelasMahasiswa1').html(data);
                },
});
}
 function getkelasMahasiswa2(id)
            {
                //alert('this id value :'+id);
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('super_administrator/getkelasMahasiswa1').'/';?>'+id,
                    data: id='id',
                    success: function(data){
                        //alert(data);
                        $('#kelasMahasiswa2').html(data);
                },
});
}
 function getkelasMahasiswa3(id)
            {
                //alert('this id value :'+id);
                $.ajax({
                    type: "POST",
                    url: '<?php echo site_url('super_administrator/getkelasMahasiswa').'/';?>'+id,
                    data: id='id',
                    success: function(data){
                        //alert(data);
                        $('#kelasMahasiswa3').html(data);
                },
});
} $(document).on('submit', '#form-searchadmin', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  :'<?php echo site_url('administrator/carikelas1');?>',
            data : data,
            success :  function(data)
            {   
              $("#kelasMahasiswa4").html(data);
      }
            });
            return false;
        });
           $(document).ready(function()
    { $('#cariadmin').click(function(){
      var kelas = $("#kelas").val();
      var prodi = $("#prodi").val();
      var jurusan = $("#jurusan").val();
      var pararel = $("#pararel").val();
     
      var dataString = 'kelas='+ kelas + '&prodi='+ prodi + '&jurusan='+ jurusan + '&pararel='+ pararel;
            $.ajax({
            type : 'POST',
            url  : '<?php echo site_url('administrator/carikelas');?>',
            data : dataString,
            success :  function(data)
            {   
              $("#kelasMahasiswa3").html(data);
      }
            });
            return false;
  });
    });
     
        $(document).on('submit', '#form-search', function()
        {
            var data = $(this).serialize();
            $.ajax({
            type : 'POST',
            url  :'<?php echo site_url('super_administrator/carikelas1');?>',
            data : data,
            success :  function(data)
            {   
              $("#kelasMahasiswa4").html(data);
      }
            });
            return false;
        });
           $(document).ready(function()
    { $('#cari').click(function(){
      var kelas = $("#kelas").val();
      var prodi = $("#prodi").val();
      var jurusan = $("#jurusan").val();
      var pararel = $("#pararel").val();
     
      var dataString = 'kelas='+ kelas + '&prodi='+ prodi + '&jurusan='+ jurusan + '&pararel='+ pararel;
            $.ajax({
            type : 'POST',
            url  : '<?php echo site_url('super_administrator/carikelas');?>',
            data : dataString,
            success :  function(data)
            {   
              $("#kelasMahasiswa3").html(data);
      }
            });
            return false;
  });
    });
      


    </script>
        
        <script type="text/javascript">
         $(document).ready(function()
    { $('#cariTahun').click(function(){
      var tahun = $("#tahun").val();
     
      var dataString = 'tahun='+ tahun;
            $.ajax({
            type : 'POST',
            url  : '<?php echo site_url('super_administrator/caritahun');?>',
            data : dataString,
            success :  function(data)
            {   
              $("#tahunkegiatan").html(data);
      }
            });
            return false;
  });
      });</script>
        
        <script>
            //custom select box
            $(function(){
                $('select.styled').customSelect();
            });
        </script>
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a class="logo"><img src="<?php echo base_url("assets/img/Logo_PENS.png");?>"  width="50" height="50"><b>SKKM</b></a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- Notifications: style can be found in dropdown.less -->
                <!-- User Account: style can be found in dropdown.less -->
                 <div class="pull-right">
                                <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                            </div>
            </ul>
        </div>
    </nav>
</header>