<?php include ("common/header.php"); ?>

	       	      

	       	           <div class="B">
	       	           	

                                  <table>
                                    <tr>
                                      <td><a href="addgallery.php"> Add gallery_picture</a></td>
                                    </tr>
                                  	  
  <?php 
  $sql= "select gallary.* from gallary ";
  $result=$conn->query($sql);
  if($result->num_rows>0){

    while($row=$result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['picture_title'];?></td>
   
        <td><?php echo  $row['date'];?></td>
        <td><img src='images/gallery/<?php echo $row['picture_name'];?>' width="30" height="50" ></td>

             <td> <a href="editegallary.php?galleryid=<?php echo $row['gallary_id'];?>"> editegallery</a>  </td>

      </tr>





  <?php }
}
?>



                                  </table>
                                




	       	            </div>




	       	    <?php include ("common/footer.php"); ?>





