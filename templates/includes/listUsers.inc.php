<?php
include_once './templates/includes/html_header.inc.php';
require './src/dbConnect.php';
require './configs/global.php';

$statusData = $connection->query('SELECT DISTINCT `status` FROM contacts')->fetchAll(PDO::FETCH_COLUMN);

$filterStatus = isset($_GET['status']) ? $_GET['status'] : '';

$filterCondition = ($filterStatus != '') ? " WHERE status = :filterStatus" : '';
$query = "SELECT * FROM contacts" . $filterCondition;

if ($filterStatus != '') {
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':filterStatus', $filterStatus);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $data = $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Page</title>
</head>
<body>

<form id="filterForm" action="#" method="get">
    <label for="statusFilter">Filtrer par statut :</label>
    <select id="statusFilter" name="status">
        <option value="">Tous les statuts</option>
        <?php
        foreach ($statusData as $status) {
            $selected = ($filterStatus == $status) ? 'selected' : '';
            echo "<option value='$status' $selected>$status</option>";
        }
        ?>
    </select>

    <label for="search">Recherche :</label>
    <input type="text" id="search" name="search" placeholder="Entrez un prénom, nom ou passions">
</form>

<table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Passions</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data as $value) {
            ?>
                <tr>
                    <td><?= $value["surname"] ?></td>
                    <td><?= $value["name"] ?></td>
                    <td><?= $value["passions"] ?></td>
                    <td><?= $value["status"] ?></td>
                    <td>
                        <a href="?page=delete&id=<?= $value["id"] ?>" class="delete-link" data-id="<?= $value["id"] ?>">Supprimer</a>
                        <a href="?page=mod&id=<?= $value["id"] ?>">Modifier</a>
                    </td>
                </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const statusFilter = document.getElementById("statusFilter");
    const deleteLinks = document.querySelectorAll('.delete-link');

    deleteLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const userId = link.getAttribute("data-id");

            if (userId !== null) {
                const confirmation = confirm("Voulez-vous vraiment supprimer cet utilisateur?");

                if (confirmation) {
                    window.location.href = "?page=delete&id=" + userId;
                }
            }
        });
    });

    function performSearchAndFilter() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedStatus = statusFilter.value;
        const rows = document.querySelectorAll("table tbody tr");

        rows.forEach(function (row) {
            const cells = row.querySelectorAll("td");
            let matchFound = false;

            cells.forEach(function (cell, index) {
                const cellText = cell.textContent.toLowerCase();
                if (cellText.includes(searchTerm) && index !== 3) {
                    matchFound = true;
                }
            });

            const status = cells[3].textContent;
            const searchMatch = matchFound;
            const statusMatch = selectedStatus === "" || status === selectedStatus;

            if (searchMatch && statusMatch) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    }

    searchInput.addEventListener("input", performSearchAndFilter);
    statusFilter.addEventListener("change", performSearchAndFilter);

    performSearchAndFilter(); // Exécuter la recherche lors du chargement de la page
});
</script>

</body>
</html>
