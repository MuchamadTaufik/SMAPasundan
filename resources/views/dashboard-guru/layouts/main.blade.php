<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <script src="https://unpkg.com/feather-icons"></script>

   <title>Bimbingan Konseling</title>

   <!-- Custom fonts for this template-->
   <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

   <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="/css/sb-admin-2.css" rel="stylesheet">
   <link rel="stylesheet" href="/css/style.css">

   <!-- Custom styles for this page -->
   <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
   @include('sweetalert::alert')
   <!-- Page Wrapper -->
   <div id="wrapper">
      
      <!-- sidebar -->
      @include('dashboard-guru.layouts.partials.sidebar')

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

               <!-- topbar -->
               @include('dashboard-guru.layouts.partials.topbar')

               <!-- Begin Page Content -->
               <div class="container-fluid">
                  @yield('container')
               </div>
               <!-- /.container-fluid -->

         </div>
            <!-- End of Main Content -->
            @include('dashboard-guru.layouts.partials.footer')
      </div>
      <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>

   <!-- Bootstrap core JavaScript-->
   <script src="/vendor/jquery/jquery.min.js"></script>
   <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="/js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="/vendor/chart.js/Chart.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="/js/demo/chart-area-demo.js"></script>
   <script src="/js/demo/chart-pie-demo.js"></script>

   <!-- Page level plugins -->
   <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="/js/demo/datatables-demo.js"></script>
   <script>
       // Fungsi untuk memperbarui jam setiap detik
      function updateClock() {
         const now = new Date();
         const hours = String(now.getHours()).padStart(2, '0');
         const minutes = String(now.getMinutes()).padStart(2, '0');
         const seconds = String(now.getSeconds()).padStart(2, '0');
         const currentTime = `${hours}:${minutes}:${seconds}`;
         document.getElementById('clock').textContent = currentTime;
      }

       // Jalankan fungsi updateClock setiap detik
      setInterval(updateClock, 1000);

       // Panggil sekali saat halaman dimuat
      updateClock();
   </script>
</body>

</html>