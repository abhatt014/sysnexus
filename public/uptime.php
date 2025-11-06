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
              <h3 class="fw-bold mb-3">Uptime</h3>

            </div>

          </div>


          <div class="row">
            <div class="col-md-12">
              <div class="card">
              <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Export All</h4>
                      <button  id="download-csv"
                        class="btn btn-primary btn-round ms-auto">
                        <i class="fa fa-plus"></i>
                        Export All
                      </button>
                    </div>
                  </div>
                <div class="card-body">
                  <div class="table-responsive" >
                    <table id="csvTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                        <th>MachineName</th>
                        <th>last Boot Time</th>
                        <th>Days Since Last Reboot</th>
                        

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
            d.file = 'uptime.csv'; // Pass the file name to the server
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
          }
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
        <script>
    document.getElementById('download-csv').addEventListener('click', function () {
    // Determine which CSV to download based on the current page or table

    const csvFileName = 'uptime.csv';

    // Make an AJAX request to the backend to download the CSV
    window.location.href = `../src/download_csv.php?file=${csvFileName}`;
});

  </script>
</body>

</html>