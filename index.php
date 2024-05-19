<?php
// Connexion à la base de données
include 'db.php';

try {
    // Récupération des clients et de leurs comptes associés
    $sql = "SELECT clients.id, clients.first_name, clients.last_name, clients.address, clients.phone_number, bank_accounts.account_number, bank_accounts.balance
            FROM clients
            LEFT JOIN bank_accounts ON clients.id = bank_accounts.client_id";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

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
                    <a class="nav-link" style="color:black;" aria-current="page" href="index.php">Liste Des Comptes/clients</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:white" aria-current="page" href="creation_compte.php">Création de compte</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:white" aria-current="page" href="releve_compte.php">Relevé de compte</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:white" aria-current="page" href="gestion_compte.php">Opération Bancaire</a>
                    </li>
                </ul>
                <form class="d-flex">
                   
                </form>
                </div>
            </div>
        </nav>
        <br>
        <br>
    </div>
    <h1>Liste des Clients et Leurs Comptes</h1>
    <br>
    <div style="margin-left: 50px; margin-right: 50px;">
        <table border="1" class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Numéro de Compte</th>
                <th>Solde</th>
            </tr>
            <?php
            if (count($result) > 0) {
                // Affichage des données des clients et de leurs comptes
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["account_number"] . "</td>";
                    echo "<td>" . $row["balance"] ." FCFA"."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Aucun client trouvé.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
