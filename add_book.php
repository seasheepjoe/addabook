<?php

$title = '';
$author = '';
$year = '';
$color = '#FF0000';
$description = '';
$errors = [];
$form_valid = false;

// VOTRE CODE ICI

if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['year']) && isset($_POST['color']) && isset($_POST['description'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $description = $_POST['description'];

    if (strlen($title) <= 1 || strlen($title) > 100){
        $errors[] = 'Le titre doit faire entre 1 en 100 caractères';
    }

    if (strpos($author, ' ') === false || strlen($author) < 3){
        $errors[] = 'Le nom de l’auteur doit faire au moins 3 caractères et contenir un espace';
    }

    if (strlen($year) < 4 || strlen($year) > 4){
        $errors[] = 'L’année doit faire 4 chiffres';
    }

    if ($color[0] !== '#' && strlen($color) < 7 || strlen($color) > 7){
        $errors[] = 'La couleur doit faire exactement 7 caractères et commencer par un ‘#’';
    }

    if (strlen($description) < 3){
        $errors[] = 'La description doit faire au moins 3 caractères';
    }

    if (empty($errors) === true){
        $form_valid = true;
    }
}

// /!\ NE RIEN MODIFIER SOUS CETTE LIGNE
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Ajouter un livre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php if ($form_valid): ?>
                    <h1>Votre livre a bien été ajouté</h1>
                    <ul>
                        <li>Titre : <?= $title ?></li>
                        <li>Auteur : <?= $author ?></li>
                        <li>Année de publication : <?= $year ?></li>
                        <li>Couleur de la couverture : <div style="display:inline-block;width:30px;height:15px;background:<?= $color ?>;"></div></li>
                        <li>Description : <?= $description ?></li>
                    </ul>
                <?php else: ?>
                    <h1>Ajouter un livre à la bibliothèque</h1>
                    <?php if (!empty($errors)): ?>
                    <p>Des erreurs ont eu lieu :</p>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <form action="add_book.php" method="POST">
                        <div class="form-group">
                            <label for="titre">Titre :</label>
                            <input type="text" class="form-control" id="titre" name="title" value="<?= $title ?>">
                        </div>
                        <div class="form-group">
                            <label for="auteur">Auteur :</label>
                            <input type="text" class="form-control" id="auteur" name="author" value="<?= $author ?>">
                        </div>
                        <div class="form-group">
                            <label for="annee">Année de publication :</label>
                            <input type="text" class="form-control" id="annee" name="year" value="<?= $year ?>">
                        </div>
                        <div class="form-group">
                            <label for="couleur">Couleur de la couverture :</label>
                            <input type="color" id="couleur" name="color" value="<?= $color ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="form-control" name="description" id="description"><?= $description ?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary">
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
