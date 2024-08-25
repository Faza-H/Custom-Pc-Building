
<?php 

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            
            <div class="col-md-2">

                <?php
                if(isset($_GET['title']))
                {
                    $slug = mysqli_real_escape_string($con, $_GET['title']);

                    $category = "SELECT id,slug FROM categories WHERE slug='$slug' LIMIT 1";
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
                                    <a href="post.php?title=<?=$postItems['slug'];?>" class="text-decoration-none">
                                         <div class="card card-body shadow-sm mb-4">
                                            <img src="uploads/posts/<?=$postItems['image'] ?>" class="card-img-top" alt="" />
                                            <h5><?=$postItems['name'];?></h5>
                                            <div>
                                                <label class="text-dark me-2"> Posted On: <?= date('d-M-Y', strtotime($postItems['created_at'])); ?></label>
                                            </div>
                                        </div>
                                    </a>
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
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Advertise Area</h4>
                    </div>
                    <div class="card-body">
                        your advertise
                    </div>

                
            </div>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>