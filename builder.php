<?php 

include('includes/header.php');
include('includes/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom PC Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="builderxx.css">
    <script>
        function chooseComponent(componentType) {
            // Redirect to components.php with the component type as a query parameter
            window.location.replace('components.php?component=' + componentType);
        }
        </script>
</head>
<body>
    <div class="container">
        <h1>Build Your Custom PC</h1>
        <form id="pc-builder-form">
            <div class="component">
                <label for="cpu">CPU</label>
                <div class="selector">
                    <img id="cpu-img" class="component-img" src="Pics/cpu/AMD Ryzen 9 9900X Twelve Core 5.60GHz.jpg" alt="CPU Image">
                    <input type="text" id="cpu" name="cpu" placeholder="Select a CPU" readonly>
                    <span id="cpu-wattage" class="component-info">0W</span>
                    <span id="cpu-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('cpu')">+</a>
                    
                </div>
            </div>
            <div class="component">
                <label for="gpu">GPU</label>
                <div class="selector">
                    <img id="gpu-img" class="component-img" src="Pics\gpu\nvidia\GeForce® GTX 1660 Ti GAMING OC 6G.webp" alt="GPU Image">
                    <input type="text" id="gpu" name="gpu" placeholder="Select a GPU" readonly>
                    <span id="gpu-wattage" class="component-info">0W</span>
                    <span id="gpu-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('gpu')">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="ram">RAM</label>
                <div class="selector">
                    <img id="ram-img" class="component-img" src="Pics\ram\GIGABYTE Memory 16GB (2x8GB) 2666MHz.webp" alt="RAM Image">
                    <input type="text" id="ram" name="ram" placeholder="Select RAM" readonly>
                    <span id="ram-wattage" class="component-info">0W</span>
                    <span id="ram-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('RAM')">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="ssd">Storage</label>
                <div class="selector">
                    <img id="ssd-img" class="component-img" src="Pics\ssd\GIGABYTE NVMe SSD 1TB.webp" alt="SSD Image">
                    <input type="text" id="ssd" name="ssd" placeholder="Select SSD" readonly>
                    <span id="ssd-wattage" class="component-info">0W</span>
                    <span id="ssd-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('SSD')">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="case">Case</label>
                <div class="selector">
                    <img id="case-img" class="component-img" src="Pics\Casing\AORUS C500 GLASS.webp" alt="Case Image">
                    <input type="text" id="case" name="case" placeholder="Select a Case" readonly>
                    <span id="case-wattage" class="component-info">0W</span>
                    <span id="case-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('Casing')">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="motherboard">Motherboard</label>
                <div class="selector">
                    <img id="motherboard-img" class="component-img" src="Pics\Motherboard\intel X299X AORUS MASTER (rev. 1.x).webp" alt="Motherboard Image">
                    <input type="text" id="motherboard" name="motherboard" placeholder="Select a Motherboard" readonly>
                    <span id="motherboard-wattage" class="component-info">0W</span>
                    <span id="motherboard-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('Motherboard')">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="power">Power Supply</label>
                <div class="selector">
                    <img id="power-img" class="component-img" src="Pics\psu\SilverStone SST-AT650R-BF-WBW ATTIS White 650R 80.webp" alt="power supply Image">
                    <input type="text" id="power" name="power" placeholder="Select a Power Supply" readonly>
                    <span id="power-wattage" class="component-info">0W</span>
                    <span id="power-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('Power_supply')">+</a>
                </div>
            </div>
            <div class="component">
                <div class="total">
                <label for="total-wattage">Total Wattage: </label>
                <span id="total-wattage" class="component-info">0W</span>
                <label for="total-price">Total Price: </label>
                <span id="total-price" class="component-info">PKR 0</span>
    </div>
    </div>
            <div id="alert-message" style="display: none; color: red;"></div>
            <button type="submit">Build PC</button>
        </form>
    </div>
    <script src="builder.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php 
        include('includes/footer.php');
?>
</body>
</html>
