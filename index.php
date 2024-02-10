<?php
session_start();
include_once './inch/connectDb.php';
require_once './inch/functions.php';

$user = false;
$search = false;

if (isset($_POST['submit']) || isset($_POST['download'])) {
    $select_account = $_POST['select_account'];
    $select_product = $_POST['select_product'];
    $select_amount = $_POST['select_amount'];

    $parts = explode("-", $select_account);
// Get the first part
    $select_account = $parts[0];
    echo "$select_account";
    $userId = $select_account;
    if ($userId) {
        $lastOrderId = placeOrderAndReturnOrderId($conn, $userId, $select_product, $select_amount);
        if ($lastOrderId) {
            # code...
            if ($_POST['select_product'] == "Power of attorney") {
                if ($_POST['submit']) {
                    header("location: okalotnama.php?orderId=$lastOrderId");
                }else{
                    header("location: okalotnama.php?orderId=$lastOrderId&download");
                }
            } else if ($_POST['select_product'] == "Bail Bond") {
                header("location: bail.php?orderId=$lastOrderId");
            }
        }
    }

}

if (!isset($_GET['task'])) {
    header('location: index.php?task=select');
}

if (count($_GET) > 0) {
    # code...
    $task = $_GET['task'];
    if ($task == 'select') {

        $query = "SELECT name, phone, id FROM users";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $data = array();
            $data1 = array();
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $data1[] = $value;
                }
                $data[] = $row;
            }
            $search = $data1;
        }
    }
}

$amounts = [50, 100, 500, 700, 1000];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get recite</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .select2-container--default .select2-selection--single {
        height: 37px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-top: 2px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 3px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <?php
if (count($_SESSION) != 0) {
    if ($_SESSION['status']) {
        echo "<h2>{$_SESSION['status']}</h2>";
        session_destroy();
    }
}
?>
            <div class="card-body">
                <a href="/bail/register.php" class="my-3 btn btn-info btn-block">Create new User</a>
                <h5 class="card-title">Search Form</h5>
                <form class="row" method="POST" action="">
                    <div class="col-md-3">
                        <select require name="select_account" class="form-select h-50 js-example-basic-single"
                            id="selectInput">
                            <option disabled selected>Select Account</option>
                            <?php

echo "<script>
                                $(document).ready(function() {
    $('.js-example-basic-single').select2();
})
                            </script>";
// if ($search) {
//     for ($i = 0; $i < count($search); $i++) {
//         print_r($search);
//         echo "<option >$search[$i]</option>";
//     }
// }

foreach (getUsers($conn) as $value) {
    # code...
    echo "<option >{$value['id']}-{$value['name']}-{$value['phone']}</option>";
}
?>
                            <!-- <option value="2">Phone Number</option> -->
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select require class="form-select" id="select-product" name="select_product">
                            <option disabled selected>Select Product</option>
                            <option>Bail Bond</option>
                            <option>Power of attorney</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select require class="form-select" id="select-amount" name="select_amount">
                            <option disabled selected>Select Amount</option>
                            <?php
foreach ($amounts as $amount) {
    echo "<option >$amount</option>";
}
?>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <!-- <input type="text" class="form-control" id="textInput2" placeholder="Additional Input..."> -->
                        <!-- <button type="submit" class="btn btn-primary btn-block">Search</button> -->
                        <button type="submit" name="submit" value="1" class="btn btn-primary btn-block btn-sm">Confirm
                            Order</button>
                        <button type="submit" name="download" value="1" class="btn btn-success btn-block btn-sm">Download</button>
                    </div>
                    <div class="col-md-3">
                    </div>
                </form>
                <?php
if ($user) {
    ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <h2 class="my-3 text-center">User Found</h2>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $user['photo_url'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Name:<?php echo $user['name'] ?></h5>
                                <h5 class="card-title">Phone:<?php echo $user['phone'] ?></h5>
                                <h5 class="card-title">Status: <?php echo $user['phone'] ?></h5>
                                <p class="card-text mt-5"><small class="text-muted"><?php if ($user['status']) {
        echo "Valid user";
    } else {
        echo "Invalid user";
    }
    ?>
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
}

?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- <script src="./inch/assets/scripts/scripts.js"></script> -->
</body>

</html>