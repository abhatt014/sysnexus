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
              <h3 class="fw-bold mb-3">System Information</h3>

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
                        <th>Manufacturer</th>
                        <th>Model</th>
                        <th>OperatingSystem</th>
                        <th>OperatingSystem ServicePack</th>
                        <th>BuildNumber</th>
                        <th>Version</th>
                        <th>InstallDate</th>
                        <th>License</th>
                        <th>Uptime</th>
                        <th>Boothevice</th>
                        <th>SystemDevice</th>
                        <th>SystemDirectory</th>
                        <th>WindowsDirectory</th>
                        <th>OSArchitecture</th>
                        <th>PowerShellVersion</th>
                        <th>CurrentTimeZone</th>
                        <th>Debug</th>
                        <th>Distributed</th>
                        <th>EncryptionLevel</th>
                        <th>DNS Host Name</th>
                        <th>Domain Role</th>
                        <th>Roles</th>
                        <th>Serial Number</th>
                        <th>CPU Array</th>
                        <th>CPU cores</th>
                        <th>CPU LogicalProcessors</th>
                        <th>RAM (GB)</th>
                        <th>PageFilePath</th>
                        <th>AutoManagedPageFile</th>
                        <th>PageFileSize(MB)</th>
                        <th>PageFileUsage(MB)</th>
                        <th>PageFilePeakUsage(MB)</th>
                        <th>TempPageFileInUse</th>
                        <th>ProductKeyChannel</th>
                        <th>UUID</th>
                        <th>FQDN</th>


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
            d.file = 'systeminfo.csv'; // Pass the file name to the server
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
          },
          {
            data: 7
          },
          {
            data: 8
          },
          {
            data: 9
          },
          {
            data: 10
          },
          {
            data: 11
          },
          {
            data: 12
          },
          {
            data: 13
          },
          {
            data: 14
          },
          {
            data: 15
          },
          {
            data: 16
          },
          {
            data: 17
          },
          {
            data: 18
          },
          {
            data: 19
          },
          {
            data: 20
          },
          {
            data: 21
          },
          {
            data: 22
          },
          {
            data: 23
          },
          {
            data: 24
          },
          {
            data: 25
          },
          {
            data: 26
          },
          {
            data: 27
          },
          {
            data: 28
          },
          {
            data: 29
          },
          {
            data: 30
          },
          {
            data: 31
          },
          {
            data: 32
          },
          {
            data: 33
          },
          {
            data: 34
          },
          {
            data: 35
          },
          {
            data: 36
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

    const csvFileName = 'systeminfo.csv';

    // Make an AJAX request to the backend to download the CSV
    window.location.href = `../src/download_csv.php?file=${csvFileName}`;
});

  </script>
</body>

</html>