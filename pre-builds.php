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
    <link rel="stylesheet" href="pre-buildsss.css">
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
    <link rel="stylesheet" href="pre-buildss.css">
    <script src="pre-builds.js"></script>
</head>
<body style="background-color: brown,;">
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
                <img id="main-image" src="Pics/Casing/AORUS C300 GLASS.webp" alt="Product Image">
                <h3>Build 1</h3>
                <h4>₨ 200000</h4>
                
                <div class="features-container">
                    <div class="feature-block">
                        <img src="Pics/cpu/core i7.jpg" >
                        <p> intel i7 10400k </p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/gpu/AMD/AORUS Radeon™ RX 5700 XT 8G (rev. 2.0).webp" >
                        <p> RX 5700XT</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Motherboard/intel X299 AORUS Gaming 7 (rev. 1.0).webp" >
                        <p> intel X299</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/ram/GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp" >
                        <p> 16 GB RAM </p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 500GB.webp" >
                        <p> 500 GB SSD</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Casing/AORUS C300 GLASS.webp" >
                        <p> C300 Casing</p>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                
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
                    <input type="text" id="write" placeholder="write comment...">

                </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product-left">
                <img id="main-image" src="Pics/Casing/AORUS C400 GLASS.webp" alt="Product Image">
                <h3>Build 2</h3>
                <h4>₨ 240000</h4>
                
                <div class="features-container">
                    <div class="feature-block">
                        <img src="Pics/cpu/core i5.webp" >
                        <p> intel i5 10400k</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/gpu/AMD/Radeon™ VII HBM2 16G.webp" >
                        <p>AMD VII 16G </p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Motherboard/intel B760M D3HP.webp" >
                        <p> intel Motherboard</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/ram/RGB Memory DDR5 32GB (2x16GB).webp" >
                        <p> 32 GB DDR5 RAM</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/ssd/GIGABYTE M.2 SSD 500GB.webp" >
                        <p> 500 GB M2 SSD</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Casing/AORUS C400 GLASS.webp" >
                        <p> C400 Caing</p>
                    </div>
                </div>
                 <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                
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
                <img id="main-image" src="Pics/Casing/AORUS C500 GLASS.webp" alt="Product Image">
                <h3>Build 3</h3>
                <h4>₨ 250000</h4>
                <div class="features-container">
                    <div class="feature-block">
                        <img src="Pics/cpu/AMD Ryzen 9 9900X Twelve Core 5.60GHz.jpg" >
                        <p> Ryzen 9 9900X</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/gpu/nvidia/AORUS GeForce RTX™ 3090 Ti XTREME WATERFORCE 24G.webp" >
                        <p> RTX 3090 TI</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Motherboard/B650M S2H (rev. 1.2).webp" >
                        <p> B650M Motherboard</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/ram/GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp" >
                        <p> 16 GB RAM</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/ssd/AORUS Gen5 14000 SSD 1TB.webp" >
                        <p> 1TB SSD</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Casing/AORUS C500 GLASS.webp" >
                        <p> C500 Casing </p>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
               
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
                <img id="main-image" src="Pics/Casing/XC700W.webp" alt="Product Image">
                <h3>Build 4</h3>
                <h4>₨ 250000</h4>
                <div class="features-container">
                    <div class="feature-block">
                        <img src="Pics/cpu/core i9.jpeg" >
                        <p> intel core i9 14th GEN  </p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/gpu/nvidia/GeForce RTX™ 4060 Ti AERO OC 16G.webp" >
                        <p> NVIDIA RTX 4060 TI</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Motherboard/msi motherboard.jpg" >
                        <p> MSI Motherboard </p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics\ram\RGB Memory DDR5 32GB (2x16GB).webp" >
                        <p> 32GB DDR5 RAM </p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 250GB.webp" >
                        <p> 250 GB SSD</p>
                    </div>
                    <div class="feature-block">
                        <img src="Pics/Casing/XC700W.webp" >
                        <p>XC700W Casing</p>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                
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
<?php 
include('includes/footer.php');
?>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php 
include('includes/footer.php');
?>
</body>
</html>