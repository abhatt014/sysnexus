<?php
function readCsvChunked($filename, $start = 0, $rows = 100) {
    if (!file_exists($filename)) {
        return ['error' => 'File not found.'];
    }

    $file = fopen($filename, 'r');
    $data = [];
    $currentRow = 0;

    while (($line = fgetcsv($file,0,';')) !== FALSE) {
        if ($currentRow >= $start && $currentRow < $start + $rows) {
            $data[] = $line;
        }
        $currentRow++;
        if ($currentRow >= $start + $rows) break;
    }
    fclose($file);

    return $data;
}

