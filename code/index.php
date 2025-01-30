<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerabilità XSS</title>
</head>
<body>
    <h1>Vulnerabilità XSS</h1>

    <h2>Ricerca parola</h2>
    <form method="GET">
        <label for="parola">Inserisci una parola da ricercare:</label>
        <input type="text" name="parola" required>
        <button type="submit">Cerca</button>
    </form>

    <?php
    if (isset($_GET['parola'])) {
        echo "<p>Risultati della ricerca per: " . $_GET['parola'] . "</p>";
    }
    ?>

    <h2>Commenti Blog</h2>
    <form method="POST">
        <label for="nome">Inserisci nome:</label>
        <input type="text" name="nome" required>
        <label for="commento">Inserisci commento:</label>
        <textarea id="commento" name="commento" required></textarea>
        <button type="submit">Invia</button>
    </form>

    <h3>Tutti i commenti:</h3>
    <ul>
        <?php
        $file = "commenti.txt";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $commento = $_POST['commento'];
            $entry = "<li>$nome: $commento</li>\n";

            file_put_contents($file, $entry, FILE_APPEND);
        }

        if (file_exists($file)) {
            echo file_get_contents($file);
        }
        ?>
    </ul>
</body>
</html>
