<?php
include('authentication.php');
include('includes/header.php');
include('includes/navbar-top.php');


?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total categories
                    <?php
                        $dash_category_query = "SELECT * FROM categories";
                        $dash_category_query_run = mysqli_query($con, $dash_category_query);
                        if($category_total = mysqli_num_rows($dash_category_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$category_total.' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    ?>
                    
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Products
                    <?php
                        $dash_product_query = "SELECT * FROM posts";
                        $dash_product_query_run = mysqli_query($con, $dash_product_query);
                        if($product_total = mysqli_num_rows($dash_product_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$product_total.' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
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
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Blocked users
                <?php
                        $dash_blockuser_query = "SELECT * FROM users WHERE status='1' ";
                        $dash_blockuser_query_run = mysqli_query($con, $dash_blockuser_query);
                        if($blockuser_total = mysqli_num_rows($dash_blockuser_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$blockuser_total.' </h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
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