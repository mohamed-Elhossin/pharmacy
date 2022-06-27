<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';
if (isset($_GET['booking'])) {
    $postid = $_GET['booking'];
    $userId =  $_SESSION['adminId'];
    if (isset($_POST['pay'])) {
        $insert = "INSERT INTO `payment` VALUES (NULL  ,$postid,$userId ,default )";
        $i =  mysqli_query($conn, $insert);
        testMessage($i, "the order will get you Soon");
    }
}


?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info"> Payment Page </h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <label for=""> Chose payment Way </label>
                            <br> Cash <input type="radio" name="way">
                            <br>
                            Visa <input type="radio" name="way">
                            <br>
                            <button onclick="return confirm('are you sure !')" name="pay" class="btn mt-3 btn-info btn-block w-50 mx-auto"> pay now </button>
                        </form>

                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
<?php
include './shared/footer.php';
include './shared/script.php';
?>