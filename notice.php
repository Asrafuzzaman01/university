<?php include("common/header.php");?>

<div class= "notice">
	

<marquee width="100%" direction="right" height ="30px">
	<a href="result.php">university result is  declared       </a>
     
     <a href="#">university close until government declare   </a>
    
	</marquee>

	<table>
		<tr>
			<td><a href="addnotice.php">  Add notice</a></td>
		</tr>


	<?php 
	$sql= "select notice.* from notice ";
	$result=$conn->query($sql);
	if($result->num_rows>0){

		while($row=$result->fetch_assoc()){
			?>
			<tr>
				<td><?php echo $row['title'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo  $row['date'];?></td>
				<td><img src='images/notice/<?php echo $row['notice_picture'];?>' width="80" height="100" ></td>\
                <td><a href="editnotice.php?noticeid=<?php echo $row['notice_id'];?>"> Edit Notice</a></td>

			</tr>




	<?php	}


		

	}


	?>
</table>



</div>



<?php include("common/footer.php");?> 