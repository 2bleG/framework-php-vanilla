<?php
include_once './templates/includes/html_header.inc.php';
require './src/dbConnect.php';
require './configs/global.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    if (is_numeric($userId) && $userId > 0) {
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':id', $userId);

        if ($stmt->execute()) {
            echo "L'utilisateur a été supprimer avec succès";
        } else {
            echo "Erreur lors de la supression de l'utilisateur";
        }
    } else {
        echo "L'ID n'est pas valide";
    }
} else {
    echo "L'ID a pas été spécifié";
}
?>
