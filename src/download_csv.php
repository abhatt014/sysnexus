<?php
// File download handler
if (isset($_GET['file'])) {
    $file = basename($_GET['file']); // Sanitize input to prevent directory traversal
    $filePath = "../data/" . $file;
    

    if (file_exists($filePath)) {
        // Set headers to force download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Length: ' . filesize($filePath));

        // Read the file and output its contents
        readfile($filePath);
        exit;
    } else {
        http_response_code(404);
        echo "File not found.";
        exit;
    }
} else {
    http_response_code(400);
    echo "No file specified.";
    exit;
}
