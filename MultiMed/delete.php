<?php
  include("config.php");
  $t = $_GET['name'];
  mysqli_query($db,"DELETE FROM datos WHERE name='".$t."';");
  header("Location: modify.php");
  die();
?>