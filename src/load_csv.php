<?php
require_once 'csv_reader.php';
ini_set('memory_limit', '-1');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = "../data/" . basename($_POST['file']);
    $start = intval($_POST['start'] ?? 0);
    $length = intval($_POST['length'] ?? 10);
    $searchValue = $_POST['search']['value'] ?? '';

    // Read the entire CSV file
    if (!file_exists($file)) {
        echo json_encode(['error' => 'File not found.']);
        exit;
    }

    $file = fopen($file, 'r');
    //$header = fgetcsv($file, 0, ";"); // Skip the first row (header)
    $header = fgetcsv($file, 0, ";", '"', '\\'); // Specify escape parameter

    $data = [];

    //while (($row = fgetcsv($file, 0, ";")) !== FALSE)
    while (($row = fgetcsv($file, 0, ";", '"', '\\')) !== FALSE) {
        $data[] = $row;
    }
    fclose($file);

    // Filter data if a search value is provided
    $filteredData = [];
    if (!empty($searchValue)) {
        foreach ($data as $row) {
            if (stripos(implode(' ', $row), $searchValue) !== false) {
                $filteredData[] = $row;
            }
        }
    } else {
        $filteredData = $data;
    }

    // Total records
    $totalRecords = count($data);
    $totalFiltered = count($filteredData);

    // Paginate data
    $paginatedData = array_slice($filteredData, $start, $length);

    // Send the response in DataTables format
    echo json_encode([
        'draw' => intval($_POST['draw']),
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $totalFiltered,
        'data' => $paginatedData
    ]);
}
