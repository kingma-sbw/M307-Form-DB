<?php declare(strict_types=1);
$vorname = $_POST['vorname'] ?? '';
$nachname = $_POST['nachname'] ?? '';
$anrede = $_POST['anrede'] ?? '';

$message = '';

/* Name der Datenbank Verbindung. mysql:dbname=...;host=...*/
const DBCONNECTION = [
  'name' => 'db',
  'user' => 'root',
  'pass' => 'passsword',
  'db'   => 'm307_php_form'
];

/* Verbindung aufbauen */

/* wurde das Forumlar abgeschickt?-Test */

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
      /* query `person` */

      /* Abfrage vorbereiten */

      foreach ($resultat as $record) : ?>
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
      <?php endforeach;
    } catch (Exception $e) {
      echo "Fehler: " . $e->getMessage();
    }
  ?>
  </table>


</body>

</html>