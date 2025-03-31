<?php
require 'config.php';

// Validate required fields
if (empty($_POST['status']) || empty($_POST['control_no']) || empty($_POST['date_received']) || 
    empty($_POST['office_requesting_party']) || empty($_POST['transaction_type']) || 
    empty($_POST['action_taken']) || empty($_POST['date_forwarded']) || empty($_POST['received_by'])) {
    $_SESSION['error'] = "All fields except Remarks are required!";
    header("Location: incoming.php");
    exit;
}

try {
    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO incoming_files (
        status, 
        control_no, 
        date_received, 
        office_requesting_party, 
        transaction_type, 
        action_taken, 
        date_forwarded, 
        received_by, 
        remarks
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Execute with form data
    $stmt->execute([
        $_POST['status'],
        $_POST['control_no'],
        $_POST['date_received'],
        $_POST['office_requesting_party'],
        $_POST['transaction_type'],
        $_POST['action_taken'],
        $_POST['date_forwarded'],
        $_POST['received_by'],
        $_POST['remarks'] ?? null
    ]);

    $_SESSION['success'] = "Incoming file record saved successfully!";
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    $_SESSION['error'] = "Failed to save record. Please try again.";
}

header("Location: incoming.php");
exit;
?>