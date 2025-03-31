<?php
require 'config.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=incoming_files_' . date('Y-m-d') . '.csv');

$output = fopen('php://output', 'w');

// CSV headers
fputcsv($output, [
    'Status',
    'Control No.',
    'Date Received',
    'Office Requesting Party',
    'Transaction Type',
    'Action Taken',
    'Date Forwarded to R. Durana',
    'Received By',
    'Remarks'
]);

// Query database
$stmt = $pdo->query("SELECT * FROM incoming_files ORDER BY date_received DESC");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [
        $row['status'],
        $row['control_no'],
        $row['date_received'],
        $row['office_requesting_party'],
        $row['transaction_type'],
        $row['action_taken'],
        $row['date_forwarded'],
        $row['received_by'],
        $row['remarks']
    ]);
}

fclose($output);
exit;
?>