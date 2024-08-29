
<?php 
include('includes/header.php');
include('includes/navbar.php');

if(isset($_POST['add_to_cart']))
{
    if(isset($_SESSION['cart']))
    {
        $session_array_id = array_column($_SESSION['cart'], "id");

        if(!in_array($_GET['id'], $session_array_id))
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
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">
                    <div class="container">
      <div class="sidebar">
        <h2>Categories</h2>
        <ul>
            <li>
                <input type="checkbox" id="category-cpu" data-category="cpu">
                <label for="category-cpu">CPU</label>
            </li>
            <li>
                <input type="checkbox" id="category-gpu" data-category="gpu">
                <label for="category-gpu">GPU</label>
            </li>
            <li>
                <input type="checkbox" id="category-motherboard" data-category="Motherboard">
                <label for="category-motherboard">Motherboard</label>
            </li>
            <li>
                <input type="checkbox" id="category-ssd" data-category="SSD">
                <label for="category-ssd">SSD</label>
            </li>
            <li>
                <input type="checkbox" id="category-power-supply" data-category="Power_supply">
                <label for="category-power-supply">Power Supply</label>
            </li>
            <li>
                <input type="checkbox" id="category-casing" data-category="Casing">
                <label for="category-casing">Casing</label>
            </li>
            <li>
                <input type="checkbox" id="category-ram" data-category="RAM">
                <label for="category-ram">RAM</label>
            </li>
        </ul>
    </div>

                <?php
                if(isset($_GET['title']))
                {
                    $slug = mysqli_real_escape_string($con, $_GET['title']);

                    $category = "SELECT * FROM categories WHERE slug='$slug' LIMIT 1";
                    $category_run = mysqli_query($con, $category);


                    if(mysqli_num_rows($category_run) > 0)
                    {
                        $categoryItem = mysqli_fetch_array($category_run);
                        $category_id = $categoryItem['id'];
                        //this is where to add product data
                        //$posts = "SELECT category_id,name,slug,image,created_at FROM posts WHERE category_id='$category_id' ";
                        $posts = "SELECT * FROM posts WHERE category_id='$category_id'";
                        $posts_run = mysqli_query($con, $posts);

                        if(mysqli_num_rows($posts_run) > 0)
                        {
                            foreach($posts_run as $postItems)
                            {
                                ?>
            
                            <div class="col-md-4">
                                <form method="post" action="category.php?id=<?= $postItems['id'] ?>">
                                <a href="post.php?title=<?=$postItems['slug'];?>" class="text-decoration-none">
                                    <img src="uploads/posts/<?=$postItems['image'] ?>" style='height: 150px; '>
                                    <h5><?= $postItems['name']; ?></h5>
                                </a>
                                    <h5>$<?= number_format($postItems['price'],2); ?></h5>
                                    <input type="hidden" name="name" value="<?= $postItems['name'] ?>">
                                    <input type="hidden" name="price" value="<?= $postItems['price'] ?>">
                                    <input type="number" name="quantity" value="1" class="form-control">
                                    <input type="submit" name="add_to_cart" class="btn btn-warning" 
                                    value="Add To Cart">
                                
            
                                </form>
                            </div>
                            <?php
                             }    
                        }
                        else
                        {
                            ?>
                                <h4>No post available</h4>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <h4>No such category found</h4>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <h4>No such url found</h4>
                    <?php
                }
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

<?php 
include('includes/footer.php');
?>