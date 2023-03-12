<?php


// init & setting 

date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ob_start();
session_start();


if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
  $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(__DIR__));
$base_url = $web_root . $folder;

// define 

define('__BASE_URL__', $base_url);

define('__DIR_ROOT__', __DIR__);



// require
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/helpers/function.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
