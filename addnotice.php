<?php include ("common/header.php"); ?>

<?php 

if(isset($_POST["addnotice"]))
{

   

   $target_dir = "images/notice/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    $pic_name =  $_FILES["fileToUpload"]["name"];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = "insert into notice (title, description, date , notice_picture) values ('$title','$description','$date','$pic_name')";

      if($conn->query($sql)==true)
        echo "new notice created successfully";
    else
        echo $conn->error;


  } else {
    echo "Sorry, there was an error uploading your file.";
  }

}


?>








<div class="addnotice">

                        	<form action="" method="post" enctype="multipart/form-data">


                        		<table align="center" width="400">
                        			<tr>
                        				<td><b>title:</b></td>
                        				
                        				<td> <input type="text" name="title" ></td>
                        					
                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>description:</b></td>
                        				<td><input type="text" name="description"></td>

                        			</tr>

                        			<tr>
                        				<td><b>date:</b></td>
                        				<td><input type="date" name="date"></td>
                        			</tr>
                        			<tr>
                        				<td><b>Notice_picture:</b></td>
                        				<td>

                                            <input type="file" name="fileToUpload" id="fileToUpload">

                        				</td>
                        			</tr>
                        			<tr>
                        				<td><input  type="submit" name="addnotice" value="addnotice"></td>
                        			</tr>
                        		</table>
                        	</form>
















<?php include("common/footer.php");?>
