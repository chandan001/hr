<?php //print$_SESSION["admin_name"].'@admin ';
	 $mydt="". date("Y/m/d" ) . "" ;
	//$myt="". date("h:i:sa") .""
//	print $mydt;
	 ?>
	
    
                                  
									
	<?php
	session_start();
include_once("vars.php");

//if(isset($_POST["s1"]))
//{
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
	$occupation=$_POST["occupation"];
	$password=$_POST["password"];
		$post=$_POST["post"];
	
	$active=$_SESSION["admin_name"].'@admin ';
	//print"$active";
	//$active;
	 $mydt="". date("Y/m/d" ) . "" ;
	
	

$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" .mysqli_connect_error());
	$q="insert into employees(first_name,last_name,department,designation,password,gender,email,address,post_code,city_pro,profile_pic,mobile_no,occupation,create_by,created_date) values('$name','$lastname','$dept','$desig','$password','$gender','$email','$address','$post','$city','$fname','$mobile','$occupation','$active','$mydt')";
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
//}
?>
                                    
