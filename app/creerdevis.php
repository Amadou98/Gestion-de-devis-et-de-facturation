<?php require_once('model/operation.php');
$db = new operations();
$result = $db->Voir_Enregistrement();?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestion de devis et de facturation</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    var html = '<tr><td><input class="form-control" type="text" name="designation" required=""></td><td><input class="form-control" type="number" name="quantite" required=""></td><td><input class="form-control" type="currency" name="prix_unitaire" required=""></td><td><input class="form-control" type="text" name="unitedemesure" required=""></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="supprimer" required=""></td></tr>';
    
    var max = 5;
    var x = 1;

    $("#add").click(function(){
      if (x<= max) {
        $("#table_field").append(html);
        x++
      }
      
    });

    $("#table_field").on('click','#remove',function(){
      $(this).closest('tr').remove();
      x--;
    });
  });
  
  
</script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="accueil.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Gestion de devis et de facturation<!-- <sup>2</sup> --></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="accueil.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord </span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user"></i>
          <span>Clients</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="addclient.php">Ajouter un client</a>
            <a class="collapse-item" href="listeClient.php">Voir les clients</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-file"></i>
          <span>Devis</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="creerdevis.php">Créer un devis</a>
            <a class="collapse-item" href="voirdevis.php">Consulter un devis</a>
            
          </div>
        </div>
      </li>
            <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFacture" aria-expanded="true" aria-controls="collapseFacture">
          <i class="fa fa-file"></i>
          <span>factures</span>
        </a>
        <div id="collapseFacture" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="#">Créer une facture</a>
            <a class="collapse-item" href="#">Voir une facture</a>
            
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         
            <div class="input-group">
              <img src="img/logo.png">
            
              </div>
           

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                
                  <div class="input-group">
                    
                    <div class="input-group-append">
                     
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
           
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
               
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Amadou Dieng</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Déconnexion
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Créer un dévis</h1>
           

          </div>

                <!-- Card Body -->
                <div class="card-body">
                  <div class="container">
                    
                      
                        <div class="card mt-2">
                          <div class="card-header">
                            <h2>Création d'un devis pour un client</h2>
                          </div>
                           
                          <div class="card-body">
<form class="needs-validation" method="post" novalidate>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Choisir un client</label>
      <select type="text" name="nom" id="nom" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option value="0">Choisir...</option>
                      <?php 
                      while ($donne = mysqli_fetch_array($result))
                       {  
                       ?>
                       <option value="<?php echo $donne['nom'];?>"><?php echo $donne['nom'];?></option>
                      <?php
                       } 
                       ?>
      </select>
    </div>

    <div class="col-md-3 mb-3">
      <label for="validationCustom02">Adresse du client</label>
      <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse " value="" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom02">Numero du client</label>
      <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Numero " value="" required>
    </div>

     <div class="col-md-3 mb-3">
      <label for="validationCustom02">Email du client</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="" required>
    </div>
  </div>

    <div class="container">
      
        <table class="table table-bordered" id="table_field">
          <tr>
            <th>Designation</th>
            <th>Quantite</th>
            <th>Prix unitaire</th>
            <th>Unite de mesure</th>
            <th style="text-align: center;">Ajouter une ligne </th>
          </tr>
          <tr>
            <td><input class="form-control" type="text" name="designation" required=""></td>
            <td><input class="form-control" type="number" name="quantite" required=""></td>
            <td><input class="form-control" type="currency" name="prix_unitaire" required=""></td>
            <td><input class="form-control" type="text" name="unitedemesure" required=""></td>
            <td><input class="btn btn-warning" type="button" name="add" id="add" value="ajouter" required=""></td>
          </tr>
        </table>
        <div class="col-md-2 mb-2" style="margin-left: 47em">
            <input class="form-control" type="number"  readonly="readonly" placeholder="Montant" />
        </div>
    </div>
  

  

  <div class="form-group">
  </div>
  <button class="btn btn-primary" type="submit">Enregistré</button>
</form>
                          </div>
                          

                        </div>

                      </div>
                    </div>
                    
                  </div>

                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              

            <div class="col-lg-6 mb-4">

             
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
                     
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ACCELARATE 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
              Prêt à partir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Etes vous prêt à mettre fin à votre session en cours.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <a class="btn btn-primary" href="index.php">Deconnexion</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
