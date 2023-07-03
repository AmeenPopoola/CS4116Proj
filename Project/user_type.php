<?php 

$role =$_POST['role'];

if($role == 'artist'){
	header("Location: infoPage.php");
} else {
	header("Location: orgInfoPage.php");
}

?>