<?php
session_start();
include("config/connect.php");

// Set timezone to Philippines
date_default_timezone_set('Asia/Manila');

// Ensure the user is logged in by checking the session
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

// Check if order_id is provided
if (!isset($_GET['order_id'])) {
    die("No order ID provided");
}

// Fetch order details
$order_id = intval($_GET['order_id']);
$order_details = [];
$sql = "SELECT * FROM order_details WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $order_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $order_details[] = $row;
}
$stmt->close();


if (isset($_POST['reserve'])) {
    // Fetch the current reservation status for this order
    $sql_check_status = "SELECT status FROM orders WHERE order_id = ?";
    $stmt_check_status = $conn->prepare($sql_check_status);
    $stmt_check_status->bind_param('i', $order_id);
    $stmt_check_status->execute();
    $stmt_check_status->bind_result($status);
    $stmt_check_status->fetch();
    $stmt_check_status->close();

    // Only proceed with the reservation if the order is temporary
    if ($status == 'Temporary') {
        // Update the status to "New Reserved"
        $sql_update = "UPDATE orders SET status = 'New Reserved' WHERE order_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param('i', $order_id);
        
        if ($stmt_update->execute()) {
            $_SESSION['reservation_success'] = true;
            header("Location: " . $_SERVER['PHP_SELF'] . "?order_id=" . $order_id);
            exit();
        }
    }
}

if (isset($_POST['cancel'])) {
    // Delete the temporary order and its details
    $conn->begin_transaction();
    try {
        // Delete order details first
        $sql_delete_details = "DELETE FROM order_details WHERE order_id = ?";
        $stmt_delete_details = $conn->prepare($sql_delete_details);
        $stmt_delete_details->bind_param('i', $order_id);
        $stmt_delete_details->execute();

        // Then delete the order
        $sql_delete_order = "DELETE FROM orders WHERE order_id = ? AND status = 'Temporary'";
        $stmt_delete_order = $conn->prepare($sql_delete_order);
        $stmt_delete_order->bind_param('i', $order_id);
        $stmt_delete_order->execute();

        $conn->commit();
        header("Location: order.php");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo '<script>
            Swal.fire({
                title: "Error!",
                text: "Failed to cancel the order.",
                icon: "error"
            });
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Rio Management System</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/a.jpg" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include("include/sidenavigation.php");?>

        <div class="main-panel">
            <!-- Header -->
            <?php include("include/header.php");?>

            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">Order Summary</h3>
                            <h6 class="op-7 mb-2">Order Details</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="display table table-striped table-hover" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $cnt = 1;
                                                $total_price = 0;
                                                foreach ($order_details as $detail) {
                                                    $price = floatval($detail['prod_price']);
                                                    $quantity = intval($detail['quantity']);
                                                    $total = $price * $quantity;
                                                    $total_price += $total;
                                                ?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $detail['prod_name']; ?></td>
                                                    <td><?php echo number_format($price, 2); ?></td>
                                                    <td><?php echo $quantity; ?></td>
                                                    <td><?php echo number_format($total, 2); ?></td>
                                                </tr>
                                                <?php
                                                    $cnt++;
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                                                    <td><?php echo number_format($total_price, 2); ?></td>
                                                </tr>
                                                <?php
                                                // Fetch the reserve date and time for this order
                                                $sql_fetch = "SELECT reserve_date, reserve_time FROM orders WHERE order_id = ?";
                                                $stmt_fetch = $conn->prepare($sql_fetch);
                                                $stmt_fetch->bind_param('i', $order_id);
                                                $stmt_fetch->execute();
                                                $stmt_fetch->bind_result($reserve_date, $reserve_time);
                                                $stmt_fetch->fetch();
                                                $stmt_fetch->close();
                                                ?>
                                                <tr>
                                                    <td colspan="4" class="text-right"><strong>Reservation Date:</strong></td>
                                                    <td><?php echo $reserve_date ? date('F j, Y', strtotime($reserve_date)) : 'Not Reserved'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="text-right"><strong>Reservation Time:</strong></td>
                                                    <td><?php echo $reserve_time ? date('g:i A', strtotime($reserve_time)) : 'Not Reserved'; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Reservation Form -->
<form method="POST" action="" style="display: inline-block;">
    <div class="button-group">
        <button type="submit" name="reserve" class="btn btn-primary">Reserve</button>
        <a href="order.php" class="btn btn-danger cancel-btn">Cancel</a>
    </div>
</form>

<!-- Add this style in the head section -->
<style>
    .button-group {
        display: flex;
        gap: 10px;
    }
    
    .button-group button,
    .button-group a {
        flex: 0 1 auto;
    }
</style>

<!-- Add this script before the closing body tag -->
<script>
document.querySelector('.cancel-btn').addEventListener('click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to cancel this reservation?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'order.php';
        }
    });
});
</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- SweetAlert Trigger -->
    <?php if (isset($_SESSION['reservation_success'])): ?>
    <script>
        Swal.fire({
            title: "Success!",
            text: "Your reservation of foods & drinks has been sent! Waiting for confirmation from the 3J'E Company.",
            icon: "success"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "order.php";
            }
        });
    </script>
    <?php unset($_SESSION['reservation_success']); endif; ?>
</body>
</html>
