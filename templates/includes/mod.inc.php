<?php
include_once './templates/includes/html_header.inc.php';
require './src/dbConnect.php';
require './configs/global.php';

$userId = $name = $surname = $passions = "";

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    if (is_numeric($userId) && $userId > 0) {
        $userData = $connection->query(queryBuilder('r', 'contacts', ['id' => $userId]))->fetch(PDO::FETCH_ASSOC);

        if ($userData !== false) {
            $name = $userData['name'];
            $surname = $userData['surname'];
            $passions = $userData['passions'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $passions = $_POST['passions'];
    
    $query = "UPDATE contacts SET name = :name, surname = :surname, passions = :passions WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':passions', $passions);
    $stmt->bindParam(':id', $userId);

    if ($stmt->execute()) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}

?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $userId; ?>">
    <ul>
        <li>
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="name" name="name" value="">
        </li>
        <li>
            <label for="surname">Prénom&nbsp;:</label>
            <input type="text" id="surname" name="surname" value="">
        </li>
        <li>
            <label for="passions">Passions&nbsp;:</label>
            <input type="text" id="passions" name="passions" value="">
        </li>
    </ul>

    <input type="submit" value="Modifier">
</form>

