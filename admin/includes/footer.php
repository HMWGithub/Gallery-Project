</div>
  <!-- jQuery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  
  <!-- Summernote -->
  <script src="js/summernote.min.js"></script>
  
  <!-- Dropzone -->
  <script src="js/dropzone.js"></script>
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  
  <script src="js/scripts.js"></script>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Views',    <?php echo $session->count; ?>],
        ['Comments', <?php echo Comment::count_all(); ?>]
        ['Users',    <?php echo User::count_all(); ?>],
        ['Photos',   <?php echo Photo::count_all(); ?>],
      ]);

      var options = {
        legend: 'none',
        title: 'My Daily Activities',
        pieSliceText: 'label',
        backgroundColor: 'transparent'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</body>

</html>
