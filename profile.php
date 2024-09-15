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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>User Profile</h4>
                </div>
                <div class="card-body text-center">

                    <!-- Display Profile Picture with Blue Outline -->
                    <style>
                        .profile-pic {
                            border: 5px solid #007bff; /* Blue outline */
                            border-radius: 50%; /* Circle shape */
                        }
                    </style>

                    <?php if($user['picture']): ?>
                        <img src="uploads/<?= $user['picture']; ?>" class="profile-pic mb-3" width="150" height="150" alt="Profile Picture">
                    <?php else: ?>
                        <img src="uploads/default-profile.png" class="profile-pic mb-3" width="150" height="150" alt="Default Profile Picture">
                    <?php endif; ?>

                    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="fname">Name</label>
                            <input type="text" name="name" value="<?= $user['fname'] . ' ' . $user['lname']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" value="<?= $user['address']; ?>" class="form-control" placeholder="Enter your address">
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male" <?= ($user['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?= ($user['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?= ($user['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="age">Age</label>
                            <input type="number" name="age" value="<?= $user['age']; ?>" class="form-control" placeholder="Enter your age">
                        </div>
                        <div class="form-group mb-3">
                            <label for="picture">Profile Picture</label>
                            <input type="file" name="picture" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="update_profile_btn" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
