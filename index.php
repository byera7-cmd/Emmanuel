<?php
// Connect to our XAMPP database engine
$conn = new mysqli("localhost", "root", "", "library_db");

// 1. Calculate dynamic statistics counters from our real database tables
$book_count_res = $conn->query("SELECT COUNT(*) AS total FROM books");
$total_books = $book_count_res ? $book_count_res->fetch_assoc()['total'] : 0;

$member_count_res = $conn->query("SELECT COUNT(*) AS total FROM members");
$total_members = $member_count_res ? $member_count_res->fetch_assoc()['total'] : 0;

// Set up default counter metrics matching your baseline design goals
$active_loans = 2;
$overdue_loans = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Library System</title>
  <!-- Link AdminLTE styles -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Top Navbar Component -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li>
      <li class="nav-item d-none d-sm-inline-block"><a href="index.php" class="nav-link">Home Dashboard</a></li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><span class="nav-link text-muted">Signed in as: <strong>homepc</strong> | <a href="#" class="text-danger">Log out</a></span></li>
    </ul>
  </nav>

  <!-- Left Sidebar Menu Component -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link"><span class="brand-text font-weight-light">📁 Library System</span></a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item"><a href="index.php" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i> <p>Dashboard</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-book"></i> <p>Books</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-list"></i> <p>Categories</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i> <p>Members</p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-exchange-alt"></i> <p>Loans</p></a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Main Grid Container Content Wrapper -->
  <div class="content-wrapper p-4">
    <div class="content-header p-0 mb-3">
      <h1>Dashboard</h1>
    </div>

    <!-- ROW 1: The 4 Colorful Summary Small Boxes -->
    <div class="row">
      
      <!-- Blue Tile Card: Total Books -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner"><h3><?php echo $total_books; ?></h3><p>Total Books</p></div>
          <div class="icon"><i class="fas fa-book"></i></div>
          <a href="#" class="small-box-footer">View books <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Green Tile Card: Total Members -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner"><h3><?php echo $total_members; ?></h3><p>Members</p></div>
          <div class="icon"><i class="fas fa-users"></i></div>
          <a href="#" class="small-box-footer">View members <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Yellow Tile Card: Active Loan Counts -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner"><h3 class="text-white"><?php echo $active_loans; ?></h3><p class="text-white">Active Loans</p></div>
          <div class="icon"><i class="fas fa-exchange-alt"></i></div>
          <a href="#" class="small-box-footer"><span class="text-white">View loans <i class="fas fa-arrow-circle-right"></i></span></a>
        </div>
      </div>

      <!-- Red Tile Card: Overdue Log Alerts -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner"><h3><?php echo $overdue_loans; ?></h3><p>Overdue Loans</p></div>
          <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
          <a href="#" class="small-box-footer">Check loans <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>

    <!-- ROW 2: Recent Transaction Logs Table Display -->
    <div class="card mt-4">
      <div class="card-header border-transparent">
        <h3 class="card-title">🔄 Recent Loan Records</h3>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0 table-striped">
            <thead>
              <tr>
                <th>Book</th>
                <th>Member</th>
                <th>Loan Date</th>
                <th>Due Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>ATOMIC HABITS</td>
                <td>abdul shija</td>
                <td>Oct. 14, 2026</td>
                <td>Oct. 28, 2026</td>
                <td><span class="badge badge-warning">Borrowed</span></td>
              </tr>
              <tr>
                <td>THINK BIG</td>
                <td>Mitchel Bisky</td>
                <td>Oct. 19, 2026</td>
                <td>Nov. 2, 2026</td>
                <td><span class="badge badge-warning">Borrowed</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>