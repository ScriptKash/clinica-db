<!DOCTYPE html>
<html>
  <head>
<!--        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
-->
      <script src="assets/js/jquery-1.12.4.js" charset="utf-8"></script>
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/menu.css">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
        <!-- Buttons DataTables -->
        <link rel="stylesheet" href="assets/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
        <!--Se-->

        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/sweetalert2.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/dataTables.bootstrap.js"></script>
        <script src="assets/js/ajax_unidad.js"></script>

     <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="col col-md-12 col-sm-12 col-lg-12">
      <div class="row">
        <div class="col col-md-4" style="position:relative; right:29px;">
          <?php include('vista/menu.php');?>
        </div>
        <div class="col col-md-8">
          <?php include('vista/unidad/unidad.php'); ?>
        </div>
    </div>
  </div>
</body>
</html>
