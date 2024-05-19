<!DOCTYPE html>
<html>
<head>
    <title>Créer un nouveau compte bancaire</title>
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
                    <a class="nav-link" style="color:white;" aria-current="page" href="index.php">Liste Des Comptes/clients</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:black" aria-current="page" href="creation_compte.php">Création de compte</a>
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
    <div style="align-content: center;">
        <h1 style="text-align:center;">Créer un nouveau compte bancaire</h1>
        <br>
        <div class="h-100 d-flex align-items-center justify-content-center">
        <form action="create_account.php" method="post"  class="col-6">
            <div class="mb-3">
                <label for="first_name" class="form-label">Prénom</label>
                <input type="text" name="first_name" class="form-control" id="first_name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Nom</label>
                <input type="text" name="last_name" class="form-control" id="last_name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" name="address" class="form-control" id="address">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Numéro de téléphone</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number">
            </div>
            <div class="mb-3">
                <label for="account_number" class="form-label">Numéro de compte</label>
                <input type="number" name="account_number" class="form-control" id="account_number">
            </div>
            <div class="mb-3">
                <label for="balance" class="form-label">Solde initial</label>
                <input type="text" name="balance" class="form-control" id="balance">
            </div>
            <button type="submit" class="btn btn-primary col-12">Creer un compte</button>
        </form>
        </div>
        
    </div>
</body>
</html>
