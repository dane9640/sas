<?php
  require_once('../../private/initialize.php');

  if(isPostRequest()) {
  
    $salamanderName = $_POST['salamanderName'];
  
    echo "Form parameters<br />";
    echo "Salamander Name: " . $salamanderName;
  } else {
    redirectTo(urlFor('/salamanders/new.php'));
  }
?>  
