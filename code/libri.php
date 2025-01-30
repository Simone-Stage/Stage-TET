<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection</title>
</head>
<body>
    <h1>Ricerca Libro</h1>

    <form method="POST">
        <label for="id">ID del Libro:</label>
        <input type="text" id="id" name="id" required>
        <br>
        <button type="submit">Cerca</button>
    </form>

<?php
$filename = "libri.db";

if (!file_exists($filename)) {
    $db = new SQLite3($filename);

    $db->exec('CREATE TABLE IF NOT EXISTS libri (
        id INTEGER PRIMARY KEY,
        nome TEXT
    )');

    $db->exec("INSERT INTO libri (nome) VALUES ('Il Signore degli Anelli')");
    $db->exec("INSERT INTO libri (nome) VALUES ('Harry Potter')");
    $db->exec("INSERT INTO libri (nome) VALUES ('Il Codice Da Vinci')");
    $db->exec("INSERT INTO libri (nome) VALUES ('Il Piccolo Principe')");

    echo "SQLite db creato!<br/>";
}

$db = new SQLite3($filename);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM libri WHERE id = $id"; 
    echo "Query eseguita: " . $query . "<br/>";

    $result = $db->query($query);

    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "Libro trovato: " . htmlspecialchars($row['nome']);
    } else {
        echo "Libro non trovato.";
    }
}
?>

</body>
</html>
