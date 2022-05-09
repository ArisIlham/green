    
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/asset/assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('/asset/assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/asset/assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/asset/assets/');?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('/asset/assets/');?>vendor/chart.js/chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('/asset/assets/');?>js/demo/chart-area-demo.js"></script>
    <!-- <script src="<?php echo base_url('/asset/assets/');?>js/demo/chart-pie-demo.js"></script> -->

    <script src="<?php echo base_url('/asset/assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('/asset/assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('/asset/assets/');?>js/demo/datatables-demo.js"></script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Hadir", "Tidak Hadir", "Izin"],
    datasets: [{
      data: [<?php echo $hadir?>, <?php echo $tidakhadir?>, <?php echo $izin?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

    </script>
    
</body>