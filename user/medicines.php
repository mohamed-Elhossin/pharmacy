<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
$select = "SELECT * FROM `medicines`";
$s = mysqli_query($conn, $select);
?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
   
        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <?php foreach ($s as $data) {?>
                <div class="col-xs-12 col-lg-3">
                    <div class="card mt-5">
                        <img height="300" src="/pharmacy/admin/medicines/upload/<?php echo $data['image'] ?>" class="img-top" alt="Eror">
                        <div class="card-header">
                            <h6><span class="currency">LE: </span><?php echo $data['price'] ?><span class="period"></span></h6>
                        </div>
                        <div class="card-block">
                            <p> 
                              
                                <?php echo $data['description'] ?>
                                <br>
                            </p>
                            <?php if (isset($_SESSION['admin'])): ?>
                                <a href="/pharmacy/user/payment.php?booking=<?php echo $data['id'] ?>" class="btn">Buy Now</a>
                            <?php else: ?>
                                <a href="/pharmacy/user/pages-login.php" class="btn">Buy </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>

            <?php }?>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>