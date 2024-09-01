<?php 

include('includes/header.php');
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="pre-builds.css">
    <script src="pre-builds.js"></script>
</head>
<header>
<a href="#" class="btn btn-outline-primary cart-btn" onclick="openCart()">
      <i class="bi bi-cart-fill"></i> Cart
      <span class="badge bg-danger">0</span>
  </a>
<!-- Sidebar -->
<div id="cartSidebar" class="cart-sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a>
    <h2>Your Cart</h2>
    <div id="cartItems"></div>
    <h4>Total:<span id="cartTotal">0</span></h4>
    <div class="buy-now-container">
        <button class="btn btn-success" onclick="buyNow()">Buy Now</button>
    </div>
</div>

</header>
<body style=>
      <body>
        <div class="pre-builds">
            <P>Pre-Builds</p>
                <div class="search">
                    <input type="text" name="" id="find" placeholder="search here...." onkeyup="search()">
                    </div>
        <div class="filters">
        <div class="filter">
            <label>Rating:</label>
            <select>
                
              <option value="high">Select</option>
              <option value="high">High to Low</option>
              <option value="low">Low to High</option>
            </select>
          </div>
          <div class="filter">
            <label>Price:</label>
            <select>
                <option value="asc">Select</option>
              <option value="asc">0-100,000 Rs.</option>
              <option value="desc">100,000-200,000 Rs.</option>
              <option value="desc">200,000-300,000 Rs.</option>
              <option value="desc">300,000-400,000 Rs.</option>
            </select>
          </div>
        </div>
    </div>
        <div class="product-container">
            <div class="product-left">
                <img id="main-image" src="Pics/1 (6).jpeg" alt="Product Image">
                <h3>Build 1</h3>
                <h4>₨ 200000</h4>
                <div class="features-container">
                    <div class="feature-blck">
                        <img src="pictures/amd.jpg" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/gpu/AMD/AORUS Radeon™ RX 5700 XT 8G (rev. 2.0).webp" >
                        <p> </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/Motherboard/intel X299 AORUS Gaming 7 (rev. 1.0).webp" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/ram/GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 500GB.webp" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/Casing/AORUS C300 GLASS.webp" >
                        <p> intel i7 14600k </p>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                <div class="product-buttons">
                    <a href="#">Buy Now</a>
                </div>
            </div>
            <div class="product-right">
                <div class="product-description">
                    <h2>Product Description</h2>
                    <p>
                        It was finally time to retire the i7 7700k w/ 1080 Ti build from 2017. 
                        I do a 70/30 mix of CAD design and flight/racing sim gaming with some 
                        4K-6K video editing/encoding/production as well. 
                        I wanted a system that would give me the best of both worlds. 
                        I didn’t want storage to ever become an issue.
                    </p>
                    <p>Quite happy with the results.</p>
                </div>
                <div class="comments-container">
                    <div class="toggle-rating-container">
                    <button class="toggle-button" onclick="toggleComments()"><b>Comments:</b> &#x25BC;</button>
                    <div class="star-rating">
                        <label><b>Ratings</b></label>
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    </div>
                    <div class="comments-section">
                        <div class="comment">
                            <strong>seboperr:</strong> holy crap
                        </div>
                        <!-- Additional comments can be added here -->
                    </div>
                </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product-left">
                <img id="main-image" src="Pics/1 (6).jpeg" alt="Product Image">
                <h3>Build 2</h3>
                <h4>₨ 250000</h4>
                <div class="features-container">
                    <div class="feature-blck">
                        <img src="pictures/amd.jpg" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/gpu/AMD/AORUS Radeon™ RX 5700 XT 8G (rev. 2.0).webp" >
                        <p> </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/Motherboard/intel X299 AORUS Gaming 7 (rev. 1.0).webp" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/ram/GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 500GB.webp" >
                        <p> intel i7 14600k </p>
                    </div>
                    <div class="feature-blck">
                        <img src="Pics/Casing/AORUS C300 GLASS.webp" >
                        <p> intel i7 14600k </p>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                <div class="product-buttons">
                    <a href="#">Buy Now</a>
                </div>
            </div>
            <div class="product-right">
                <div class="product-description">
                    <h2>Product Description</h2>
                    <p>
                        It was finally time to retire the i7 7700k w/ 1080 Ti build from 2017. 
                        I do a 70/30 mix of CAD design and flight/racing sim gaming with some 
                        4K-6K video editing/encoding/production as well. 
                        I wanted a system that would give me the best of both worlds. 
                        I didn’t want storage to ever become an issue.
                    </p>
                    <p>Quite happy with the results.</p>
                </div>
                <div class="comments-container">
                    <div class="toggle-rating-container">
                    <button class="toggle-button" onclick="toggleComments()"><b>Comments:</b> &#x25BC;</button>
                    <div class="star-rating">
                        <label><b>Ratings</b></label>
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    </div>
                    <div class="comments-section">
                        <div class="comment">
                            <strong>seboperr:</strong> holy crap
                        </div>
                        <!-- Additional comments can be added here -->
                    </div>
                </div>
            </div>
        </div>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php 
include('includes/footer.php');
?>
    </body>
    </html>