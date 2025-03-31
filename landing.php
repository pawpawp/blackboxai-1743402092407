<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .btn {
            @apply px-6 py-3 rounded-lg font-medium transition-colors;
        }
        .btn-primary {
            @apply bg-blue-600 text-white hover:bg-blue-700;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">File Tracking System</h1>
        <div class="space-y-4">
            <a href="incoming.php" class="btn btn-primary w-full text-center block">Incoming Files</a>
            <a href="outgoing.php" class="btn btn-primary w-full text-center block">Outgoing Files</a>
        </div>
    </div>
</body>
</html>