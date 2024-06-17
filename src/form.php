<?php

namespace App;

class Form
{
    public string $lastname;
    public string $firstname;
    public string $address;
    public string $avatar;

    public function __construct(string $lastname = 'Simpson', string $firstname = 'Homer', string $address = '69 Old Plumtree Bld, Springfield IL 62701', string $avatar = 'public/uploads/avatar.jpg')
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->address = $address;
        $this->avatar = $avatar;
    }

    public function uploadFile(): array
    {
        $errors = [];
        $success = '';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadDir = 'public/uploads/';
            $authorizedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $maxFileSize = 1000000; // 1 Mo
    
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
                $fileExtension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    
                if (!in_array($fileExtension, $authorizedExtensions)) {
                    $errors[] = 'Veuillez sélectionner une image de type jpg, jpeg, png, gif ou webp !';
                }
    
                if (filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
                    $errors[] = 'Votre fichier doit faire moins de 1Mo !';
                }
    
                if (empty($errors)) {
                    $newFileName = 'avatar.' . $fileExtension; // Utiliser un nom de fichier fixe
                    $uploadFile = $uploadDir . $newFileName;
    
                    // Supprimer l'ancien fichier si nécessaire
                    if (file_exists($uploadFile)) {
                        unlink($uploadFile);
                    }
    
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                        $success = 'Fichier uploadé avec succès !';
                        $this->avatar = $uploadFile;
                    } else {
                        $errors[] = 'Erreur lors de l\'upload du fichier.';
                    }
                }
            } else {
                $errors[] = 'Veuillez sélectionner un fichier à uploader.';
            }
        }
    
        return ['errors' => $errors, 'success' => $success];
    }
    
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }
}
?>
