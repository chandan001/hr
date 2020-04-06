<?php

session_start();

if(!isset($_SESSION['admin_name']) && !isset($_SESSION['password'])) {
    header("Location:../../index.php");
}

include '../../src/common/DBConnection.php';
require_once("vars.php");
$conn=new DBConnection();

$departments=$conn->getAll("SELECT * FROM `departments`");

$designations=$conn->getAll("SELECT * FROM `employee_designations`");
?>
                                





<?php
//require_once("design.php");

?>
    
									
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Human Resource</title>

    <!-- Bootstrap -->
    <link href="../../resource/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../resource/css/font-awesome.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../resource/css/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../resource/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- side and top bar include -->
        <?php include '../partPage/sideAndTopBarMenu.html' ?>
        <!-- /side and top bar include -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Create Employee</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                               

    <?php
//	require_once("emp1.html");
	
	?>
  <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: absolute;
  bottom: 100;
  right: 0px;
  left:-19px;
  align:center;
  
  border: 3px solid #f1f1f1;
  z-index: 0;
}

/* Add styles to the form container */
.form-container {
  max-width: 2100px;
  padding: 10px;
  background-color: white;
  scrolling:on;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password], .form-container input[type=file] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus, .form-container input[type=number]:focus, .form-container select {
  background-color: #ddd;
  outline: none;
}

.form-container input[type=]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>
<div style="float:right;align:center;">
<button class="open-button" onclick="openForm()">Open Form</button>
</div>
<div class="form-popup" id="myForm">
  <form action="addemp.php" method="post" enctype="multipart/form-data" class="form-container">
    <h1>Enter Details</h1>


    
       <label for="firstname"><b>First Name</b></label>
 
    <input name="firstName" placeholder="Jon" required type="text">
 
   <label for="lastname"><b>Last Name </b></label>
    
   <input name="lastName" placeholder="Doe" required type="text">
   <label for="department"><b>Department </b></label>
      
       <select id="department" name="department">
                                                <?php foreach ($departments as $department) { ?>
                                                <option value="<?=$department['name']?>"><?=$department['name']?></option>
                                                <?php
                                                }
                                                ?>
    </select>
                                 
                                 
                                 
                               <label for="designation"><b>Designation </b></label>
                                            <select id="designation" name="designation">
                                                <?php foreach ($designations as $designation) { ?>
                                                    <option value="<?=$designation['title']?>"><?=$designation['title']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        
  <br>
   <label for="userpic"><b>UserPic </b></label>                                      
  <input type="file" id="userpic" name="userpic">
                                        
                                    
                                    
                                    
   <label for="gender"><b>Male </b></label>
                                 
              <input type="radio" name="gender" id="gender" value="male"   >
              
            
   <label for="gender"><b>Female </b></label>
              <input type="radio" name="gender" id="gender" value="female" checked>
              <br>
              
              <label for="email"><b>Email</b></label>
    <input type="text" id="email2" name="email" placeholder="Email" >
                                        
                                        
            <label for="Number"><b>Phone Number</b></label>                             
                                        
                                        
    <input type="text" id="number" name="number" placeholder="Number">
       <br>
            <label for="Address"><b>Address</b></label>  
    <input type="text" id="address" name="address" placeholder="Address" >                           
                <br>
            <label for="citypro"><b>City, Province</b></label>                             
        
    <input type="text" id="text" name="city_pro" placeholder="City, Province">
                                        
            <label for="postcode"><b>Postal code</b></label>                             
        
        
    <input type="text" id="text" name="post" placeholder="Postal Code">
                                        
        <label for="occupation"><b>Occupation</b></label>                             
                                        
    <input id="occupation" type="text" name="occupation" placeholder="Occupation">
          
        <label for="password"><b>Password</b></label>                             
          
    <input id="password" type="password" name="password" placeholder="Password" required>
                            
        
        <label for="cpassword"><b>Confirm Password</b></label>                             
                            
                            
    <input id="password2" type="password" name="password2" placeholder="Confirm Password" required>
                                  
    

    <button type="submit" class="btn" name="s1">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    <?php
	$active=$_SESSION["admin_name"].'@admin ';
	//print"$active";
	
	?>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
                             
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content include -->
        <?php include '../partPage/footer.html' ?>
        <!-- /footer content include -->
    </div>
</div>

<!-- jQuery -->
<script src="../../resource/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../resource/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../resource/js/fastclick.js"></script>
<!-- NProgress -->
<script src="../../resource/js/nprogress.js"></script>
<!-- validator -->
<script src="../../resource/js/validator.js"></script>
<!-- Custom Theme Scripts -->
<script src="../../resource/js/custom.min.js"></script>
</body>
</html>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
