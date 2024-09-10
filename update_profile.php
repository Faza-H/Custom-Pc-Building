<?php
session_start();
include('admin/config/dbcon.php');

if(isset($_POST['update_profile_btn'])) {
    $user_id = $_SESSION['auth_user']['user_id'];
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $gender = $_POST['gender'];
    $age = intval($_POST['age']);

    $query = "UPDATE users SET address='$address', gender='$gender', age='$age' WHERE id='$user_id'";

    if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != '') {
        $picture = $_FILES['picture']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['picture']['name']);

        // Upload file
        if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
            $query = "UPDATE users SET address='$address', gender='$gender', age='$age', picture='$picture' WHERE id='$user_id'";
        }
    }

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Profile updated successfully!";
        header("Location: profile.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong. Please try again.";
        header("Location: profile.php");
        exit(0);
    }
}
?>
