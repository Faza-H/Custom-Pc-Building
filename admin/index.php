<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-top.php');

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ultimate Builds</li>
    </ol>
    <div class="row">

        <!-- Total Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total Users
                <?php
                        $dash_user_query = "SELECT * FROM users";
                        $dash_user_query_run = mysqli_query($con, $dash_user_query);
                        if($user_total = mysqli_num_rows($dash_user_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$user_total.' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>


        <!-- Total Component/Laptop Orders -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Component/Laptop Orders
                <?php
                        // Assuming 'orders' table in 'users' db for component/laptop orders
                        $dash_component_orders_query = "SELECT * FROM orders";
                        $dash_component_orders_query_run = mysqli_query($con, $dash_component_orders_query);
                        if($component_orders_total = mysqli_num_rows($dash_component_orders_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$component_orders_total.' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="orders.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Total Custom PC Orders -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Custom PC Orders
                <?php
                        // Establishing connection to the 'pc_builder' db for custom PC orders
                        $pc_builder_con = new mysqli("localhost", "root", "", "pc_builder");
                        if ($pc_builder_con->connect_error) {
                            die("Connection failed: " . $pc_builder_con->connect_error);
                        }

                        // Fetching orders from 'orders' table in 'pc_builder' db
                        $dash_pc_orders_query = "SELECT * FROM orders";
                        $dash_pc_orders_query_run = mysqli_query($pc_builder_con, $dash_pc_orders_query);
                        if($pc_orders_total = mysqli_num_rows($dash_pc_orders_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$pc_orders_total.' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">No Data</h4>';
                        }

                        // Closing the pc_builder connection
                        $pc_builder_con->close();
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="builderorder.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
