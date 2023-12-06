<aside class="main-sidebar sidebar-light-primary elevation-4">
  <a href="?page=dashboard" class="brand-link">
    <img src="../dist/img/android-chrome-512x512.png" alt="Nurul Huda Logo" class="brand-image" style="opacity: .8; box-shadow: 0px 0px 5px -3px rgba(0,0,0,0.75);">
    <span class="brand-text font-weight-bold" style="font-size: 18px;">SI NURUL HUDA</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item"> 
          <a href="?page=dashboard" class="nav-link <?php if (isset($_GET['page'])) { if ($_GET['page'] == "dashboard" || $_GET['page'] == "dashboard_game") { echo "active";}} ?>">
            <i class="nav-icon fas fa-home <?php if (isset($_GET['page'])) {if ($_GET['page'] != "dashboard" && $_GET['page'] != "dashboard_game") { echo "text-dark";}} ?>"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?page=data_player" class="nav-link <?php if (isset($_GET['page'])) {if ($_GET['page'] == "data_player" || $_GET['page'] == "detail_player") {echo "active";}} ?>">
            <i class="nav-icon fas fa-users" <?php if (isset($_GET['page'])) {if ($_GET['page'] != "data_player" && $_GET['page'] != "detail_player") {echo "text-dark";}} ?>></i>
            <p>
              Data Player
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?page=data_user" class="nav-link <?php if (isset($_GET['page'])) {if ($_GET['page'] == "data_user") {echo "active";}} ?>">
            <i class="nav-icon fas fa-user-tie <?php if (isset($_GET['page'])) {if ($_GET['page'] != "data_user") {echo "text-dark";}} ?>"></i>
            <p>
              Data Guru
            </p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>   