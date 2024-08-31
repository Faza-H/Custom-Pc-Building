<?php 

include('includes/header.php');
include('includes/navbar.php');
?>
<?php
  if (isset($_GET['component'])) {
    $componentType = $_GET['component'];
    ?>
    <script>
      // Select the checkbox for the specified component type
      document.querySelector(`[data-category="${componentType}"]`).checked = true;
    </script>
    <?php
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Components Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="components.css">
    <script src="components.js"></script>
</head>
<body>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    if (<?php echo isset($componentType) ? 'true' : 'false'; ?>) {
      var componentType = '<?php echo $componentType; ?>';
      // Select the checkbox for the specified component type
      var checkbox = document.querySelector(`[data-category="${componentType}"]`);
      checkbox.checked = true;
      // Try to trigger the change event instead of click
      checkbox.dispatchEvent(new Event('change'));
    }
  });
</script>
    <header>
        
    <div class="search">
      <input type="text" name="" id="find" placeholder="search here...." onkeyup="search()">
   </div>
   <a href="#" class="btn btn-outline-primary cart-btn" onclick="openCart()">
      <i class="bi bi-cart-fill"></i> Cart
      <span class="badge bg-danger">0</span>
  </a>
<!-- Sidebar -->
<div id="cartSidebar" class="cart-sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a>
    <h2>Your Cart</h2>
    <div id="cartItems"></div>
    <h4>Total: $<span id="cartTotal">0</span></h4>
    <div class="buy-now-container">
        <button class="btn btn-success" onclick="buyNow()">Buy Now</button>
    </div>
</div>
      </header>
      <div class="containe">
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
        <div class="main-content">
          <div class="top-bar">
            
            <!-- Filters -->
            <div class="filters">
              <div class="filter">
                <label>Company:</label>
                <select id="company-filter">
                    <option value="">All</option>
                    <option value="Intel">Intel</option>
                    <option value="Ryzen">Ryzen</option>
                    <option value="Nvidia">Nvidia</option>
                    <option value="AMD">AMD</option>
                </select>
            </div>
            <div class="filter">
              <label>Sort by Price:</label>
              <select id="price-sort">
                  <option value="">All</option>
                  <option value="asc">Ascending</option>
                  <option value="desc">Descending</option>
              </select>
          </div>
            </div>
          </div>
          <div class="products">
            <div class="product" data-id="amd_1" data-category="cpu" data-company="Ryzen" data-wattage="65">
              <img src="Pics/cpu/AMD Ryzen 3 3200G 4-Core.jpg" alt="Product 1">
              <h3>AMD Ryzen 3 3200G 4-Core</h3>
              <h4>Price: PKR 28000</h4>
              <h5>Power Usage: 65W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.6 GHz<br>Max boost clock: 4.0 GHz<br>Integrated Radeon Vega 8 Graphics<br>Unlocked for overclocking<br>Thermal Design Power (TDP): 65W</h6>
              <div class="button-container">
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd_2" data-category="cpu" data-company="Ryzen" data-wattage="95">
              <img src="Pics/cpu/AMD Ryzen 5 7600X.jpg" alt="Product 2">
              <h3>AMD Ryzen 5 7600X</h3>
              <h4>Price: PKR 57000</h4>
              <h5>Power Usage: 95W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 4.7 GHz<br>Max boost clock: 5.3 GHz<br>6 Cores / 12 Threads<br>PCIe 5.0 support<br>Thermal Design Power (TDP): 105W</h6>
              <div class="button-container">
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd" data-category="cpu" data-company="Ryzen">
            <img src="Pics/cpu/AMD Ryzen 5 7600X.jpg" alt="Product 2">
            <h3>Ryzen 5</h3>
            <h4>$100</h4>
            <h5>Power Usage: 105W</h5>
            <h6>Description:</h6>
            <h6>Base clock: 4.7 GHz<br>Max boost clock: 5.3 GHz<br>6 Cores / 12 Threads<br>PCIe 5.0 support<br>Thermal Design Power (TDP): 105W</h6>
            <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
            <button class="btn btn-primary">Add to Builder</button>
            <button class="btn btn-primary">Buy Now</button>
            </div>

            <div class="product" data-id="amd" data-category="cpu" data-company="Ryzen">
            <div class="product" data-id="amd_3" data-category="cpu" data-company="Ryzen" data-wattage="120">
              <img src="Pics/cpu/AMD-Ryzen-7-7800X.jpg" alt="Product 3">
              <h3>AMD Ryzen 7 7800X</h3>
              <h4>Price: PKR 75000</h4>
              <h5>Power Usage: 120W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 4.5 GHz<br>Max boost clock: 5.2 GHz<br>8 Cores / 16 Threads<br>Support for DDR5<br>Thermal Design Power (TDP): 65W</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd_4" data-category="cpu" data-company="Ryzen" data-wattage="140">
              <img src="Pics/cpu/AMD Ryzen 9 9900X Twelve Core 5.60GHz.jpg" alt="Product 4">
              <h3>AMD Ryzen 9 9900X</h3>
              <h4>Price: PKR 115000</h5>
              <h5>Power Usage: 140W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.8 GHz<br>Max boost clock: 5.6 GHz<br>12 Cores / 24 Threads<br>Precision Boost 2 technology<br>Thermal Design Power (TDP): 140W</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="intel_1" data-category="cpu" data-company="Intel" data-wattage="80">
              <img src="Pics/cpu/core i3.jpg" alt="Product 5">
              <h3>Intel Core i3 10th Gen</h3>
              <h4>Price: PKR 22000</h5>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.6 GHz<br>Max turbo frequency: 4.2 GHz<br>4 Cores / 8 Threads<br>Integrated Intel UHD Graphics 630<br>Thermal Design Power (TDP): 65W</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="intel_2" data-category="cpu" data-company="Intel" data-wattage="90">
              <img src="Pics/cpu/core i5.webp" alt="Product 6">
              <h3>Intel Core i5 10th Gen</h3>
              <h4>Price: PKR 35000</h5>
              <h5>Power Usage: 90W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 2.9 GHz<br>Max turbo frequency: 4.3 GHz<br>6 Cores / 12 Threads<br>Integrated Intel UHD Graphics 630<br>Thermal Design Power (TDP): 65W</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="intel_3" data-category="cpu" data-company="Intel" data-wattage="100">
              <img src="Pics/cpu/core i7 10th gen.jpg" alt="Product 7">
              <h3>Intel Core i7 10th Gen</h3>
              <h4>Price: PKR 52000</h5>
              <h5>Power Usage: 100W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 2.9 GHz<br>Max turbo frequency: 4.8 GHz<br>8 Cores / 16 Threads<br>Intel Turbo Boost Max Technology 3.0<br>Thermal Design Power (TDP): 65W</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="intel_4" data-category="cpu" data-company="Intel" data-wattage="120">
              <img src="Pics/cpu/core i7.jpg" alt="Product 8">
              <h3>Intel Core i7 12th Gen</h3>
              <h4>Price: PKR 65000</h5>
              <h5>Power Usage: 120W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.6 GHz<br>Max turbo frequency: 4.9 GHz<br>8 Cores / 16 Threads<br>Support for PCIe 5.0 and DDR5<br>Thermal Design Power (TDP): 125W</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="intel_5" data-category="cpu" data-company="Intel" data-wattage="150">
              <img src="Pics/cpu/core i9.jpeg" alt="Product 9">
              <h3>Intel Core i9 14th Gen</h3>
              <h4>Price: PKR 95000</h5>
              <h5>Power Usage: 150W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.7 GHz<br>Max turbo frequency: 5.8 GHz<br>16 Cores / 24 Threads<br>Advanced Intel Thermal Velocity Boost<br>Thermal Design Power (TDP): 125W</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd_gpu_1" data-category="gpu" data-company="AMD" data-wattage="300">
              <img src="Pics/gpu/AMD/AORUS Radeon™ RX 5700 XT 8G (rev. 2.0).webp" alt="Product 2">
              <h3>AMD RX 5700 XT 8G</h3>
              <h4>Price: PKR 75000</h5>
              <h5>Power Usage: 300W</h5>
              <h6>Description:</h6>
              <h6>Memory: 8GB GDDR6<br>Base clock: 1,605 MHz<br>Boost clock: 1,905 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Windforce 3X cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd_gpu_2" data-category="gpu" data-company="AMD" data-wattage="350">
              <img src="Pics/gpu/AMD/AORUS Radeon™ RX 7900 XTX ELITE 24G.webp" alt="Product 2">
              <h3>AMD RX 7900 24G</h3>
              <h4>Price: PKR 250000</h5>
              <h5>Power Usage: 350W</h5>
              <h6>Description:</h6>
              <h6>Memory: 24GB GDDR6<br>Base clock: 1,900 MHz<br>Boost clock: 2,500 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Advanced triple-fan cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd_gpu_3" data-category="gpu" data-company="AMD" data-wattage="300">
              <img src="Pics/gpu/AMD/Radeon™ PRO W7800 AI TOP 32G.webp" alt="Product 2">
              <h3>AMD PRO W7800 32G</h3>
              <h4>Price: PKR 400000</h5>
              <h5>Power Usage: 300W</h5>
              <h6>Description:</h6>
              <h6>Memory: 32GB GDDR6<br>Base clock: 1,700 MHz<br>Boost clock: 2,100 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Optimized for professional workloads and AI</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd_gpu_4" data-category="gpu" data-company="AMD" data-wattage="290">
              <img src="Pics/gpu/AMD/Radeon™ VII HBM2 16G.webp" alt="Product 2">
              <h3>AMD VII HBM2 16G</h3>
              <h4>Price: PKR 700000</h5>
              <h5>Power Usage: 290W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB HBM2<br>Base clock: 1,400 MHz<br>Boost clock: 1,750 MHz<br>Interface: PCIe 3.0 x16<br>Max resolution: 7680x4320<br>Cooling: Liquid-cooling ready</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>

            <div class="product" data-id="amd_gpu_5" data-category="gpu" data-company="AMD" data-wattage="280">
              <img src="Pics/gpu/nvidia/rx 6800.jpg" alt="Product 2">
              <h3>Radeon RX 6800</h3>
              <h4>Price: PKR 175000</h4>
              <h5>Power Usage: 280W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6<br>Base clock: 1,815 MHz<br>Boost clock: 2,105 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Triple-fan cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
            <div class="product" data-id="nvidia_gpu_1" data-category="gpu" data-company="Nvidia" data-wattage="350">
              <img src="Pics/gpu/nvidia/AORUS GeForce RTX™ 3090 Ti XTREME WATERFORCE 24G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 3090 Ti 24G</h3>
              <h4>Price: PKR 450000</h4>
              <h5>Power Usage: 350W</h5>
              <h6>Description:</h6>
              <h6>Memory: 24GB GDDR6X<br>Base clock: 1,560 MHz<br>Boost clock: 1,860 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling:all-in-one cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>  
            </div>
          
          <div class="product" data-id="nvidia_gpu_2" data-category="gpu" data-company="Nvidia" data-wattage="180">
              <img src="Pics/gpu/nvidia/AORUS GeForce® GTX 1080 Ti Waterforce WB Xtreme Edition 11G.webp" alt="Product 2">
              <h3>Nvidia GTX 1080 Ti 11G</h3>
              <h4>Price: PKR 150000</h4>
              <h5>Power Usage: 180W</h5>
              <h6>Description:</h6>
              <h6>Memory: 11GB GDDR5X<br>Base clock: 1,607 MHz<br>Boost clock: 1,721 MHz<br>Interface: PCIe 3.0 x16<br>Max resolution: 7680x4320<br>Cooling: Waterforce water block cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
        </div>
          
          <div class="product" data-id="nvidia_gpu_3" data-category="gpu" data-company="Nvidia" data-wattage="450">
              <img src="Pics/gpu/nvidia/GeForce RTX™ 4060 Ti AERO OC 16G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 4060 Ti 16G</h3>
              <h4>Price: PKR 115000</h4>
              <h5>Power Usage: 450W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6<br>Base clock: 2,310 MHz<br>Boost clock: 2,580 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Advanced Windforce cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
          
          <div class="product" data-id="nvidia_gpu_4" data-category="gpu" data-company="Nvidia" data-wattage="450">
              <img src="Pics/gpu/nvidia/GeForce RTX™ 4060 Ti GAMING OC 16G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 4060 Ti 16G</h3>
              <h4>Price: PKR 120000</h4>
              <h5>Power Usage: 450W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6<br>Base clock: 2,310 MHz<br>Boost clock: 2,580 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Triple-fan Windforce cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
          
          <div class="product" data-id="nvidia_gpu_5" data-category="gpu" data-company="Nvidia" data-wattage="450">
              <img src="Pics/gpu/nvidia/GeForce RTX™ 4070 Ti SUPER AI TOP 16G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 4070 Ti 16G</h3>
              <h4>Price: PKR 200000</h4>
              <h5>Power Usage: 450W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6X<br>Base clock: 2,310 MHz<br>Boost clock: 2,610 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Advanced triple-fan cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
          
          <div class="product" data-id="nvidia_gpu_6" data-category="gpu" data-company="Nvidia" data-wattage="120">
              <img src="Pics/gpu/nvidia/GeForce® GTX 1660 Ti GAMING OC 6G.webp" alt="Product 2">
              <h3>Nvidia GTX 1660 Ti 6G</h3>
              <h4>Price: PKR 65000</h4>
              <h5>Power Usage: 120W</h5>
              <h6>Description:</h6>
              <h6>Memory: 6GB GDDR6<br>Base clock: 1,500 MHz<br>Boost clock: 1,770 MHz<br>Interface: PCIe 3.0 x16<br>Max resolution: 7680x4320<br>Cooling: Windforce dual-fan cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
          
          <div class="product" data-id="nvidia_gpu_7" data-category="gpu" data-company="Nvidia" data-wattage="350">
              <img src="Pics/gpu/nvidia/rtx 3080.jpg" alt="Product 2">
              <h3>Nvidia RTX™ 3080</h3>
              <h4>Price: PKR 250000</h4>
              <h5>Power Usage: 350W</h5>
              <h6>Description:</h6>
              <h6>Memory: 10GB GDDR6X<br>Base clock: 1,440 MHz<br>Boost clock: 1,710 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Triple-fan cooling system</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
          <div class="product" data-id="Motherboard_1" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/asus motherboard.jpg" alt="Product 2">
              <h3>ASUS B650M S2H Motherboard</h3>
              <h4>Price: PKR 35000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: AM5<br>Chipset: B650M<br>Form Factor: Micro-ATX<br>Memory: DDR5 support, up to 128GB<br>PCIe 5.0 support<br>Networking: Gigabit LAN</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
          
          <div class="product" data-id="Motherboard_2" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/intel B760M D3HP.webp" alt="Product 2">
              <h3>Intel B760M D3HP Motherboard</h3>
              <h4>Price: PKR 28000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: LGA 1700<br>Chipset: B760<br>Form Factor: Micro-ATX<br>Memory: DDR4 support, up to 128GB<br>PCIe 4.0 support<br>Networking: Gigabit LAN</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
            </div>
          <div class="product" data-id="Motherboard_3" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/intel X299 AORUS Gaming 7 (rev. 1.0).webp" alt="Product 2">
              <h3>Intel X299 AORUS Gaming 7 Motherboard</h3>
              <h4>Price: PKR 65000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: LGA 2066<br>Chipset: X299<br>Form Factor: ATX<br>Memory: DDR4 support, up to 128GB<br>PCIe 3.0 support<br>Networking: Dual Gigabit LAN, Wi-Fi</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
        </div>
          
          <div class="product" data-id="Motherboard_4" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/intel X299X AORUS MASTER (rev. 1.x).webp" alt="Product 2">
              <h3>Intel X299X AORUS MASTER  Motherboard</h3>
              <h4>Price: PKR 90000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: LGA 2066<br>Chipset: X299X<br>Form Factor: ATX<br>Memory: DDR4 support, up to 256GB<br>PCIe 3.0 support<br>Networking: 10GbE LAN, Wi-Fi 6</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Motherboard_5" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/msi motherboard.jpg" alt="Product 2">
              <h3>MSI X870E AORUS MASTER Motherboard</h3>
              <h4>Price: PKR 70000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: AM5<br>Chipset: X870E<br>Form Factor: ATX<br>Memory: DDR5 support, up to 128GB<br>PCIe 5.0 support<br>Networking: 10GbE LAN, Wi-Fi 6E</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Motherboard_6" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/X870E AORUS MASTER.webp" alt="Product 2">
              <h3>MSI X870E AORUS PRO Motherboard</h3>
              <h4>Price: PKR 55000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: AM5<br>Chipset: X870E<br>Form Factor: ATX<br>Memory: DDR5 support, up to 128GB<br>PCIe 5.0 support<br>Networking: 2.5GbE LAN, Wi-Fi 6E</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="RAM_1" data-category="RAM" data-wattage="5">
              <img src="Pics/ram/DESIGNARE Memory 64GB (2x32GB).webp" alt="Product 2">
              <h3>DESIGNARE Memory 64GB (2x32GB) RAM</h3>
              <h4>Price: PKR 85000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: DDR4<br>Speed: 3200MHz<br>Capacity: 64GB (2x32GB)<br>Voltage: 1.35V<br>Features: High-performance design, optimized for professional workloads, RGB lighting</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="RAM_2" data-category="RAM" data-wattage="5">
              <img src="Pics/ram/GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp" alt="Product 2">
              <h3>GIGABYTE Memory 16GB (2x8GB) 2666MHz RAM</h3>
              <h4>Price: PKR 18000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: DDR4<br>Speed: 2666MHz<br>Capacity: 16GB (2x8GB)<br>Voltage: 1.2V<br>Features: Reliable performance, ideal for gaming and multitasking</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="RAM_3" data-category="RAM" data-wattage="5">
              <img src="Pics/ram/RGB Memory DDR5 32GB (2x16GB).webp" alt="Product 2">
              <h3>RGB Memory DDR5 32GB (2x16GB) RAM</h3>
              <h4>Price: PKR 32000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: DDR5<br>Speed: 4800MHz<br>Capacity: 32GB (2x16GB)<br>Latency: CL40<br>Voltage: 1.1V<br>Features: High-performance design, RGB lighting</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="SSD_1" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/AORUS Gen5 14000 SSD 1TB.webp" alt="Product 2">
              <h3>Gen5 14000 SSD 1TB</h3>
              <h4>Price: PKR 65000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 5.0 x4<br>Capacity: 1TB<br>Read Speed: Up to 14,000 MB/s<br>Write Speed: Up to 13,000 MB/s<br>Form Factor: M.2 2280<br>Features:high endurance</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="SSD_2" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 250GB.webp" alt="Product 2">
              <h3>Gen4 4000E SSD 250GB</h3>
              <h4>Price: PKR 15000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 4.0 x4<br>Capacity: 250GB<br>Read Speed: Up to 5,000 MB/s<br>Write Speed: Up to 2,500 MB/s<br>Form Factor: M.2 2280<br>Features: Efficient performance</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="SSD_3" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 500GB.webp" alt="Product 2">
              <h3>Gen4 4000E SSD 500GB</h3>
              <h4>Price: PKR 25000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 4.0 x4<br>Capacity: 500GB<br>Read Speed: Up to 5,000 MB/s<br>Write Speed: Up to 2,500 MB/s<br>Form Factor: M.2 2280<br>Features: Efficient performance</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="SSD_4" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE M.2 SSD 500GB.webp" alt="Product 2">
              <h3>M.2 SSD 500GB</h3>
              <h4>Price: PKR 20000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 3.0 x4<br>Capacity: 500GB<br>Read Speed: Up to 3,500 MB/s<br>Write Speed: Up to 2,100 MB/s<br>Form Factor: M.2 2280<br>Features: Reliable performance</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="SSD_5" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE NVMe SSD 1TB.webp" alt="Product 2">
              <h3>NVMe SSD 1TB</h3>
              <h4>Price: PKR 35000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 3.0 x4<br>Capacity: 1TB<br>Read Speed: Up to 3,500 MB/s<br>Write Speed: Up to 3,000 MB/s<br>Form Factor: M.2 2280<br>Features: High capacity and speed</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="SSD_6" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE SSD 512GB.webp" alt="Product 2">
              <h3>SATA SSD 512GB</h3>
              <h4>Price: PKR 12000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: SATA SSD<br>Interface: SATA III<br>Capacity: 512GB<br>Read Speed: Up to 550 MB/s<br>Write Speed: Up to 500 MB/s<br>Form Factor: 2.5-inch<br>Features: Affordable and reliable</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="SSD_7" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE UD PRO SSD 1TB.webp" alt="Product 2">
              <h3>UD PRO SSD 1TB</h3>
              <h4>Price: PKR 30000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: SATA SSD<br>Interface: SATA III<br>Capacity: 512GB<br>Read Speed: Up to 550 MB/s<br>Write Speed: Up to 500 MB/s<br>Form Factor: 2.5-inch<br>Features: Affordable and reliable</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
            <div class="product" data-id="Casing_1" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/AC300W (rev. 2.0).webp" alt="Product 2">
              <h3>AC300W Casing(rev. 2.0)</h3>
              <h4>Price: PKR 12000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fan<br>Front I/O: USB 3.0, USB 2.0<br>Features: Transparent side panel, cable management options</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Casing_2" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/AORUS C300 GLASS.webp" alt="Product 2">
              <h3>C300 GLASS Casing</h3>
              <h4>Price: PKR 18000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fan, support for liquid cooling<br>Front I/O: USB 3.1 Gen 1, USB 3.0, USB 2.0<br>Features: Tempered glass side panel, RGB lighting, cable management options</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Casing_3" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/AORUS C400 GLASS.webp" alt="Product 2">
              <h3>C400 GLASS Casing</h3>
              <h4>Price: PKR 22000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fans, support for liquid cooling<br>Front I/O: USB 3.1 Gen 2, USB 3.0, USB 2.0<br>Features: Tempered glass side panel, RGB Fusion 2.0, cable management options</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Casing_4" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/AORUS C500 GLASS.webp" alt="Product 2">
              <h3>C500 GLASS Casing</h3>
              <h4>Price: PKR 28000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fans, extensive support for liquid cooling<br>Front I/O: USB 3.1 Gen 2 Type-C, USB 3.0<br>Features: Tempered glass side panel, RGB Fusion 2.0, advanced cable management options</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Casing_5" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/Sumo 5112.webp" alt="Product 2">
              <h3>Sumo 5112 Casing</h3>
              <h4>Price: PKR 10000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX<br>Cooling: Pre-installed 120mm fan<br>Front I/O: USB 3.0, USB 2.0<br>Features: Solid build quality, easy cable management</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Casing_6" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/XC700W.webp" alt="Product 2">
              <h3>XC700W Casing</h3>
              <h4>Price: PKR 20000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm RGB fan, support for liquid cooling<br>Front I/O: USB 3.1 Gen 1, USB 3.0, USB 2.0<br>Features: Tempered glass side panel, customizable RGB lighting, superior airflow design</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Power_supply_1" data-category="Power_supply" data-wattage="1600">
              <img src="Pics/psu/ASUS ROG Thor 1600W Titanium,1600W ATX.jpg" alt="Product 2">
              <h3>ASUS ROG Thor 1600W Titanium Power Supply</h3>
              <h4>Price: PKR 75000</h4>
              <h5>Power Supply: 1600W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 1600W<br>Certification: 80 PLUS Titanium<br>Form Factor: ATX<br>Cooling: 135mm fan with dustproof design<br>Features: OLED Power Display, Aura Sync RGB lighting, fully modular cables</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Power_supply_2" data-category="Power_supply" data-wattage="850">
              <img src="Pics/psu/ASUS TUF GAMING 850W 80+ Gold.jpg" alt="Product 2">
              <h3>ASUS TUF GAMING 850W 80-Plus Gold Power Supply</h3>
              <h4>Price: PKR 35000</h4>
              <h5>Power Supply: 850W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 850W<br>Certification: 80 PLUS Gold<br>Form Factor: ATX<br>Cooling: 135mm Axial-tech fan<br>Features: Fully modular cables, military-grade components, extended durability</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
          
          <div class="product" data-id="Power_supply_3" data-category="Power_supply" data-wattage="650">
              <img src="Pics/psu/CORSAIR-CX-Series-CX650-80-PLUS.webp" alt="Product 2">
              <h3>CORSAIR CX Series CX650 80-PLUS Power Supply</h3>
              <h4>Price: PKR 18000</h4>
              <h5>Power Supply: 650W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 650W<br>Certification: 80 PLUS Bronze<br>Form Factor: ATX<br>Cooling: 120mm thermally controlled fan<br>Features: Semi-modular cables, reliable power delivery, budget-friendly</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>

          
          <div class="product" data-id="Power_supply_4" data-category="Power_supply" data-wattage="1250">
              <img src="Pics/psu/MSI MAG A1250GL PCIE 5, 80 GOLD Fully.webp" alt="Product 2">
              <h3>MSI MAG A1250GL PCIE 5 Power Supply</h3>
              <h4>Price: PKR 50000</h4>
              <h5>Power Supply: 1250W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 1250W<br>Certification: 80 PLUS Gold<br>Form Factor: ATX<br>Cooling: 135mm fluid dynamic bearing fan<br>Features: Fully modular cables, PCIe 5.0 ready, enhanced cooling design</h6>
           <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
        </div>
          
          <div class="product" data-id="Power_supply-5" data-category="Power_supply" data-wattage="650">
              <img src="Pics/psu/SilverStone SST-AT650R-BF-WBW ATTIS White 650R 80.webp" alt="Product 2">
              <h3>SilverStone SST-AT650R Power Supply</h3>
              <h4>Price: PKR 20000</h4>
              <h5>Power Supply: 650W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 650W<br>Certification: 80 PLUS Bronze<br>Form Factor: ATX<br>Cooling: 120mm silent fan<br>Features: Semi-modular cables, stylish white design, reliable performance</h6>
              <div class="button-container">
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-builder">Add to Builder</button>
                <button class="buy-now">Buy Now</button>
            </div>
          </div>
        </div>
      </div>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
<?php 
include('includes/footer.php');
?>
<script>
// Get all product divs
const productDivs = document.querySelectorAll('.product');

// Add event listener to each product's "Add to Builder" button
productDivs.forEach((productDiv) => {
  const addButton = productDiv.querySelector('.add-to-builder');
  addButton.addEventListener('click', () => {
    // Get the product name, wattage, and price
    const productNameTag = productDiv.querySelector('h3');
    const productName = productNameTag.textContent;
    const wattage = parseInt(productDiv.dataset.wattage);
    const priceTag = productDiv.querySelector('h4');
    const price = parseInt(priceTag.textContent.replace('Price: PKR ', ''));

    // Redirect to the builder page with the product name, wattage, and price as query parameters
    window.location.href = `builder_1.php?component=${productName}&wattage=${wattage}&price=${price}`;
  });
});
</script>
    </body>
</html>
