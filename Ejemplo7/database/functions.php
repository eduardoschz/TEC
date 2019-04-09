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

function insert_element($tabla,$data){
  $conn = get_connection();
  $campos = [];
  $valores = [];

    foreach ($data as $key => $value) {
      $campos[]= $key;
      $valores[] = $value;
    }

  $sql = 'INSERT INTO ' . $tabla . ' (';
    $sql .= implode(', ', $campos);
    $sql .= ') VALUES (';
    $sql .= '"'. implode('","',$valores) .'"';
    $sql .= ')';
  $result = $conn->query($sql);
  print_r($sql);
  return ($result)?$conn->insert_id:FALSE;
}

function update_element($tabla, $data, $id){
  $conn = get_connection();
  $sql = 'UPDATE ' . $tabla . ' SET';
    $elements = [];
    foreach ($data as $key => $value) {
      $elements = $key. ' = "'. $value .'"';
    }
      $sql.= implode(',', $elements);
      $sql.= ' WHERE id =' . $id;
print_r($sql);
      $result = $conn->query($sql);

    return $result;
}


?>
