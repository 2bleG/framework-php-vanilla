<?php

require './src/dbConnect.php';
require './configs/global.php';

?>

<form action="#" method="post" id="form">
    <ul>
        <li>
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="name" name="name" />
        </li>
        <li>
            <label for="surname">Prenom&nbsp;:</label>
            <input type="text" id="surname" name="surname" />
        </li>
        <li>
            <label for="surname">Passions&nbsp;:</label>
            <input type="text" id="passions" name="passions" />
        </li>
        <li>
            <label for="status">Statut&nbsp;:</label>
            <select id="status" name="status">
                <option value="know">Je connaissais l'école</option>
                <option value="heard">J'ai entendu parler de l'école</option>
                <option value="away">Je ne connais rien de l'école</option>
            </select>
        </li>
    </ul>

    <input type="submit" value="Ajouter">
</form>

<?php
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['passions']) && isset($_POST['status'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $passions = $_POST['passions'];
    $status = $_POST['status'];

    $data = [
        'name' => $name,
        'surname' => $surname,
        'passions' => $passions,
        'status' => $status
    ];

    $query = "INSERT INTO contacts (name, surname, passions, status) VALUES (:name, :surname, :passions, :status)";
    $stmt = $connection->prepare($query);

    if ($stmt->execute($data)) {
        echo "Enregistrement réussi.";
    } else {
        echo "Erreur lors de l'enregistrement : " . print_r($stmt->errorInfo());
    }
}