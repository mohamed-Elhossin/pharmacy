<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_POST['send'])) { 
    $name = $_POST['name'];
    $age = $_POST['age'];
    $national_id = $_POST['national_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];


    $insert = "INSERT INTO `users` VALUES (NULL ,'$name',$age , '$email','$password' ,'$address' , '$phone')";
    $i =  mysqli_query($conn, $insert);
    header("location:/pharmacy/user/pages-login.php");
}
?>
<main id="main" class="main  my-5 pt-5">
 
    <section class="section dashboard p-5">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                     
                            <div class="form-group">
                                <label>  Name</label>
                                <input name="name" placeholder="please Enter Your Name" type="text" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label> age</label>
                                <input name="age" placeholder="please Enter Your Age" type="text" required class="form-control">
                            </div>

                    
                            <div class="form-group">
                                <label> user Email </label>
                                <input name="email" placeholder="please Enter Your Email" type="email" required class="form-control">

                            </div>
                            <div class="form-group">
                                <label> user password</label>
                                <input name="password" placeholder="please Enter Your Password" type="password" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label> user Address</label>
                                <input name="address" placeholder="please Enter Your Address" type="text" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label> phone</label>
                                <input name="phone" placeholder="please Enter Your Phone" type="text" required class="form-control">
                            </div>
                      
                            <button name="send" class="btn mt-3 btn-dark btn-block w-100"> Send Data </button>
                        </form>
                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>