<?php
  require_once("../../private/initialize.php");

  if(!isset($_GET['id'])){
    redirectTo((urlFor('/salamanders/index.php')));
  }

  $id = $_GET['id'];
  $salamanderName = '';
  
  if(isPostRequest()) {
  
    $salamanderName = $_POST['salamanderName'];
  
    echo "Form parameters<br />";
    echo "Salamander Name: " . $salamanderName;
  }

  $pageTitle = "Salamanders | Edit";

  include(SHARED_PATH."/salamander-header.php");
?>

<h1>Add new Salamander</h1>

<a href="<?php echo urlFor("/salamanders/index.php");?>">Back to List</a>

<form action="<?php echo urlFor("/salamanders/edit.php?id=".h(u($id)));?>" method="post">
  <label for="salamanderName">Salamander Name:</label>
  <input type="text" name="salamanderName" id="salamanderName" value="<?php echo h($salamanderName);?>">
  <input type="submit" value="Add Salamander">
</form>

<?php include(SHARED_PATH."/salamander-footer.php"); ?>
