<?php
session_start();
include("config/connect.php");

header("Content-Security-Policy: default-src 'self'; script-src 'self' https://cdn.jsdelivr.net; style-src 'self' https://cdn.jsdelivr.net 'unsafe-inline'; img-src 'self' data:; font-src 'self' https://fonts.googleapis.com https://cdn.jsdelivr.net; frame-ancestors 'none'; form-action 'self'; base-uri 'self';");

if (!isset($_SESSION['uname'])) {
    header("location:index.php");
    exit();
}


$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$whereClause = "";
if (!empty($startDate) && !empty($endDate)) {
    $whereClause = "WHERE order_date BETWEEN ? AND ?";
}

$sql = "SELECT orders.order_id, orders.order_date, order_details.prod_name, order_details.prod_price, order_details.quantity 
        FROM orders 
        JOIN order_details ON orders.order_id = order_details.order_id 
        $whereClause
        ORDER BY orders.order_date DESC";

$stmt = $conn->prepare($sql);

if (!empty($startDate) && !empty($endDate)) {
    $stmt->bind_param('ss', $startDate, $endDate);
}

$stmt->execute();
$result = $stmt->get_result();

$orderReports = [];
while ($row = $result->fetch_assoc()) {
    $orderReports[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Rio Management System</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/a.jpg" type="image/x-icon" />
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ["assets/css/fonts.min.css"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>
<body>
<div class="wrapper">
    <?php include("include/sidenavigation.php"); ?>
    <div class="main-panel">
        <?php include("include/header.php"); ?>
        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div>
                        <h3 class="fw-bold mb-3">Order Reports</h3>
                        <h6 class="op-7 mb-2">Information</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Order Reports</h4>
                            <button onclick="printTable()" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="order-reports-datatables" class="display table table-striped table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cnt = 1;
                                    foreach ($orderReports as $report) {
                                        $price = floatval($report['prod_price']);
                                        $quantity = intval($report['quantity']);
                                        $total = $price * $quantity;
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $report['order_id']; ?></td>
                                            <td><?php echo $report['order_date']; ?></td>
                                            <td><?php echo $report['prod_name']; ?></td>
                                            <td><?php echo number_format($price, 2); ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td><?php echo number_format($total, 2); ?></td>
                                        </tr>
                                    <?php
                                        $cnt++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php include("include/footer.php"); ?>
    </div>
</div>

<script src="assets/js/core/jquery-3.7.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/plugin/chart.js/chart.min.js"></script>
<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/datatables/datatables.min.js"></script>
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="assets/js/kaiadmin.min.js"></script>
<script src="assets/js/sweetalert.js"></script>
<script>
$(document).ready(function () {
    $("#order-reports-datatables").DataTable({});
});

function printTable() {
    var divToPrint = document.getElementById("order-reports-datatables");
    var newWin = window.open("");
    newWin.document.write("<html><head><title>Print</title>");
    newWin.document.write('<link rel="stylesheet" href="assets/css/bootstrap.min.css" />');
    newWin.document.write('</head><body>');

    // Add the address header section
    newWin.document.write(`
        <div class="receipt" style="text-align: center;">
            <div class="address-header">
                <img src="assets/img/a.jpg" alt="navbar brand" class="navbar-brand" height="70">
                <h2>RIO MANAGEMENT</h2>
                <p>Poblacion, Madridejos, Cebu</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: riomanagement123@gmail.com</p>
            </div>
        </div>
    `);

    // Print the order reports datatable
    newWin.document.write(divToPrint.outerHTML);
    newWin.document.write('</body></html>');
    newWin.document.close();
    newWin.print();
}

</script>
</body>
</html>
