<?php
require_once '../lib/projects.php';
require_once '../lib/security.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="../images/logo.png" type="image/x-icon"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Formulaire de mise en ligne</title>
</head>
<?php if(isLogged()){?>
<body class="parallax">
<?php require_once "nav.php" ?>
<?php require_once "aside.php" ?>

<div class="container text-left pt-5">
    <h1 class="display-4 w-100 text-center mt-3 pb-3 border-bottom border-dark">
        Mise en ligne de projet
    </h1>

    <p class="blockquote bg-light border-warning p-3 mt-3" style="border-left: solid 3px">
        Pour avoir une image de référence, celle-ci doit être nommée <mark>"imgRep.jpg"</mark> et se trouvée dans un
        dossier nommé <mark>"projetInfo"</mark> situé à la racine de votre projet.
        <br>
        <br>
        projet/
        <br>
        └─ projetInfo/
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ imgRep.jpg
        <br>
        <br>
        Et pour avoir une description, mettez la dans le même dossier que l'image mais cette fois ci, nommé le fichier
        <mark>"description.txt"</mark>
    </p>

    <div class="row mt-4">
        <form action="uploadsForm.php" method="post" enctype="multipart/form-data" class="col s12 m12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 mb-3">
                    <div class="custom-file">
                        <input type="file" name="fileToUpload" class="" id="fileToUpload">
                        <label class="custom-file-label" for="fileToUpload">Choisir un fichier .zip</label>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                    <input class="btn btn-primary w-100" type="submit" value="Mettre en ligne" name="submit">
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col s12 m12">
            <div class="blockquote">
                <p class="mb-0"></p>
            </div>
        </div>
    </div>
    <div class="error">
        <?php
        if (filter_input(INPUT_GET, 'error')) {

            switch (filter_input(INPUT_GET, 'error')) {
                case 1:
                    echo '<div class="p-3 mb-2 bg-success text-white">';
                    echo '<p class="mb-0">Fichier .zip mis en ligne !</p>';
                    echo '<p class="mb-0"><a href="index.php" class="text-white btn btn-primary mt-2">Revenir à l\'accueil</a></p>';
                    break;

                case 2:
                    echo '<div class="p-3 mb-2 bg-danger text-white">';
                    echo '<p class="mb-0">Veuillez choisir un fichier.</p>';
                    break;

                case 3:
                    echo '<div class="p-3 mb-2 bg-danger text-white">';
                    echo '<p class="mb-0">Erreur de dézippage.</p>';
                    break;
            }
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; 
} else {
	header('Location: loginForm.php');
	exit;
}
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
