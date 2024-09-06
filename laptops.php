<?php 

include('includes/header.php');
include('includes/navbar.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="lap.css">
    <script src="laptop.js"></script>
</head>
<body>
    <header>
            
    <div class="search">
        <input type="text" name="" id="find" placeholder="search here...." onkeyup="search()">
     </div>
        </nav>

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
    <main>
   <!-- Search Bar -->

<!-- Main Content -->
<div class="main-content">
    <!-- Filters -->
    <aside class="filters">
        <h3>Filters</h3>
        <div class="filter-section">
            <h4>Price in Rupees</h4>
            <input type="range" id="priceRange" min="0" max="300000" step="50" oninput="filterByPrice()" value="300000">
            <span id="priceValue">300000</span>
        </div>
        <div class="filter-section">
            <h4>Vendors</h4>
            <ul>
                <li><input type="checkbox" value="Dell" onchange="filterByVendor()"> Dell</li>
                <li><input type="checkbox" value="HP" onchange="filterByVendor()"> HP</li>
                <li><input type="checkbox" value="Lenovo" onchange="filterByVendor()"> Lenovo</li>
            </ul>
        </div>
        <div class="filter-section">
            <h4>CPU</h4>
            <ul>
                <li>
                    <input type="checkbox" value="INTEL I3" onchange="search()"> Intel i3
                    <button class="expand-btn" onclick="toggleDetails('i3Details')">Expand</button>
                    <ul id="i3Details" class="details-list">
                        <li><input type="checkbox" value="INTEL I3 G6" onchange="search()"> 6th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G7" onchange="search()"> 7th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G8" onchange="search()"> 8th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G9" onchange="search()"> 9th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G10" onchange="search()"> 10th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G11" onchange="search()"> 11th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G12" onchange="search()"> 12th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G13" onchange="search()"> 13th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G14" onchange="search()"> 14th Gen</li>
                    </ul>
                </li>
                <li>
                    <input type="checkbox" value="INTEL I5" onchange="search()"> Intel i5
                    <button class="expand-btn" onclick="toggleDetails('i5Details')">Expand</button>
                    <ul id="i5Details" class="details-list">
                        <li><input type="checkbox" value="INTEL I5 G6" onchange="search()"> 6th Gen</li>
                        <li><input type="checkbox" value="INTEL I5 G7" onchange="search()"> 7th Gen</li>
                        <li><input type="checkbox" value="INTEL i5 G8" onchange="search()"> 8th Gen</li>
                        <li><input type="checkbox" value="INTEL i5 G9" onchange="search()"> 9th Gen</li>
                        <li><input type="checkbox" value="INTEL i5 G10" onchange="search()"> 10th Gen</li>
                        <li><input type="checkbox" value="INTEL i5 G11" onchange="search()"> 11th Gen</li>
                        <li><input type="checkbox" value="INTEL i5 G12" onchange="search()"> 12th Gen</li>
                        <li><input type="checkbox" value="INTEL i5 G13" onchange="search()"> 13th Gen</li>
                        <li><input type="checkbox" value="INTEL i5 G14" onchange="search()"> 14th Gen</li>
                    </ul>
                </li>
                <li>
                    <input type="checkbox" value="INTEL I7" onchange="search()"> Intel i7
                    <button class="expand-btn" onclick="toggleDetails('i7Details')">Expand</button>
                    <ul id="i7Details" class="details-list">
                        <li><input type="checkbox" value="INTEL i7 G6" onchange="search()"> 6th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G7" onchange="search()"> 7th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G8" onchange="search()"> 8th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G9" onchange="search()"> 9th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G10" onchange="search()"> 10th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G11" onchange="search()"> 11th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G12" onchange="search()"> 12th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G13" onchange="search()"> 13th Gen</li>
                        <li><input type="checkbox" value="INTEL i7 G14" onchange="search()"> 14th Gen</li>
                    </ul>
                </li>
                <li>
                    <input type="checkbox" value="INTEL I9" onchange="search()"> Intel i9
                    <button class="expand-btn" onclick="toggleDetails('i9Details')">Expand</button>
                    <ul id="i9Details" class="details-list">
                        <li><input type="checkbox" value="INTEL I3 G8" onchange="search()"> 8th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G9" onchange="search()"> 9th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G10" onchange="search()"> 10th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G11" onchange="search()"> 11th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G12" onchange="search()"> 12th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G13" onchange="search()"> 13th Gen</li>
                        <li><input type="checkbox" value="INTEL I3 G14" onchange="search()"> 14th Gen</li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Add more filters as needed -->
    </aside>

    <!-- Products -->
    <section class="product-list">
        <div class="product" id="inteli3g6">
            <img src="Pics/laptop Images/HP Newest 14.jpg" alt="Laptop 1">
            <h3>Dell Inspiron 15</h3>
<h4>₨ 60000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell Inspiron 15<br>
    Generation: I3 6th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Black<br>
    Hard Disk Size: 1 TB<br>
    CPU Model: Intel Core i3-6100U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Anti-glare display, Bluetooth<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g7">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Pavilion 14</h3>
<h4>₨ 70000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Pavilion 14<br>
    Generation: I3 7th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 1 TB<br>
    CPU Model: Intel Core i3-7100U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Touchscreen, Backlit Keyboard<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g8">
            <img src="Pics/laptop Images/Lenovo IdeaPad 1 Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo ThinkPad E490</h3>
<h4>₨ 75000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo ThinkPad E490<br>
    Generation: I3 8th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Black<br>
    Hard Disk Size: 1 TB<br>
    CPU Model: Intel Core i3-8130U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Pro<br>
    Special Feature: Fingerprint Reader, Spill-resistant Keyboard<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP 15s</h3>
<h4>₨ 80000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP 15s<br>
    Generation: I3 9th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i3-9100<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Full HD Display, Fast Charging<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo IdeaPad S340</h3>
<h4>₨ 85000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo IdeaPad S340<br>
    Generation: I3 10th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Platinum Grey<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i3-1005G1<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Slim Design, Backlit Keyboard<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell Inspiron 14</h3>
<h4>₨ 90000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell Inspiron 14<br>
    Generation: I3 11th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i3-1115G4<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Narrow Border, Fast Charging<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Pavilion 15</h3>
<h4>₨ 95000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Pavilion 15<br>
    Generation: I3 12th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i3-1215U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 11 Home<br>
    Special Feature: Micro-edge Display, Backlit Keyboard<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g13">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo IdeaPad 3</h3>
<h4>₨ 100000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo IdeaPad 3<br>
    Generation: I3 13th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Arctic Grey<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i3-1315U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 11 Home<br>
    Special Feature: HD Webcam, Rapid Charge<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli3g14">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell Vostro 14</h3>
<h4>₨ 110000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell Vostro 14<br>
    Generation: I3 14th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Black<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i3-1415U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: Anti-glare Display, Enhanced Security<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g6">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Pavilion 15</h3>
<h4>₨ 85000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Pavilion 15<br>
    Generation: I5 6th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 1 TB<br>
    CPU Model: Intel Core i5-6200U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: HD Display, Fast Charging<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g7">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo ThinkPad L470</h3>
<h4>₨ 90000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo ThinkPad L470<br>
    Generation: I5 7th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Black<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i5-7200U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Pro<br>
    Special Feature: Spill-resistant Keyboard, Fingerprint Reader<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g8">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell Inspiron 15</h3>
<h4>₨ 95000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell Inspiron 15<br>
    Generation: I5 8th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Platinum Silver<br>
    Hard Disk Size: 1 TB HDD<br>
    CPU Model: Intel Core i5-8250U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Full HD Display, Anti-glare<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell XPS 13</h3>
<h4>₨ 110000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell XPS 13<br>
    Generation: I5 9th Gen<br>
    Screen Size: 13.3 Inches<br>
    Color: Frost<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i5-9300H<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Pro<br>
    Special Feature: InfinityEdge Display, Backlit Keyboard<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo IdeaPad Flex 5</h3>
<h4>₨ 105000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo IdeaPad Flex 5<br>
    Generation: I5 10th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Graphite Grey<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i5-10210U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Convertible Design, Touchscreen<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Spectre x360</h3>
<h4>₨ 120000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Spectre x360<br>
    Generation: I5 11th Gen<br>
    Screen Size: 13.3 Inches<br>
    Color: Nightfall Black<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i5-1135G7<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: 360-degree Convertible, High-Resolution Display<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell Inspiron 14</h3>
<h4>₨ 115000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell Inspiron 14<br>
    Generation: I5 12th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i5-1235U<br>
    Ram Memory Installed Size: 8 GB<br>
    Operating System: Windows 11 Home<br>
    Special Feature: Narrow Border Display, Fast Charging<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g13">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo ThinkPad T14</h3>
<h4>₨ 125000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo ThinkPad T14<br>
    Generation: I5 13th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Black<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i5-1335U<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: Robust Security, Spill-resistant Keyboard<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli5g14">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Pavilion 14</h3>
<h4>₨ 130000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Pavilion 14<br>
    Generation: I5 14th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Natural Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i5-1415U<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 11 Home<br>
    Special Feature: Ultra-thin Design, Full HD Display<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g6">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell XPS 15</h3>
<h4>₨ 120000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell XPS 15<br>
    Generation: I7 6th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i7-6700HQ<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 10 Pro<br>
    Special Feature: InfinityEdge Display, High Resolution<br>
    Graphics Card Description: NVIDIA GeForce GTX 960M</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g7">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Envy 17</h3>
<h4>₨ 130000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Envy 17<br>
    Generation: I7 7th Gen<br>
    Screen Size: 17.3 Inches<br>
    Color: Natural Silver<br>
    Hard Disk Size: 1 TB HDD<br>
    CPU Model: Intel Core i7-7500U<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: Full HD Display, Bang & Olufsen Speakers<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g8">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Spectre x360 15</h3>
<h4>₨ 140000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Spectre x360 15<br>
    Generation: I7 8th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Dark Ash Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i7-8550U<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: 360-degree Convertible, High Definition Display<br>
    Graphics Card Description: NVIDIA GeForce MX150</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo Legion 5</h3>
<h4>₨ 150000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo Legion 5<br>
    Generation: I7 9th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Phantom Black<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i7-9750H<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: High Refresh Rate Display, Gaming Keyboard<br>
    Graphics Card Description: NVIDIA GeForce GTX 1660 Ti</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell Inspiron 15 7000</h3>
<h4>₨ 155000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell Inspiron 15 7000<br>
    Generation: I7 10th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Silver<br>
    Hard Disk Size: 512 GB SSD<br>
    CPU Model: Intel Core i7-10750H<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 10 Pro<br>
    Special Feature: Full HD Display, High Performance<br>
    Graphics Card Description: NVIDIA GeForce GTX 1650</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell XPS 15</h3>
<h4>₨ 170000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell XPS 15<br>
    Generation: I7 11th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Platinum Silver<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i7-11800H<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: InfinityEdge Display, High Resolution<br>
    Graphics Card Description: NVIDIA GeForce RTX 3050</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo Yoga 9i</h3>
<h4>₨ 180000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo Yoga 9i<br>
    Generation: I7 12th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Storm Grey<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i7-1265U<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 11 Home<br>
    Special Feature: 360-degree Convertible, High-Definition Touchscreen<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli7g13">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Spectre x360 14</h3>
<h4>₨ 190000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Spectre x360 14<br>
    Generation: I7 13th Gen<br>
    Screen Size: 13.5 Inches<br>
    Color: Poseidon Blue<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i7-13700U<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: 360-degree Convertible, Ultra HD Display<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>    
        </div>
        <div class="product" id="inteli7g14">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo ThinkPad X1 Carbon</h3>
<h4>₨ 200000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo ThinkPad X1 Carbon<br>
    Generation: I7 14th Gen<br>
    Screen Size: 14 Inches<br>
    Color: Black<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i7-14700U<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: Lightweight, High Durability<br>
    Graphics Card Description: Integrated</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli9g8">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Omen 15</h3>
<h4>₨ 200000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Omen 15<br>
    Generation: I9 8th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Shadow Black<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i9-8950HK<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: High Refresh Rate Display, Gaming Keyboard<br>
    Graphics Card Description: NVIDIA GeForce GTX 1070</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli9g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell Alienware m15</h3>
<h4>₨ 220000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell Alienware m15<br>
    Generation: I9 9th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Lunar Light<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i9-9900K<br>
    Ram Memory Installed Size: 16 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: AlienFX Lighting, Advanced Cooling<br>
    Graphics Card Description: NVIDIA GeForce RTX 2070</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli9g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Lenovo Legion 7i</h3>
<h4>₨ 240000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo Legion 7i<br>
    Generation: I9 10th Gen<br>
    Screen Size: 15.6 Inches<br>
    Color: Raven Black<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i9-10980HK<br>
    Ram Memory Installed Size: 32 GB<br>
    Operating System: Windows 10 Home<br>
    Special Feature: High Refresh Rate Display, RGB Backlit Keyboard<br>
    Graphics Card Description: NVIDIA GeForce RTX 2080 Super</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli9g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>Dell XPS 17</h3>
<h4>₨ 270000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Dell XPS 17<br>
    Generation: I9 11th Gen<br>
    Screen Size: 17 Inches<br>
    Color: Frost<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i9-11980HK<br>
    Ram Memory Installed Size: 32 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: Ultra HD+ Display, High Performance<br>
    Graphics Card Description: NVIDIA GeForce RTX 3070</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
        </div>
        <div class="product" id="inteli9g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
            <h3>HP Omen 16</h3>
<h4>₨ 280000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Omen 16<br>
    Generation: I9 12th Gen<br>
    Screen Size: 16.1 Inches<br>
    Color: Shadow Black<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i9-12900H<br>
    Ram Memory Installed Size: 32 GB<br>
    Operating System: Windows 11 Home<br>
    Special Feature: High Refresh Rate Display, Enhanced Cooling<br>
    Graphics Card Description: NVIDIA GeForce RTX 3080</h5>

                    <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
                </div>
                <div class="product" id="inteli9g13">
                    <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                    <h3>Lenovo Legion 9i</h3>
<h4>₨ 300000</h4>
<h4>Specifications:</h4>
<h5>Model Name: Lenovo Legion 9i<br>
    Generation: I9 13th Gen<br>
    Screen Size: 16 Inches<br>
    Color: Storm Grey<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i9-13900HK<br>
    Ram Memory Installed Size: 32 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: Ultra High Refresh Rate, RGB Backlit Keyboard<br>
    Graphics Card Description: NVIDIA GeForce RTX 4080</h5>

                            <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
                        </div>
                <div class="product" id="inteli9g14">
                         <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                         <h3>HP Spectre x360 16</h3>
<h4>₨ 320000</h4>
<h4>Specifications:</h4>
<h5>Model Name: HP Spectre x360 16<br>
    Generation: I9 14th Gen<br>
    Screen Size: 16 Inches<br>
    Color: Nightfall Black<br>
    Hard Disk Size: 1 TB SSD<br>
    CPU Model: Intel Core i9-14900H<br>
    Ram Memory Installed Size: 32 GB<br>
    Operating System: Windows 11 Pro<br>
    Special Feature: 4K OLED Touchscreen, Convertible Design<br>
    Graphics Card Description: NVIDIA GeForce RTX 4090</h5>

                                <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="buy-now">Buy Now</button>
            </div>
    </div>
        <!-- Add more products as needed -->
    </section>
</div>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php 
include('includes/footer.php');
?>
</body>
</html>