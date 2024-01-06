<!doctype html>
<?php
require_once '../private/init.php';
global $evisit_db;
if( is_post_request() ){
    if(isset($_POST['painX']) && isset($_POST['painY']) && isset($_POST['level']) && isset($_POST['internal']) ){
        $painX = $_POST['painX'];
        $painY = $_POST['painY'];
        $level = $_POST['level'];
        $internal = $_POST['internal'];

        $sql = 'INSERT INTO pain (painX, painY, level, internal) VALUES (';
        $sql .= "'" . db_escape($evisit_db, $painX) . "',";
        $sql .= "'" . db_escape($evisit_db, $painY) . "',";
        $sql .= "'" . db_escape($evisit_db, $level) . "',";
        $sql .= "'" . db_escape($evisit_db, $internal) . "')";

        $result = mysqli_query($evisit_db, $sql);
        confirm_result_set($result);
    }
    //redirect_to('../thankyou.html');
}
?>
<style>
    canvas {
        border: 1px solid black;
    }
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }
    .button {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #04AA6D;
    }
</style>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <title>Pain Map</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<h1>Click on all locations where you have pain</h1>
<canvas id="PainMap" width="640" height="650"></canvas>
<br>
<button id = "submit" class="button" type="button"> Finished </button>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <p>Please indicate your pain level</p>
        <div class="slideContainer">
            <input type="range" min="1" max="10" value="5" class="slider" id="myRange">
        </div>
        <p>Value: <span id="painLevel"></span></p>
        <input type="radio" id="internalPain" name="intext" value="internal">
        <label for="internalPain"> Internal</label>
        <input type="radio" id="externalPain" name="intext" value="external">
        <label for="ExternalPain"> External</label>
        <br>
        <span id="leftUnchecked" style="color:red"></span>
        <br>
        <button id = "modalClose" class="button" type="button"> Save </button>

    </div>

</div>
</body>
</html>
<script>
    const modal = document.getElementById("myModal");
    const saveButton = document.getElementById("modalClose");
    const slider = document.getElementById("myRange");
    const output = document.getElementById("painLevel");
    const leftUnchecked = document.getElementById("leftUnchecked");
    const internalPainButton = document.getElementById("internalPain");
    const externalPainButton = document.getElementById("externalPain");
    const canvas = document.getElementById("PainMap");
    const submitButton = document.getElementById("submit");
    const outerRadius =  14;
    const innerRadius = 7;
    const textSize = 30;
    let PainX = [];
    let PainY = [];
    let Internal = [];
    let Level = [];
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
    function drawbg() {
        if (canvas.getContext) {
            const ctx = canvas.getContext("2d");
            const img = new Image();
            img.onload = () => {
                ctx.drawImage(img, 0, 5);
            };
            img.src ="../private/assets/img/standinghuman.svg";
            }
    }
    function popup(evt){
        const canvas = document.getElementById("PainMap")
        let rect = canvas.getBoundingClientRect();
        let x = evt.clientX - rect.left;
        let y = evt.clientY - rect.top;
        PainX.push(x)
        PainY.push(y)
        modal.style.display = "block"

    }
    function drawPain(){
        if (canvas.getContext) {
            const ctx = canvas.getContext("2d");
            for(let i = 0; i < Internal.length; i+=1){
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
        }
    }

    window.addEventListener("load", drawbg);
    document.getElementById("PainMap").addEventListener("click",popup)
    saveButton.onclick = function () {
        let painLevel = slider.value;
        if (internalPainButton.checked){
            Level.push(painLevel);

            //console.log(PainX[PainX.length-1]);
            //console.log(PainY[PainY.length-1]);

            //console.log(painLevel);

            Internal.push(1);
            //console.log("internal");

            internalPainButton.checked = false;
            slider.value = 5;
            output.innerHTML = slider.value;
            leftUnchecked.innerHTML = "";
            modal.style.display = "none";
            drawPain();
        } else if (externalPainButton.checked){
            Level.push(painLevel);

            //console.log(PainX[PainX.length-1]);
            //console.log(PainY[PainY.length-1]);

            //console.log(painLevel);

            Internal.push(0);
            //console.log("external");

            externalPainButton.checked = false;
            slider.value = 5;
            output.innerHTML = slider.value;
            leftUnchecked.innerHTML = "";
            modal.style.display = "none";
            drawPain();
        } else{
            leftUnchecked.innerHTML = "Please select internal or external";
        }
    }
    submitButton.onclick = function () {
        if(Internal.length>0) {
            //console.log("submitting");
            let form = $('<form action="painmaptest.php" method="post">' +
                '<input type="text" name="painX" value="' + PainX.toString() + '" />' +
                '<input type="text" name="painY" value="' + PainY.toString() + '" />' +
                '<input type="text" name="level" value="' + Level.toString() + '" />' +
                '<input type="text" name="internal" value="' + Internal.toString() + '" />' +
                '</form>');
            $('body').append(form);
            form.submit();
        }
    }
</script>
