<?php
session_start();
require 'yhteys.php'; // pitää luoda $conn = PDO-yhteys

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sahkoposti = $_POST['sahkoposti'] ?? '';
    $salasana  = $_POST['salasana'] ?? '';

    $sql = "SELECT sahkoposti, salasana, nimi, rooli
            FROM kirjautuminen
            WHERE sahkoposti = :sahkoposti AND salasana = :salasana
            LIMIT 1";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute(['sahkoposti' => $sahkoposti, 'salasana' => $salasana]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Virhe: " . $e->getMessage());
    }

    if ($user) {
        $_SESSION['user'] = $user;
        session_regenerate_id(true);

        if ($user['rooli'] === 'ADMIN') {
            header('Location: admin/home.php');
        } else {
            header('Location: home.php');
        }
        exit;
    } else {
        $error = 'Väärä sähköposti tai salasana.';
    }
}
?>
<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="UTF-8">
<title>Kirjautuminen</title>
<style>
    * {
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    body {
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }
    .login-container {
        width: 100%;
        max-width: 380px;
        padding: 32px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }
    h2 {
        text-align: center;
        margin-bottom: 24px;
        color: #111;
        font-size: 22px;
    }
    label {
        display: block;
        margin-bottom: 4px;
        font-size: 14px;
        color: #333;
        font-weight: 500;
    }
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 15px;
        transition: border-color 0.2s;
    }
    input:focus {
        outline: none;
        border-color: #202020ff;
    }
    button {
        width: 100%;
        padding: 10px;
        background-color: #1a73e8;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 15px;
        cursor: pointer;
        font-weight: bold;
        letter-spacing: 0.5px;
        transition: .2s;
    }
    button:hover {
        background-color: #155ab6;
    }
    .error {
        color: red;
        font-size: 14px;
        margin-bottom: 12px;
        text-align: center;
    }
</style>
</head>
<body>
    <form class="login-container" method="post" action="kirjautuminen.php">
        <h2>Kirjautuminen</h2>
        <?php if ($error) echo '<div class="error">'.$error.'</div>'; ?>
        <label for="sahkoposti">Sähköpostiosoite *</label>
        <input type="email" name="sahkoposti" id="sahkoposti" required>

        <label for="salasana">Salasana *</label>
        <input type="password" name="salasana" id="salasana" required>

        <button type="submit">KIRJAUDU SISÄÄN</button>
    </form>
</body>
</html>