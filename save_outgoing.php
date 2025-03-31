<?php
require 'config.php';

// Validate required fields
if (empty($_POST['control_no']) || empty($_POST['date']) || empty($_POST['time']) || 
    empty($_POST['document']) || empty($_POST['client_name']) || empty($_POST['agency']) || 
    empty($_POST['action_taken']) || empty($_POST['date_acted'])) {
    $_SESSION['error'] = "All fields except Contact No. and Remarks are required!";
    header("Location: outgoing.php");
    exit;
}

try {
    // Prepare SQL statement
    $stmt = $pdo->prepare("INSERT INTO outgoing_files (
        control_no, 
        date, 
        time, 
        document, 
        client_name, 
        agency, 
        contact_no, 
        action_taken, 
        date_acted, 
        remarks
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Execute with form data
    $stmt->execute([
        $_POST['control_no'],
        $_POST['date'],
        $_POST['time'],
        $_POST['document'],
        $_POST['client_name'],
        $_POST['agency'],
        $_POST['contact_no'] ?? null,
        $_POST['action_taken'],
        $_POST['date_acted'],
        $_POST['remarks'] ?? null
    ]);

    $_SESSION['success'] = "Outgoing file record saved successfully!";
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    $_SESSION['error'] = "Failed to save record. Please try again.";
}

header("Location: outgoing.php");
exit;
?>