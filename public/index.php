<?php
require_once __DIR__ . '/../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);

// Determine page
$page = $_GET['page'] ?? 'landing';

// Allowed pages
$allowedPages = ['landing', 'login', 'signup', 'dashboard', 'tickets'];
if (!in_array($page, $allowedPages)) {
    $page = 'landing';
}

// Sample mock data (temporary)
$tickets = [
    ['id' => 1, 'title' => 'Network outage', 'status' => 'open'],
    ['id' => 2, 'title' => 'Printer not working', 'status' => 'in_progress'],
    ['id' => 3, 'title' => 'Software installation', 'status' => 'closed'],
];

echo $twig->render("$page.twig", [
    'title' => ucfirst($page),
    'username' => 'Faith Wairimu',
    'tickets' => $tickets
]);
