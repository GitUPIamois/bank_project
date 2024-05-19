<?php
// create_account.php
include 'Client.php';
include 'CompteBancaire.php';
include 'db.php'; // fichier pour la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phone_number'];
    $accountNumber = $_POST['account_number'];
    $balance = $_POST['balance'];

    $client = new Client($firstName, $lastName, $address, $phoneNumber);
    $client->save();

    $account = new CompteBancaire($accountNumber, $balance, $client);
    $account->save();

    header('Location: index.php');
}
?>
