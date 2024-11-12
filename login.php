<?php 
if(isset($_SESSION['auth']))
{   
    if(!isset($_SESSION['message']))
    {
        $_SESSION['message'] = "You are already logged in";
    }
    
    header("Location: index.php");
    exit(0);
}

include('includes/navbar.php');
?>

<div class="py-5 bg-dark min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            
                <?php include('message.php'); ?>

                <div class="card bg-secondary text-white">

                    <div class="card-header bg-dark text-danger">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="POST">
                            
                            <div class="form-group mb-3">
                                <label>Email Id</label>
                                <input type="email" name="email" placeholder="Enter Email Address" class="form-control bg-dark text-light border-secondary">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control bg-dark text-light border-secondary">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="login_btn" class="btn btn-danger">Login Now</button>
                            </div> 
                        </form>    
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>   
