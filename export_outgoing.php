<?php
require 'config.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=outgoing_files_' . date('Y-m-d') . '.csv');

$output = fopen('php://output', 'w');

// CSV headers
fputcsv($output, [
    'Control No.',
    'Date',
    'Time',
    'Document',
    'Name of Client/Receiver',
    'Agency/Office/Address',
    'Contact No.',
    'Action Taken/Acted By',
    'Date Acted',
    'Remarks'
]);

// Query database
$stmt = $pdo->query("SELECT * FROM outgoing_files ORDER BY date DESC");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [
        $row['control_no'],
        $row['date'],
        $row['time'],
        $row['document'],
        $row['client_name'],
        $row['agency'],
        $row['contact_no'],
        $row['action_taken'],
        $row['date_acted'],
        $row['remarks']
    ]);
}

fclose($output);
exit;
?>