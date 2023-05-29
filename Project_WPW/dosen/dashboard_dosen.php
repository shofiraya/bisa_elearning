<?php
session_start();
if (!isset($_SESSION["login_dosen"])) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Halaman Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="icon.png" alt="ikon" width="80px"> D3 IT A</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="index_dosen.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table"></i> Data Mahasiswa</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-calendar-week"></i> Jadwal Kuliah</a>
                <a href="materi.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-list-check"></i> Materi Kuliah</a>
                <a href="tugas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-list-check"></i> Tugas Kuliah</a> 
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>FAQ</a>
                <a href="../contact.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-address-book"></i> Contact Us</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>User
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
            <?php
            $date=date('l, F j Y');
            $tanggal = date('l, j F Y');

            switch (date('l', strtotime($tanggal))) {
                case 'Sunday':
                    $day = 'Minggu';
                    break;
                case 'Monday':
                    $day = 'Senin';
                    break;
                case 'Tuesday':
                    $day = 'Selasa';
                    break;
                case 'Wednesday':
                    $day = 'Rabu';
                    break;
                case 'Thursday':
                    $day = 'Kamis';
                    break;
                case 'Friday':
                    $day = 'Jumat';
                    break;
                case 'Saturday':
                    $day = 'Sabtu';
                    break; 
            }
            
            switch(date('F', strtotime($tanggal))) {
                case 'January':
                    $month = 'Januari';
                    break;
                case 'February':
                    $month = 'Februari';
                    break;
                case 'March':
                    $month = 'Maret';
                    break;
                case 'April':
                    $month = 'April';
                    break;
                case 'May':
                    $month = 'Mei';
                    break;
                case 'June':
                    $month = 'Juni';
                    break;
                case 'July':
                    $month = 'Juli';
                    break; 
                case 'August':
                    $month = 'Agustus';
                    break; 
                case 'September':
                    $month = 'September';
                    break; 
                case 'October':
                    $month = 'Oktober';
                    break; 
                case 'November':
                    $month = 'November';
                    break; 
                case 'December':
                    $month = 'Desember';
                    break; 
            }
            
            echo "" .$date. "<br>";
            ?>

            </br>
            <p>Halo <b><?php echo $_SESSION['username']; ?></b> Selamat Datang di Dashboard <b><?php echo $_SESSION['level']; ?> </b>.</p>
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Data Mahasiswa</h3>
                                <p class="fs-5"></p>
                            </div>
                            <i class="fa-solid fa-graduation-cap fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Jadwal Kuliah</h3>
                                <p class="fs-5"></p>
                            </div>
                            <i class="fa-solid fa-chalkboard-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Materi</h3>
                                <p class="fs-5"></p>
                            </div>
                            <i class="fa-solid fa-building fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">Tugas</h3>
                                <p class="fs-5"></p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Increase</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/10512a1c83.js" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
