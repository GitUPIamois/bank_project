<!DOCTYPE html>
<html>
<head>
    <title>Relevé de compte</title>
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
                    <a class="nav-link" style="color:white" aria-current="page" href="creation_compte.php">Création de compte</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="color:black" aria-current="page" href="releve_compte.php">Relevé de compte</a>
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
    <h1>Donner le n° de compte</h1>
    <div class="h-100 d-flex align-items-center justify-content-center">
        <form action="account_statement.php" method="post">
            <label  class="form-label">Numéro de compte:</label>
            <input type="text" class="form-control" name="account_number" required>
            <br>
            <input type="submit" class="btn btn-primary" value="Afficher le relevé">
        </form>
    </div>
</body>
</html>
