<?php
  require_once("../../private/initialize.php");

  $pageTitle = "Salamanders | Edit";
  $id = $_GET['id'];

  if(isPostRequest()){
    $salamander = array("id" => $id, "name" => $_POST['name'],"habitat" => $_POST['habitat'], "description" => $_POST['description']);

    $result = editSalamander($salamander);

    if($result === true){
      redirectTo(urlFor("salamanders/show.php?id=".$id));
    }else{
      $errors = $result;
    }
  } 
  else {
    $salamander = findSalamanderByID($id);
  }

  include(SHARED_PATH."/salamander-header.php");
?>

<h1>Edit Salamander</h1>
<?php echo displayErrors($errors);?>
<form action="<?php echo urlFor('/salamanders/edit.php?id='.h(u($id)));?>" method="post">
  <label for="name">Salamander Name</label>
  <input type="text" id="name" name="name" value="<?php
  echo h($salamander['name']);?>"><br>

  <label for="habitat">Habitat</label>
  <textarea name="habitat" id="habitat" cols="50" rows="10"><?php echo h($salamander['habitat']);?></textarea>

  <label for="description">Description</label>
  <textarea name="description" id="description" cols="50" rows="10"><?php echo h($salamander['description']);?></textarea>
  <input type="submit" value="Edit Salamander">
</form>

<?php include(SHARED_PATH."/salamander-footer.php"); ?>
