<?php 
if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in";
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
                        <h4 class="mb-0">Register</h4>
                    </div>
                    <div class="card-body bg-light text-dark py-4 px-5">

                        <form action="registercode.php" method="POST">
                            <div class="form-group mb-4">
                                <label for="fname" class="form-label">First Name</label>
                                <input 
                                    required 
                                    type="text" 
                                    name="fname" 
                                    id="fname" 
                                    placeholder="Enter First Name" 
                                    class="form-control bg-light text-dark border-secondary">
                            </div>
                            <div class="form-group mb-4">
                                <label for="lname" class="form-label">Last Name</label>
                                <input 
                                    required 
                                    type="text" 
                                    name="lname" 
                                    id="lname" 
                                    placeholder="Enter Last Name" 
                                    class="form-control bg-light text-dark border-secondary">
                            </div>
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input 
                                    required 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    placeholder="Enter Email Address" 
                                    class="form-control bg-light text-dark border-secondary">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input 
                                    required 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    placeholder="Enter Password" 
                                    class="form-control bg-light text-dark border-secondary">
                            </div>
                            <div class="form-group mb-4">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input 
                                    required 
                                    type="password" 
                                    name="cpassword" 
                                    id="cpassword" 
                                    placeholder="Confirm Password" 
                                    class="form-control bg-light text-dark border-secondary">
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="register_btn" class="btn btn-danger btn-lg">Register Now</button>
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
