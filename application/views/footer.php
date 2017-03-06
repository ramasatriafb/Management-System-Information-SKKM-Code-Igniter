<footer class="main-footer">
                <div class="pull-right hidden-xs">
                   
                </div>
                <strong>Copyright &copy; 2015-2016 <a href="http://www.pens.ac.id"  target="_blank">Politeknik Elektronika Negeri Surabaya</a>.</strong> All rights reserved.
            </footer>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js");?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/morris/morris.min.js");?>"type="text/javascript">></script>
    
        <!-- Morris.js charts -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url("assets/plugins/morris/morris.min.js");?>" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url("assets/plugins/sparkline/jquery.sparkline.min.js");?>" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url("assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js");?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js");?>" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url("assets/plugins/knob/jquery.knob.js");?>" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url("assets/plugins/daterangepicker/daterangepicker.js");?>" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url("assets/plugins/datepicker/bootstrap-datepicker.js");?>" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js");?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url("assets/plugins/iCheck/icheck.min.js");?>" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url("assets/plugins/slimScroll/jquery.slimscroll.min.js");?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url("assets/plugins/fastclick/fastclick.min.js");?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url("assets/dist/js/app.min.js");?>" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url("assets/dist/js/demo.js");?>" type="text/javascript"></script>

        <script src="<?php echo base_url("assets/plugins/jQuery/jQuery-2.1.4.min.js");?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js");?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url("assets/plugins/fastclick/fastclick.min.js");?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url("assets/dist/js/app.min.js");?>"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url("assets/plugins/sparkline/jquery.sparkline.min.js");?>"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url("assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js");?>"></script>
        <script src="<?php echo base_url("assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js");?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatables/jquery.dataTables.min.js");?>"></script>
    
        <script src="<?php echo base_url("assets/plugins/datatables/dataTables.bootstrap.min.js");?>"></script>
   
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url("assets/plugins/slimScroll/jquery.slimscroll.min.js");?>"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url("assets/plugins/chartjs/Chart.min.js");?>"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- <script src="<?php //echo base_url("assets/dist/js/pages/dashboard2.js");?>"></script> -->
        <!-- AdminLTE for demo purposes -->
        <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url("assets/plugins/morris/morris.min.js");?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url("assets/plugins/fastclick/fastclick.min.js");?>"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url("assets/dist/js/demo.js");?>"></script>
    <!-- page script -->
    <script>
      $(function () {
        "use strict";

        //BAR CHART
        // var bar = new Morris.Bar({
        //   element: 'bar-chart',
        //   resize: true,
        //   data: [
        //     {y: 'Wajib', a: <?php foreach ($count_wajib as $co) echo $co?>},
        //     {y: 'Organisasi Mahasiswa', a: <?php foreach ($count_ormawa as $co) echo $co?>},
        //     {y: 'UKM', a: <?php foreach ($count_ukm as $co) echo $co?>},
        //     {y: 'Panitia Acara', a: <?php foreach ($count_panitia as $co) echo $co?>},
        //     {y: 'PKM', a: 5},
        //     {y: 'Mawapres', a: 7},
        //     {y: 'Perlombaan', a: 10},
        //     {y: 'Pelatihan & Seminar', a: 10},
        //     {y: 'Wirausaha', a: 1}
        //   ],
        //   barColors: ['#00a65a'],
        //   xkey: 'y',
        //   ykeys: ['a'],
        //   labels: ['Mahasiswa'],
        //   hideHover: 'auto'
        // });
        var donut = new Morris.Donut({
          element: 'donut-chart',
          resize: true,
          colors: ["#3c8dbc", "#f56954", "#00a65a","#ffff33","#99ff00","#660000","990099","#9900cc","#99ffff"],
          data: [
            {label: "Wajib", value: <?php foreach ($count_wajib as $co) echo $co?>} ,
            {label: "Organisasi Mahasiswa", value: <?php foreach ($count_ormawa as $co) echo $co?>},
            {label: "UKM", value: <?php foreach ($count_ukm as $co) echo $co?>},
            {label: "Panitia Acara", value: <?php foreach ($count_panitia as $co) echo $co?>},
            {label: "PKM", value: 3},
            {label: "Mawapres", value: 2},
            {label: "Perlombaan", value: 3},
            {label: "Pelatihan & Seminar", value: 4},
            {label: "Wirausaha", value: 2}
          ],
          hideHover: 'auto'
        });
      });
    </script>
    </body>
</html>