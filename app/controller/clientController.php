<?php 
require_once('../model/operation.php');
$db = new operations();
$db->Enregistrement_Client();


$db = new operations();
$result = $db->Voir_Enregistrement();
require('../listeClient.php');


?> 