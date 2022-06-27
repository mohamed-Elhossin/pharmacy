<?php

function testMessage($condation, $message)
{
    if ($condation) {
        echo "<div class='mt-5 alert alert-primary mx-auto w-50'>
<h3>  $message </h3>
    </div>";
    } else {
        echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
        <h3>  $message  </h3>
            </div>";
    }
}

function auth()
{
    if (isset($_SESSION['admin'])) {
    } else {
        echo "not admin";
        echo "<script>
        window.location.replace('http://localhost/pharmacy/admin/pages-login.php')
    </script>";
    }
}
auth();
function path($go)
{
    echo "<script>
    window.location.replace('http://localhost/pharmacy/admin/$go')
</script>";
}
$adminId = $_SESSION['adminId'];
