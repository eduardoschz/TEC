<?php
  require_once './config/database.php';
  function get_connection()
  {
    extract($GLOBALS['db_connection']);
    $conn = new mysqli($servername, $username, $password,$dbname);
    if ($conn->connect_error) {
        die("Error en la conexión a la DB: " . $conn->connect_error);
    }
    $conn->set_charset($charset);
    return $conn;
  }
?>
