<?php include("common/header.php");?>

<script>
    function validateEmail(email=""){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;


        return reg.test(email);

     }

   function CheckPassword(password) 
{ 


    var passw =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
                
    alert(password.match(passw));
    if(password.match(passw)) 

          return true;
    else
         return false;

}
   function submit_admission_form()
   {

     var firstname="" , error="" ,lastname="",username="",gender="",religion="",password="",address="",admission_date="",email="",phone="", department="",session="";
     

     firstname = document.getElementById("firstname").value;
     if(firstname=="")
     {
        document.getElementById('error_firstname').innerHTML="First Name is required!!";
        error = error + "First Name is required!!";
    }

    else 
        document.getElementById('error_firstname').innerHTML="";

    

            
    lastname=document.getElementById("lastname").value;
    if(lastname==""){
        document.getElementById('error_lastname').innerHTML="last name  is required";
        error= error + "Last name is required!!";
    }
    else
        document. getElementById('error_lastname').innerHTML="";

    

    username=document.getElementById("username").value;
    if(username==""){
        document.getElementById('error_username').innerHTML="user name  is required";
        error= error + "User name is required!!";
    }
    else
        document. getElementById('error_username').innerHTML="";


    password=document.getElementById("password").value;

    if(password=="")
    {
        document.getElementById("error_password").innerHTML="password is required";
        error=error + "password is required!!";


           }
           else if(password.length<8)
            {
        document.getElementById("error_password").innerHTML=" length of password need minimum  8 chracter ";
        error=error + "password is required!!";


           }
           else if (CheckPassword(password)==false)
             {
        document.getElementById("error_password").innerHTML="password must be contain at least one uper case,one lower case, one digit and one spacial charecter!!";
        error=error + "password is required!!";


           }

      else
        document.getElementById("error_password").innerHTML="";


gender=document.getElementById("gender").checked;
if(gender==false)


{
    document.getElementById("error_gender").innerHTML="gender is required";
   error=error + "password is required!!";

}

else
document.getElementById("error_gender").innerHTML="";

religion=document.getElementById("religion").checked;
 if(religion==false){
    document.getElementById("error_religion").innerHTML="Religion is required";
error= error + "password is required!!";

}

else
document.getElementById("error_religion").innerHTML="";


department=document.getElementById("department").value;
 if(department=="")
 {

    document.getElementById("error_department").innerHTML="department is required";
        error=error + "password is required!!";

 }
 else
    document.getElementById("error_department").innerHTML="";




session=document.getElementById("session").value;
 if(session=="")
 {

    document.getElementById("error_session").innerHTML="session is reqoired";
error=error + "password is required!!";

 }
 else
    document.getElementById("error_session").innerHTML="";

admission_date=document.getElementById("admission_date").value;



 if(admission_date=="")
 {

    document.getElementById("error_admission_date").innerHTML="admission_date is required";
         error=error + "admission is required!!";
       
 }
 else
    document.getElementById("error_admission_date").innerHTML="";




      email=document.getElementById("email").value;
        if(email=="")

 {


          document.getElementById("error_email").innerHTML="email is required";

             error=error + "email  is required!!";

 }
 else if (validateEmail(email)==false)
 {
     document.getElementById("error_email").innerHTML="email  format is invalid";
     error=error + "email  is required!!";

 }

 else
    document.getElementById("error_email").innerHTML="";



phone=document.getElementById("phone").value;
 if(phone=="")
 {

    document.getElementById("error_phone").innerHTML="phone is reqoired";

             error=error + "phone is required!!";

 }
 else
    document.getElementById("error_phone").innerHTML="";


address = document.getElementById("address1").value;


 if(address=="")
 {

    document.getElementById("error_address").innerHTML="address is reqoired";

             error=error + "address is required!!";

 }
 else
    document.getElementById("error_address").innerHTML="";










  if(error=="")
  {
       
    document.f1.submit();
 
       }


   }

</script>

	    <?php

       if(isset($_POST['admission_student']) &&   $_POST['admission_student']!="")
       {
                 $firstname = $_POST['firstname'];
                 $lastname  = $_POST['lastname'];
                 $useername = $_POST['useername'];
                 $password  = $_POST['password'];
                 $gender    = $_POST['gender'];
                 $religion  = $_POST['religion'];
                 $session  = $_POST['session'];
                 
                $department  = $_POST['department'];
                $admission_date  = $_POST['admission_date'];

                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                 
                $sql="insert into student(first_name ,last_name,username,password,session,religion,gender,admission_date,department,email,address,phone)
                values('$firstname','$lastname','$useername','$password',  '$session','$religion','$gender','$admission_date',  '$department','$email','$address','$phone')";

                if($conn->query($sql)== true)
                    echo "New record created successfully";
               else
                    echo $conn->error;


       }



        ?>   	      

	   <div class="B">
	       	<form action="" method="post" name ="f1">    	
            	<table align="center" width='500'>

					 		<tr>
					 			<td>	Firstname:  </td>
                                <td> <input type="text "  name="firstname" id="firstname" placeholder="form-control" > </td>
                                <td id="error_firstname" style="color:red;"></td>
                            </tr>

                            <tr>
					 			<td>
					 			
					 				Lastname: 
                                </td>
                                <td>
					 				<input type="text"  name="lastname" id="lastname"></td>
                                    <td id="error_lastname" style="color:red;"></td>
                                
                            </tr>

					 		<tr>
					 			<td> Username: </td>
                                <td> <input type="text" name="useername" id='username'> </td>
                                <td id="error_username" style="color:red;"></td>
                            </tr>
                            <tr>
					 			<td> Password: </td>
                                <td> <input type="password" name="password" id="password"><br><br> </td>
                                <td id="error_password" style="color:red;"></td>
                            </tr>
                            <tr>
					 			<td>  <b>Gender</b></td>
                                <td> <input type="radio" name="gender" value="male" id="gender">male 
                                	<input type="radio" name="gender" value="female" id="gender">female

                                </td>
                                <td id="error_gender" style="color:red;"></td>

                            </tr>
                            <tr>
					 			<td> <b>Religion</b> </td>
                                <td> <input type="radio" name="religion" value="M" id="religion">muslim
					 				<input type="radio"    name="religion" value="H" id="religion" >hindhu</td>
                                        <td id="error_religion" style="color:red;"></td>

                            </tr>
                            <tr>
					 			<td>	Department:  </td>
                                <td> <select name="department" id="department"  >
                                    <option value="">Select Department</option>
                                         <option value="1"> BBA</option>
                                          <option value="2"> CSE</option>
                                           <option value="3"> LLB</option>	
                                            <option value="4"> ENG</option>	

	
	

                                     </select>
                                   </td>
                                   <td id="error_department" style="color:red;"></td>
                            </tr>
                             <tr>
					 			<td>	Session  </td>
                                <td><input type="text" name="session" id="session" ></td>
                                 <td id="error_session" style="color:red;"></td>

                            </tr>
                             <tr>
					 			<td>	Admission date:  </td>
                                <td><input type="date" name="admission_date"  id="admission_date"></td>
                                 <td id="error_admission_date" style="color:red;"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" id="email"></td>
                                 <td id="error_email" style="color:red;"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="number" name="phone" id="phone"></td>
                                 <td id="error_phone" style="color:red;"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address" id="address1" > </td>
                                 <td id="error_address" style="color:red;"></td>
                            </tr>

                            <tr>
					 			<td>	&nbsp;  </td>
                                <td>

                                   <input type="hidden"  name="admission_student" value="Admission Student" >
                                    <input type="button" value="Admission Student" onclick="submit_admission_form()" ></td>
                            </tr>

                                      


					 			
					 				
				
					
					</table>
		      </form>
            
	    </div>



<?php include ("common/footer.php"); ?>






