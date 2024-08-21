<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold Calculator</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
    if(isset($_POST["btn"])){
      if(isset($_POST["gram-input"]) && isset($_POST["sale-price"]) && isset($_POST["current-price"])){
       $gram = $_POST["gram-input"];
       $salePrice = $_POST["sale-price"];
       $currentPrice = $_POST["current-price"];
       if(empty($gram) || empty($salePrice) || empty($currentPrice)){
        echo '<script>alert("Please Enter valid numbers in all files.")</script>'; 
       }else{
        $gramToPae =$gram / 1.0205;
        $paeToKyatTharr =$gramToPae / 16;
        $goldPrice = $paeToKyatTharr * $currentPrice;
        $handPrice = $salePrice - $goldPrice;
       }
      }
    }
    ?>
    <div class="main">
    <div class="container">
        <h1 class="title">Gold Calculator</h1>
        <form action="index.php" method="post">
            <div class="input-group">
                <label for="">Gold Weight (grams)</label>
                <input type="number" name="gram-input" id="" required>
            </div>
            <div class="input-group">
                <label for="">Sale Price</label>
                <input type="number" name="sale-price" id="" required>
            </div>
            <div class="input-group">
                <label for="">Current Price</label>
                <input type="number" name="current-price" id="" required>
            </div>
            <input class="calBtn" type="submit" value="Calculate" name="btn">
            <div class="result-container">
                <h2 style="margin-bottom: 20px;">Result</h2>
                <p>Gold Weight <?php echo"<b>".number_format($gramToPae, 2)."</b>"?><span>Pae</span></p>
                <p>Gold Price <?php echo "<b>".number_format($goldPrice, 2)."</b>"?><span>Kyat</span></p>
                <p>Hand Price <?php echo "<b>".number_format($handPrice, 2)."</b>"?><span>Kyat</span></p>
            </div>
        </form>
        </div>
    </div>
        
</body>
</html>