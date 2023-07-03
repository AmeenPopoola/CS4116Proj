<?php

$servername = "sql300.epizy.com";
$username = "epiz_33768646";
$dbpassword = "DnPkUp7wbvcfJ";
$dbname = "epiz_33768646_CS4116ProjGroup10";

function createConnection($servername,$username,$dbpassword,$dbname){

$connection = new mysqli($servername,$username,$dbpassword,$dbname);

if($connection -> connect_error){
	die("Connection Failed " . $connection -> connect_errno);
	exit();
}
return $connection;
}

function closeConnection($connectionInstance){
	$connectionInstance->close();   
}

function isLoggedIn()

{

	return ($_SESSION['logged_in'] && $_SESSION['user_id']);

}



function wasPosted($arr_of_props)

{

	$posted = isset($_POST);

	if ($posted)

	{

		foreach ($arr_of_props as $posted_prop)

		{

			$posted = $posted && $_POST[$posted_prop];

		}

	}

	return $posted;

}
?>