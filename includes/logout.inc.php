<?php 
session_start();
$_SESSION['login']=="";
/* Why do you need to do this when you will still unset all sessions below*/

session_unset();


$_SESSION['action1']="You have logged out successfully..!";
/* You are using a session to indicate that the user is logged out
*   What about the user id name, email , loggedin status and logged in you set in the login.inc.php
*   when you were loggin in a user
*/
?>

<!-- You could have just redirected from the php code !!! -->
<script language="javascript">
document.location="../hercules.php";
</script>

