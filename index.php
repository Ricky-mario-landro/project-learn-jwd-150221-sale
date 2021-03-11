<?php

session_start();
ob_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>BPPTIK Sale</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/fontawesome-free/css/all.min.css" />

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />

  <!-- iCheck -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />

  <!-- JQVMap -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/jqvmap/jqvmap.min.css" />

  <!-- Theme style -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/dist/css/adminlte.min.css" />

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />

  <!-- Daterange picker -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/daterangepicker/daterangepicker.css" />

  <!-- summernote -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/summernote/summernote-bs4.css" />

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

  <!-- DataTables -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" />

  <!-- Toastr -->
  <link rel="stylesheet" href="public_html/vendor/adminlte/plugins/toastr/toastr.min.css" />

  <!-- MyCss -->
  <link rel="stylesheet" href="public_html/css/style.css" />

  <!-- jQuery -->
  <script src="public_html/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
</head>

<body class="sidebar-mini layout-fixed layout-footer-fixed accent-navy">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include('resources/components/navbar.php'); ?>
    <!-- End-Navbar -->

    <!-- Main-Sidebar-Container -->
    <?php include('resources/components/sidebar.php'); ?>
    <!-- End-Main-Sidebar-Container -->

    <!-- Content-Wrapper -->
    <div class="content-wrapper">
      <?php

      if (isset($_GET['pref']) && isset($_GET['page'])) {
        $path = "./resources/pages/$_GET[pref]/$_GET[page].php";
        if (file_exists($path)) {
          include $path;
        } else {
          echo '
                <section class="content d-flex align-items-center" style="height:80vh">
                  <div class="error-page mt-0 d-flex">
                    <h2 class="headline text-warning"> 404</h2>
            
                    <div class="ml-5 align-self-center">
                      <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
            
                      <p class="mb-0">
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="index.php">return to dashboard</a>.
                      </p>
                    </div>
                  </div>
                </section>';
        }
      } else {
        include "./resources/pages/home/index.php";
      }

      ?>
    </div>
    <!-- End-Content-Wrapper -->

    <!-- Footer -->
    <?php include('resources/components/footer.php'); ?>
    <!-- End-Footer -->

    <!-- Control-Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
    <!-- End-Control-Sidebar -->
  </div>

  <!-- jQuery UI 1.11.4 -->
  <script src="public_html/vendor/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="public_html/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- ChartJS -->
  <script src="public_html/vendor/adminlte/plugins/chart.js/Chart.min.js"></script>

  <!-- Sparkline -->
  <script src="public_html/vendor/adminlte/plugins/sparklines/sparkline.js"></script>

  <!-- JQVMap -->
  <script src="public_html/vendor/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="public_html/vendor/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

  <!-- jQuery Knob Chart -->
  <script src="public_html/vendor/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- daterangepicker -->
  <script src="public_html/vendor/adminlte/plugins/moment/moment.min.js"></script>
  <script src="public_html/vendor/adminlte/plugins/daterangepicker/daterangepicker.js"></script>

  <!-- Tempusdominus Bootstrap 4 -->
  <script src="public_html/vendor/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Summernote -->
  <script src="public_html/vendor/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="public_html/vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <!-- AdminLTE App -->
  <script src="public_html/vendor/adminlte/dist/js/adminlte.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="public_html/vendor/adminlte/dist/js/demo.js"></script>

  <!-- DataTables -->
  <script src="public_html/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="public_html/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="public_html/vendor/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="public_html/vendor/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- Etc -->
  <script>
    //-------------
    //- TOAST -
    //--------------
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: `Helloo.. how are you? If there are bugs can email to handokoadjipangestu@gmail.com`,
        title: 'High Resolution',
        autohide: true,
        delay: 5000,
        class: 'bg-light',
        image: 'public_html/vendor/adminlte/dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });

    //-------------
    //- SWAL SUCCESS -
    //--------------
    <?php if (isset($_SESSION['success'])) : ?>
      Swal.fire(
        'Success',
        '<?= $_SESSION['success']; ?>',
        'success'
      )
      <?php
      session_unset();
      session_destroy();
      ?>
    <?php endif; ?>

    //-------------
    //- DATABLE -
    //--------------
    $('#example2').DataTable({});

    $.widget.bridge("uibutton", $.ui.button);
  </script>
</body>

</html>