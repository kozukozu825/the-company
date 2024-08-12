<?php
  include "../classes/User.php";

  //Create an object
  $user = new User;

  //call the login method inside User.php
  $user->login($_POST);

?>