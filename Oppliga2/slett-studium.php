?php /* slett-emne */
/*
/* Programmet lager et skjema for å kunne slette et emne
/* Programmet sletter det valgte emnet
*/
?>
<script src="funksjoner.js"> </script>
<h3>Slett emne</h3>
<form method="post" action="" id="slettEmneSkjema" name="slettEmneSkjema" onSubmit="return
bekreft()">
Emne <select name="emnekode" id="emnekode">
<?php print("<option value=''>velg emne </option>");
include("dynamiske-funksjoner.php"); listeboksEmnekode(); ?>
</select> <br/>
<input type="submit" value="Slett emne" name="slettEmneKnapp" id="slettEmneKnapp" />
</form>
<?php
if (isset($_POST ["slettEmneKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$emnekode=$_POST ["emnekode"];
if (!$emnekode)
{
print ("Det er ikke valgt noe emne");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="DELETE FROM emne WHERE emnekode='$emnekode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende emne er n&aring; slettet: $emnekode <br />");
}
}
?>
