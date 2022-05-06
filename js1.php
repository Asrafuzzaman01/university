<!DOCTYPE html>
<html>
<body>

<h1>My First Web Page</h1>
<p>My First Paragraph</p>

<p id="demo"></p>

<script>
document.getElementById("demo").innerHTML = 'My First Paragraph';

console.log(5 + 6);

function printdiv()
{


            
            document.body.innerHTML = document.getElementById("demo").innerHTML ;
            window.print();

        }

</script>

<button type="button" onclick="alert(5 + 6)">Try it</button>

<button onclick="printdiv()">Print this page</button>

</body>
</html>