<?php include("common/header.php");?>



<?php 

 $usertype=$_SESSION['usertype'];
 $userid=$_SESSION['userid'];
 if(isset($_POST['update_teacher']) &&   $_POST['update_teacher']!="")
       {
                 $firstname = $_POST['firstname'];
                 $lastname  = $_POST['lastname'];
                 
                 $gender    = $_POST['gender'];
                 $religion  = $_POST['religion'];
                 $designation = $_POST['designation'];
                 
                $department  = $_POST['department'];
                $joining_date  = $_POST['joining_date'];

                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                 
                $sql="update  teacher
                 set firstname='$firstname',lastname='$lastname', designation='$designation',religion='$religion',gender='$gender',joinningdate ='$joining_date', department= '$department',email='$email',address='$address',phone='$phone' where teacher_id='$userid'";

                if($conn->query($sql)== true)
                    echo "teacher profile is updated  successfully";
               else
                    echo $conn->error;


       }


 if(isset($_POST['update_staff']) &&   $_POST['update_staff']!="")
       {
                 $firstname = $_POST['firstname'];
                 $lastname  = $_POST['lastname'];
                 
                 $gender    = $_POST['gender'];
                 
                 $designation = $_POST['designation'];
                 
                
                $joining_date  = $_POST['joiningdate'];

                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                 
                $sql="update  staff
                 set first_name='$firstname',last_name='$lastname', designation='$designation',gender='$gender',joining_date ='$joining_date', email='$email',address='$address',phone='$phone' where staff_id='$userid'";

                if($conn->query($sql)== true)
                    echo "staff profile is updated  successfully";
               else
                    echo $conn->error;


       }

if(isset($_POST['update_student']) &&   $_POST['update_student']!="")
       {
                 $firstname = $_POST['firstname'];
                 $lastname  = $_POST['lastname'];
                 
                 $gender    = $_POST['gender'];
                 $religion  = $_POST['religion'];
                 $session  = $_POST['session'];
                 
                $department  = $_POST['department'];
                $admission_date  = $_POST['admission_date'];

                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                 
                $sql="update  student
                 set first_name='$firstname',last_name='$lastname', session='$session',religion='$religion',gender='$gender',admission_date='$admission_date', department= '$department',email='$email',address='$address',phone='$phone' where student_id='$userid'";

                if($conn->query($sql)== true)
                    echo "Student profile is updated  successfully";
               else
                    echo $conn->error;


       }











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
 		$department=$row['department'];
 		$gender=$row['gender'];
 		$religion=$row['religion'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];

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
 		$designation=$row['designation'];
 		$department=$row['department'];
 		$gender=$row['gender'];
 		$religion=$row['religion'];
 		$joining_date=$row['joinningdate'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];


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
                        				
                        				<td><input type="text" name="firstname" value="<?php echo $firstname;?>"> </td>
                        					
                        				
                        			</tr>
                        			<tr>
                        				<td><b>Lastname:</b></td>
                        				<td><input type="text " name="lastname" value="<?php echo $lastname;?>"></td>

                        			</tr>

                        			<tr>
                        				<td><b>username:</b></td>
                        				<td><?php echo $username;?></td>
                        			</tr>
                        			
                        			<tr>
                        				<td><b>Gender:</b></td>
                        				<td><input type="radio" name="gender" value="M" <?php  if( $gender=='M')echo 'checked';?>> Male
                                  <input type="radio" name="gender" value="F" <?php if($gender=='F') echo 'checked';?>>Female
                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>Religion:</b></td>
                        				<td> <input type="radio" name="religion" value="M" <?php if($religion=='M') echo "checked";?>>Muslim
                                  <input type="radio" name="religion" value="H"  <?php if ($religion=='H') echo "checked";?>>Hindu
                                  
                        				</td>
                        			</tr>
        			<tr>
        				<td><b>Department:</b></td>
        				<td>
                  <select name="department">
                    <option value="1" <?php if($department=="1")  echo"selected"  ?>> BBA</option>
                    <option value="2" <?php if($department=="2") echo "selected" ?>>
                      CSE
                    </option>
                    <option value="3"<?php if($department=="3") echo "selected";?>> LLB</option>
                    <option value="4"<?php if($department=="4") echo "selected";?>>
                      ENG
                    </option>

                    
                  </select>

                  
                           
                    </td>
					</tr>
					<tr>
            			<td><b>designation:</b></td>
            				<td>
                      <select name="designation">
                        <option value="1" <?php if($designation=="1") echo "selected"?>> lecturer</option>
                        <option value="2" <?php if($designation=="2") echo "selected"?>> assistant Professor</option>
                        <option value="3" <?php if($designation=="3") echo "selected"?>> Associate Professor</option>
                        
                      </select>
                    </td>

                      </tr>
                      <tr>
                          <td> Joinning Date</td>
                          <td><input type="date" name="joining_date" value="<?php echo $joining_date;?>"></td>
                              
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>
                          <input type="text" name="email" value="<?php echo $email;?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td><input type="number" name="phone" value="<?php echo $phone;?>"></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" value="<?php echo $address;?>"></td>
                      </tr>





                      <tr>
                      	<td> <input type="submit" name="update_teacher" value=" Update Teacher "></td>
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
                        				
                        				<td><input type="text "  name="firstname" value="<?php echo $firstname;?>"> </td>
                        					
                        				
                        			</tr>
                        			<tr>
                        				<td><b>Lastname:</b></td>
                        				<td><input type="text"  name="lastname" value="<?php echo $lastname;?>"></td>

                        			</tr>

                        			<tr>
                        				<td><b>username:</b></td>
                        				<td><?php echo $username;?></td>
                        			</tr>
                        			
                        			<tr>
                        				<td><b>Gender:</b></td>
                        				<td>
                                  <input type="radio" name="gender" <?php if($gender=='M') echo "checked";?>   value="M">Male 
                                  <input type="radio" name="gender"  <?php if($gender=='F') echo "checked";?> value="F">Female

                        				</td>
                        			</tr>
                        			<tr>
                        				<td><b>Religion:</b></td>
                        				<td>

                                <input type="radio" name="religion" <?php if($religion=='M') echo "checked";?> value="M">Muslim
                  <input type="radio"    name="religion" value="H"  <?php if($religion=='H') echo "checked";?> >Hindhu
                        				</td>
                        			</tr>
        			<tr>
        				<td><b>Department:</b></td>
        				<td>
                      <select name="department"  >
                   <option value="1" <?php if($department==1) echo "selected";?> > BBA</option>
                   <option value="2" <?php if($department==2) echo "selected";?>> CSE</option>
                  <option value="3" <?php if($department==3) echo "selected";?>> LLB</option>  
                  <option value="4" <?php if($department==4) echo "selected";?> > ENG</option> 

                 </select>



                    </td>
					</tr>
				

        <tr>
                <td>  Session  </td>
                                <td><input type="text" name="session"  value="<?php echo $session;?>"></td>
                            </tr>
                             <tr>
                <td>  Admission date:  </td>
                                <td><input type="date" name="admission_date" value="<?php echo $admission_date;?>"  ></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" value="<?php echo $email ;?>" >  </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="text" name="phone" value="<?php echo $phone ;?>">   </td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address" value="<?php echo $address;?>"> </td>
                            </tr>




                      <tr>
                      	<td> 
                          <a href="editprofile.php">
                              <input type="submit"  name="update_student" value="Update Student ">
                         <a>
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
                        				
                      <td> <input type="text" name="firstname" value="<?php echo $firstname;?>"> </td>
                        					
                        				
                        			</tr>
                        			<tr>
                        				<td><b>Lastname:</b></td>
                        				<td><input type="text" name="lastname" value="<?php echo $lastname;?>"></td>

                        			</tr>

                        			<tr>
                        				<td><b>username:</b></td>
                        				<td><input type="text" name="username" value="<?php echo $username;?>"></td>
                        			</tr>
                        			
                        			<tr>
                        				<td><b>Gender:</b></td>
      				<td>
                <input type="radio" name="gender" value="M"<?php if($gender=='M') echo $checked;?>>Male
                <input type="radio" name="gender" value="F"<?php if($gender=='F') echo $checked?>> Female
                        				</td>
                        			</tr>
                        			
        			
					<tr>
            			<td><b>Designation:</b></td>
            				<td>
                      <input type="radio" name="designation" value="5" <?php if($designation=='5') echo $checked ?>> Officer
                      <input type="radio" name="designation" value="6"<?php if($designation=='6') echo $checked?>> clark

                    </td>

                      </tr>
                      <tr>
                          <td> Joining Date</td>
                          <td> <input type="date" name="joiningdate" value="<?php echo $joining_date;?>">   </td>
                              
                      </tr>
                      <tr>
                        <td> Email</td>
                        <td><input type="taxt" name="email" value="<?php echo $email?>"></td>
                      </tr>
                      <tr>
                        <td>Phone</td>
                        <td><input type="number" name="phone" value="<?php echo $phone?>"></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" value="<?php echo $address?>"></td>

                      </tr>




                      <tr>
                      	<td> <input type="submit" name="update_staff" value=" Update staff"></td>
                      </tr>

                        		</table>
                            </form>
                        </div>

         
         <?php
}

         ?>         
       
      
       

<?php include ("common/footer.php"); ?>



