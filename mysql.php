<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname   ="university";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else 

echo "Connected successfully";



/*
   // Insert data into table function
    $sql = " insert into department(department_id,department_name)
    values('8','History')";
    // use exec() because no results are returned
   if($conn->query($sql)== true)
       echo "New record created successfully";
   else
     	echo $conn->error;
  */

// Update data into table function
 //UPDATE table_name  SET column1=value, column2=value2,...WHERE some_column=some_value 

 /*$sql = "update department set department_name='English' where  department_id=4 ";

if($conn->query($sql))
{
  echo "Data is updated successfully!!";

}
else 
{

	echo $conn->error;
}
*/

// DELETE FROM table_name WHERE some_column = some_value  delete command
/*
$sql = "delete from department where department_id=7";
if($conn->query($sql))
{
  echo "Data is deleted  successfully!!";

}
else 
{

	echo $conn->error;
}
*/

?>