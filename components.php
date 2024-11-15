<?php 

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
    <script src="builder.js"></script>
</head>
<body style="font-family: Georgia, 'Times New Roman', Times, serif";>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if componentType is set by PHP
    if (<?php echo isset($componentType) ? 'true' : 'false'; ?>) {
        var componentType = '<?php echo $componentType; ?>';
        
        // Debugging: Log the componentType
        console.log("Component Type:", componentType);
        
        // Select the checkbox for the specified component type
        var checkbox = document.querySelector(`[data-category="${componentType}"]`);
        
        if (checkbox) {
            // Debugging: Log if the checkbox is found
            console.log("Checkbox found for componentType:", componentType);
            
            checkbox.checked = true;
            // Trigger the change event to simulate user interaction
            checkbox.dispatchEvent(new Event('change'));
        } else {
            console.warn('Checkbox for componentType not found:', componentType);
        }
    } else {
        console.warn('componentType is not set');
    }
});
</script>
    <header>
        
    <div class="search">
      <input type="text" name="" id="searchBox" placeholder="search here...." onkeyup="search()">
   </div>

   <a href="#" class="btn btn-outline-primary cart-btn" onclick="openCart()">
    <i class="bi bi-cart-fill"></i> Cart
    <span class="badge bg-danger">0</span>
</a>

<!-- Sidebar -->
<div id="cartSidebar" class="cart-sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a>
    <h2>Your Cart</h2>
    
    <!-- Table for product names and prices -->
    <div class="cart-header">
        <div class="cart-header-item">Product</div>
        <div class="cart-header-item">Price</div>
    </div>

    <div id="cartItems"></div>

    <h4>Total: <span id="cartTotal">0</span></h4>

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
                <input type="checkbox" id="category-top-seller" data-category="top_seller">
                <label for="category-top-seller">Top Seller</label>
            </li>
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
            <li>
                <input type="checkbox" id="category-cpu-cooler" data-category="cpu_cooler">
                <label for="category-cpu-cooler">CPU-Cooler</label>
            </li>
            <li>
                <input type="checkbox" id="category-monitor" data-category="monitor">
                <label for="category-monitor">Monitor</label>
            </li>
            <li>
                <input type="checkbox" id="category-mouse" data-category="mouse">
                <label for="category-mouse">Mouse</label>
            </li>
            <li>
                <input type="checkbox" id="category-keyboard" data-category="keyboard">
                <label for="category-keyboard">Keyboard</label>
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
          <div class="products" style=" font-family: none";>
          <div class="product" onclick="selectComponent('cpu', 'AMD Ryzen 3 3200G','Pics/cpu/AMD Ryzen 3 3200G 4-Core.jpg', '65', '28000')" data-id="amd_1" data-category="cpu" data-company="Ryzen" data-wattage="65">
              <img src="Pics/cpu/AMD Ryzen 3 3200G 4-Core.jpg" alt="Product 1">
              <h3>AMD Ryzen 3 3200G 4-Core</h3>
              <h4>₨ 28000</h4>
              <h5>Power Usage: 65W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.6 GHz<br>Max boost clock: 4.0 GHz<br>Integrated Radeon Vega 8 Graphics<br>Unlocked for overclocking<br>Thermal Design Power (TDP): 65W</h6>
            <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
            <div class="button-container">
            <button class="add-to-builder">Add to Builder</button>
            
            </div>
            </div>
            <div class="product" onclick="selectComponent('cpu', 'Ryzen 5 3600', 'Pics/cpu/AMD Ryzen 5 7600X.jpg', '105', '25000')" data-id="amd_2" data-category="cpu,top_seller" data-company="Ryzen" data-wattage="105">
            <img src="Pics/cpu/AMD Ryzen 5 7600X.jpg" alt="Product 2">
            <h3>AMD Ryzen 5 3600</h3>
            <h4>₨ 25000</h4>
            <h5>Power Usage: 105W</h5>
            <h6>Description:</h6>
            <h6>Base clock: 4.7 GHz<br>Max boost clock: 5.3 GHz<br>6 Cores / 12 Threads<br>PCIe 5.0 support<br>Thermal Design Power (TDP): 105W</h6>
            <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
            <div class="button-container">
            <button class="add-to-builder">Add to Builder</button>
            
            </div>
            </div>
            <div class="product" onclick="selectComponent('cpu', 'AMD Ryzen 7 7800X', 'Pics/cpu/AMD-Ryzen-7-7800X.jpg', '120', '75000')" data-id="amd_3" data-category="cpu,top_seller" data-company="Ryzen" data-wattage="120">
              <img src="Pics/cpu/AMD-Ryzen-7-7800X.jpg" alt="Product 3">
              <h3>AMD Ryzen 7 7800X</h3>
              <h4>₨ 75000</h4>
              <h5>Power Usage: 120W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 4.5 GHz<br>Max boost clock: 5.2 GHz<br>8 Cores / 16 Threads<br>Support for DDR5<br>Thermal Design Power (TDP): 65W</h6>
            <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
            <div class="button-container">
            <button class="add-to-builder">Add to Builder</button>
            
            </div>
          </div>

          <div class="product" onclick="selectComponent('cpu', 'AMD Ryzen 9 9900X', 'Pics/cpu/AMD Ryzen 9 9900X Twelve Core 5.60GHz.jpg', '140','115000')" data-id="amd_4" data-category="cpu" data-company="Ryzen" data-wattage="140">
              <img src="Pics/cpu/AMD Ryzen 9 9900X Twelve Core 5.60GHz.jpg" alt="Product 4">
              <h3>AMD Ryzen 9 9900X</h3>
              <h4>₨ 115000</h5>
              <h5>Power Usage: 140W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.8 GHz<br>Max boost clock: 5.6 GHz<br>12 Cores / 24 Threads<br>Precision Boost 2 technology<br>Thermal Design Power (TDP): 140W</h6>
            <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
            <div class="button-container">
            <button class="add-to-builder">Add to Builder</button>
            
            </div>
          </div>

          <div class="product" onclick="selectComponent('cpu', 'Intel Core i3 6th Gen', 'Pics/cpu/core i3.jpg', '50','22000')" data-id="intel_1" data-category="cpu" data-company="Intel" data-wattage="80">
            <img src="Pics/cpu/core i3.jpg" alt="Product 5">
            <h3>Intel Core i3 6th Gen</h3>
            <h4>₨ 22000</h5>
            <h5>Power Usage: 50W</h5>
            <h6>Description:</h6>
            <h6>Base clock: 3.6 GHz<br>Max turbo frequency: 4.2 GHz<br>4 Cores / 8 Threads<br>Integrated Intel UHD Graphics 630<br>Thermal Design Power (TDP): 65W</h6>
            <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
            <div class="button-container">
              <button class="add-to-builder">Add to Builder</button>
              
            </div>
          </div>

          <div class="product" onclick="selectComponent('cpu', 'Intel Core i5 5th Gen', 'Pics/cpu/core i5.webp', '50','35000')" data-id="intel_2" data-category="cpu,top_seller" data-company="Intel" data-wattage="90">
              <img src="Pics/cpu/core i5.webp" alt="Product 6">
              <h3>Intel Core i5 5th Gen</h3>
              <h4>₨ 35000</h5>
              <h5>Power Usage: 50W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 2.9 GHz<br>Max turbo frequency: 4.3 GHz<br>6 Cores / 12 Threads<br>Integrated Intel UHD Graphics 630<br>Thermal Design Power (TDP): 65W</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('cpu', 'Intel Core i7 10th Gen', 'Pics/cpu/core i7 10th gen.jpg', '100', '52000')" data-id="intel_3" data-category="cpu" data-company="Intel" data-wattage="100">
              <img src="Pics/cpu/core i7 10th gen.jpg" alt="Product 7">
              <h3>Intel Core i7 10th Gen</h3>
              <h4>₨ 52000</h5>
              <h5>Power Usage: 100W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 2.9 GHz<br>Max turbo frequency: 4.8 GHz<br>8 Cores / 16 Threads<br>Intel Turbo Boost Max Technology 3.0<br>Thermal Design Power (TDP): 65W</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('cpu', 'Intel Core i7 12820X 12th Gen', 'Pics/cpu/core i7.jpg', '120', '75000')" data-id="intel_4" data-category="cpu" data-company="Intel" data-wattage="120">
              <img src="Pics/cpu/core i7.jpg" alt="Product 8">
              <h3>Intel Core i7 12820X 12th Gen</h3>
              <h4>₨ 75000</h5>
              <h5>Power Usage: 120W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.6 GHz<br>Max turbo frequency: 4.9 GHz<br>8 Cores / 16 Threads<br>Support for PCIe 5.0 and DDR5<br>Thermal Design Power (TDP): 125W</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('cpu', 'Intel Core i9 14th Gen', 'Pics/cpu/core i9.jpeg', '150', '95000')" data-id="intel_5" data-category="cpu" data-company="Intel" data-wattage="150">
              <img src="Pics/cpu/core i9.jpeg" alt="Product 9">
              <h3>Intel Core i9 14th Gen</h3>
              <h4>₨ 95000</h5>
              <h5>Power Usage: 150W</h5>
              <h6>Description:</h6>
              <h6>Base clock: 3.7 GHz<br>Max turbo frequency: 5.8 GHz<br>16 Cores / 24 Threads<br>Advanced Intel Thermal Velocity Boost<br>Thermal Design Power (TDP): 125W</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'AMD RX 5700 XT 8G', 'Pics/gpu/AMD/AORUS Radeon™ RX 5700 XT 8G (rev. 2.0).webp', '300', '75000')" data-id="amd_gpu_1" data-category="gpu,top_seller" data-company="AMD" data-wattage="300">
              <img src="Pics/gpu/AMD/AORUS Radeon™ RX 5700 XT 8G (rev. 2.0).webp" alt="Product 2">
              <h3>AMD RX 5700 XT 8G</h3>
              <h4>₨ 75000</h5>
              <h5>Power Usage: 300W</h5>
              <h6>Description:</h6>
              <h6>Memory: 8GB GDDR6<br>Base clock: 1,605 MHz<br>Boost clock: 1,905 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Windforce 3X cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="add-to-builder">Add to Builder</button>
              
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'AMD RX 7900 24G', 'Pics/gpu/AMD/AORUS Radeon™ RX 7900 XTX ELITE 24G.webp', '350', '340000')" data-id="amd_gpu_2" data-category="gpu" data-company="AMD" data-wattage="350">
              <img src="Pics/gpu/AMD/AORUS Radeon™ RX 7900 XTX ELITE 24G.webp" alt="Product 2">
              <h3>AMD RX 7900 24G</h3>
              <h4>₨ 340000</h4>
              <h5>Power Usage: 350W</h5>
              <h6>Description:</h6>
              <h6>Memory: 24GB GDDR6<br>Base clock: 1,900 MHz<br>Boost clock: 2,500 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Advanced triple-fan cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'AMD RX VEGA 64', 'Pics/gpu/AMD/radeon RX vega 64.webp', '250', '140000')" data-id="amd_gpu_3" data-category="gpu" data-company="AMD" data-wattage="300">
              <img src="Pics\gpu\AMD\radeon RX vega 64.webp" alt="Product 2">
              <h3>AMD RX VEGA 64</h3>
              <h4>₨ 140000</h4>
              <h5>Power Usage: 250W</h5>
              <h6>Description:</h6>
              <h6>Memory: 32GB GDDR6<br>Base clock: 1,700 MHz<br>Boost clock: 2,100 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Optimized for professional workloads and AI</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'AMD RX 580', 'Pics/gpu/AMD/rx 580.webp', '250', '65000')" data-id="amd_gpu_4" data-category="gpu,top_seller" data-company="AMD" data-wattage="290">
              <img src="Pics\gpu\AMD\rx 580.webp" alt="Product 2">
              <h3>AMD RX 580</h3>
              <h4>₨ 65000</h4>
              <h5>Power Usage: 250W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB HBM2<br>Base clock: 1,400 MHz<br>Boost clock: 1,750 MHz<br>Interface: PCIe 3.0 x16<br>Max resolution: 7680x4320<br>Cooling: Liquid-cooling ready</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'Radeon RX 6800', 'Pics/gpu/nvidia/rx 6800.jpg', '280', '175000')" data-id="amd_gpu_5" data-category="gpu" data-company="AMD" data-wattage="280">
              <img src="Pics/gpu/nvidia/rx 6800.jpg" alt="Product 2">
              <h3>Radeon RX 6800</h3>
              <h4>₨ 175000</h4>
              <h5>Power Usage: 280W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6<br>Base clock: 1,815 MHz<br>Boost clock: 2,105 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Triple-fan cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'Nvidia RTX™ 3090 Ti 24G', 'Pics/gpu/nvidia/AORUS GeForce RTX™ 3090 Ti XTREME WATERFORCE 24G.webp', '350', '360000')" data-id="nvidia_gpu_1" data-category="gpu,top_seller" data-company="Nvidia" data-wattage="350">
              <img src="Pics/gpu/nvidia/AORUS GeForce RTX™ 3090 Ti XTREME WATERFORCE 24G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 3090 Ti 24G</h3>
              <h4>₨ 360000</h4>
              <h5>Power Usage: 350W</h5>
              <h6>Description:</h6>
              <h6>Memory: 24GB GDDR6X<br>Base clock: 1,560 MHz<br>Boost clock: 1,860 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: All-in-one cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'Nvidia GTX 1080 Ti 11G', 'Pics/gpu/nvidia/AORUS GeForce® GTX 1080 Ti Waterforce WB Xtreme Edition 11G.webp', '180', '120000')" data-id="nvidia_gpu_2" data-category="gpu,top_seller" data-company="Nvidia" data-wattage="180">
              <img src="Pics/gpu/nvidia/AORUS GeForce® GTX 1080 Ti Waterforce WB Xtreme Edition 11G.webp" alt="Product 2">
              <h3>Nvidia GTX 1080 Ti 11G</h3>
              <h4>₨ 120000</h4>
              <h5>Power Usage: 180W</h5>
              <h6>Description:</h6>
              <h6>Memory: 11GB GDDR5X<br>Base clock: 1,607 MHz<br>Boost clock: 1,721 MHz<br>Interface: PCIe 3.0 x16<br>Max resolution: 7680x4320<br>Cooling: Waterforce water block cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'Nvidia RTX™ 2080 Ti 16G', 'Pics/gpu/nvidia/GeForce RTX™ 4060 Ti AERO OC 16G.webp', '200', '195000')" data-id="nvidia_gpu_3" data-category="gpu" data-company="Nvidia" data-wattage="450">
              <img src="Pics/gpu/nvidia/GeForce RTX™ 4060 Ti AERO OC 16G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 2080 Ti 16G</h3>
              <h4>₨ 195000</h4>
              <h5>Power Usage: 200W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6<br>Base clock: 2,310 MHz<br>Boost clock: 2,580 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Advanced Windforce cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'Nvidia RTX™ 4060 Ti 16G', 'Pics/gpu/nvidia/GeForce RTX™ 4060 Ti GAMING OC 16G.webp', '450', '90000')" data-id="nvidia_gpu_4" data-category="gpu" data-company="Nvidia" data-wattage="450">
              <img src="Pics/gpu/nvidia/GeForce RTX™ 4060 Ti GAMING OC 16G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 4060 Ti 16G</h3>
              <h4>₨ 90000</h4>
              <h5>Power Usage: 450W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6<br>Base clock: 2,310 MHz<br>Boost clock: 2,580 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Triple-fan Windforce cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'Nvidia RTX™ 4070 Ti 16G', 'Pics/gpu/nvidia/GeForce RTX™ 4070 Ti SUPER AI TOP 16G.webp', '450', '170000')" data-id="nvidia_gpu_5" data-category="gpu" data-company="Nvidia" data-wattage="450">
              <img src="Pics/gpu/nvidia/GeForce RTX™ 4070 Ti SUPER AI TOP 16G.webp" alt="Product 2">
              <h3>Nvidia RTX™ 4070 Ti 16G</h3>
              <h4>₨ 170000</h4>
              <h5>Power Usage: 450W</h5>
              <h6>Description:</h6>
              <h6>Memory: 16GB GDDR6X<br>Base clock: 2,310 MHz<br>Boost clock: 2,610 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Advanced triple-fan cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('gpu', 'Nvidia GTX 1660 Ti 6G', 'Pics/gpu/nvidia/GeForce® GTX 1660 Ti GAMING OC 6G.webp', '120', '65000')" data-id="nvidia_gpu_6" data-category="gpu" data-company="Nvidia" data-wattage="120">
              <img src="Pics/gpu/nvidia/GeForce® GTX 1660 Ti GAMING OC 6G.webp" alt="Product 2">
              <h3>Nvidia GTX 1660 Ti 6G</h3>
              <h4>₨ 65000</h4>
              <h5>Power Usage: 120W</h5>
              <h6>Description:</h6>
              <h6>Memory: 6GB GDDR6<br>Base clock: 1,500 MHz<br>Boost clock: 1,770 MHz<br>Interface: PCIe 3.0 x16<br>Max resolution: 7680x4320<br>Cooling: Windforce dual-fan cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>
          
            <div class="product" onclick="selectComponent('gpu', 'Nvidia RTX™ 3080', 'Pics/gpu/nvidia/rtx 3080.jpg', '350', '250000')" data-id="nvidia_gpu_7" data-category="gpu" data-company="Nvidia" data-wattage="350">
              <img src="Pics/gpu/nvidia/rtx 3080.jpg" alt="Product 2">
              <h3>Nvidia RTX™ 3080</h3>
              <h4>₨ 250000</h4>
              <h5>Power Usage: 350W</h5>
              <h6>Description:</h6>
              <h6>Memory: 10GB GDDR6X<br>Base clock: 1,440 MHz<br>Boost clock: 1,710 MHz<br>Interface: PCIe 4.0 x16<br>Max resolution: 7680x4320<br>Cooling: Triple-fan cooling system</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('motherboard', 'ASUS B650M S2H Motherboard', 'Pics/Motherboard/asus motherboard.jpg', '80', '35000')" data-id="Motherboard_1" data-category="Motherboard,top_seller" data-wattage="80">
              <img src="Pics/Motherboard/asus motherboard.jpg" alt="Product 2">
              <h3>ASUS B650M S2H Motherboard</h3>
              <h4>₨ 35000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: AM5<br>Chipset: B650M<br>Form Factor: Micro-ATX<br>Memory: DDR5 support, up to 128GB<br>PCIe 5.0 support<br>Networking: Gigabit LAN</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>
          
          <div class="product" onclick="selectComponent('motherboard', 'Intel B760M D3HP Motherboard', 'Pics/Motherboard/intel B760M D3HP.webp', '80', '28000')" data-id="Motherboard_2" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/intel B760M D3HP.webp" alt="Product 2">
              <h3>Intel B760M D3HP Motherboard</h3>
              <h4>₨ 28000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: LGA 1700<br>Chipset: B760<br>Form Factor: Micro-ATX<br>Memory: DDR4 support, up to 128GB<br>PCIe 4.0 support<br>Networking: Gigabit LAN</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('motherboard', 'Intel X299 AORUS Gaming 7 Motherboard', 'Pics/Motherboard/intel X299 AORUS Gaming 7 (rev. 1.0).webp', '80', '65000')" data-id="Motherboard_3" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/intel X299 AORUS Gaming 7 (rev. 1.0).webp" alt="Product 2">
              <h3>Intel X299 AORUS Gaming 7 Motherboard</h3>
              <h4>₨ 65000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: LGA 2066<br>Chipset: X299<br>Form Factor: ATX<br>Memory: DDR4 support, up to 128GB<br>PCIe 3.0 support<br>Networking: Dual Gigabit LAN, Wi-Fi</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('motherboard', 'MSI B550M Motherboard', 'Pics/Motherboard/MSI B550M.webp', '80', '46000')" data-id="Motherboard_4" data-category="Motherboard" data-wattage="80">
              <img src="Pics\Motherboard\MSI B550M.webp" alt="Product 2">
              <h3>MSI B550M Motherboard</h3>
              <h4>₨ 46000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: LGA 2066<br>Chipset: X299X<br>Form Factor: ATX<br>Memory: DDR4 support, up to 256GB<br>PCIe 3.0 support<br>Networking: 10GbE LAN, Wi-Fi 6</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('motherboard', 'MSI X870E AORUS MASTER Motherboard', 'Pics/Motherboard/msi motherboard.jpg', '80', '70000')" data-id="Motherboard_5" data-category="Motherboard" data-wattage="80">
              <img src="Pics/Motherboard/msi motherboard.jpg" alt="Product 2">
              <h3>MSI X870E AORUS MASTER Motherboard</h3>
              <h4>₨ 70000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: AM5<br>Chipset: X870E<br>Form Factor: ATX<br>Memory: DDR5 support, up to 128GB<br>PCIe 5.0 support<br>Networking: 10GbE LAN, Wi-Fi 6E</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('motherboard', 'Gigabyte B450M Motherboard', 'Pics/Motherboard/B450M.webp', '80', '55000')" data-id="Motherboard_6" data-category="Motherboard,top_seller" data-wattage="80">
              <img src="Pics\Motherboard\B450M.webp" alt="Product 2">
              <h3>Gigabyte B450M Motherboard</h3>
              <h4>₨ 25000</h4>
              <h5>Power Usage: 80W</h5>
              <h6>Description:</h6>
              <h6>Socket: AM5<br>Chipset: X870E<br>Form Factor: ATX<br>Memory: DDR5 support, up to 128GB<br>PCIe 5.0 support<br>Networking: 2.5GbE LAN, Wi-Fi 6E</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>
          
          <div class="product" onclick="selectComponent('ram', 'DESIGNARE Memory 64GB (2x32GB) RAM', 'Pics/ram/DESIGNARE Memory 64GB (2x32GB).webp', '5', '85000')" data-id="RAM_1" data-category="RAM" data-wattage="5">
              <img src="Pics/ram/DESIGNARE Memory 64GB (2x32GB).webp" alt="Product 2">
              <h3>DESIGNARE Memory 64GB (2x32GB) RAM</h3>
              <h4>₨ 85000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: DDR4<br>Speed: 3200MHz<br>Capacity: 64GB (2x32GB)<br>Voltage: 1.35V<br>Features: High-performance design, optimized for professional workloads, RGB lighting</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ram', 'GIGABYTE Memory 16GB (2x8GB) 2666MHz RAM', 'Pics/ram/GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp', '5', '18000')" data-id="RAM_2" data-category="RAM,top_seller" data-wattage="5">
              <img src="Pics/ram/GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp" alt="Product 2">
              <h3>GIGABYTE Memory 16GB (2x8GB) 2666MHz RAM</h3>
              <h4>₨ 18000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: DDR4<br>Speed: 2666MHz<br>Capacity: 16GB (2x8GB)<br>Voltage: 1.2V<br>Features: Reliable performance, ideal for gaming and multitasking</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ram', 'RGB Memory DDR5 32GB (2x16GB) RAM', 'Pics/ram/RGB Memory DDR5 32GB (2x16GB).webp', '5', '32000')" data-id="RAM_3" data-category="RAM" data-wattage="5">
              <img src="Pics/ram/RGB Memory DDR5 32GB (2x16GB).webp" alt="Product 2">
              <h3>RGB Memory DDR5 32GB (2x16GB) RAM</h3>
              <h4>₨ 32000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: DDR5<br>Speed: 4800MHz<br>Capacity: 32GB (2x16GB)<br>Latency: CL40<br>Voltage: 1.1V<br>Features: High-performance design, RGB lighting</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          
          <div class="product" onclick="selectComponent('ssd', 'Gen5 14000 SSD 1TB', 'Pics/ssd/AORUS Gen5 14000 SSD 1TB.webp', '5', '65000')" data-id="SSD_1" data-category="SSD,top_seller" data-wattage="5">
              <img src="Pics/ssd/AORUS Gen5 14000 SSD 1TB.webp" alt="Product 2">
              <h3>Gen5 14000 SSD 1TB</h3>
              <h4>₨ 65000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 5.0 x4<br>Capacity: 1TB<br>Read Speed: Up to 14,000 MB/s<br>Write Speed: Up to 13,000 MB/s<br>Form Factor: M.2 2280<br>Features: High endurance</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ssd', 'Gen4 4000E SSD 250GB', 'Pics/ssd/GIGABYTE Gen4 4000E SSD 250GB.webp', '5', '15000')" data-id="SSD_2" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 250GB.webp" alt="Product 2">
              <h3>Gen4 4000E SSD 250GB</h3>
              <h4>₨ 15000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 4.0 x4<br>Capacity: 250GB<br>Read Speed: Up to 5,000 MB/s<br>Write Speed: Up to 2,500 MB/s<br>Form Factor: M.2 2280<br>Features: Efficient performance</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ssd', 'Gen4 4000E SSD 500GB', 'Pics/ssd/GIGABYTE Gen4 4000E SSD 500GB.webp', '5', '25000')" data-id="SSD_3" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE Gen4 4000E SSD 500GB.webp" alt="Product 2">
              <h3>Gen4 4000E SSD 500GB</h3>
              <h4>₨ 25000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 4.0 x4<br>Capacity: 500GB<br>Read Speed: Up to 5,000 MB/s<br>Write Speed: Up to 2,500 MB/s<br>Form Factor: M.2 2280<br>Features: Efficient performance</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ssd', 'M.2 SSD 500GB', 'Pics/ssd/GIGABYTE M.2 SSD 500GB.webp', '5', '20000')" data-id="SSD_4" data-category="SSD,top_seller" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE M.2 SSD 500GB.webp" alt="Product 2">
              <h3>M.2 SSD 500GB</h3>
              <h4>₨ 20000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 3.0 x4<br>Capacity: 500GB<br>Read Speed: Up to 3,500 MB/s<br>Write Speed: Up to 2,100 MB/s<br>Form Factor: M.2 2280<br>Features: Reliable performance</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ssd', 'NVMe SSD 1TB', 'Pics/ssd/GIGABYTE NVMe SSD 1TB.webp', '5', '35000')" data-id="SSD_5" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE NVMe SSD 1TB.webp" alt="Product 2">
              <h3>NVMe SSD 1TB</h3>
              <h4>₨ 35000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: NVMe SSD<br>Interface: PCIe 3.0 x4<br>Capacity: 1TB<br>Read Speed: Up to 3,500 MB/s<br>Write Speed: Up to 3,000 MB/s<br>Form Factor: M.2 2280<br>Features: High capacity and speed</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ssd', 'SATA SSD 512GB', 'Pics/ssd/GIGABYTE SSD 512GB.webp', '5', '12000')" data-id="SSD_6" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE SSD 512GB.webp" alt="Product 2">
              <h3>SATA SSD 512GB</h3>
              <h4>₨ 12000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: SATA SSD<br>Interface: SATA III<br>Capacity: 512GB<br>Read Speed: Up to 550 MB/s<br>Write Speed: Up to 500 MB/s<br>Form Factor: 2.5-inch<br>Features: Affordable and reliable</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('ssd', 'UD PRO SSD 1TB', 'Pics/ssd/GIGABYTE UD PRO SSD 1TB.webp', '5', '30000')" data-id="SSD_7" data-category="SSD" data-wattage="5">
              <img src="Pics/ssd/GIGABYTE UD PRO SSD 1TB.webp" alt="Product 2">
              <h3>UD PRO SSD 1TB</h3>
              <h4>₨ 30000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Type: SATA SSD<br>Interface: SATA III<br>Capacity: 1TB<br>Read Speed: Up to 550 MB/s<br>Write Speed: Up to 500 MB/s<br>Form Factor: 2.5-inch<br>Features: Affordable and reliable</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                  <button class="add-to-builder">Add to Builder</button>
                  
              </div>
          </div>

          <div class="product" onclick="selectComponent('case', 'AC300W Casing(rev. 2.0)', 'Pics/Casing/AC300W (rev. 2.0).webp', '0', '12000')" data-id="Casing_1" data-category="Casing,top_seller" data-wattage="0">
              <img src="Pics/Casing/AC300W (rev. 2.0).webp" alt="Product 2">
              <h3>AC300W Casing(rev. 2.0)</h3>
              <h4>₨ 12000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fan<br>Front I/O: USB 3.0, USB 2.0<br>Features: Transparent side panel, cable management options</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('case', 'C300 GLASS Casing', 'Pics/Casing/AORUS C300 GLASS.webp', '0', '18000')" data-id="Casing_2" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/AORUS C300 GLASS.webp" alt="Product 2">
              <h3>C300 GLASS Casing</h3>
              <h4>₨ 18000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fan, support for liquid cooling<br>Front I/O: USB 3.1 Gen 1, USB 3.0, USB 2.0<br>Features: Tempered glass side panel, RGB lighting, cable management options</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('case', 'C400 GLASS Casing', 'Pics/Casing/AORUS C400 GLASS.webp', '0', '22000')" data-id="Casing_3" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/AORUS C400 GLASS.webp" alt="Product 2">
              <h3>C400 GLASS Casing</h3>
              <h4>₨ 22000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fans, support for liquid cooling<br>Front I/O: USB 3.1 Gen 2, USB 3.0, USB 2.0<br>Features: Tempered glass side panel, RGB Fusion 2.0, cable management options</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>
          
            <div class="product" onclick="selectComponent('case', 'C500 GLASS Casing', 'Pics/Casing/AORUS C500 GLASS.webp', '0', '28000')" data-id="Casing_4" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/AORUS C500 GLASS.webp" alt="Product 2">
              <h3>C500 GLASS Casing</h3>
              <h4>₨ 28000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm fans, extensive support for liquid cooling<br>Front I/O: USB 3.1 Gen 2 Type-C, USB 3.0<br>Features: Tempered glass side panel, RGB Fusion 2.0, advanced cable management options</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('case', 'Sumo 5112 Casing', 'Pics/Casing/Sumo 5112.webp', '0', '10000')" data-id="Casing_5" data-category="Casing" data-wattage="0">
              <img src="Pics/Casing/Sumo 5112.webp" alt="Product 2">
              <h3>Sumo 5112 Casing</h3>
              <h4>₨ 10000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX<br>Cooling: Pre-installed 120mm fan<br>Front I/O: USB 3.0, USB 2.0<br>Features: Solid build quality, easy cable management</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('case', 'XC700W Casing', 'Pics/Casing/XC700W.webp', '0', '20000')" data-id="Casing_6" data-category="Casing,top_seller" data-wattage="0">
              <img src="Pics/Casing/XC700W.webp" alt="Product 2">
              <h3>XC700W Casing</h3>
              <h4>₨ 20000</h4>
              <h5>Power Supply: Not required</h5>
              <h6>Description:</h6>
              <h6>Form Factor: Mid Tower<br>Motherboard Support: ATX, Micro-ATX, Mini-ITX<br>Cooling: Pre-installed 120mm RGB fan, support for liquid cooling<br>Front I/O: USB 3.1 Gen 1, USB 3.0, USB 2.0<br>Features: Tempered glass side panel, customizable RGB lighting, superior airflow design</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>
          
            <div class="product" onclick="selectComponent('power', 'ASUS ROG Thor 1600W Titanium', 'Pics/psu/ASUS ROG Thor 1600W Titanium,1600W ATX.jpg', '1600', '75000')" data-id="Power_supply_1" data-category="Power_supply,top_seller" data-wattage="1600">
              <img src="Pics/psu/ASUS ROG Thor 1600W Titanium,1600W ATX.jpg" alt="Product 2">
              <h3>ASUS ROG Thor 1600W Titanium Power Supply</h3>
              <h4>₨ 75000</h4>
              <h5>Power Supply: 1600W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 1600W<br>Certification: 80 PLUS Titanium<br>Form Factor: ATX<br>Cooling: 135mm fan with dustproof design<br>Features: OLED Power Display, Aura Sync RGB lighting, fully modular cables</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('power', 'ASUS TUF GAMING 850W 80+ Gold', 'Pics/psu/ASUS TUF GAMING 850W 80+ Gold.jpg', '850', '35000')" data-id="Power_supply_2" data-category="Power_supply" data-wattage="850">
              <img src="Pics/psu/ASUS TUF GAMING 850W 80+ Gold.jpg" alt="Product 2">
              <h3>ASUS TUF GAMING 850W 80-Plus Gold Power Supply</h3>
              <h4>₨ 35000</h4>
              <h5>Power Supply: 850W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 850W<br>Certification: 80 PLUS Gold<br>Form Factor: ATX<br>Cooling: 135mm Axial-tech fan<br>Features: Fully modular cables, military-grade components, extended durability</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

            <div class="product" onclick="selectComponent('power', 'CORSAIR CX Series CX650 80-PLUS', 'Pics/psu/CORSAIR-CX-Series-CX650-80-PLUS.webp', '650', '18000')" data-id="Power_supply_3" data-category="Power_supply,top_seller" data-wattage="650">
              <img src="Pics/psu/CORSAIR-CX-Series-CX650-80-PLUS.webp" alt="Product 2">
              <h3>CORSAIR CX Series CX650 80-PLUS Power Supply</h3>
              <h4>₨ 18000</h4>
              <h5>Power Supply: 650W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 650W<br>Certification: 80 PLUS Bronze<br>Form Factor: ATX<br>Cooling: 120mm thermally controlled fan<br>Features: Semi-modular cables, reliable power delivery, budget-friendly</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
                
              </div>
            </div>

          
          <div class="product" onclick="selectComponent('power', 'MSI MAG A1250GL PCIE 5', 'Pics/psu/MSI MAG A1250GL PCIE 5, 80 GOLD Fully.webp', '1250', '50000')" data-id="Power_supply_4" data-category="Power_supply" data-wattage="1250">
              <img src="Pics/psu/MSI MAG A1250GL PCIE 5, 80 GOLD Fully.webp" alt="Product 2">
              <h3>MSI MAG A1250GL PCIE 5 Power Supply</h3>
              <h4>₨ 50000</h4>
              <h5>Power Supply: 1250W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 1250W<br>Certification: 80 PLUS Gold<br>Form Factor: ATX<br>Cooling: 135mm fluid dynamic bearing fan<br>Features: Fully modular cables, PCIe 5.0 ready, enhanced cooling design</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              <button class="add-to-builder">Add to Builder</button>
              
              </div>
            </div>
          
            <div class="product" onclick="selectComponent('power', 'SilverStone SST-AT650R', 'Pics/psu/SilverStone SST-AT650R-BF-WBW ATTIS White 650R 80.webp', '650', '20000')" data-id="Power_supply_5" data-category="Power_supply" data-wattage="650">
              <img src="Pics/psu/SilverStone SST-AT650R-BF-WBW ATTIS White 650R 80.webp" alt="Product 2">
              <h3>SilverStone SST-AT650R Power Supply</h3>
              <h4>₨ 20000</h4>
              <h5>Power Supply: 650W</h5>
              <h6>Description:</h6>
              <h6>Wattage: 650W<br>Certification: 80 PLUS Bronze<br>Form Factor: ATX<br>Cooling: 120mm silent fan<br>Features: Semi-modular cables, stylish white design, reliable performance</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
                <button class="add-to-builder">Add to Builder</button>
              </div>
            </div>
            <div class="product" data-id="cpu_cooler_1" data-category="cpu_cooler" data-wattage="	2.28W">
              <img src="Pics\cpu_cooler\Cooler Master Hyper T20 Compact CPU Air Cooler.jpg" alt="Product 2">
              <h3>Cooler Master Hyper T20 Compact CPU Air Cooler</h3>
              <h4>₨ 3099</h4>
              <h5>Power Usage: 2.28W</h5>
              <h6>Description:</h6>
              <h6>2x Heat Pipes Design<br>Easy Fan Mounting Clips<br>Direct Heat Pipe Contact<br>Warranty: 7 - Days Checking*<br>Optimized Performance</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">

              </div>
        </div>
        <div class="product" data-id="cpu_cooler_2" data-category="cpu_cooler" data-wattage="0.96W">
              <img src="Pics\cpu_cooler\EASE EAF280 CPU Cooler.jpg" alt="Product 2">
              <h3>EASE EAF280 CPU Cooler</h3>
              <h4>₨ 1725</h4>
              <h5>Power Usage: 0.96W</h5>
              <h6>Description:</h6>
              <h6>-Aluminum fin + 2 PCs heat conduction pipe<br>-80x80x25mm<br>-3Pins<br>-1600RPM± 10%<br>Hydraulic bearing<br>-113x66x129mm</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="cpu_cooler_3" data-category="cpu_cooler,top_seller" data-wattage="	5.5W">
              <img src="Pics\cpu_cooler\EASE EAF1218 Air Cooler.webp" alt="Product 2">
              <h3>EASE EAF1218 Air Cooler</h3>
              <h4>₨ 6325</h4>
              <h5>Power Usage: 5.5W</h5>
              <h6>Description:</h6>
              <h6>6 heatpipe Cpu cooler with 12cm ARGB fan and top plat<br>120x 120x 25mm<br>SATA+4pin<br>12V(FAN)+5V(LED)<br>Hydraulic bearing</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="cpu_cooler_4" data-category="cpu_cooler" data-wattage="10W">
              <img src="Pics\cpu_cooler\Redragon CC-2000.webp" alt="Product 2">
              <h3>Redragon CC-2000 Effect Air CPU Cooler</h3>
              <h4>₨ 7882</h4>
              <h5>Power Usage: 10W</h5>
              <h6>Description:</h6>
              <h6>4xø6mm Copper heat-pipes<br>120mm PWM RGB LED Fan<br>Compatible with AMD socket AM4/Intel LGA 115X<br>Four 6mm copper tubes</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="monitor_1" data-category="monitor,top_seller" data-wattage="47W">
              <img src="Pics\monitor\AOC Q32V3SWS QHD 2560 x 1440.webp" alt="Product 2">
              <h3>AOC Q32V3S/WS QHD 2560 x 1440 IPS Low Blue mode</h3>
              <h4>₨ 88000</h4>
              <h5>Power Usage: 47W</h5>
              <h6>Description:</h6>
              <h6>IPS<br>AdaptiveSync<br>Low Blue Mode<br>Flicker Free<br>HDMI</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="monitor_2" data-category="monitor" data-wattage="60W">
              <img src="Pics\monitor\Boost Adonis Gaming Monitor.jpg" alt="Product 2">
              <h3>Boost Adonis Gaming Monitor 24′ 1080P 165Hz 1ms HDR</h3>
              <h4>₨ 44500</h4>
              <h5>Power Usage: 60W</h5>
              <h6>Description:</h6>
              <h6>Size: 24 Inches<br>Resolution: 1920*1080<br>Refresh Rate: 165Hz<br>HDR Supported</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="monitor_3" data-category="monitor" data-wattage="48W">
              <img src="Pics\monitor\EASE G27I16 27″.webp" alt="Product 2">
              <h3>EASE G27I16 27″ 2K IPS Gaming Monitor</h3>
              <h4>₨ 54990</h4>
              <h5>Power Usage: 48W</h5>
              <h6>Description:</h6>
              <h6>Screen Size: 27 inches<br>Resolution: 2560 x 1440<br>Response Time (Min): 1ms (OD)<br>Color Support: 16.78M</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="monitor_4" data-category="monitor" data-wattage="40W">
              <img src="Pics\monitor\Samsung LS24A336NHUXEN 24″.jpg" alt="Product 2">
              <h3>Samsung LS24A336NHUXEN 24″ Full HD Flat LED Monitor</h3>
              <h4>₨ 40500</h4>
              <h5>Power Usage: 40W</h5>
              <h6>Description:</h6>
              <h6>VA Panel<br>VA Panel Hz<br>1920 x 1080 (FHD)<br>5ms MPRT | FreeSync<br>HDMI × 1 , D-Sub x 1</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="mouse_1" data-category="mouse" data-wattage="0.5W">
              <img src="Pics\mouse\czone1200x-buy-qck-s-03.png-1850x800-q100-crop-scale-optimi-19643-707857-291021011627976.jpg" alt="Product 2">
              <h3>SteelSeries QcK Series Cloth Gaming Mouse Pad</h3>
              <h4>₨ 4300</h4>
              <h5>Power Usage: 0.5W</h5>
              <h6>Description:</h6>
              <h6>5000 Dpi<br>Wired Mouse<br>Programmable Mouse<br>RGB Mouse<br>Thumb keys Support</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="mouse_2" data-category="mouse,top_seller" data-wattage="0.3W">
              <img src="Pics\mouse\FANTECH WGC2 VENOM.jpg" alt="Product 2">
              <h3>FANTECH WGC2 VENOM II 2.4G Wireless Gaming Mouse</h3>
              <h4>₨ 3500</h4>
              <h5>Power Usage: 0.3W</h5>
              <h6>Description:</h6>
              <h6>3200 Dpi<br>Wireless Mouse<br>Comfortable Hand Grip<br>Responsive Feel<br>Thumb Keys Support</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="mouse_3" data-category="mouse" data-wattage="0.3W">
              <img src="Pics\mouse\FANTECH X9 Thor Macro.jpg" alt="Product 2">
              <h3>FANTECH X9 Thor Macro RGB Gaming Mouse With Adjustable</h3>
              <h4>₨ 3250</h4>
              <h5>Power Usage: 0.3W</h5>
              <h6>Description:</h6>
              <h6>7D Mouse<br>Programmble Keys<br>Gaming Look<br>Wired Mouse<br>Thumb Keys Support</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="mouse_4" data-category="mouse" data-wattage="0.1W">
              <img src="Pics\mouse\Micropack Computer Mouse M100 Comfy.png" alt="Product 2">
              <h3>Micropack Computer Mouse M100 Comfy Gift</h3>
              <h4>₨ 850</h4>
              <h5>Power Usage: 0.1W</h5>
              <h6>Description:</h6>
              <h6>Non Programmble Mouse<br>Wired Mouse<br>No Thumb Keys<br>Office Mouse<br>2D Mouse</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="keyboard_1" data-category="keyboard" data-wattage="5W">
              <img src="Pics\keyboard\FANTECH K511 HUNTER.png" alt="Product 2">
              <h3>FANTECH K511 HUNTER PRO RGB Back Light Gaming</h3>
              <h4>₨ 5000</h4>
              <h5>Power Usage: 5W</h5>
              <h6>Description:</h6>
              <h6>Backlight keyboard<br>Custom Keys<br>RGB Keyboard<br>Wired Keyboard</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="keyboard_2" data-category="keyboard,top_seller" data-wattage="3W">
              <img src="Pics\keyboard\Logitech K120.png" alt="Product 2">
              <h3>Logitech K120 Wired Keyboard</h3>
              <h4>₨ 2500</h4>
              <h5>Power Usage: 3W</h5>
              <h6>Description:</h6>
              <h6>Office Keyboard<br>Wired Keyboard<br>Non RGB<br>black Themed</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="keyboard_3" data-category="keyboard" data-wattage="2.5W">
              <img src="Pics\keyboard\Micropack K-206 US.jpg" alt="Product 2">
              <h3>Micropack K-206 USB Keyboard Black With Multimedia</h3>
              <h4>₨ 1560</h4>
              <h5>Power Usage: 2.5W</h5>
              <h6>Description:</h6>
              <h6>Office Keyboard<br>Wired Keyboard<br>Non RGB<br>Sleek Look</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
              </div>
        </div>
        <div class="product" data-id="keyboard_4" data-category="keyboard" data-wattage="4W">
              <img src="Pics\keyboard\XO KB.jpg" alt="Product 2">
              <h3>XO KB-01 RGB Backlit Metal Gaming Keyboard</h3>
              <h4>₨ 3800</h4>
              <h5>Power Usage: 4W</h5>
              <h6>Description:</h6>
              <h6>RGB Keyboard<br>Backlight<br>RGB<br>Responsive Keys</h6>
              <button class="btn btn-primary" onclick="addToCart(this)">Add to Cart</button>
              <div class="button-container">
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


document.querySelectorAll('.product').forEach((productDiv) => {
    const addButton = productDiv.querySelector('.add-to-builder');
    addButton.addEventListener('click', () => {
        console.log('Button clicked!');
        // Get the product name, wattage, price, and category from the DOM
        const productNameTag = productDiv.querySelector('h3');
        const productName = productNameTag.textContent;
        const wattage = productDiv.dataset.wattage; // Using dataset to store wattage
        const category = productDiv.dataset.category; // Using dataset to store category
        const priceTag = productDiv.querySelector('h4');
        const price = priceTag.textContent.replace('Price: PKR ', ''); // Extract numeric price value
        const dataId = productDiv.dataset.id; // Get data-id from the dataset

        // Assuming image URL is stored in a data attribute or img tag in product div
        const imgTag = productDiv.querySelector('img');
        const imgUrl = imgTag ? imgTag.src : `Pics/${category.toLowerCase()}/${productName}.jpg`; // Default URL if not present

        // Store data in sessionStorage
        sessionStorage.setItem('selectedComponent', JSON.stringify({
            category: category.toLowerCase(),
            name: productName,
            image: imgUrl,
            wattage: wattage, // Corrected typo here
            price: price,
            id: dataId // Include data-id in sessionStorage
        }));

        // Redirect to builder.php with data-id as query parameter
        window.location.href = `builder.php?component=${category.toLowerCase()}&name=${encodeURIComponent(productName)}&image=${encodeURIComponent(imgUrl)}&wattage=${encodeURIComponent(wattage)}&price=${encodeURIComponent(price)}&id=${encodeURIComponent(dataId)}`;

        // Optionally, close the current tab
        //window.close();
    });
});

</script>
<?php 
include('includes/footer.php');
?>
    </body>
</html>
