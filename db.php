<?php
// db.php
$host = 'mysql-dokkanbattledbz.alwaysdata.net';
$db = 'dokkanbattledbz_bank';
$user = '358745';
$pass = 'Xenoverse4';

// $host = 'localhost';
// $db = 'bank_management';
// $user = 'root';
// $pass = 'root';

//$dsn = new mysqli($host, $user, $pass, $db);
$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>
