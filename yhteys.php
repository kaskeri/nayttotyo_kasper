<?php
$servername = "localhost";
$sahkoposti = "root";
$salasana = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=snellenkaaviot", $sahkoposti, $salasana);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>