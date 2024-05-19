<?php
// manage_accounts.php
include 'CompteBancaire.php';
include 'db.php'; // fichier pour la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accountNumber = $_POST['account_number'];
    $operation = $_POST['operation'];
    $amount = $_POST['amount'];
    $toAccountNumber = $_POST['to_account_number'] ?? null;

    // Récupérer le compte bancaire
    $account = CompteBancaire::findByAccountNumber($accountNumber);

    if ($operation == 'deposit') {
        $account->deposit($amount);
    } elseif ($operation == 'withdrawal') {
        $account->withdraw($amount);
    } elseif ($operation == 'transfer' && $toAccountNumber) {
        $toAccount = CompteBancaire::findByAccountNumber($toAccountNumber);
        $account->transfer($amount, $toAccount);
    }

    header('Location: index.php');
}
?>
