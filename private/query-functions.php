<?php

  // Select all salamanders
  function find_all_salamanders() {
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    return $result;
   }

  function findSalamanderByID($id){
    global $db;
    $sql = "SELECT * FROM salamander ";
    $sql .= "WHERE id='".$id."'";
    $result = mysqli_query($db, $sql);
  
    confirmResultSet($result);
  
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;
  }
  
  function addSalamander($salamander) {
    global $db;
    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'".$salamander['name']."',";
    $sql .= "'".$salamander['habitat']."',";
    $sql .= "'".$salamander['description']."'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    
    if ($result){
      return $result;
    } else {
      echo mysqli_error($db);
      dbDisconnect($db);
    }
  }
  
  function editSalamander($salamander){
    global $db;
    $sql = "UPDATE salamander SET ";
    $sql .= "name='".$salamander['name']."',";
    $sql .= "habitat='".$salamander['habitat']."',";
    $sql .= "description='".$salamander['description']."' ";
    $sql .= "WHERE id='".$salamander['id']."'";
    $sql .= "LIMIT 1";
    
    $result = mysqli_query($db, $sql);
    if ($result){
      return $result;
    } else {
      echo mysqli_error($db);
      dbDisconnect($db);
    }
  }

  function deleteSalamander($salamander){
    global $db;

    $sql = "DELETE FROM salamander ";
    $sql .= "WHERE id='".$salamander['id']."' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
      return $result;
    } else {
      echo mysqli_error($db);
      dbDisconnect($db);
    }
  }

?>