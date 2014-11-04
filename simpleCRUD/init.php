<?php
require_once 'vendor/autoload.php';

$db = new PDO('mysql:host=localhost;dbname=simpleCRUD;', 'root', '');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

?>