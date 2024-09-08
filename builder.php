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
    <link rel="stylesheet" href="builderss.css">
    <script>
function chooseComponent(componentType) {
    // Open the components.php page in a new tab with the component type as a query parameter
    window.location.replace('components.php?component=' + componentType, '_blank');
}
    </script>
</head>
<body style="font-family: Georgia, 'Times New Roman', Times, serif";>
    <div class="container">
        <h1>Build Your Custom PC</h1>
        <form id="pc-builder-form">
            <div class="component">
                <label for="cpu">CPU</label>
                <div class="selector">
                    <img id="cpu-img" class="component-img" src="Pics\cpu\3d-illustration-ai-processor-chip-technology-abstract-isolated-white-background_971166-139831 (1).jpg" alt="CPU Image">
                    <input type="text" id="cpu" name="cpu" placeholder="Select a CPU" readonly>
                    <span style="font-family:none" id="cpu-wattage" class="component-info">0W</span>
                    <span style="font-family:none" id="cpu-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('cpu'); return false;">+</a>
                </div>
            </div>
            <!-- Repeat the component sections for GPU, RAM, SSD, Case, Motherboard, and Power Supply -->
            <div class="component">
                <label for="gpu">GPU</label>
                <div class="selector">
                    <img id="gpu-img" class="component-img" src="Pics\gpu\product04_w1FBEOuE.webp" alt="GPU Image">
                    <input type="text" id="gpu" name="gpu" placeholder="Select a GPU" readonly>
                    <span style="font-family:none" id="gpu-wattage" class="component-info">0W</span>
                    <span style="font-family:none" id="gpu-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('gpu'); return false;">+</a>
                </div>
            </div>
            <!-- Add other components as needed -->
            <div class="component">
                <label for="ram">RAM</label>
                <div class="selector">
                    <img id="ram-img" class="component-img" src="Pics\ram\parallax06_w1FBEOuE.webp" alt="RAM Image">
                    <input type="text" id="ram" name="ram" placeholder="Select RAM" readonly>
                    <span style="font-family:none" id="ram-wattage" class="component-info">0W</span>
                    <span style="font-family:none" id="ram-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('RAM'); return false;">+</a>
                </div>
            </div>
            <div class="component">
                <label for="ssd">Storage</label>
                <div class="selector">
                    <img id="ssd-img" class="component-img" src="Pics\ssd\hard-drive-isolated-transparent-background_191095-23920.jpg" alt="SSD Image">
                    <input type="text" id="ssd" name="ssd" placeholder="Select SSD" readonly>
                    <span style="font-family:none" id="ssd-wattage" class="component-info">0W</span>
                    <span style="font-family:none" id="ssd-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('SSD'); return false;">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="case">Case</label>
                <div class="selector">
                    <img id="case-img" class="component-img" src="Pics\Casing\vertical04_w1FBEOuE.webp" alt="Case Image">
                    <input type="text" id="case" name="case" placeholder="Select a Case" readonly>
                    <span style="font-family:none" id="case-wattage" class="component-info">0W</span>
                    <span style="font-family:none" id="case-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('Casing'); return false;">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="motherboard">Motherboard</label>
                <div class="selector">
                    <img id="motherboard-img" class="component-img" src="Pics\Motherboard\240_F_240749256_zEsif97PKS50lzJNZQ0QXEezvO6Fb5ZR.jpg" alt="Motherboard Image">
                    <input type="text" id="motherboard" name="motherboard" placeholder="Select a Motherboard" readonly>
                    <span style="font-family:none" id="motherboard-wattage" class="component-info">0W</span>
                    <span style="font-family:none" id="motherboard-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('Motherboard'); return false;">+</a>
                </div>
            </div>
            
            <div class="component">
                <label for="power">Power Supply</label>
                <div class="selector">
                    <img id="power-img" class="component-img" src="Pics\psu\CORSAIR-CX-Series-CX650-80-PLUS.webp" alt="power supply Image">
                    <input type="text" id="power" name="power" placeholder="Select a Power Supply" readonly>
                    <span style="font-family:none" id="power-wattage" class="component-info">0W</span>
                    <span style="font-family:none" id="power-price" class="component-info">0Rs</span>
                    <a href="components.php" target="_blank" class="plus-link" onclick="chooseComponent('Power_supply'); return false;">+</a>
                </div>
            </div>

            <div class="component">
                <div class="total" style="font-family:none">
                <label for="total-wattage">Total Wattage: </label>
                <span id="total-wattage" class="component-info">0W</span>
                <label for="total-price">Total Price: </label>
                <span id="total-price" class="component-info">PKR 0</span>
            </div>
            <div>
            <div class="button" id="alert-message" style="display: none; color: red;"></div>
            <div id="compatibility-alert" style="display:none; color: red;">
                        Compatibility issue detected.
                </div>
            <button type="button" id="reset-button" class="btn-danger">Reset</button>
            <button type="submit" id="build-pc-btn" class="btn-primary">Build PC</button>
        </form>
    </div>
<?php 
    include('includes/footer.php');
?>
    <script src="builder.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
