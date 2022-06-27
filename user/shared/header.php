<?php
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/pharmacy/user/');
}
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="/pharmacy/user/">pharmacy
      </a></h1>
    <div class="social-links">
      <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
          <button name="logout" class="btn btn-danger text-light"> Sign Out </button>
        </form>
        <a class="btn btn-info p-3" href="/pharmacy/user/orders.php">your Orders</a>
      <?php else : ?>
        <a href="/pharmacy/user/admins/add.php" class="btn btn-dark text-light p-3 "> Sign up </a>
        <a href="/pharmacy/user/pages-login.php" class="btn btn-dark text-light p-3">Sign in</a>
      <?php endif; ?>
    </div>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/pharmacy/user/#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="/pharmacy/user/#about">About</a></li>


        <li><a class="nav-link scrollto" href="/pharmacy/user/medicines.php">medicines</a></li>
        <li><a class="nav-link scrollto" href="/pharmacy/user/#footer">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->


  </div>
</header><!-- End Header -->