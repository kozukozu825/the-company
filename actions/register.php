<?php
include "../classes/User.php";

//Create an object
$user = new User;

//call the method inside User.php
$user->store($_POST);


?>