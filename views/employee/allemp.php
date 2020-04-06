
<?php
session_start();

?>

<?php
//session_start();
$uname="admin";
$pass="myadmin";
if(!isset($_SERVER['PHP_AUTH_USER']) or !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER']!=$uname) or 
($_SERVER['PHP_AUTH_PW']!=$pass))
{
header("HTTP/1.1 401 unauthorized");
header('www-Authenticate:Basic realm="Login first"');
exit("<h2>Unauthorized.You need to login to see this page</h2>");
}

?>


<?php
require_once("design.php");

?>



<head>


<link rel="stylesheet" href="style1.css" />

<style>
table, th, tr, td {
	text-align:center;
  border: 1px solid black;
}
</style>

<?php
//include_once("banner.php");
?><p>
<div class="main">
<div class="container">
<h3> Employees</h3><hr />

<table cellpadding="0" border="0" cellspacing="0" align="center">
<tr  border="1">
<td class="blogin" border="1" ><p class="table_data"></p></td>
<tr>
  <form id="form1" name="form1" method="post" action="">
  Search User  <input type="text"  name="srch" id="srch"/>
  <input type="submit" class='btn'  name="Search" value="Search" id="Search"/>
  
  <?php
	
	if(isset($_POST["Search"]))
	{
		require_once("vars.php");
		$nm=$_POST["srch"];
		$conn=mysqli_connect(host,user,pass,dbname)or die("Error in connection ".mysqli_connect_error());
		$que="select * from employees where first_name like '%$nm%' ";
	$res=mysqli_query($conn,$que) or die("Error in Query" . mysqli_error($conn));
	
	$cnt = mysqli_affected_rows($conn);
	mysqli_close($conn);
	
	if($cnt==0)
	{
		print "No User Found try with another username ";	
	}
	else
	{
		
	
	print "<table width='1000px' cellpadding='4' cellspacing='0' align='center' >";
	print "<tr align='center' bgcolor='#FFFFFF' width='1000px'>";
	print "<th align='center' width='166px'  >User pic<hr></th>";
	print "<th align='center' width='166px'>First Name<hr></th>";
	print "<th align='center' width='166px'>Last Name<hr></th>";
	
	print "<th align='center' width='166px'>Department<hr></th>";
	
	print "<th align='center' width='166px'>Desig.<hr></th>";
	print "<th align='center' width='166px'>Password<hr></th>";
	print "<th align='center' width='166px'>Gender<hr></th>";
	print "<th align='center' width='166px'>E-mail<hr></th>";
	print "<th align='center' width='166px'>Address<hr></th>";
	print "<th align='center' width='166px'>Postal Code<hr></th>";
	print "<th align='center' width='166px'>City, Province<hr></th>";
	print "<th align='center' width='166px'>Phone<hr></th>";
	print "<th align='center' width='166px'>Occupation<hr></th>";
	
	print "<th align='center' width='166px'>Created By <hr></th>";
	print "<th align='center' width='166px'>Created Date<hr></th>";
	
	print "</tr>";
	
		while($z=mysqli_fetch_array($res))
		{
			
		print "<tr bgcolor='FFFF' width='1000px' align='center' >
		<td><img src='uploads/$z[11]' class='img-circle' height='150' width='150' > <br/></td>
		<td >$z[1]</td>
		<td>$z[2]</td>
		<td >$z[3]</td>
		<td >$z[4]</td>
		<td>$z[5]</td>
		
		<td >$z[6]</td>
		<td >$z[7]</td>
		<td >$z[8]</td>
		<td >$z[9]</td>
		<td >$z[10]</td>
		<td >$z[14]</td>
		<td >$z[16]</td>
	<td >$z[17]</td>
	<td >$z[18]</td>
		</tr>";
	
	
		
		
		
      
	
       print" </div>"; 	
	}
		print "</table>";

	}
		
	}
	?>
</tr>
  </form>
  <p class="table_data">&nbsp;</p></td>
<tr>
<td class="table_data"><?php
require_once("vars.php");
$conn=mysqli_connect(host,user,pass,dbname) or die("Error in Connection" . mysqli_connect_error());
		
$q="select * from employees";
$res=mysqli_query($conn,$q);
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==0)
{
	print "No users ";
}
else
{
	print "<table width='1000px' cellpadding='4' cellspacing='0' align='center' >";
	print "<tr align='center' bgcolor='#FFFFFF' width='1000px'>";
	print "<th align='center' width='166px'  >User picture<hr></th>";
	print "<th align='center' width='166px'>First Name<hr></th>";
	print "<th align='center' width='166px'>Last Name<hr></th>";
	
	print "<th align='center' width='166px'>Department<hr></th>";
	
	print "<th align='center' width='166px'>Designation<hr></th>";
	print "<th align='center' width='166px'>Password<hr></th>";
	print "<th align='center' width='166px'>Gender<hr></th>";
	print "<th align='center' width='166px'>E-mail<hr></th>";
	print "<th align='center' width='166px'>Address<hr></th>";
	print "<th align='center' width='166px'>Postal Code<hr></th>";
	print "<th align='center' width='166px'>City, Province<hr></th>";
	print "<th align='center' width='166px'>Phone<hr></th>";
	print "<th align='center' width='166px'>Occupation<hr></th>";
	
	print "<th align='center' width='166px'>Created By <hr></th>";
	print "<th align='center' width='166px'>Created Date<hr></th>";
	
	print "</tr>";
	$cntr=1;
	while($x=mysqli_fetch_array($res))
	{
		if($cntr%2==0)
		{
			$color="FFFFFF";
		} 
		else 
		{
			$color="FFFFF";
		}
		
		print "<tr bgcolor='$color' width='1000px' align='center' >
		<td><img src='uploads/$x[11]' class='img-circle' height='150' width='150' > <br/></td>
		<td >$x[1]</td>
		<td>$x[2]</td>
		<td >$x[3]</td>
		<td >$x[4]</td>
		<td>$x[5]</td>
		
		<td >$x[6]</td>
		<td >$x[7]</td>
		<td >$x[8]</td>
		<td >$x[9]</td>
		<td >$x[10]</td>
		<td >$x[14]</td>
		<td >$x[16]</td>
	<td >$x[17]</td>
	<td >$x[18]</td>
	
	
		</tr>";
		$cntr++;
	}
		print "</table>";
	}
	?>
  </td>
  </tr>
  </table>
  </div>
 
  <?php
  //include_once("footer.php");
  ?>