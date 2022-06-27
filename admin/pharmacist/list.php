<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `pharmacist`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM `pharmacist` where id = $id";
  $d =  mysqli_query($conn, $delete);
  header('LOCATION: /pharmacy/admin/pharmacist/list.php');
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List pharmacist Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">List pharmacist</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-9 mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table text-light">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Branch Id</th>
                <th colspan="2">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['name'] ?> </th>
                  <th> <?php echo $data['branchId'] ?> </th>
                  <th> <a class="btn btn-warning" href="/pharmacy/admin/pharmacist/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/pharmacy/admin/pharmacist/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

    </div><!-- End Right side columns -->
  </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>