<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_POST['send'])) {

    $price = $_POST['price'];
    $description = $_POST['description'];
    $numberOfstock = $_POST['numberOfstock'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `medicines` VALUES (NULL ,$price,'$description','$image_name' ,$numberOfstock )";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert medicines");
}

$price = '';
$description = '';
$update = false;
$numberOfstock = "";
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `medicines` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $numberOfstock = $row['numberOfStock'];
    $price = $row['price'];
    $description = $row['description'];

    if (isset($_POST['update'])) {

        $price = $_POST['price'];
        $description = $_POST['description'];
        $numberOfstock = $_POST['numberOfstock'];
        $update = "UPDATE `medicines` SET  `price` = $price,`description` = '$description' , `numberOfStock`=$numberOfstock where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated medicines");
    }
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <?php if ($update): ?>
            <h1 class="display-1 text-center text-warning"> medicines Update page </h1>
        <?php else: ?>
            <h1 class="display-1 text-center text-info">medicines Add page </h1>
        <?php endif;?>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">add Posts</li>
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
                                <div class="form-group">
                                    <label> price </label>
                                    <input required class="form-control" value="<?php echo $price ?>" name="price" type="text">
                                </div>
                                <div class="form-group">
                                    <label> Description</label>
                                    <input type="text" value="<?php echo $description ?>" required class="form-control" name="description">
                                </div>
<?php if (!$update): ?>
                                <div class="form-group">
                                    <label> Image </label>
                                    <input required class="form-control" name="image" type="file">
                                </div>
                                <?php endif;?>
                                <div class="form-group">
                                    <label> Number of stock </label>
                                    <input required  value="<?php echo $numberOfstock ?>"  class="form-control" name="numberOfstock" type="number">
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