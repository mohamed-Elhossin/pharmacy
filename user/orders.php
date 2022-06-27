<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';
$userId =  $_SESSION['adminId'];
$select = "SELECT payment.id , medicines.description , medicines.price FROM `payment` JOIN medicines on payment.medicinId = medicines.id 
where userId =$userId";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id =   $_GET['delete'];
    $delete = "DELETE FROM `payment` where id = $id";
    $d =  mysqli_query($conn, $delete);
    testMessage($d, "Delete payment");
    path("orders.php");
}
?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>Your Orders</h3>
        </header>

        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <table class="table tabel-dark">
                <tr>
                    <td> ID </td>
                    <td> description </td>
                    <td> amout </td>
                    <td> Delete </td>
                </tr>
                <?php foreach ($s as $data) { ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['description'] ?></td>
                        <td><?php echo $data['price'] ?></td>
                        <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/pharmacy/user/orders.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>