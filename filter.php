
<?php 

include('includes/header.php');
include('includes/navbar.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">

                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <form action="" method="GET">
                <div class="card shadow mt-3">
                    <div class="card-header">
                        <h5>filter
                            <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                        </h5>
                        <div class="card-body">
                            <h6>Brand list</h6>
                            <hr>
                            <?php

                                 $brandd = "SELECT * FROM posts";
                                 $brandd_run = mysqli_query($con, $brandd);

                                 if(mysqli_num_rows($brandd_run) > 0)
                                 {
                                    foreach($brandd_run as $brandlist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['brands']))
                                        {
                                            $checked = $_GET['brands'];
                                        }


                                        ?>
                                            <div>
                                                <input type="checkbox" name="brands[]" value="<?= $brandlist['id'] ?>"
                                                    <?php if(in_array($brandlist['id'], $checked)){ echo "checked" ;} ?>
                                                    
                                                />
                                                <?= $brandlist['brand']; ?>
                                            </div>
                                        <?php
                                    }
                                 }
                                 else
                                 {
                                    echo "no result";
                                 }

                            ?>
                        </div>
                    </div>
                </form>



                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body row">
                        <?php
                            $products = "SELECT * FROM posts";
                            $products_run = mysqli_query($con , $products);

                            if(mysqli_num_rows($products_run) > 0)
                            {
                                foreach($products_run as $proditems) :
                                ?>
                                    <div class="col-md-4">
                                        <div class="border p-2">
                                            <h6><?= $proditems['name']; ?></h6>
                                        </div>
                                    </div>

                                <?php
                                
                                endforeach;
                            }
                            else
                            {
                                 echo "no result";
                            }
                        ?>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>