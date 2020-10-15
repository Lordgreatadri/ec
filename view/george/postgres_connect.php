<?php
$host = 'localhost';
$db = 'postgres';
$user = 'postgres';
$pass = '1234';
$charset = 'utf8mb4';

$dsn = "pgsql:host=$host;port=5433;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    if($pdo) {
        // verify pgsql driver is activated
        if (!defined('PDO::ATTR_DRIVER_NAME')) {
          echo 'PDO unavailable <br>';
        }
        echo "Connected to $db <br>";
    } else {
        echo "No connection <br>";
    }
} catch(\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$stmt = $pdo->query('SELECT * FROM voter_response');
var_dump($stmt->fetchAll());

