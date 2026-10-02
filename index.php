<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h1>Dziennik ocen</h1>

<form method="POST">
    
    Imię i nazwisko ucznia:
    <input type="text" name="uczen">
    <br><br>

    Ocena:
    <select name="ocena">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <br><br>

    Przedmiot:
    <input type="text" name="przedmiot">
    <br><br>

    <button type="submit" name="zapisz">Zapisz ocenę</button>

</form>

<?php

if (isset($_POST["zapisz"])) {

    $uczen = $_POST["uczen"];
    $przedmiot = $_POST["przedmiot"];
    $ocena = $_POST["ocena"];

    $plik = fopen("oceny.txt", "a");

    fwrite($plik, $uczen . " | " . $przedmiot . " | ocena: " . $ocena . "\n");

    fclose($plik);

    header("Location: index.php");
    exit;

}

?>

<h2>Zapisane oceny</h2>

<?php

if (file_exists("oceny.txt")) {

    $plik = fopen("oceny.txt", "r");

    while (($wiersz = fgets($plik)) !== false) {
        echo htmlspecialchars($wiersz) . "<br>";
    }

    fclose($plik);

} else {

    echo "Brak zapisanych ocen.";

}

?>

</body>
</html>
