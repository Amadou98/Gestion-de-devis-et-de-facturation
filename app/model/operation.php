<?php 
    
    include 'config.php';
    $db = new dbconfig();

    
    class operations extends dbconfig
    {
        public function Enregistrement_Client()
        {
            global $db;
            if (isset($_POST['btn-save']))
             {
                
                $Nom = $db->check($_POST['nom']);
                $Adresse = $db->check($_POST['adresse']);
                $Telephone = $db->check($_POST['telephone']);
                $Email = $db->check($_POST['email']);
                

                if ($this->insert_Enregistrement($Nom,$Adresse,$Telephone,$Email))
                 {
                   echo '<div class="alert alert-success"> Votre client a bien ete enregistré</div>'; 
                }
                else
                {
                   echo '<div class="alert alert-danger"> Enregistrement echoué</div>'; 
                }
             }
        }

       function insert_Enregistrement($a,$b,$c,$d)
        {
            global $db;
            $query = "INSERT INTO client (nom,adresse,telephone,email,id_user) VALUES ('$a','$b','$c','$d',1)";     
            $result = mysqli_query($db->connection, $query);
            

            if ($result) {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function Voir_Enregistrement()
        {
            global $db;
            $query = "SELECT * FROM client";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        public function Obtenir_Enregistrement($idclient)
        {
            global $db;
            
            $sql = "SELECT * FROM client where idclient = '$idclient'";
            $donne = mysqli_query($db->connection,$sql);
            return $donne;
        }

        public function Update()
        {
            global $db;
            if (isset($_POST['btn-update']))
             {
                $Idclient = $_POST['idclient'];
                $Nom = $_POST['nom'];
                $Adresse = $_POST['adresse'];
                $Telephone = $_POST['telephone'];
                $Email = $_POST['email'];

            echo '<div class="alert alert-success"> Votre client a bien ete modifié</div>';

                $sql = "UPDATE client SET nom='$Nom', adresse = '$Adresse', telephone = '$Telephone', email='$Email' WHERE idclient = '$Idclient'";
                $result = mysqli_query($db->connection,$sql);

            }
        }

        public function Supprimer_Enregistrement($idclient)
        {
            global $db;
            $query = "DELETE FROM client WHERE idclient = '$idclient'";
            $result = mysqli_query($db->connection,$query);

            if ($result)
             {
                return true;
            }
            else
            {
                return false;
            }
        }

       
    }

