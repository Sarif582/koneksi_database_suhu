<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" background="#EEF5FF">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Suhu</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
          

            <!-- Nav Item - Pages Collapse Menu -->
            

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div id="cardToUpdate" class="col-xl-4 col-md-8 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <!-- Konten card akan diperbarui melalui AJAX -->
                            </div>
                        </div>

                        <div id="cardhu" class="col-xl-4 col-md-8 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <!-- Konten card akan diperbarui melalui AJAX -->
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div id="cardgambar" class="col-xl-8 col-md-7 mb-5">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <!-- Konten card akan diperbarui melalui AJAX -->
                            </div>
                        </div>

                        
                        </div>

                        

                        </div>
                        </div>
                        </div>
                   

                

                        <script>
        function refreshCard() {
            // Menggunakan AJAX untuk memuat data suhu terbaru
            $.ajax({
                url: 'suhu.php',
                type: 'GET',
                success: function(data) {
                    // Mengganti konten card dengan data suhu terbaru
                    $('#cardToUpdate').html(data);
                },
                error: function(error) {
                    console.error('Error refreshing card:', error);
                }
            });
            $.ajax({
                url: 'suhu2.php',
                type: 'GET',
                success: function(data) {
                    // Mengganti konten card dengan data suhu terbaru
                    $('#cardgambar').html(data);
                },
                error: function(error) {
                    console.error('Error refreshing card:', error);
                }
            });
            $.ajax({
                url: 'humidity.php',
                type: 'GET',
                success: function(data) {
                    // Mengganti konten card dengan data suhu terbaru
                    $('#cardhu').html(data);
                },
                error: function(error) {
                    console.error('Error refreshing card:', error);
                }
            });
        }

        // Merefresh card setiap 5 detik
        setInterval(refreshCard, 5000);


        // Memanggil fungsi refreshCard saat halaman pertama kali dimuat
        $(document).ready(refreshCard);

    </script>
                        

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>