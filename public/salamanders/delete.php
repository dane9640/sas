<?php
  require_once("../../private/initialize.php");

  if(!isset($_GET['id'])){
    redirectTo(urlFor('salamanders/index.php'));
  }
  $id = $_GET['id'];

  $salamander = findSalamanderByID($id);
  
  if(isPostRequest()){
    $result = deleteSalamander($salamander);
    if($result){
      redirectTo(urlFor('salamanders/index.php'));
    } else {
      echo mysqli_error($db);
      dbDisconnect($db);
    }
  }

  $pageTitle = "Salamanders | Delete";

  include(SHARED_PATH."/salamander-header.php");
?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="salamander delete">
    <h1>Delete Salamander</h1>
    <p>Are you sure you want to delete this salamander?</p>
    <p class="item"><?php echo h($salamander['name']); ?></p>

    <form action="<?php echo urlFor('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete salamander">
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH."/salamander-footer.php"); ?>
