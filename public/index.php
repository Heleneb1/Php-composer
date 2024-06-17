<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Form;

use CowSay\Cow;
$form = new Form();
$response = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = $form->uploadFile();
}

$lastname = $form->getLastname();
$firstname = $form->getFirstname();
$address = $form->getAddress();
$avatar = $form->getAvatar();

$bessie = new Cow('Hello, Farm!');
$bessie->setEyes('oO')
    ->setTongue('U')
    ->setPoop('@@@')
    ->setUdder('W');
// echo $bessie;

// store the output in a variable
//<pre> tag is used to define preformatted text
// use the pre tag to preserve the whitespace and line breaks in the output
$output = $bessie->say();
echo '<pre class="cow-say">' . $output . '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Pièce d'identité</title>
</head>
<body>
    <div class="container">
        <h1>Springfield , IL <?php echo htmlspecialchars($firstname . ' ' . $lastname); ?></h1>
        <div class="simpson">
        <div class="identity">
            <h2>Drivers License <?php echo htmlspecialchars($firstname); ?></h2>
            
               <p>Nom: <?php echo htmlspecialchars($lastname); ?></p>
                <p>Prénom: <?php echo htmlspecialchars($firstname); ?></p>
                <p>Adresse: <?php echo htmlspecialchars($address); ?></p></div>
                <div class="picture">Photo: <img src="<?php echo htmlspecialchars($avatar); ?>" alt="Avatar de <?php echo htmlspecialchars($firstname); ?>" style="max-width: 200px;"></div >
             
        </div>
        <div class="signature">
        <p class="handwritten">Homer Simpson</p>
       
        <p>Signature</p>
        </div>

    </div>
    <div class="container-second">
    <form method="post" enctype="multipart/form-data">
            <label for="imageUpload">Upload a profile image</label>
            <input type="file" name="avatar" id="imageUpload">
            <button name="send">Send</button>
        </form>

        <?php if (!empty($response['errors'])): ?>
            <?php foreach ($response['errors'] as $error): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($response['success'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($response['success']); ?></p>
        <?php endif; ?>
        
        </div>
</body>
</html>
