<?php 
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Building Guide</title>
    <link rel="stylesheet" href="guide.css">
</head>
<body style="font-family: Georgia, 'Times New Roman', Times, serif";>
    <div class="guides-container" style="font-family: Georgia, 'Times New Roman', Times, serif";>
        <!-- Step 1 -->
        <div class="guide-step">
            <div class="step-content">
                <h2>Step 1: Open PC builder page</h2>
                <p>After landing on the homepage. tap on the "pc builder" button from the navbar.</p>
            </div>
            <div class="step-image">
                <img src="Pics/guides/navbars.png" alt="Choose Components">
            </div>
        </div>

        <!-- Step 2 -->
        <div class="guide-step">
            <div class="step-content">
                <h2>Step 2: Click on the add button</h2>
                <p>To add components click on the "plus button".</p>
            </div>
            <div class="step-image">
                <img src="Pics/guides/pluss.png" alt="Prepare Workspace">
            </div>
        </div>
        <div class="guide-step">
            <div class="step-content">
                <h2>Step 3: Select desired components</h2>
                <p>Plus button will redirect you to the selected components store page, select the product you want for each component.</p>
            </div>
            <div class="step-image">
                <img src="Pics/guides/add to builders.png" alt="Prepare Workspace">
            </div>
        </div>
        <div class="guide-step">
            <div class="step-content">
                <h2>Step 4: Compatibility Checker</h2>
                <p>Once you have added all the desired components, check if there is any compatibility or power supply error, and resolve it accordngly.</p>
            </div>
            <div class="step-image">
                <img src="Pics/guides/all.png" alt="Prepare Workspace">
            </div>
        </div>

        <div class="guide-step">
            <div class="step-content">
                <h2>Step 5: Checkout and Buy</h2>
                <p>After you are done selecting components and clicked on "build pc" it will move you to the cart, here provide the information required i.e. payment method, shipping address etc.</p>
            </div>
            <div class="step-image">
                <img src="Pics/guides/cart.jpg" alt="Prepare Workspace">
            </div>
        </div>
        <!-- Additional Steps Here... -->

        <!-- Last Step with Embedded YouTube Video -->
        <div class="guide-step">
            <div class="step-content">
                <h2>Final Step: Assembling the PC</h2>
                <p>To assemble your PC, follow the instructions provided in this video and power it on and install your operating system by following these instructions.</p>
            </div>
            <div class="step-video">
                <iframe width="560" height="300" src="https://www.youtube.com/embed/cJHDRz5vf-g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
<?php 
include('includes/footer.php');
?>
</body>
</html>
