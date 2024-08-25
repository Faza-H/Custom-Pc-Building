<?php 

include('includes/header.php');
include('includes/navbar.php');
?>
<link rel="stylesheet" href="admin/css/custom.css">
<div class="py-5 bg-danger">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:white; margin-bottom: 20px red;">Category</h3>
                <div class="underline"></div>
            </div>
            <?php
                 $homeCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' LIMIT 12 ";
                 $homeCategory_run = mysqli_query($con, $homeCategory);
       
                 if(mysqli_num_rows($homeCategory_run) > 0)
                 {
                        foreach($homeCategory_run as $homeCateItem)
                        {
                            ?>
                                <div class="col-md-3 mb-4">
                                    <a class="text-decoration-none" href="category.php?title=<?= $homeCateItem['slug']; ?>">
                                        <div class="card card-body">
                                            <?= $homeCateItem['name']; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                 }
            ?>

        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Ultimate Builds</h3>
                <div class="underline"></div>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit ab quod deleniti et! Laboriosam soluta, quaerat dolorem accusantium itaque veritatis modi animi? Architecto sit sint voluptatem porro ipsam pariatur quos earum ipsum, praesentium blanditiis!
                </p>
            </div>

         </div>
    </div>
</div>


<?php 
include('includes/footer.php');
?>