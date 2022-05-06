<?php include ("common/header.php"); ?>

<?php 
 $notice_id = $_REQUEST['noticeid'];



if(isset($_POST["updatenotice"]))

{

   

   $target_dir = "images/notice/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    $pic_name =  $_FILES["fileToUpload"]["name"];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    
    $sql=" update notice set title='$title',description='$description',date='$date',notice_picture='$pic_name' where notice_id=$notice_id";


      if($conn->query($sql)==true)
        echo "notice  updated  successfully";
    else
        echo $conn->error;


  } else {
    echo "Sorry, there was an error uploading your file.";
  }

}
$sql ="select * from notice where notice_id = $notice_id ";

$result  =  $conn->query($sql);
$row     =  $result->fetch_assoc();

$title = $row['title'];
$description=$row['description'];
$notice_picture=$row['notice_picture'];
$date=$row['date'];


?>








<div class="updatenotice">

                        	<form action="" method="post" enctype="multipart/form-data">


                        		<table align="center" width="400">
                        			<tr>
                        				<td><b>title:</b></td>
                        				
                        				<td> <input type="text" name="title" value="<?php echo $title?>"  ></td>
                        					
                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>description:</b></td>
                        				<td><input type="text" name="description" value="<?php echo $description?>"></td>

                        			</tr>

                        			<tr>
                        				<td><b>date:</b></td>
                        				<td><input type="date" name="date" value="</php echo $date?>"></td>
                        			</tr>
                        			<tr>
                        				<td><b>Notice_picture:</b></td>
                        				<td><img src='images/notice/<?php echo $row['notice_picture'];?>' width="80" height="100" > 

                                            <input type="file" name="fileToUpload" id="fileToUpload">

                        				</td>
                        			</tr>
                        			<tr>
                        				<td><input  type="submit" name="updatenotice" value="updatenotice"></td>
                        			</tr>
                        		</table>
                        	</form>
















<?php include("common/footer.php");?>
