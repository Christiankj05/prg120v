<?php /* vis-alle-studier */
/*
/* Programmet skriver ut alle registrerte studier
*/
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
/* SQL-setning sendt til database-serveren */
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
print ("<h3>Registrerte klasser </h3>");
print ("<table border=1>");
print ("<tr><th align=left>klassekode</th> <th align=left>klassenavn</th> </tr>");
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$klassekode=$rad["klassekode"];
$studiumkode=$rad["studiumkode"];
$klassenavn=$rad["klassenavn"];
print ("<tr> <td> $klassekode </td> <td> $studiumkode </td> ( <td> $klassenavn </td>  ) </tr>");
}
print ("</table>");
?>
<?php /* vis-alle-studier */
/*
/* Programmet skriver ut alle registrerte studier
*/
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
/* SQL-setning sendt til database-serveren */
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
print ("<h3>Registrerte klasser </h3>");
print ("<table border=1>");
print ("<tr><th align=left>klassekode</th> <th align=left>studiumkode</th> <th align=left>klassenavn</th></tr>");
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
  $studiumnavn=$rad["klassekode"];
$studiumkode=$rad["studiumkode"];
$studiumnavn=$rad["klassenavn"];
print ("<tr> <td> $klassekode </td> <td> $studiumkode </td> ( <td> $klassenavn </td>  ) </tr>");
}
print ("</table>");
?>

