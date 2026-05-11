<?php
include 'yhteys.php';
?>

    <!doctype html>
    <html lang="fi">
    <head><meta charset="utf-8"><title>Lisää käyttäjä</title></head>
    <body>
        <h2>Lisää käyttäjä</h2>
        <form method="POST" action="kayttajat.php">
        <input type="hidden" name="action" value="create">

        Nimi:<br>
        <input type="text" name="nimi" required><br><br>

        Sähköposti:<br>
        <input type="email" name="sahkoposti" required><br><br>

        Salasana:<br>
        <input type="password" name="salasana" required><br><br>

        Vahvista salasana:<br>
        <input type="password" name="salasana2" required><br><br>

        Rooli:<br>
        <select name="rooli" required>
            <option value="NORMI">NORMI</option>
            <option value="ADMIN">ADMIN</option>
        </select><br><br>

        <button type="submit">Tallenna</button>
        </form>

        <p><a href="home.php">Takaisin</a></p>
    </body>
    </html>
<?php

    $pw  = trim($_POST['salasana'] ?? '');
    $pw2 = trim($_POST['salasana2'] ?? '');
    if ($pw === '' || $pw2 === '' || $pw !== $pw2) {
      echo "Virhe: salasanat eivät täsmää. <a href='kayttajat.php?action=add'>Takaisin</a>";
      exit;
    }

    $st = $conn->prepare("INSERT INTO kirjautuminen
      (sahkoposti, salasana, nimi, rooli)
      VALUES (:sp, :ss, :n, :r)");
    $st->execute([
      ':sp'  => $_POST['sahkoposti'],
      ':ss'  => $pw,              // huom: selkokielinen kuten muualla tässä harjoituksessa
      ':n'   => $_POST['nimi'],
      ':r'   => $_POST['rooli']
    ]);
    echo "Käyttäjä lisätty. <a href='home.php'>Palaa listaan</a>";
    exit;

?>
