<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Viewer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
    
</head>

<body>
    <div class="container">
        <h1 class="mt-4">CSV Viewer</h1>
        

        <div class="table-responsive">
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
                { data: 0 },
                { data: 1 },
                { data: 2 },
                { data: 3 },
                { data: 4 },
                { data: 5 },
                { data: 6 } // Add/remove columns based on your CSV file
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


    </div>
</body>

</html>