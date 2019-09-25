<?php
/* 
 *	I actually dont understand the use of this file 
 */

function check_login()
{
if(strlen($_SESSION['login'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="dashboard.php";		// I noticed you declared $extra in login file too wothout using it
		$_SESSION["login"]="";			// Why would you set login to empty string if the function is supposed to check if a user is logged in(as implied from the function name)
		header("Location: http://$host$uri/$extra");
	}
}
?>