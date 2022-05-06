<?php include("common/header.php");?>




<script>

    function login_form()
    {
        var username="",usertype="",password="",error="";
      username=document.getElement(username).value;
      if(username=="")
      {
        document.getElement("error_username").innerHTML="username is required";
        error=error+"username is required";

      }
      else
        document.getElement("error_username").innerHTML="";

password=document.getElement(password).value;
      if(password=="")
      {
        document.getElement("error_password").innerHTML="password is required";
        error=error+"password is required";

      }
      else
        document.getElement("error_password").innerHTML="";
    usertype=document.getElement(usertype).checked;
      if(usertype=="")
      {
        document.getElement("error_usertype").innerHTML="usertype is required";
        error=error+"usertype is required";

      }
      else
        document.getElement("error_username").innerHTML="";
    



    
    
if(error=="")
  {
       
    document.f1.submit();
 
       }
   }

</script>


                         <?php
                        

                         if(isset($_POST['login']) && $_POST['login']!="")
                         {
                         	$username=$_POST['username'];
                         	$password=$_POST['password'];
                         	$usertype=$_POST['usertype'];


///SELECT column_name(s) FROM table_name WHERE column_name operator value 
                            if($usertype =='student')
                            {

                         	echo  $sql="select * from student where username='$username' and password='$password' ";

                         	  
                         	$result=$conn->query($sql) ;
                         	if($result->num_rows>0)
                                
                                {
                                 
                                   $row = $result->fetch_assoc();
                                   $_SESSION['username'] = $row['username'];
                                   $_SESSION['password'] = $row['password'];
                                   $_SESSION['usertype'] = $usertype;
                                   $_SESSION['userid']  = $row['student_id'];
                                  
                                  
                                   header("Location: index.php");
                                }
                            }//end if
                            
                            	else if ($usertype=='teacher'){
                            		$sql="select * from teacher where username='$username' and password='$password'";

                            		$result=$conn->query($sql);
                            		if($result->num_rows>0){
                            			$row =$result->fetch_assoc();
                            			$_SESSION['username']=$row['username'];
                            			$_SESSION['pasword']=$row['password'];
                            			$_SESSION['usertype']=$usertype;
                            			$_SESSION['userid']=$row['teacher_id'];
                            			header("Location: index.php");
                            		}




                            	} // end els eif
                                else{

         $sql = "select * from staff where username='$username' and password='$password' ";
                                    $result=$conn->query($sql);
                                     if($result->num_rows>0){
                                        $row=$result->fetch_assoc();
                                        $_SESSION['username']=$row['username'];
                                        $_SESSION['password']=$row['password'];
                                        $_SESSION['usertype']=$usertype;
                                        $_SESSION['userid']=$row['staff_id'];
                                       header("Location: index.php");
                                     }

                                } // end else 


                         } //end if





                         ?>





                        <div class="login">
                        	<form action="" method="post" name="f1">
                        		<table align="center" width="400">
                        			<tr>
                        				<td>Username:</td>

                        				<td><input type="text" name="username" id="username"></td>
                                        <td id="error_username" style="color:red;"></td>
                        			</tr>


                        			<tr>
                        				<td>Password</td>
                        				<td><input type="Password" name="password" id="password"></td>
                                        <td id="error_password" style="color:red;"></td>
                        			</tr>
                        			<tr>
                        				<td>usertype</td>
                        				<td>
                                            <input type="radio" name="usertype" checked value="student" id="usertype">Student
                        				 <input type="radio" name="usertype" value="teacher" id="usertype">Teacher
                                         <input type="radio" name="usertype" value="staff" id="usertype">Staff
                                        </td>
                                        <td id="error_usertype" style="color:red;"></td>



                        			</tr>
                        			<tr>
                        				<td><input type="hidden" name="login" value="login"></td>

                                        <td><input type="button" value="login" onclick= "submit_login_form()" > </td>


                                    </tr>
                        			



                        			
                        		</table>

















                        </div>



                        







<?php include("common/footer.php");?>