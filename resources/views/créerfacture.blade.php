<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FMSI</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="/dashboard"><img src="assets/images/fm1remove2.png" style="width: 150px; height: 50px;" alt="logo" /></a>
          <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item  dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Reports </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-file-excel mr-2"></i>Excel </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-file-word mr-2"></i>doc </a>
              </div>
            </li>
            <li class="nav-item  dropdown d-none d-md-block">
              <a class="nav-link dropdown-toggle" id="projectDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Projects </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="projectDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-eye-outline mr-2"></i>View Project </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-pencil-outline mr-2"></i>Edit Project </a>
              </div>
            </li>

            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face28.png" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/images/faces/face28.png" alt="">
                </div>
                <div class="p-2">
                  <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Inbox</span>
                    <span class="p-0">
                      <span class="badge badge-primary">3</span>
                      <i class="mdi mdi-email-open-outline ml-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="{{ route('profile.show') }}">
                    <span>Profil</span>
                    <span class="p-0">
                      <span class="badge badge-success">1</span>
                      <i class="mdi mdi-account-outline ml-1"></i>
                    </span>
                  </a>

                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                    <span>Déconnexion</span>
                    <i class="mdi mdi-logout ml-1"></i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-success"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0 bg-primary text-white py-4">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            
                        <!-- facture  -->
                        <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic6">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Factures</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic6">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/facture">Liste Des Facture</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créerfacture">Créer Une Facture</a></li>

                </ul>
              </div>
            </li>
            <!-- fin facture  -->

                                    <!-- devis  -->
                                    <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic7">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Devis</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic7">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/devis">Liste Des Devis</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créerdevis">Créer Un Devis</a></li>

                </ul>
              </div>
            </li>
            <!-- fin devis  -->

                                                <!-- avoir  -->
                                                <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic8" aria-expanded="false" aria-controls="ui-basic8">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Avoirs</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic8">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/avoir">Liste Des Avoirs</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créeravoir">Créer Un Avoir</a></li>

                </ul>
              </div>
            </li>
            <!-- fin avoir  -->

                                                                        <!-- intervention  -->
                                                                        <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic9" aria-expanded="false" aria-controls="ui-basic9">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Interventions</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic9">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/intervention">Liste Des Rapports</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créerintervention">Créer Un Rapport</a></li>

                </ul>
              </div>
            </li>
            <!-- fin intervention  -->
            
              <!-- document  -->
              <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic17" aria-expanded="false" aria-controls="ui-basic17">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Documents</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic17">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/document">Liste Des Documents</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créerdocument">Créer Un Document</a></li>

                </ul>
              </div>
            </li>
            <!-- fin document  -->

            

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
                <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                <span class="menu-title">Tâches</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/tache">Listes Des Tâches</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créertache">Créer Une Tâches</a></li>
                </ul>
              </div>
            </li>

            <!-- client  -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <span class="icon-bg"><i class="mdi mdi-account-card-details menu-icon"></i></span>
                <span class="menu-title">Clients</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/client">Liste Des Clients</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créerclient">Créer Un Client</a></li>

                </ul>
              </div>
            </li>
            <!-- fin client  -->

  <!-- employee  -->
  <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Employées</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/user">Liste Des Employées</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créeruser">Créer Un Employées</a></li>

                </ul>
              </div>
            </li>
            <!-- fin employee  -->


            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
                <span class="menu-title">Charts</span>
              </a>
            </li> -->

            <!-- service  -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/service">Liste Des Services</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créerservice">Créer Un Service</a></li>

                </ul>
              </div>
            </li>
            <!-- fin service  -->


            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-img">
                        <img src="assets/images/faces/face28.png" alt="image">
                      </div>
                      <div class="sidebar-profile-text">
                        <p class="mb-1">{{ Auth::user()->name }}</p>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="badge badge-danger">3</div> -->
                </div>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="{{ route('profile.show') }}" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title">Profil</span>
                </a>
              </div>
            </li>

            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
                  <span class="menu-title">Déconnexion</span></a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
              </div>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">









    <!-- test  -->
    <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                    <a href="/back"><i class="mdi mdi-arrow-left-bold-circle-outline"></i></a>
                    Créer une Facture</h4>
                    <p class="card-description"> Facture Client </p>
                    <form class="forms-sample" action="{{ route('facture.insert') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                    <div class="col-md-6">
    <label for="exampleInputEmail3">Client</label>
    <input type="text" id="searchClient" class="form-control search-input" placeholder="Chercher">
    <select id="clientselect" class="js-select2 form-control" name="clientfac" required>
        <option value="" disabled selected>Choisissez un client</option>
        @foreach ($clients as $client)
            <option value="{{ $client }}">{{ $client->numclient }} / {{ $client->nameclient }}</option>
        @endforeach
    </select>
</div>

<script>
    var select = document.getElementById('clientselect');
    var options = select.getElementsByTagName('option');
    var input = document.getElementById('searchClient'); // Utilisez l'ID de l'input ajouté
    input.addEventListener('input', function () {
        var filter = input.value.toLowerCase();
        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            var text = option.textContent || option.innerText;
            if (text.toLowerCase().indexOf(filter) > -1) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        }
    });
</script>


  <div class="col-md-6">
    <label for="exampleInputName1">Date de facture</label>
    <input type="date" class="form-control" id="exampleInputName1" name="datefac" required>
  </div>

</div>

<!-- add -->
<div id="services-container" class="col-md-12">
    <!-- Les champs de service seront ajoutés ici dynamiquement -->
    <div class="row mb-3">
      <!-- <div class="col-md-6">
        <input type="text" class="form-control" name="service1">
      </div> -->
      
      <div class="col-md-12">
        Services / Produits <button type="button" class="btn btn-primary" id="add-service-btn">+</button>
      </div>
    </div>
  </div> <br>

  <!-- fin add -->
  

                      <div class="form-group">
                        <label for="exampleInputPassword4">Montant Total</label>
                        <input type="number" class="form-control" name="montantfact" id="montantfact" step="0.01" required>
                      </div>

                      <!-- <div class="form-group">
                        <label for="exampleInputPassword4">Reste a payer</label>
                        <input type="number" class="form-control" name="reste" step="0.01" required>
                      </div> -->

                       <!-- Champ caché pour stocker les IDs des services sélectionnés -->
    <input type="hidden" name="service-ids" id="service-ids" class="service-ids" value="">



                      <button type="submit" class="btn btn-primary mr-2">Créer La Facture</button>
                    </form>
                  </div>
                </div>
              </div>
    <!-- fin test  -->


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © FMSI 2023</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

    <!-- test  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        $('.js-select2').select2();
    });
</script>

<!-- script 2 add -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const servicesContainer = document.getElementById("services-container");
    const addServiceBtn = document.getElementById("add-service-btn");
    let serviceCount = 1;
    const services = {!! json_encode($services) !!};

    addServiceBtn.addEventListener("click", function () {
      
      const serviceDiv = document.createElement("div");
      serviceDiv.setAttribute("class", "service-group");

      const serviceSelect = document.createElement("select");
      serviceSelect.setAttribute("class", "form-control");
      serviceSelect.setAttribute("name", "service" + serviceCount);
      serviceSelect.setAttribute("required", ""); // Ajouter l'attribut required


      const defaultOption = document.createElement("option");
      defaultOption.setAttribute("value", "");
      defaultOption.textContent = "Choisissez un service ou produit";
      serviceSelect.appendChild(defaultOption);

      services.forEach(function (service) {
        const option = document.createElement("option");
        option.setAttribute("value", service.id);
        // var ttc = parseFloat(service.montant_ht)+service.montant_ht*service.tva/100;
        option.textContent = service.designation + " / Montant HT : " + service.montant_ht;
        serviceSelect.appendChild(option);
      });

      // Créer le bouton rouge
      const deleteServiceBtn = document.createElement("button");
      deleteServiceBtn.setAttribute("type", "button");
      deleteServiceBtn.setAttribute("class", "btn btn-danger delete-service-btn");
      deleteServiceBtn.textContent = "-";
      deleteServiceBtn.addEventListener("click", function () {
        servicesContainer.removeChild(serviceDiv); // Supprimer le groupe (contenant l'input et le bouton) entier
      });

      // Ajouter le champ d'entrée et le bouton au groupe
      serviceDiv.appendChild(serviceSelect);
      serviceDiv.appendChild(deleteServiceBtn);

      // Ajouter le groupe au conteneur
      servicesContainer.appendChild(serviceDiv);

      serviceCount++;
    });

    // Ajouter un écouteur d'événement au formulaire pour capturer les IDs des services sélectionnés avant la soumission
    const form = document.querySelector('.forms-sample');
    form.addEventListener('submit', function (event) {
      const serviceIds = [];
      const serviceSelects = document.querySelectorAll('select[name^="service"]');
      serviceSelects.forEach(function (select) {
        if (select.value) {
          serviceIds.push(select.value);
        }
      });

      // Stocker les IDs des services sélectionnés dans le champ caché
      document.getElementById("service-ids").value = serviceIds.join(',');

      // Continuer avec la soumission du formulaire
      // (ou commentez cette ligne pour empêcher la soumission du formulaire)
      // event.preventDefault();
      // form.submit();
    });
    




  });
</script>
<!-- fin add -->


<!-- nv script montant total -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const servicesContainer = document.getElementById("services-container");
    const addServiceBtn = document.getElementById("add-service-btn");
    let serviceCount = 1;
    const services = {!! json_encode($services) !!};


              // Get a reference to the select element
              var selectElement = document.getElementById('clientselect');
var clienttype = '';
// Add an event listener for the "change" event
selectElement.addEventListener('change', function(event) {
    // Get the selected value
    var selectedValue = event.target.value;
    selectedValue = JSON.parse(selectedValue);
clienttype = selectedValue.type;

while (servicesContainer.children.length > 1) {
  servicesContainer.removeChild(servicesContainer.lastElementChild);
}
updateTotalAmount();


    // You can perform further actions here based on the selected value
});



    // Fonction pour mettre à jour le montant total
    function updateTotalAmount() {
      const serviceSelects = document.querySelectorAll('select[name^="service"]');
      let totalAmount = 0;
      let tva = 0;
      console.log(clienttype)

if( clienttype=='particulier' ) tva=10
else if ( clienttype=='entreprise' ) tva = 20
else if ( clienttype=='sous-traitant' ) tva = 0

      serviceSelects.forEach(function (select) {
        if (select.value) {
          const serviceId = select.value;
          // Trouver le service correspondant dans la liste des services
          const service = services.find((s) => s.id === parseInt(serviceId));
          // console.log(tva)
          if (service) {
            totalAmount += parseFloat(service.montant_ht) + (parseFloat(service.montant_ht) * parseFloat(tva) / 100);
          }
        }
      });

      // Mettre à jour la valeur de l'input montantfact
      const montantFactInput = document.querySelector('input[name="montantfact"]');
      montantFactInput.value = totalAmount.toFixed(2); // Formater à 2 décimales
    }

    addServiceBtn.addEventListener("click", function () {
      // ... le reste du script pour ajouter un service reste inchangé ...
      // Appeler la fonction updateTotalAmount() après avoir ajouté un service
      updateTotalAmount();
    });

        // Utiliser la délégation d'événements pour attacher l'écouteur aux futurs boutons de suppression
        servicesContainer.addEventListener('click', function(event) {
      if (event.target && event.target.classList.contains('delete-service-btn')) {
        const serviceGroup = event.target.parentNode;
        const serviceSelect = serviceGroup.querySelector('select[name^="service"]');
        if (serviceSelect.value) {
          const serviceId = serviceSelect.value;
          const service = services.find((s) => s.id === parseInt(serviceId));
          
          let tva = 0;

if( clienttype=='particulier' ) tva=10
else if ( clienttype=='entreprise' ) tva = 20
else if ( clienttype=='sous-traitant' ) tva = 0

          if (service) {
            const serviceAmount = parseFloat(service.montant_ht) + (parseFloat(service.montant_ht) * parseFloat(tva) / 100);
            updateTotalAmount(-serviceAmount); // Mettre à jour le montant total en soustrayant le montant du service supprimé
          }
        }
        servicesContainer.removeChild(serviceGroup); // Supprimer le groupe (contenant l'input et le bouton) entier
      }
    });

    // Utiliser la délégation d'événements pour attacher l'écouteur aux futurs sélecteurs
    servicesContainer.addEventListener('change', function(event) {
      if (event.target && event.target.tagName === 'SELECT') {
        updateTotalAmount();
      }
    });

    // Appeler la fonction updateTotalAmount() lors du chargement initial de la page
    updateTotalAmount();
  });

</script>

<!-- fin nv script montant total  -->









    <!-- fin test  -->
  </body>
</html>