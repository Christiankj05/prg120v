<?php ?>
<script src="funksjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseskjema" name="slettKlasseskjema" onsubmit="return bekreft()">
  Klasse 
  <select name="klassekode" id="klassekode">
    <?php 
      print("<option value=''>Velg klasse </option>");
      include("dynamiske-funksjoner.php"); 
      listeboksKlassekode(); 
    ?>
  </select>
  <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
  include_once("db-tilkobling.php");
  $klassekode = $_POST["klassekode"];

  if (!$klassekode) {
    print("Du har glemt å velge en klassekode");
  } else {
    $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
    mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; slette data i databasen");
    print("Denne klassen er nå slettet: $klassekode <br />");
  }
}
?>
