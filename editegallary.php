<?php include("common/header.php");?>




<?php
$gallery_id=$_REQUEST['galleryid'];


if(isset($_POST['updategallery']))
{
	$target_dir="images/gallery/";
	$target_file = $target_dir . basename($_FILES["picture_name"]["name"]);
   if (move_uploaded_file($_FILES["picture_name"]["tmp_name"], $target_file)){


$picture_name =  $_FILES["picture_name"]["name"];
    $picture_title = $_POST['picture_title'];
    $date = $_POST['date'];

    
    $sql=" update gallary set picture_title='$picture_title',date='$date',picture_name='$picture_name' where gallary_id='$gallery_id'";
    if($conn->query($sql)==true)
        echo " picturte  update successfully";
    else
        echo $conn->error;

    
   }
   else {
    echo "Sorry, there was an error uploading your file.";
  }




}



$sql= "select *  from gallary where gallary_id=$gallery_id";
$result= $conn->query($sql);
$row=$result->fetch_assoc();


$picture_title=$row['picture_title'];
$picture_name=$row['picture_name'];
$date=$row['date'];






?>
<div class="addgallery">

                        	<form action="" method="post" enctype="multipart/form-data">


                        		<table align="center" width="400">
                        			<tr>
                        				<td><b>Picture Title:</b></td>
                        				
                        				<td> <input type="text" name="picture_title" value="<?php echo $picture_title?>" ></td>
                        					
                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>Picture upload:</b></td>
                                       <td> <<img src='images/gallery/<?php echo $row['picture_name'];?>' width="80" height="100" > 

                        				<input type="file" name=" picture_name" id=" picture_name"></td>

                        			</tr>

                        			<tr>
                        				<td><b>date:</b></td>
                        				<td><input type="date" name="date" value="<?php echo $date?>"></td>
                        			</tr>
                        			
                        			
                        			<tr>

                        				<td><input  type="submit" name="updategallery" value="updategallery"></td>
                        			</tr>
                        		</table>
                        	</form>


<?php include("common/footer.php");?>