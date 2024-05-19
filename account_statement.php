
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Clients et Leurs Comptes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="logo.png" style="width: 70px; height:50px"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" style="color:white;" aria-current="page" href="index.php">Mes client compte</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:white" aria-current="page" href="creation_compte.php">Création de compte</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:white" aria-current="page" href="releve_compte.php">Relevé de compte</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:black" aria-current="page" href="gestion_compte.php">Gestion de compte</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
                </div>
            </div>
        </nav>
        <br>
        <br>
    </div>
</body>
</html>

<?php
// account_statement.php
include 'CompteBancaire.php';
include 'db.php'; // fichier pour la connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accountNumber = $_POST['account_number'];

    // Récupérer le compte bancaire
    $account = CompteBancaire::findByAccountNumber($accountNumber);

    // Afficher les détails du compte et les transactions
    echo "<h2>Relevé de compte pour le compte n° $accountNumber</h2>";
    echo "<p>Solde actuel: " . $account->balance . " FCFA</p>";

    $transactions = $account->getTransactions();

    echo "<table>";
    echo "<tr><th>Date</th><th>Type</th><th>Montant</th></tr>";
    foreach ($transactions as $transaction) {
        echo "<tr>";
        echo "<td>" . $transaction['transaction_date'] . "</td>";
        echo "<td>" . $transaction['transaction_type'] . "</td>";
        echo "<td>" . $transaction['amount'] . " FCFA</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
