<?php
$db = new PDO("mysql:host=localhost;dbname=BKE",
    "root", "root");
if (isset ($_POST['inloggen'])) {
    $naam = filter_input(INPUT_POST, "naam",
                                            FILTER_SANITIZE_STRING);
    $wachtwoord = sha1($_POST['wachtwoord']);
    $query = $db->prepare("SELECT * FROM profiel
                                        WHERE naam = :naam
                                        AND wachtwoord = :wachtwoord");
    $query->bindParam("gebruiker", $naam);
    $query->bindParam("ww", $wachtwoord);
    $query->execute();
    if ($query->rowCount() == 1) {
        echo "Juiste gegevens!";
    } else {
        echo "Onjuiste Gegevens!";
    }
    echo "<br>";
    }
?>
<body>
<link rel="stylesheet" href="registratiepagina.css" type="text/css">
<div class="bg">
<form method="post" action="">
    <p class="nii">Aanmelden: </p>
    <label>Naam: </label>
    <input type="text" name="username"><br>

    <label>Wachtwoord: </label>
    <input type="text" name="password"><br>

    <p><input type="submit" name="inloggen" value="Inloggen"> <a href="registratiepagina.php">registreren</a></p>

</form>
</div>
</body>