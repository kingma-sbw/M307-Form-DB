<?php declare(strict_types=1);
$vorname = $_POST['vorname'] ?? '';
$nachname = $_POST['nachname'] ?? '';
$anrede = $_POST['anrede'] ?? '';

$message = '';

/* Datenbank Verbindung aufbauen */
/* Name der Datenbank Verbindung. mysql:dbname=...;host=...*/
const DBCONNECTION = [
  'name' => 'db',
  'user' => 'root',
  'pass' => 'passsword',
  'db'   => 'm307_php_form'
];

if( $db = new mysqli(DBCONNECTION['name'], DBCONNECTION['user'], DBCONNECTION['pass'], DBCONNECTION['db']) ) {
  $message = 'Datenbankverbindung erfolgreich';
} else {
  $message = 'Fehler bei der Datenbankverbindung';
}


/* wurde das Forumlar abgeschickt?-Test */
if( isset($_POST) && !empty($_POST) ) {
  $sql = 'insert into `person` values(default,?,?,?)';
    $db->prepare($sql);
    $db->execute([$anrede, $vorname, $nachname]);
    $message = 'Daten wurden gespeichert';
}
/* Einfügen-Abfrage, Platzhalter haben : */

/* Abfrage vorbereiten */

/* Daten mit Abfrage vorbereiten */
  
/* Abfrage abschicken und das Resutat anzeigen */

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

<table>
  <h1>Anmeldungen</h1>
  <tr><th>Anrede</th><th>Vorname</th><th>Nachname</th></tr>
  
  <?php
  /* Liste ausgeben */
    try {
      $sql = "SELECT * FROM `person`;";
      $resultat = $db->query($sql);
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
    } catch () {
      echo "Fehler: " . $e->getMessage();

    } ?>
  </table>


</body>

</html>