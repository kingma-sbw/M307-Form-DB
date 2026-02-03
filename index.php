<?php declare(strict_types=1);
$vorname = $_POST['vorname'] ?? '';
$nachname = $_POST['nachname'] ?? '';
$anrede = $_POST['anrede'] ?? '';

$message = '';

/* Datenbank Verbindung aufbauen */
/* Name der Datenbank Verbindung. mysql:dbname=...;host=...*/
$dbname = '';
/* Datenbankbenutzzername */
$dbuser = '';
/* Kennwort */
$dbpass =  '';
/* Verbindung erstellen */
$db = ;

/* wurde das Forumlar abgeschickt?-Test */
if() {
/* Einfügen-Abfrage, Platzhalter haben : */

/* Abfrage vorbereiten */

/* Daten mit Abfrage vorbereiten */
  
/* Abfrage abschicken und das Resutat anzeigen */
}

function getAnrede(string $anrede): string
{
  switch ($anrede) {
    case 'f':
      return 'Frau';
    case 'm':
      return 'Herr';
    default:
      return 'unknown';
  }
}

?>
<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="assets/main.css">
</head>
<html>

<body>
  <h2>Personal Details</h2>

  <form method='POST' action="index.php" class="formwrapper">
    <label for="anrede">Anrede</label>
    <input type='radio' <?= $anrede === 'm' ? 'checked' : '' ?> name='anrede' value='m' id="anrede-m">
    <label for="anrede-m">Herr</label>
    <input type='radio' <?= $anrede === 'f' ? 'checked' : '' ?> name='anrede' value='f' id="anrede-f">
    <label for="anrede-f">Frau</label>

    <label for="vorname">Vorname</label><input type='text' name='vorname' id='vorname' value='<?= $vorname ?>'>
    <label for="nachname">Nachname</label><input type='text' name='nachname' id='nachname' value='<?= $nachname ?>'>
    <input type='submit' value='ok'>

  </form>
  <p><?=$message?></p>
  <?php
  /* Liste ausgeben
  ?>

  <table>
    <h1>Anmeldungen</h1>
    <tr><th>Anrede</th><th>Vorname</th><th>Nachname</th></tr>
    <?php
    try {
      // Datenbankverbindung herstellen
      $dbhost = 'localhost'; // Datenbank-Host
      /* Name der Datenbank Verbindung. mysql:dbname=...;host=...*/
      $dbname = 'm307_php_form'; // Datenbankname
      $dbuser = 'root'; // Benutzername
      $dbpass = ''; // Passwort
    
      $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
      $sql = "SELECT * FROM `person`;";
      $resultat = $dbh->query($sql);
      foreach ($resultat->fetchAll() as $record) {
        ?>
        <tr>
          <td>
            <?= getAnrede($record["anrede"]) ?>
          </td>
          <td>
            <?= $record["vorname"] ?>
          </td>
          <td>
            <?= $record["nachname"] ?>
          </td>
        </tr>
      <?php }
    } catch (PDOException $e) {
      echo "Fehler: " . $e->getMessage();

    } ?>
  </table>


</body>

</html>
