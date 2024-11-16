<?php
include('includes/navbar.php');
if(!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You must log in to view this page";
    header("Location: login.php");
    exit(0);
}

$user_id = $_SESSION['auth_user']['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0) {
    $user = mysqli_fetch_array($query_run);
} else {
    $_SESSION['message'] = "User not found!";
    header("Location: index.php");
    exit(0);
}
?>

<!-- Profile Page Container -->
<div class="py-5 bg-gradient bg-dark min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">

                    <div class="card-header bg-danger text-white text-center py-3">
                        <h4 class="mb-0">User Profile</h4>
                    </div>
                    
                    <div class="card-body bg-light text-dark py-4 px-5 text-center">

                        <!-- Profile Picture -->
                        <?php if($user['picture']): ?>
                            <img src="uploads/<?= $user['picture']; ?>" 
                                 class="rounded-circle border border-danger mb-3 shadow-sm" 
                                 width="150" height="150" 
                                 alt="Profile Picture">
                        <?php else: ?>
                            <img src="uploads/default-profile.png" 
                                 class="rounded-circle border border-danger mb-3 shadow-sm" 
                                 width="150" height="150" 
                                 alt="Default Profile Picture">
                        <?php endif; ?>

                        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-4">
                                <label for="fname" class="form-label">Name</label>
                                <input type="text" name="name" 
                                       value="<?= $user['fname'] . ' ' . $user['lname']; ?>" 
                                       class="form-control bg-secondary text-light border-0" readonly>
                            </div>
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" 
                                       value="<?= $user['email']; ?>" 
                                       class="form-control bg-secondary text-light border-0" readonly>
                            </div>
                            <div class="form-group mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" 
                                       value="<?= $user['address']; ?>" 
                                       class="form-control bg-secondary text-light border-secondary" 
                                       placeholder="Enter your address">
                            </div>
                            <div class="form-group mb-4">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-control bg-secondary text-light border-secondary">
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?= ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?= ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?= ($user['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" name="age" 
                                       value="<?= $user['age']; ?>" 
                                       class="form-control bg-secondary text-light border-secondary" 
                                       placeholder="Enter your age">
                            </div>
                            <div class="form-group mb-4">
                                <label for="picture" class="form-label">Profile Picture</label>
                                <input type="file" name="picture" 
                                       class="form-control bg-secondary text-light border-secondary">
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="update_profile_btn" 
                                        class="btn btn-danger btn-lg">Update Profile</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
