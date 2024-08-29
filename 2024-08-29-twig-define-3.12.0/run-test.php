<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    die('You need to run composer install');
}

include __DIR__ . '/vendor/autoload.php';

$twig = new Environment(new FilesystemLoader(__DIR__ . '/templates'));
echo "Twig version: " . \Twig\Environment::VERSION . PHP_EOL;
echo '====================== OUTPUT TWIG ========================' . PHP_EOL;
echo $twig->render('index.html.twig');
echo '===================== END OUTPUT TWIG =====================' . PHP_EOL;