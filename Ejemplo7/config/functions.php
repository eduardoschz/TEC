<?php
require_once './database/connection.php';
function get_elements($sql){
  $conn = get_connection();
  $result = $conn->query($sql) or die($conn->error);
  $row_cnt = $result->num_rows;
  $elements = array();
    if ($row_cnt> 0) {
      while ($row = $result->fetch_assoc()) {
        $elements[] = $row;
      }
    }
  $conn->close();
  return $elements;
}

function get_element($sql){
  $conn = get_connection();
  $result = $conn->query($sql) or die($conn->error);
  $row_cnt = $result->num_rows;
    if ($row_cnt === 1) {
      while ($row = $result->fetch_assoc()) {
        $conn->close();
        return $row;
      }
    }
  $conn->close();
  return NULL;
}

function insert_element($sql){
  $conn = get_connection();
  $result = $conn->query($sql);
  //$row_cnt = $result->num_rows;
  return $result;
}

?>
