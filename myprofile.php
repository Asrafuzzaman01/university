<?php include("common/header.php");?>



<?php 

 $usertype=$_SESSION['usertype'];
 $userid=$_SESSION['userid'];
 if ($usertype=='student'){
  	$sql="select student.* , department.department_name, gender.gender_name , religion.religion_name from student ,department, religion, gender
   where 
   student.department = department.department_id and
   student.religion = religion.religion_id and
   student.gender = gender.gender_id and

   student_id='$userid'" ;
 	$result=$conn->query($sql);
 	if($result->num_rows>0){
 		$row=$result->fetch_assoc();
 		$student_id=$row['student_id'];
 		$firstname=$row['first_name'];
 		$lastname=$row['last_name'];
 		$username=$row['username'];
 		$password=$row['password'];
 		$session=$row['session'];
 		$department=$row['department_name'];
 		$gender=$row['gender_name'];
 		$religion=$row['religion_name'];
 		$admission_date=$row['admission_date'];


 	}
 }

	else if	($usertype=='teacher'){
 	$sql="select teacher.*, department.department_name,designation.designation_name,gender.gender_name,religion.religion_name from teacher,Department,designation,religion,gender
   where
   teacher.department=department.department_id and
   teacher.designation=designation.designation_id and
   teacher.gender=gender.gender_id and
   teacher.religion=religion.religion_id and

    teacher_id='$userid'" ;
 	$result=$conn->query($sql);
 	if($result->num_rows>0){
 		$row=$result->fetch_assoc();
 		$teacher_id=$row['teacher_id'];
 		$firstname=$row['firstname'];
 		$lastname=$row['lastname'];
 		$username=$row['username'];
 		$password=$row['password'];
 		$designation=$row['designation_name'];
 		$department=$row['department_name'];
 		$gender=$row['gender_name'];
 		$religion=$row['religion_name'];
 		$joining_date=$row['joinningdate'];


 	}
 }
 else 	{
 	$sql="select staff.*,designation.designation_name,gender.gender_name from staff,designation,gender
   where
   staff.designation=designation.designation_id and
   staff.gender=gender.gender_id and



   staff_id='$userid'" ;
 	$result=$conn->query($sql);
         	if($result->num_rows>0){
         		$row=$result->fetch_assoc();
         		$staff_id=$row['staff_id'];
         		$firstname=$row['first_name'];
         		$lastname=$row['last_name'];
         		$username=$row['username'];
         		$password=$row['password'];
         		$designation=$row['designation_name'];
         		
         		$gender=$row['gender_name'];
         		
         		$joining_date=$row['joining_date'];
            $email=$row['email'];
            $phone=$row['phone'];
            $address=$row['address'];



     	}
 } // end else 



?>


<?php

if($usertype=='teacher'){

?>

            <div class="teacher">

                        	<form action="" method="post">


                        		<table align="center" width="400">
                        			<tr>
                        				<td colspan="2"> <h1>My Profile</h1></td>
                        			</tr>
                        			<tr>
                        				<td><b>Firstname:</b></td>
                        				
                        				<td><?php echo $firstname;?> </td>
                        					
                        				
                        			</tr>
                        			<tr>
                        				<td><b>Lastname:</b></td>
                        				<td><?php echo $lastname;?></td>

                        			</tr>

                        			<tr>
                        				<td><b>username:</b></td>
                        				<td><?php echo $username;?></td>
                        			</tr>
                        			
                        			<tr>
                        				<td><b>Gender:</b></td>
                        				<td><?php echo $gender;?>
                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>Religion:</b></td>
                        				<td><?php echo $religion;?>
                        				</td>
                        			</tr>
        			<tr>
        				<td><b>Department:</b></td>
        				<td><?php echo $department;?>
                           
                    </td>
					</tr>
					<tr>
            			<td><b>designation:</b></td>
            				<td><?php echo $designation;?>
                            
                    </td>

                      </tr>
                      <tr>
                          <td> Joinning Date</td>
                          <td><?php echo $joining_date;?></td>
                              
                      </tr>
                    





                      <tr>

                      	<td> 
                          <a href="editprofile.php">

                          <input type="button" value=" Update Teacher "></a>
                        </td>
                      </tr>

                        		</table>
                            </form>
                        </div>

         
         <?php
}

         ?>  
         <?php
  if($usertype =='student'){

?>

            <div class="student">

                        	<form action="" method="post">


                        		<table align="center" width="400">
                        			<tr>
                        				<td colspan="2"> <h1>My Profile</h1></td>
                        			</tr>
                        			<tr>
                        				<td><b>Firstname:</b></td>
                        				
                        				<td><?php echo $firstname;?> </td>
                        					
                        				
                        			</tr>
                        			<tr>
                        				<td><b>Lastname:</b></td>
                        				<td><?php echo $lastname;?></td>

                        			</tr>

                        			<tr>
                        				<td><b>username:</b></td>
                        				<td><?php echo $username;?></td>
                        			</tr>
                        			
                        			<tr>
                        				<td><b>Gender:</b></td>
                        				<td><?php echo $gender;?>
                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>Religion:</b></td>
                        				<td><?php echo $religion;?>
                        				</td>
                        			</tr>
        			<tr>
        				<td><b>Department:</b></td>
        				<td><?php echo $department;?>
                           
                    </td>
					</tr>
					<tr>
            			<td><b>Session:</b></td>
            				<td><?php echo $session;?>
                            
                    </td>

                      </tr>
                      <tr>
                          <td> admission Date</td>
                          <td><?php echo $admission_date;?></td>
                              
                      </tr>




                      <tr>
                      	<td> 
                          <a href="editprofile.php">
                              <input type="button"  value=" Edit Student ">
                         </a>
                        </td>
                      </tr>

                        		</table>
                            </form>
                        </div>

         
         <?php
}

if($usertype =='staff')
{

?>

            <div class="staff">

                        	<form action="" method="post">


                        		<table align="center" width="400">
                        			<tr>
                        				<td colspan="2"> <h1>My Profile</h1></td>
                        			</tr>
                        			<tr>
                        				<td><b>Firstname:</b></td>
                        				
                        				<td><?php echo $firstname;?> </td>
                        					
                        				
                        			</tr>
                        			<tr>
                        				<td><b>Lastname:</b></td>
                        				<td><?php echo $lastname;?></td>

                        			</tr>

                        			<tr>
                        				<td><b>username:</b></td>
                        				<td><?php echo $username;?></td>
                        			</tr>
                        			
                        			<tr>
                        				<td><b>Gender:</b></td>
                        				<td><?php echo $gender;?>
                        				</td>
                        			</tr>
                        			
        			
					<tr>
            			<td><b>Designation:</b></td>
            				<td><?php echo $designation;?>
                            
                    </td>

                      </tr>
                      <tr>
                          <td> Joining Date</td>
                          <td><?php echo $joining_date;?></td>
                              
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $email;?></td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td><?php echo $phone;?></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td><?php echo $address;?></td>
                      </tr>
                      <tr>
                      
                        <td><a href="editprofile.php ">
                      




                      
                      	 <input type="button"  value=" Update staff ">
                        </a>
                        </td>
                      </tr>

                        		</table>
                            </form>
                        </div>

         
         <?php
}

         ?>         
       
      
       

<?php include ("common/footer.php"); ?>



