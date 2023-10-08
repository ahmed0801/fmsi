
@if (Auth::user()->role == "admin")
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



            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="assets/images/faces/face28.png" alt="image">
                  <!-- <i class="mdi mdi-account-circle"></i> -->
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
              <a class="nav-link" href="pages/icons/mdi.html">
                <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                <span class="menu-title">Employées</span>
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

            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2">Bienvenue {{ Auth::user()->name }} dans votre dashboard Admin FMSI</h2>
            </div>
            <div class="row">


              <div class="col-md-12">

              @if(session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
</div>
@endif

                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <li class="nav-item">
                      <!-- <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Users</a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link active" id="business-tab" data-toggle="tab" href="#business-1" role="tab" aria-selected="false">Business</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" id="performance-tab" data-toggle="tab" href="#" role="tab" aria-selected="false">Performance</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="conversion-tab" data-toggle="tab" href="#" role="tab" aria-selected="false">Conversion</a>
                    </li> -->
                  </ul>
                  <div class="d-md-block d-none">
                    <a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
                    <a href="#" class="text-light p-1"><i class="mdi mdi-dots-vertical"></i></a>
                  </div>
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                 
<!-- test kpi -->
                  <div class="row">
  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card mb-4"> <!-- Ajout de la classe mb-4 pour ajouter de la marge en bas -->
    <div class="card">
      <div class="card-body py-2 text-center">
        <h5 class="mb-2 text-dark font-weight-normal">Taches Aujourd'hui</h5>
        <h2 class="mb-2 text-dark font-weight-bold">{{ $nbtachetoday }}</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card mb-4"> <!-- Ajout de la classe mb-4 pour ajouter de la marge en bas -->
    <div class="card">
      <div class="card-body py-2 text-center">
        <h5 class="mb-2 text-dark font-weight-normal">Devis Aujourd'hui</h5>
        <h2 class="mb-2 text-dark font-weight-bold">{{ $nbdevistoday }}</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card mb-4"> <!-- Ajout de la classe mb-4 pour ajouter de la marge en bas -->
    <div class="card">
      <div class="card-body py-2 text-center">
        <h5 class="mb-2 text-dark font-weight-normal">Factures Aujourd'hui</h5>
        <h2 class="mb-2 text-dark font-weight-bold">{{ $nbfacturetoday }}</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card mb-4"> <!-- Ajout de la classe mb-4 pour ajouter de la marge en bas -->
    <div class="card">
      <div class="card-body py-2 text-center">
        <h5 class="mb-2 text-dark font-weight-normal">Avoirs Aujourd'hui</h5>
        <h2 class="mb-2 text-dark font-weight-bold">{{ $nbavoirtoday }}</h2>
      </div>
    </div>
  </div>
</div>

<!-- fin test kpi -->

                  <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Tâches Ouverts</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{ $nbtacheouverte }}</h2><br>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-calendar-clock icon-md absolute-center text-dark"></i>
                        
                        </div>

                          </div>
                          <a href="/créertache" class="btn btn-inverse-success btn-fw">Créer</a>
                          <a href="/tache" class="btn btn-inverse-primary btn-fw">Consulter</a>

                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Devis Clients</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{ $nbdevis }}</h2><br>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-book-open icon-md absolute-center text-dark"></i></div>
                          </div>

                          <a href="/créerdevis" class="btn btn-inverse-success btn-fw">Créer</a>
                          <a href="/devis" class="btn btn-inverse-primary btn-fw">Consulter</a>
                        </div>
                      </div>

                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Factures Clients</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{ $nbfacture }}</h2><br>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cash-multiple icon-md absolute-center text-dark"></i></div>
                          </div>
                          <a href="/créerfacture" class="btn btn-inverse-success btn-fw">Créer</a>
                          <a href="/facture" class="btn btn-inverse-primary btn-fw">Consulter</a>

                        </div>
                      </div>

                      

                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Avoirs Clients</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">{{ $nbavoir }}</h2><br>
                            <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cached icon-md absolute-center text-dark"></i></div>
                          </div>
                          <a href="/créeravoir" class="btn btn-inverse-success btn-fw">Créer</a>
                          <a href="/avoir" class="btn btn-inverse-primary btn-fw">Consulter</a>
                        </div>
                      </div>
                    </div>


                    

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © FMSI 2023</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> From : <a href="" target="_blank">AHMED ARFAOUI</a></span>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>











@elseif( Auth::user()->role == "employee")

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

            <li class="nav-item">
              <a class="nav-link" href="/mestachesterminé">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                <span class="menu-title">Taches Terminées</span>
              </a>
            </li>


            
                                                            <!-- intervention  -->
                                                            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic9" aria-expanded="false" aria-controls="ui-basic9">
                <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
                <span class="menu-title">Interventions</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic9">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/mesrapports">Mes Rapports</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/créerintervention">Créer Un Rapport</a></li>

                </ul>
              </div>
            </li>
            <!-- fin intervention  -->
            




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

            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2">Bienvenue {{ Auth::user()->name }} dans votre dashboard Employé FMSI</h2>
            </div>
            <div class="row">


              <div class="col-md-12">

              @if(session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
</div>
@endif


                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <li class="nav-item">
                    <li class="nav-item">
                      <a class="nav-link active" id="business-tab" data-toggle="tab" href="#business-1" role="tab" aria-selected="false">Mes Taches</a>
                    </li>
                  </ul>
                  <div class="d-md-block d-none">
                    <a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
                    <a href="#" class="text-light p-1"><i class="mdi mdi-dots-vertical"></i></a>
                  </div>
                </div>


                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                                    <!-- search  -->
                <div class="row">
  <div class="col-sm-8">
    <div class="form-group">
      <input type="text" class="form-control" id="filterInput" placeholder="Filtrer les tâches...">
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
    <input type="date" class="form-control" id="inputdate" placeholder="Filtrer les tâches...">
      </div>
  </div>

</div>
                <!-- fin search  -->
                    <div class="row">
                    @foreach($mestaches as $tache)
                    <div class="col-xl-4 col-lg-6 col-sm-6 grid-margin stretch-card filter-item" data-designation="{{ $tache->designation }}" data-etat="{{ $tache->etat }}" data-date="{{ $tache->datetache }}" data-client="{{ $tache->numclient }}" data-adresse="{{ $tache->adresse }}" data-nameclient="{{ $tache->nameclient }}">
                        
                        <div class="card">
                          <div class="card-body text-left">
                            <h5 class="mb-1 text-dark font-weight-normal"><b>Désignation</b> : {{$tache->designation}}</h5>
                            <h4 class="mb-1 text-dark font-weight-normal"><b>Etat :</b> @if($tache->etat == "ouverte")
                            <span class="badge badge-warning"> {{ $tache->etat }}
                              @elseif ($tache->etat == "en cours")
                              <span class="badge badge-primary"> {{ $tache->etat }}
                                  @endif
                            </h4>
                            <h5 class="mb-1 text-dark font-weight-normal"><b>Date :</b> {{ $tache->datetache }}</h5>
                            <h5 class="mb-1 text-dark font-weight-normal"><b>Client :</b> {{ $tache->numclient }} / {{ $tache->nameclient }}</h5>
                            <!-- <h5 class="mb-1 text-dark font-weight-normal"><b>Client :</b> {{ $tache->nameclient }}</h5> -->
                            <h5 class="mb-1 text-dark font-weight-normal"><b>Contact 1 :</b> {{ $tache->tel1 }}</h5>
                            <h5 class="mb-1 text-dark font-weight-normal"><b>Contact 2 :</b> {{ $tache->tel2 }}</h5>
                            <h5 class="mb-1 text-dark font-weight-normal"><b>Adresse :</b> {{ $tache->adresse }}</h5>
                            <h5 class="mb-1 text-dark font-weight-normal"><b>Priorité :</b> {{ $tache->priorité }}</h5>
                          </div>
                          @if( $tache->etat == "ouverte" )
                          <form action="{{ route('tache.updateetat', ['id' => $tache->id]) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-inverse-primary btn-fw btn-block">Marquer Comme En Cours</button>
    </form>
@elseif ($tache->etat == "en cours")
<form action="{{ route('tache.updateetat', ['id' => $tache->id]) }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-inverse-success btn-fw btn-block">Marquer Comme Terminée</button>
    </form>
@endif
                        </div>
                      </div>
                      @endforeach


                      
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>



          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $("#filterInput").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $(".filter-item").filter(function () {
        var designation = $(this).data("designation").toLowerCase();
        var etat = $(this).data("etat").toLowerCase();
        var date = $(this).data("date").toLowerCase();
        var client = $(this).data("client").toLowerCase();
        var nameclient = $(this).data("nameclient").toLowerCase();
        var adresse = $(this).data("adresse").toLowerCase();
        $(this).toggle(
          designation.indexOf(value) > -1 ||
          etat.indexOf(value) > -1 ||
          date.indexOf(value) > -1 ||
          nameclient.indexOf(value) > -1 ||
          adresse.indexOf(value) > -1 ||
          client.indexOf(value) > -1
        );
      });
    });
  });
</script>

<!-- Script de date -->
<script>
  $(document).ready(function () {
    $("#inputdate").on("change", function () {
      var selectedDate = $(this).val();
      $(".filter-item").hide();
      $(".filter-item").each(function () {
        var taskDate = $(this).data("date");
        if (selectedDate === "" || selectedDate === taskDate) {
          $(this).show();
        }
      });
    });
  });
</script>



          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>

@endif