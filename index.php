<?php

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/vendor/autoload.php';


// Chargement des variables d'environnement (une seule fois suffit)
(new Dotenv())->bootEnv(dirname(__DIR__).'/.env');

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

