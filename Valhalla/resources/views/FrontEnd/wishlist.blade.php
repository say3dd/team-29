<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="{{asset('assets/css/style_sheet.css')}}" >
<style>
#div1, #div2 {
  display:flex;
  flex-direction: column;  
  width: 33%;
  height: 33%;
  margin: 10px;
  padding: 10px;
  border: 1px solid black;
  transition: 100ms;
  border-color: #f2f2f2;
  
}

img{
    width: 100px;
    height: 100px;
    
}
</style>
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}


</script>
</head>
<body>

<h2 style="color:white;">Drag and Drop</h2>

<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
<div id="drag1" draggable="true" ondragstart="drag(event)">
    <div class="laptop_all">
    </div>
</div>

</div>

<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>



</body>
</html>

