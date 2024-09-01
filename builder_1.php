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
    <link rel="stylesheet" href="builder.css">
</head>
<body>
    <div class="heading">
        <h1>Choose Your Parts</h1>
    </div>

    <div class="builder">
        <div class="compatibility">
            <p>✅ Compatibility: No issues or incompatibilities found.</p>
            <p>⚡ Estimated Wattage: <span id="wattage">0W</span></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Component</th>
                    <th>Selection</th>
                    <th>Wattage</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CPU</td>
                    <td><button onclick="chooseComponent('cpu')">+ Choose A CPU</button></td>
                    <td><span id="cpu-wattage">0W</span></td>
                </tr>
                <tr>
                    <td>Motherboard</td>
                    <td><button onclick="chooseComponent('Motherboard')">+ Choose A Motherboard</button></td>
                    <td><span id="motherboard-wattage">0W</span></td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td><button onclick="chooseComponent('RAM')">+ Choose A RAM</button></td>
                    <td><span id="ram-wattage">0W</span></td>
                </tr>
                <tr>
                    <td>Storage</td>
                    <td><button onclick="chooseComponent('SSD')">+ Choose Storage</button></td>
                    <td><span id="storage-wattage">0W</span></td>
                </tr>
                <tr>
                    <td>Graphics Card</td>
                    <td><button onclick="chooseComponent('gpu')">+ Choose A Graphics Card</button></td>
                    <td><span id="gpu-wattage">0W</span></td>
                </tr>
                <tr>
                    <td>Case</td>
                    <td><button onclick="chooseComponent('Casing')">+ Choose A Case</button></td>
                    <td><span id="case-wattage">0W</span></td>
                </tr>
                <tr>
                    <td>Power Supply</td>
                    <td><button onclick="chooseComponent('Power_supply')">+ Choose A Power Supply</button></td>
                    <td><span id="power-supply-wattage">0W</span></td>
                    <td id="power-supply-price"></td>
                </tr>
                <tr id="total-row">
                    <td>Total</td>
                    <td></td>
                    <td id="total-wattage"></td>
                    <td id="total-price"></td>
                </tr>
            </tbody>
        </table>

        <div class="reset">
            <button id="reset-button" onclick="location.reload()">Reset Build</button>
        </div>
    </div>

    <script src="builder_1.js"></script>

<?php 
include('includes/footer.php');
?>
</body>
</html>