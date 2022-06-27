<?php
include 'allHead.php';
include './sharedFunc/func.php';
include './sharedFunc/db.php';
$id = $_SESSION['adminId'];
echo $id;
$select = "SELECT * FROM `admin` where id =$id ";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
echo $row['name'];
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-6 mx-auto">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="/pharmacy/admin/admins/upload/<?php echo  $_SESSION['image']  ?>" alt="Profile" class="img-fluid">
            <h2><?php echo $row['name']; ?></h2>
            <h3><?php echo $row['job']; ?></h3>
     
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php
include 'allUnder.php';
?>