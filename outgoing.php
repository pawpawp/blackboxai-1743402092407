<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outgoing Files | File Tracking System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .btn {
            @apply px-4 py-2 rounded font-medium transition-colors;
        }
        .btn-primary {
            @apply bg-blue-600 text-white hover:bg-blue-700;
        }
        .btn-secondary {
            @apply bg-gray-600 text-white hover:bg-gray-700;
        }
        .form-input {
            @apply w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto p-6 max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Outgoing Files</h1>
            <a href="landing.php" class="btn btn-secondary">Back to Home</a>
        </div>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= $_SESSION['error']; ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="save_outgoing.php" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-700 mb-2">Control No.</label>
                    <input type="text" name="control_no" class="form-input" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Date</label>
                    <input type="date" name="date" class="form-input" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-700 mb-2">Time</label>
                    <input type="time" name="time" class="form-input" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Document</label>
                    <input type="text" name="document" class="form-input" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-700 mb-2">Name of Client/Receiver</label>
                    <input type="text" name="client_name" class="form-input" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Agency/Office/Address</label>
                    <input type="text" name="agency" class="form-input" required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Contact No. (if required)</label>
                <input type="text" name="contact_no" class="form-input">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Action Taken/Acted By</label>
                <input type="text" name="action_taken" class="form-input" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-gray-700 mb-2">Date Acted</label>
                    <input type="date" name="date_acted" class="form-input" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Remarks</label>
                    <input type="text" name="remarks" class="form-input">
                </div>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="btn btn-primary">Save Record</button>
                <a href="export_outgoing.php" class="btn btn-secondary">Export to Excel</a>
            </div>
        </form>
    </div>
</body>
</html>