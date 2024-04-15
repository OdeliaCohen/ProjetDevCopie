<?php

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;


// The check below prevents loading the .env file in production
if ($_SERVER['APP_ENV'] !== 'prod') {
    (new Dotenv())->loadEnv(dirname(__DIR__).'/.env');
}

// Load the ".env" file only if it exists and the app is not in production
if ($_SERVER['APP_ENV'] !== 'prod') {
    if (file_exists(dirname(__DIR__).'/.env')) {
        (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
    }
}

// Activation du mode debug
if ($_SERVER['APP_DEBUG']) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

// Initialisation du kernel de l'application Symfony
$kernel = new App\Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);

// Gestionnaire de requête
$request = Request::createFromGlobals();

