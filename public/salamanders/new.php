<?php
  require_once("../../private/initialize.php");

  $test = $_GET['test'] ?? '';

  if($test == '404'){
    error404();
  } elseif ($test == '500'){
    error500();
  } elseif ($test == 'redirect'){
    redirectTo(urlFor('/salamanders/index.php'));
  }

  $pageTitle = "Salamanders | Add";

  include(SHARED_PATH."/salamander-header.php");
?>

<h1>Add new Salamander</h1>

<a href="<?php echo urlFor("/salamanders/index.php");?>">Back to List</a>

<form action="<?php echo urlFor("/salamanders/create.php");?>" method="post">
  <label for="salamanderName">Salamander Name:</label>
  <input type="text" name="salamanderName" id="salamanderName">
  <input type="submit" value="Add Salamander">
</form>

<?php include(SHARED_PATH."/salamander-footer.php"); ?>
