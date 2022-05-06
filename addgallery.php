<?php include("common/header.php");?>





<?php




if(isset($_POST['addgallery']))
{
	$target_dir="images/gallery/";
	$target_file = $target_dir . basename($_FILES["picture_name"]["name"]);
   if (move_uploaded_file($_FILES["picture_name"]["tmp_name"], $target_file)){


$picture_name =  $_FILES["picture_name"]["name"];
    $Picture_Title = $_POST['picture_title'];
    $date = $_POST['date'];

    $sql="insert into gallary (picture_title,date , picture_name) values ('$Picture_Title','$date','$picture_name')";
    if($conn->query($sql)==true)
        echo "new picturte  add successfully";
    else
        echo $conn->error;

    
   }
   else {
    echo "Sorry, there was an error uploading your file.";
  }




}





?>
<div class="addgallery">

                        	<form action="" method="post" enctype="multipart/form-data">


                        		<table align="center" width="400">
                        			<tr>
                        				<td><b>Picture Title:</b></td>
                        				
                        				<td> <input type="text" name="picture_title" ></td>
                        					
                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>Picture upload:</b></td>
                        				<td><input type="file" name=" picture_name" id=" picture_name"></td>

                        			</tr>

                        			<tr>
                        				<td><b>date:</b></td>
                        				<td><input type="date" name="date"></td>
                        			</tr>
                        			
                        			
                        			<tr>

                        				<td><input  type="submit" name="addgallery" value="addgallery"></td>
                        			</tr>
                        		</table>
                        	</form>


<?php include("common/footer.php");?>