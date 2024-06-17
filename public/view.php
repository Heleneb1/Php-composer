<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Form;

$form = new Form();
$errors = []; // Initialiser la variable des erreurs
$success = ''; // Initialiser la variable de succès

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Test Php</title>
</head>

<body>
    
    <div class="container">
        <h1>Bienvenue sur la page d'information de Homer Simpson</h1>
        <div class="simpson">
            <h2>Informations de Homer</h2>
            <ul>
                <li>Nom: <?php echo htmlspecialchars($lastname); ?></li>
                <li>Prénom: <?php echo htmlspecialchars($firstname); ?></li>
                <li>Adresse: <?php echo htmlspecialchars($address); ?></li>
                <li>Photo: <img src="<?php echo htmlspecialchars($avatar); ?>" alt="Avatar de Homer" style="max-width: 200px;"></li>
            </ul>
        </div>

        <form method="post" enctype="multipart/form-data">
            <label for="imageUpload">Upload a profile image</label>
            <input type="file" name="avatar" id="imageUpload">
            <button name="send">Send</button>
        </form>

        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>
    </div>

</body>

</html>
