<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Näyttötehtävä</title>

    <style>
        .header {
            width: 100%;
            background-color: grey;
            height: 5rem;
            align-content: center;
        }
        
        .header a{       
            margin-left: 3rem;
            padding: 25px;
            text-decoration: none;
            color: whitesmoke;
            transition: 0.2s;
        }

        .header a:hover{
            color: lightblue;
            font-size: 110%;
        }

        .header>#admin{
            margin-left: 54rem;
        }

        .header>#admin a{
            padding: 30px;
            text-decoration: none;
            color: whitesmoke;
        }
        .sisalto{
            background-color: #f5f5f5ff;
            padding: 20px;
        }
        .sisalto h1{
            margin-bottom: 4rem;
        }
        .sisalto>#p1{
            font-size: 25px;
            margin-bottom: 3rem;
        }
        .sisalto button{
            padding: 10px;
            margin-left: 2rem;
            font-size: 15px;
            color:white;
            background-color: #af002fff;
            border-radius: 5px 5px 5px 5px;
            transition: 0.3s;
        }
        .sisalto button:hover{
            font-size: 16px;
            background-color: #8f0026ff;
        }
        .sisalto>.tapahtumat{
            background-color: #EAEAEA;
            padding: 15px;
            width: 35%;
            border-radius: 5px 5px 5px 5px;
            border: solid 1px grey;
        }

        .logout-btn::after {
            content: "➜]";
        }

    </style>
</head>
<body>
    <div class="header">
        <a href="home.php">Etusivu</a>
        <a href="kaaviot.php">kaaviot</a>
        <a id="admin" href="/nayttotyo_kasper/kirjautuminen.php" class="logout-btn"></a>
    </div>
    <div class="sisalto">
    <h1>NäyttöTehtävä</h1>
    <p id="p1">
        Tervetuloa <?php echo $_SESSION['user']['nimi']; ?>
    </p id="p1">
    <br>
    <a href="kayttajat.php?action=add">Lisää käyttäjä</a>
    

    </div>
    </div>
</body>
</html>
