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

<div class="py-5 bg-gradient bg-dark min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            
                <?php include('message.php'); ?>

                <div class="card shadow-lg border-0">

                    <div class="card-header bg-danger text-white text-center py-3">
                        <h4 class="mb-0">Login</h4>
                    </div>
                    <div class="card-body bg-light text-dark py-4 px-5">

                        <form action="logincode.php" method="POST">
                            
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    placeholder="Enter Email Address" 
                                    class="form-control bg-light text-dark border-secondary">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    placeholder="Enter Password" 
                                    class="form-control bg-light text-dark border-secondary">
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="login_btn" class="btn btn-danger btn-lg">Login Now</button>
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
