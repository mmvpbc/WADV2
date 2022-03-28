<?php
$db = new PDO("mysql:host=localhost;dbname=BKE",
"root", "root");
if (isset ($_POST['verzenden'])) {
        $naam = filter_input(INPUT_POST, "naam",
                                        FILTER_SANITIZE_STRING);
        $wachtwoord = filter_input(INPUT_POST, "wachtwoord",
                FILTER_SANITIZE_STRING);
        $query = $db->prepare("INSERT INTO profiel(naam, wachtwoord)
                                    VALUES( '$naam','" . sha1 ('$wachtwoord') . "')" );
        $query->bindParam("naam", $naam);
        $query->bindParam("wachtwoord",$wachtwoord);
            if($query->execute()) {
                echo "De nieuwe gegevens zijn toegevoegd.";
            }
            else {
                echo "Er is een fout opgetreden!";
            }
            echo "<br>";
}
?>

<link rel="stylesheet" href="registratiepagina.css" type="text/css">
<body>
<div class="bg">
    <p class="nii">Registreren:</p>

    <form method="post" action="">
    <p><label>Naam: </label>
    <input type="text" name="naam"></p>

    <label>Wachtwoord:</label>
    <input type="password" name="wachtwoord">
    <br><br>

    <p><input type="submit" name="verzenden" value="opslaan"> <a href="inlogpagina.php">aanmelden</a></p>

</form>
</div>
</body>
