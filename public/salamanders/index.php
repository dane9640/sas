<?php
  require("../../private/initialize.php");

  $salamanders = find_all_salamanders();
  $pageTitle = "Salamanders";

  include(SHARED_PATH."/salamander-header.php");
?>

<h1>Salamanders</h1>

  <a href="<?php echo urlFor("/salamanders/new.php");?>">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Description</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

      <?php while($salamander = mysqli_fetch_assoc($salamanders)) { ?>
        <tr>
          <td><?php echo h($salamander['id']) ?></td>
          <td><?php echo h($salamander['name']) ?></td>
          <td><?php echo h($salamander['habitat']) ?></td>
          <td><?php echo h($salamander['description']) ?></td>
          <td><a href="<?php echo urlFor('/salamanders/show.php?id='.h(u($salamander['id']))); ?>">View</a></td>
          <td><a href="<?php echo urlFor('/salamanders/edit.php?id='.h(u($salamander['id']))); ?>">Edit</a></td>
          <td><a href="#">Delete</a></td>
    	  </tr>
      <?php
        }
        mysqli_free_result($salamanders);
      ?>
  	</table>

<?php include(SHARED_PATH."/salamander-footer.php"); ?>
