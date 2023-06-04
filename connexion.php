<?php
  //connexion à la base de données
$user = "root";
$pass = "";

  $db = new PDO ('mysql:host=localhost;dbname=dbparticipants', $user, $pass);
$db->setAttribute
(PDO:: ATTR_DEFAULT_FETCH_MODE, 
  PDO::FETCH_ASSOC);

?>