<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


// Build the page
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/templates");
$twig = new \Twig\Environment($loader, []);

// What's the path?
$twig_path = "pages/home.html.twig";
$twig_context = [];

// Check that the user arrived here on purpose and not due to being 404'd
if ($_SERVER["REQUEST_URI"] !== "/") {
    $twig_path = "error/404.html.twig";
    $twig_context = [];
}

// Render the page
try {
    echo $twig->render($twig_path, $twig_context);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}