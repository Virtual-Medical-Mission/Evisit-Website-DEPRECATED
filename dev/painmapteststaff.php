<?php
require_once '../private/init.php';
global $evisit_db;
if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM pain ORDER BY ID DESC LIMIT 1";
    $result = mysqli_query($evisit_db, $sql);
    $painRow = mysqli_fetch_assoc($result);
    $painX = $painRow['painX'];
    $painY = $painRow['painY'];
    $level = $painRow['level'];
    $internal = $painRow['internal'];
} else {
    $painX = "";
    $painY = "";
    $level = "";
    $internal = "";
}
?>
<style>
    canvas {
        border: 1px solid black;
    }
</style>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Pain Map</title>
    </head>
    <body>
        <h1>Patient's Pain Locations</h1>
        <canvas id="PainMap" width="640" height="650"></canvas>
    </body>
</html>
<script>
    const canvas = document.getElementById("PainMap");
    const PainX = [<?php echo $painX; ?>];
    //console.log(PainX);
    const PainY = [<?php echo $painY; ?>];
    //console.log(PainY);
    const Internal = [<?php echo $internal; ?>];
    //console.log(Internal);
    const Level = [<?php echo $level; ?>];
    //console.log(Level);
    const outerRadius =  14;
    const innerRadius = 7;
    const textSize = 30;
    function drawbg() {
        if (canvas.getContext) {
            const ctx = canvas.getContext("2d");
            const img = new Image();
            img.onload = () => {
                ctx.drawImage(img, 0, 5);
                for (let i = 0; i < Internal.length; i += 1) {
                    if(Internal[i]){
                        ctx.beginPath();
                        ctx.fillStyle = "rgb(0,255,0)";
                        ctx.arc(PainX[i],PainY[i],outerRadius,0,2*Math.PI);
                        ctx.fill();
                        ctx.beginPath();
                        ctx.fillStyle = "rgb(255,0,0)";
                        ctx.arc(PainX[i],PainY[i],innerRadius,0,2*Math.PI);
                        ctx.fill();
                        ctx.fillStyle = "rgb(255,221,0)";
                        ctx.font = "bold 30px sans-serif";
                        const text = ctx.measureText(Level[i]);
                        ctx.fillText(Level[i], PainX[i] - (text.width/2), PainY[i]+outerRadius+textSize);
                    } else{
                        ctx.beginPath();
                        ctx.fillStyle = "rgb(255,0,0)";
                        ctx.arc(PainX[i],PainY[i],outerRadius,0,2*Math.PI);
                        ctx.fill();
                        ctx.beginPath();
                        ctx.fillStyle = "rgb(0,255,0)";
                        ctx.arc(PainX[i],PainY[i],innerRadius,0,2*Math.PI);
                        ctx.fill();
                        ctx.fillStyle = "rgb(255,221,0)";
                        ctx.font = "bold 30px sans-serif";
                        const text = ctx.measureText(Level[i]);
                        ctx.fillText(Level[i], PainX[i] - (text.width/2), PainY[i]+outerRadius+textSize);
                    }
                }
            };
            img.src = "../private/assets/img/standinghuman.svg";
            ctx.beginPath();
            ctx.fillStyle = "rgb(0,255,0)";
            ctx.arc(PainX[0], PainY[0], 8, 0, 2 * Math.PI);
            ctx.fill();
        }
    }
    window.addEventListener("load",drawbg);
</script>
