<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
$title = '';

if (isset($_GET['hal'])) {
  $halaman = $_GET['hal'];
  switch ($halaman) {
    case 'user':
      $title = 'User | ADMIN';
      break;
    case 'customer':
      $title = 'Customer | ADMIN';
      break;
    case 'pendaftaran':
      $title = 'Pendaftaran | WASHING TIME';
      break;
    case 'jkendaraan':
      $title = 'Jenis Kendaraan | WASHING TIME';
      break;
    case 'layanan':
      $title = 'Layanan | WASHING TIME';
      break;
    case 'transaksi':
      $title = 'Transaksi | WASHING TIME';
      break;
    default:
      $title = "HOME | ZASKIA'S WASH";
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>
    <?= $title ?>
  </title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">


  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
</head>

<body class="bg-info bg-opacity-10 ">

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-9" href="#">Zaskia's Wash</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
      aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3 fs-5" href="logout.php">Logout</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-info bg-opacity-10 sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link <?= $halaman == 'dashboard' ? 'active' : ''; ?> " aria-current="page"
                href="index.php?hal=dashboard">
                <span data-feather="home" class="align-text-bottom"></span>
                Home
              </a>
              <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Admin</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                  <!-- <span data-feather="plus-circle" class="align-text-bottom"></span> -->
                </a>
              </h6>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= explode('-', $halaman)[0] == 'user' ? 'active' : ''; ?> "
                href="index.php?hal=user">
                <span data-feather="user" class="align-text-bottom"></span>
                User
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= explode('-', $halaman)[0] == 'customer' ? 'active' : ''; ?> "
                href="index.php?hal=customer">
                <span data-feather="users" class="align-text-bottom"></span>
                Customer
              </a>
            </li>
          </ul>

          <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>WASHING TIME</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <!-- <span data-feather="plus-circle" class="align-text-bottom"></span> -->
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link <?= explode('-', $halaman)[0] == 'pendaftaran' ? 'active' : ''; ?> "
                href="index.php?hal=pendaftaran">
                <span data-feather="briefcase" class="align-text-bottom"></span>
                Pendaftaran
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= explode('-', $halaman)[0] == 'jkendaraan' ? 'active' : ''; ?> "
                href="index.php?hal=jkendaraan">
                <span data-feather="truck" class="align-text-bottom"></span>
                Jenis Kendaraan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= explode('-', $halaman)[0] == 'layanan' ? 'active' : ''; ?> "
                href="index.php?hal=layanan">
                <span data-feather="tool" class="align-text-bottom"></span>
                Jenis Layanan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= explode('-', $halaman)[0] == 'transaksi' ? 'active' : ''; ?> "
                href="index.php?hal=transaksi">
                <span data-feather="credit-card" class="align-text-bottom"></span>
                Transaksi
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php
        if (isset($_GET['hal'])) {
          $halaman = $_GET['hal'];
          switch ($halaman) {
            case 'user':
              include('user/index.php');
              break;
            case 'user-create':
              include('user/create.php');
              break;
            case 'user-edit':
              include('user/edit.php');
              break;
            case 'customer':
              include('customer/index.php');
              break;
            case 'customer-create':
              include('customer/create.php');
              break;
            case 'customer-edit':
              include('customer/edit.php');
              break;
            case 'pendaftaran':
              include('pendaftaran/index.php');
              break;
            case 'pendaftaran-create':
              include('pendaftaran/create.php');
              break;
            case 'pendaftaran-edit':
              include('pendaftaran/edit.php');
              break;
            case 'jkendaraan':
              include('jkendaraan/index.php');
              break;
            case 'jkendaraan-create':
              include('jkendaraan/create.php');
              break;
            case 'jkendaraan-edit':
              include('jkendaraan/edit.php');
              break;
            case 'layanan':
              include('layanan/index.php');
              break;
            case 'layanan-create':
              include('layanan/create.php');
              break;
            case 'layanan-edit':
              include('layanan/edit.php');
              break;
            case 'transaksi':
              include('transaksi/index.php');
              break;
            case 'transaksi-create':
              include('transaksi/create.php');
              break;
            case 'transaksi-edit':
              include('transaksi/edit.php');
              break;
            default:
              include('dashboard.php');
          }
        } else {
          include('dashboard.php');
        }

        ?>
      </main>
    </div>
  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>