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
    <link rel="stylesheet" href="lap.css">
    <script src="laptop.js"></script>
</head>
<body>
    <header>
        <h1>Custom PC Builder</h1>
        <nav class="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
            <li><a href="builder_1.html">PC Builder </a></li>
            <li><a href="pre-builds.html">Pre Builds</a></li>
            <li><a href="laptops.html">Laptops</a></li>
            <!--Pre builds section would add the budget friendly and filtering option-->
            <li><a href="components.html">Components</a></li>
            <!-- handheld devices would include mobile devices and tablets-->
            <li><a href="#">About Us</a></li>
            <!--would include the goals, and about the company-->
        <!--    <li><a href="#">Community</a></li>-->
            <!-- community section would hold trends, future updates, user reviews and Expert Guidance recommandations-->
            <li><a href="Sign In.html">Sign In</a></li>
            <li><a href="Sign Up.html">Signup</a></li>
        <!--    <li><a href="#">Support</a></li>-->
            </ul>
        </nav>
      </header>
    <main>
   <!-- Search Bar -->
   <div class="search">
    <input type="text" name="" id="find" placeholder="search here...." onkeyup="search()">
    </div>

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
                <h3>Hp Swift Go Intel Evo 1</h3>
                <h4>Price: 50000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 6th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g7">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 65000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 7th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g8">
            <img src="Pics/laptop Images/Lenovo IdeaPad 1 Laptop.jpg" alt="Laptop 1">
                <h3>Lenovo IdealPad 1</h3>
                <h4>Price: 80000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 8th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 90000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 9th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 110000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 10th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 130000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 11th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 146184 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 12th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g13">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 170000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 13th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli3g14">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 190000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I3 14th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g6">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 80000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 6th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g7">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 100000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 7th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g8">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 125000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 8th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 135000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 9th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 145000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 10th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 165000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 11th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 190000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 12th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g13">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 210000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 13th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli5g14">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 230000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I5 14th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g6">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 130000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 6th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g7">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 150000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 7th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g8">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 170000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 8th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 190000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 9th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 200000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 10th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 220000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 11th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 240000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 12th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
        </div>
        <div class="product" id="inteli9g13">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 260000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 13th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli7g14">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 280000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I7 14th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli9g8">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 210000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I9 8th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli9g9">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 225000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I9 9th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli9g10">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 240000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: i9 10th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli9g11">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 255000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I9 11th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
        </div>
        <div class="product" id="inteli9g12">
            <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                <h3>Dell Swift Go Intel Evo 1</h3>
                <h4>Price: 265000 Rs</h4>
                <h4>Specifications:</h4>
                <h5>Model Name:	Swift Go 14<br>
                    Generation: I9 12th Gen<br>
                    Screen Size:	14 Inches<br>
                    Color:	Silver<br>
                    Hard Disk Size:	512<br>
                    CPU Model:	Intel Core i7-1355U<br>
                    Ram Memory Installed Size:	16 GB<br>
                    Operating System:	Windows 11 Home<br>
                    Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                    Graphics Card Description:	Integrated</h5>
                
                </div>
                <div class="product" id="inteli9g13">
                    <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                        <h3>Dell Swift Go Intel Evo 1</h3>
                        <h4>Price: 270000 Rs</h4>
                        <h4>Specifications:</h4>
                        <h5>Model Name:	Swift Go 14<br>
                            Generation: I9 13th Gen<br>
                            Screen Size:	14 Inches<br>
                            Color:	Silver<br>
                            Hard Disk Size:	512<br>
                            CPU Model:	Intel Core i7-1355U<br>
                            Ram Memory Installed Size:	16 GB<br>
                            Operating System:	Windows 11 Home<br>
                            Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                            Graphics Card Description:	Integrated</h5>
                        
                        </div>
                <div class="product" id="inteli9g14">
                         <img src="Pics/laptop Images/Dell Inspiron 15 3000 3520 Business Laptop.jpg" alt="Laptop 1">
                            <h3>Dell Swift Go Intel Evo 1</h3>
                            <h4>Price: 285000 Rs</h4>
                            <h4>Specifications:</h4>
                            <h5>Model Name:	Swift Go 14<br>
                                Generation: I9 14th Gen<br>
                                Screen Size:	14 Inches<br>
                                Color:	Silver<br>
                                Hard Disk Size:	512<br>
                                CPU Model:	Intel Core i7-1355U<br>
                                Ram Memory Installed Size:	16 GB<br>
                                Operating System:	Windows 11 Home<br>
                                Special Feature:	Fingerprint Reader, Backlit Keyboard<br>
                                Graphics Card Description:	Integrated</h5>   
                        </div>
        <!-- Add more products as needed -->
    </section>
</div>
<?php 
include('includes/footer.php');
?>
</body>
</html>