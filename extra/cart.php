<?php 


if(isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['cart']))
    {

    }
    else
    {
        $session_array = array(
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        );

        $_SESSION['cart'][] = $session_array;
    }
}

include('includes/header.php');
include('includes/navbar.php');
?>




<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">Cart</h2>
                <div class="col-md-12">
                    <div class="row">

                    
                <?php

                $query = "SELECT * FROM posts";
                $query_run = mysqli_query($con,$query);
                
                while($row = mysqli_fetch_array($query_run)){?>
                <div class="col-md-4">
                    <form method="post" action="cart.php?id=<?= $row['id'] ?>">
                        <img src="uploads/posts/<?=$row['image'] ?>" style='height: 150px; '>
                        <h5><?= $row['name']; ?></h5>
                        <h5>$<?= number_format($row['price'],2); ?></h5>
                        <input type="hidden" name="name" value="<?= $row['name'] ?>">
                        <input type="hidden" name="price" value="<?= $row['price'] ?>">
                        <input type="number" name="quantity" value="1" class="form-control">
                        <input type="submit" name="add_to_cart" class="btn btn-warning" 
                        value="Add To Cart">


                    </form>
                </div>    
                <?php }

                ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center">Item Selected</h2>

                <?php 
                 var_dump($_SESSION['cart'])
                
                ?>
            </div>
        </div>
    </div>
</div>