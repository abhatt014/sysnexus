<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img src="../assets/img/kaiadmin/logo_light.png" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <?php include 'includes/navbar.php' ?>
        <!-- End Navbar -->
      </div>

      <div class="container">
        <div class="page-inner">
          <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
              <h3 class="fw-bold mb-3">All Servers</h3>

            </div>

          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive" >
                    <table id="csvTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>MachineName</th>
                          <th>LogName</th>
                          <th>Id</th>
                          <th>Level</th>
                          <th>ProviderName</th>
                          <th>TimeCreated</th>
                          <th>UserName</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Data will be loaded dynamically -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include 'includes/footer.php'; ?>
    </div>


  </div>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(document).ready(function() {
      // Initialize DataTable with server-side processing
      $('#csvTable').DataTable({
        processing: true, // Show processing indicator
        serverSide: true, // Enable server-side processing
        ajax: {
          url: '../src/load_csv.php', // Server-side script URL
          type: 'POST', // Use POST to send data
          data: function(d) {
            d.file = 'errorlogs.csv'; // Pass the file name to the server
          },


        },
        columns: [ // Dynamically create columns based on the CSV header
          {
            data: 0
          },
          {
            data: 1
          },
          {
            data: 2
          },
          {
            data: 3
          },
          {
            data: 4
          },
          {
            data: 5
          },
          {
            data: 6
          } // Add/remove columns based on your CSV file
        ],
        pageLength: 10, // Default rows per page
        lengthChange: true, // Allow user to change rows per page
        searching: true, // Enable search
        ordering: false, // Enable column sorting
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        language: { // Custom loading message
          processing: '<span class="text-primary">Loading data...</span>'
        }
      });
    });
  </script>
</body>

</html>