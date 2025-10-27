<?php 
?>
<script src="funksjoner.js"> </script>
<h3>Slett student</h3>
<form method="post" action="" id="slettStudentkjema" name="slettStudentskjema" onSubmit="return
bekreft()">
Student <select name="brukernavn" id="brukernavn">
<?php print("<option value=''>Velg en student å slette </option>");
include("dynamiske-funksjoner.php"); listeboksstudent(); ?> 
</select> <br/>
<input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>
<?php
if (isset($_POST ["slettStudentKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$brukernavn=$_POST ["brukernavn"];
if (!$brukernavn)
{
print ("Du har ikke valgt en student");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("Denne studenten er n&aring; slettet: $brukernavn Navn: $fornavn $etternavn Tidligere klasse: $klassekode  <br />");
}
}
?>
