<?php
  require_once("../../private/initialize.php");

  $pageTitle = "Salamanders | Show";

  include(SHARED_PATH."/salamander-header.php");

  $id = $_GET['id'];
  $salamander = findSalamanderByID($id);
?>

<h1><?php echo h($salamander['name']);?></h1>

<h2>Habitat: </h2>
<p><?php echo h($salamander['habitat']);?></p>

<h2>Description: </h2>
<p><?php echo h($salamander['description']);?></p>

<?php include(SHARED_PATH."/salamander-footer.php"); ?>