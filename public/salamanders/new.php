<?php
  require_once("../../private/initialize.php");

  if(isPostRequest()){
    $salamander = array('name'=>$_POST['salamanderName'],'habitat'=>$_POST['habitat'],'description'=>$_POST['description']);

    $result = addSalamander($salamander);

    if ($result === true){
      redirectTo(urlFor("salamanders/show.php?id=".$newID));
    } else {
      $errors = $result;
    }
  }

  $pageTitle = "Salamanders | Add";

  include(SHARED_PATH."/salamander-header.php");
?>

<h1>Add new Salamander</h1>

<a href="<?php echo urlFor("salamanders/index.php");?>">Back to List</a>

<?php echo displayErrors($errors);?>
<form class="test" action="<?php echo urlFor("/salamanders/new.php");?>" method="post">
  <label for="salamanderName">Salamander Name:</label>
  <input type="text" name="salamanderName" id="salamanderName">

  <label for="habitat">Habitat:</label>
  <textarea name="habitat" id="habitat" cols="50" rows="10"></textarea>

  <label for="description">Description:</label>
  <textarea name="description" id="description" cols="50" rows="10"></textarea>

  <input type="submit" value="Add Salamander">
</form>

<?php include(SHARED_PATH."/salamander-footer.php"); ?>
