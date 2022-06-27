<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `medicines`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `medicines` where id = $id";
    $d = mysqli_query($conn, $delete);

    testMessage($d, "Delete medicines $id ");
    path('medicines/list.php');
}

if (isset($_GET['Decrease'])) {
    $id = $_GET['Decrease'];
    $select = "SELECT * from `medicines` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $numberOfstock = $row['numberOfStock'];
    $update = "UPDATE `medicines` SET   `numberOfStock`=$numberOfstock-1  where id = $id";
    $u = mysqli_query($conn, $update);
    path('medicines/list.php');
}
if (isset($_GET['increase'])) {
  $id = $_GET['increase'];
  $select = "SELECT * from `medicines` where id = $id";
  $ss = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($ss);
  $numberOfstock = $row['numberOfStock'];
  $update = "UPDATE `medicines` SET   `numberOfStock`=$numberOfstock+1  where id = $id";
  $u = mysqli_query($conn, $update);
  path('medicines/list.php');
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List medicines Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">List medicines </li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container  mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table text-light">
              <tr>
                <th>ID</th>
                <th>price</th>
                <th>description</th>
                <th>Number Of stock</th>
                <th colspan="2"> ( - / + )</th>
                <th colspan="2">Action</th>
              </tr>
              <?php foreach ($s as $data) {?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['price'] ?> </th>
                  <th> <?php echo $data['description'] ?> </th>
                  <th> <?php echo $data['numberOfStock'] ?> Unit </th>
                  <th> <a class="btn btn-danger" href="/pharmacy/admin/medicines/list.php?Decrease=<?php echo $data['id'] ?>"> - </a> </th>
                  <th> <a class="btn btn-primary" href="/pharmacy/admin/medicines/list.php?increase=<?php echo $data['id'] ?>"> + </a> </th>

                  <th> <a class="btn btn-warning" href="/pharmacy/admin/medicines/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/pharmacy/admin/medicines/list.php?delete=<?php echo $data['id'] ?>">Delete </a> </th>
                </tr>
              <?php }?>
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