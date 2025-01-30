<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerabilità XSS e SQL Injection</title>
</head>
<body>
    <h1>Login</h1>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>

<?php

// Nome del file da verificare
$filename = "vulnerable.db";
$msg = "";

// Controllo se il db esiste, altrimenti lo creo
if (!file_exists($filename)) {
    $db = new SQLite3($filename);

    // Creazione della tabella utenti (se non esiste già)
    $db->exec('CREATE TABLE IF NOT EXISTS users (
		id INTEGER PRIMARY KEY,
		username TEXT,
		password TEXT
	)');

    // Inserimento di alcuni dati di esempio
    $db->exec("INSERT INTO users (username, password) VALUES ('admin', 'password123')");
    $db->exec("INSERT INTO users (username, password) VALUES ('user', 'userpassword')");

    echo "SQLite db created!<br/>";
}

    $db = new SQLite3($filename);

    if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    echo $query."<br/>";
    $result = $db->query($query);

    if ($result->fetchArray()) {
        echo "Login riuscito";
    } else {
        echo "Credenziali errate";
    }
}
?>

</body>
</html>
