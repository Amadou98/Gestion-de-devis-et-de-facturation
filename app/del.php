<?php 
      require_once('model/operation.php');
      $db = new operations();
       // $db->Update();
      $Idclient = $_GET['D_ID'];
      $result = $db->Supprimer_Enregistrement($Idclient);
      header('location:listeClient.php');
      


       
    
?>