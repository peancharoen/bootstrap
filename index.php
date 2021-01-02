<?php
// session_start();
if (isset($_POST['login'])) {
  echo "<script>window.location.href='lcp3-login.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Nattanin Prancharoen">
  <meta name="generator" content="np-dms.com">
  <title>Dashboard</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- นำเข้า  CSS จาก dataTables -->
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

  <!-- นำเข้า  CSS จาก dataTables 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">-->

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">ระบบงานเอกสารโครงการ</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <!-- Button to Open the Modal type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"-->
        <button class="btn btn btn-dark" type="login" name="login" id="login" href="../bootstrap/lcp3-login-modal.php">
          Log in
        </button>
        <!-- <a class="nav-link" data-toggle="modal" data-target="#myModal">Sign in</a>-->
      </li>
    </ul>

  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarmenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <!-- Nav tabs -->
          <ul class="nav flex-column" id="mainmenu" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-menu" data-toggle="tab" href="#home" aria-controls="home" aria-selected="true">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="document-menu" data-toggle="tab" href="#document" aria-controls="document" aria-selected="false">
                <span data-feather="file"></span>
                เอกสาร
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="cart-menu" data-toggle="tab" href="#cart" aria-controls="cart" aria-selected="false">
                <span data-feather="shopping-cart"></span>
                Cart
              </a>
            </li>

          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-menu">
            <!-- First page -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Dashboard</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                  <span data-feather="calendar"></span>
                  This week
                </button>
              </div>
            </div>
            <canvas class="my-4 w-100" id="myChart" width="900" height="280"></canvas>
            <h2>Section title</h2>
            <!-- First page -->
          </div>
          <div class="tab-pane" id="document" role="tabpanel" aria-labelledby="document-menu">
            <!-- 2nd page <div class="table-bordered">-->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">ระบบงานเอกสาร<h1>

            </div>
            <div class="table-responsive-sm">
              <table id="doctable" class="table table-striped table-bordered table-hover flex-wrap" width="100%" cellspacing=" 0">
                <thead>
                  <tr>
                    <th data-field="number">Number</th>
                    <th data-field="title">Title</th>
                    <th data-field="date_recieve">date_recieve</th>
                    <th data-field="date_doc">date_doc</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-field="number">name</td>
                    <td data-field="title">title</td>
                    <td data-field="date_recieve">date_recieve</td>
                    <td data-field="date_doc">date_doc</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Number</th>
                    <th>Title</th>
                    <th>date_recieve</th>
                    <th>date_doc</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- 2nd page </div>-->
          </div>
          <div class="tab-pane" id="cart" role="tabpanel" aria-labelledby="cart-menu">
            <!-- 3rd page -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Cart Detail</h1>
            </div>
            <!-- 3rd page -->
          </div>
          <div class="tab-pane" id="userdetail" role="tabpanel" aria-labelledby="user-menu">
            <!-- 4th page -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">User Profile</h1>
            </div>
            <!-- 4th page -->
          </div>
        </div>
      </main>
    </div><!-- row -->
  </div><!-- container-fluid -->
  <!-- Modal -->

  <!-- The Modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="modal-title text-center mx-auto">Log in</h5><br>
          <div class="imgcontainer center">
            <img src="/bootstrap/img/avatar.png" class="rounded mx-auto d-block">
          </div>
          <form action="#" method="post">
            <input type="hidden" name="csrftoken" value="ea49375f43c7e6a59c77df1e4de562b3f1350124eeb70e5d5124e4ce3b5251c2b4d12e9aaf2a3ddc618c178c8dc4620b">
            <div class="form-group mb-3">
              <label for="emailaddress">Email </label>
              <input type="email" name="email" placeholder="Enter email" class="form-control" required="">
            </div>
            <div class="form-group mb-3">
              <label for="password">Password</label>
              <div class="input-group bg-light" id="show_hide_password">
                <input type="password" class="form-control" id="password" value="Passwords" name="password" placeholder="Enter Password" required="">
                <div class="input-group-addon">
                  <a href=""><i class="fa fa-lg fa-eye" style="padding-top: 10px" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <div class="custom-control custom-checkbox checkbox-success">
                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
              </div>
            </div>
            <div class="form-group mb-0 text-center">
              <button class="btn btn-primary btn-block" type="submit" name="submit"> Log In </button>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <h6 class="text-center mx-auto">เข้าสู่ระบบงานเอกสาร</h6>

        </div>
      </div>
    </div>
  </div>


  <!--https://www.discussdesk.com/bootstrap-datatable-with-php-mysql-server-side-script.htm -->
  <!-- นำเข้า  Javascript จาก  Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- นำเข้า  dataTables -->
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>-->
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

  <script type="text/javascript" language="javascript">
    var triggerTabList = [].slice.call(document.querySelectorAll('#mainmenu a'))
    triggerTabList.forEach(function(triggerEl) {
      var tabTrigger = new bootstrap.Tab(triggerEl)

      triggerEl.addEventListener('click', function(event) {
        event.preventDefault()
        tabTrigger.show()
      })
    })
  </script>
  <script type="text/javascript" language="javascript" class="init">
    //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id = documents-table dataTable
    $(document).ready(function() {
      $('#doctable').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "ajax": "server-response.php",
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("fa-eye-slash");
          $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("fa-eye-slash");
          $('#show_hide_password i').addClass("fa-eye");
        }
      });
    });
  </script>
  <script src="dashboard.js"></script>


</body>

</html>