<?php

session_start();

if(!isset($_SESSION['admin_name']) && !isset($_SESSION['password'])) {
    header("Location:../../index.php");
}

include '../../src/common/DBConnection.php';

$conn=new DBConnection();

$departments=$conn->getAll("SELECT * FROM `departments`");

$designations=$conn->getAll("SELECT * FROM `employee_designations`");

?>
                                
                                  
									
	<?php
include_once("vars.php");
if(isset($_POST["submit"]))
{

	//file upload
$fname=$_FILES["userpic"]["name"];
$err=$_FILES["userpic"]["error"];
$tempname=$_FILES["userpic"]["tmp_name"];
if($err==0)
{
		move_uploaded_file($tempname,"uploads/$fname");

}
	$name=$_POST["firstName"];
	$lastname=$_POST["lastName"];
	$dept=$_POST["department"];
	$desig=$_POST["designation"];
	
	$gender=$_POST["gender"];
	$email=$_POST["email"];
	$mobile=$_POST["number"];
	$address=$_POST["address"];
	$city=$_POST["city_pro"];
	$ocupation=$_POST["occupation"];
	$password=$_POST["password"];
	
	$active=$_SESSION["admin_name"].'@admin ';
	 $mydt="". date("Y/m/d" ) . "" ;
	
	

$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" .mysqli_connect_error());
	$q="insert into employees(first_name,last_name,department,designation,password,gender,email,address,post_code,city_pro,profile_pic,mobile_no,create_by,created_date,) values('$name','$lastname','$dept','$desig','gender','$email','$mobile','$address','$city','$fname','$occupation','$passsword','$active','$mydt')";
$res=mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
	//$x=mysqli_fetch_array($res);
	$count=mysqli_affected_rows($conn);
	mysqli_close($conn);
	
	if($count==0)
	{
		print "There seems to be problem , please try again";
		
	}
	else 
	{
		print "New Employee Created......";
}
}
?>
									
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Human Resource Management </title>

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
                                <h2>Put your employee information <small>correctly</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form action="addemp.php" method="post" enctype="multipart/form-data" name="form1" class="form-horizontal form-label-left" >

                                    <p> <code></code> 
                                    </p>
                                    <span class="section">Employee Info</span>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName">First Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="firstName" class="form-control col-md-7 col-xs-12" data-validate-length-rang="" data-validate-word="20" name="firstName" placeholder="Jon" required type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName">Last Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="lastName" class="form-control col-md-7 col-xs-12" data-validate-length-rang="" data-validate-word="" name="lastName" placeholder="Doe" required type="text">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="department" name="department">
                                                <?php foreach ($departments as $department) { ?>
                                                <option value="<?=$department['id']?>"><?=$department['name']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designation">Designation <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="designation" name="designation">
                                                <?php foreach ($designations as $designation) { ?>
                                                    <option value="<?=$designation['id']?>"><?=$designation['title']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

 <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Employee Pic <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" id="userpic" name="user_pic" data-validate-linke="pic" required class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Gender<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                           <label>
              <input type="radio" name="gender" id="gender" value="male"  class="form-control col-md-7 col-xs-12" >
              Male </label>
            <label>
              <input type="radio" name="gender" id="gender" value="female" class="form-control col-md-7 col-xs-12" checked>
              Female</label>      
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="email" data-validate-linke="email" required class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Mobile Number <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="number" name="number" required data-validate-minma="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                  
                                  
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Address <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="text" name="address" required data-validate-minma="10,100" class="form-control col-md-7 col-xs-12">
                                       </textarea>
                                        </div>
                                    </div>
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">City, Province <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="text" name="city_pro" required data-validate-minma="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                  
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Postal Code <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="text" name="post" required data-validate-minma="10,100" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                  
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">Password</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required>
                                        </div>
                                    </div>
                                   
                                  
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="submit" name="Cancel" value="Cancel" class="btn btn-primary">
                                               <input type="submit" name="submit" id="submit" value="Signup" class="btn btn-success"/>
                                        </div>
                                    </div>
    <?php //print$_SESSION["admin_name"].'@admin ';
	 $mydt="". date("Y/m/d" ) . "" ;
	//$myt="". date("h:i:sa") .""
//	print $mydt;
	 ?>
	
                                    
    
								
                                    
                                </form>
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
