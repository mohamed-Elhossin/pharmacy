<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$select = "SELECT * FROM `branchs`";
$s = mysqli_query($conn, $select);
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $branchId = $_POST['branchId'];

    $insert = "INSERT INTO `pharmacist` VALUES (NULL ,'$name',$branchId)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Add pharmacist");
}

$name = '';
$branchId = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `pharmacist` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $branchId = $row['branchId'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $branchId = $_POST['branchId'];
        $update = "UPDATE `pharmacist` SET `name` = '$name', `branchId` = '$branchId' where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated pharmacist");
    }
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <?php if ($update): ?>
            <h1 class="display-1 text-center text-warning"> pharmacist Update page </h1>
        <?php else: ?>
            <h1 class="display-1 text-center text-info"> Add pharmacist </h1>
        <?php endif;?>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">add pharmacist</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="row">
                <div class="card col-lg-9">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> pharmacist Name : </label>
                                <input required class="form-control" value="<?php echo $name ?>" name="name" type="text">
                            </div>
                            <div class="form-group">
                                <label> Branch Code : </label>
                                <select required class="form-control" name="branchId" type="text">
                                      <?php foreach ($s as $data) {?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?> </option>
                                        <?php }?>
                                </select>
                            </div>
                            <?php if ($update): ?>
                                <button name="update" class="mt-4 btn btn-primary btn-block w-50 mx-auto">Update Data </button>
                            <?php else: ?>
                                <button name="send" class=" mt-4 btn btn-info btn-block w-50 mx-auto">Send Data</button>
                            <?php endif;?>
                        </form>
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