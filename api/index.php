<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold Calculator</title>
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: white;
}

body{
    background-repeat: no-repeat;
    height: 100vh;
    background-color: black;
}

.main{
    display: black;
    height: 100vh;
    align-items: center;
}

.container{
    width: 35%;
    margin: auto;
    height: 580px;
    background-color: rgb(33, 33, 33);
    display: flex;
    flex-direction: column;
    margin-top: 20px;
    border-radius: 10px;
    position: relative;
    box-shadow: 0 0 3px black;
}

@property --angle{
    syntax: "<angle>";
    initial-value: 0deg;
    inherits: false;
}

.container::after, .container::before{
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    background-image: conic-gradient( from var(--angle), transparent 70%, rgb(242, 255, 3));
    top: 50%;
    left: 50%;
    translate: -50% -50%;
    z-index: -1;
    padding: 3px;
    border-radius: 10px;
    animation: 3s spin linear infinite;
}

.container::before{
    filter: blur(1.5rem);
    opacity: 0.5;
}

.title{
    text-align: center;
    margin: 26px 0px;
}

form{
    width: 85%;
    height: 490px;
    margin: auto;
    margin-top: 20px;
}

.input-group input{
    padding: 12px;
    margin: 15px 0px;
    width: 100%;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    background-color: rgb(195, 184, 67);
}

.input-group p{
    color: red;
}

.calBtn{
    padding: 10px;
    border:none;
    border-radius: 5px;
    width: 100%;
    font-size: 20px;
    font-weight: bold;
    margin: 15px 0px;
    box-shadow: 0 0 3px white;
    background-color: rgb(74, 74, 74);

}

.calBtn:hover{
    box-shadow: none;
    background-color: rgb(90, 89, 89);
}

.result-container p{
    margin-bottom: 15px;
}

.result-container span, .result-container b{
    margin-left: 10px;
}

@keyframes spin{
    from{
        --angle: 0deg;
    }
    to{
        --angle: 360deg;
    }
}

@media(max-width: 1000px){
    .container{
        width: 50%;
    }
}
@media(max-width: 700px){
    .container{
        width: 70%;
    }
}
@media(max-width: 550px){
    .container{
        width: 85%;
    }
}
    </style>
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