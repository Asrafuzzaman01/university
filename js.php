<!DOCTYPE html>
<html>
<head>
<script>
function myFunction() {
//  document.getElementById("demo").innerHTML = "Paragraph //changed.";
  document.getElementById("demo").style.fontStyle  = "italic";
  
  
  
}
function myfunction1() {
//  document.getElementById("demo").innerHTML = "Paragraph //changed.";
  document.getElementById("demo").style.fontStyle  = "normal";
  
  
  
}

function myFunction2() {
 document.getElementById("demo").innerHTML = "Paragraph changed.";
  
  
  
  
}



</script>
</head>
<body>

<h2>JavaScript in Head</h2>

<p id="demo">A Paragraph.</p>


<button type="button" onclick="myFunction2()" onmouseover="myFunction()" onmouseout="myfunction1()">Try it</button>

</body>
</html> 