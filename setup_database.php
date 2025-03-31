<?php
require 'config.php';

try {
    // Create incoming_files table
    $pdo->exec("CREATE TABLE IF NOT EXISTS incoming_files (
        id INT AUTO_INCREMENT PRIMARY KEY,
        status VARCHAR(50) NOT NULL,
        control_no VARCHAR(50) NOT NULL,
        date_received DATE NOT NULL,
        office_requesting_party VARCHAR(255) NOT NULL,
        transaction_type VARCHAR(50) NOT NULL,
        action_taken TEXT NOT NULL,
        date_forwarded DATE NOT NULL,
        received_by VARCHAR(100) NOT NULL,
        remarks TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Create outgoing_files table
    $pdo->exec("CREATE TABLE IF NOT EXISTS outgoing_files (
        id INT AUTO_INCREMENT PRIMARY KEY,
        control_no VARCHAR(50) NOT NULL,
        date DATE NOT NULL,
        time TIME NOT NULL,
        document VARCHAR(255) NOT NULL,
        client_name VARCHAR(100) NOT NULL,
        agency VARCHAR(255) NOT NULL,
        contact_no VARCHAR(20),
        action_taken TEXT NOT NULL,
        date_acted DATE NOT NULL,
        remarks TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    echo "Database tables created successfully!";
} catch (PDOException $e) {
    die("Error creating tables: " . $e->getMessage());
}
?>