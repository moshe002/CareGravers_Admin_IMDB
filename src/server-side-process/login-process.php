<?php
session_start ();
include("../pages/database.php");
if(isset($_REQUEST['submit'])){
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['password'];
	$res = mysqli_query($conn,"select * from admin where adminEmail='$email' AND adminPassword='$pass';");
	$numRows =  mysqli_num_rows($res);

	if($numRows == 1){	
		$row = mysqli_fetch_assoc($res);
        $_SESSION["loggedInAdmin"] = $row;
        $_SESSION["login"]="1";
        header("location:/CareGraver_ADMIN/src/pages/inquiries.php");
	}
    //no match
    else{
        header("location:/CareGraver_ADMIN/src/pages/login.php?err=1");	
    }	
	
}
?>
