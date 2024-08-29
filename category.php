
<?php 

include('includes/header.php');
include('includes/navbar.php');
?>
<body>
    <div class="container">
        <div class="row">
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
            if(isset($_GET['brands']))
            {
                $bchecked = [];
                $bchecked = $_GET['brands'];
                foreach($bchecked as $rowbd)
                {
                    $posts = "SELECT * FROM posts WHERE brand_id IN ($rowbd)";
                    $posts_run = mysqli_query($con, $posts);

                    if(mysqli_num_rows($posts_run) > 0)
                    {
                        foreach($posts_run as $postItems)
                        {
                        ?>
                        <div class="col-md-4">
                            <div class="border p-2">
                            <form method="post" action="category.php?id=<?= $postItems['id'] ?>">
                            <a href="post.php?title=<?=$postItems['slug'];?>" class="text-decoration-none">
                                <img src="uploads/posts/<?=$postItems['image'] ?>" style='height: 150px; '>
                                <h5><?= $postItems['name']; ?></h5>
                            </a>
                                <h5>$<?= number_format($postItems['price'],2); ?></h5>
                                <input type="hidden" name="name" value="<?= $postItems['name'] ?>">
                                <input type="hidden" class="text-center" name="price" value="<?= $postItems['price'] ?>">
                                <input type="number" name="quantity" value="1" class="form-control">
                                <input type="submit" name="add_to_cart" class="btn btn-warning" 
                                value="Add To Cart">
                            
        
                            </form>
                            </div>
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
            }
                
         
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
                                <div class="border p-2">
                                <form method="post" action="category.php?id=<?= $postItems['id'] ?>">
                                <a href="post.php?title=<?=$postItems['slug'];?>" class="text-decoration-none">
                                    <img src="uploads/posts/<?=$postItems['image'] ?>" style='height: 150px; '>
                                    <h5><?= $postItems['name']; ?></h5>
                                </a>
                                    <h5>$<?= number_format($postItems['price'],2); ?></h5>
                                    <input type="hidden" name="name" value="<?= $postItems['name'] ?>">
                                    <input type="hidden" class="text-center" name="price" value="<?= $postItems['price'] ?>">
                                    <input type="number" name="quantity" value="1" class="form-control">
                                    <input type="submit" name="add_to_cart" class="btn btn-warning" 
                                    value="Add To Cart">
                                
            
                                </form>
                                </div>
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
            
        ?>  

                    </div>
                </div>
            </div>
    </div>

<?php 
include('includes/footer.php');
?>
</body>
</html>