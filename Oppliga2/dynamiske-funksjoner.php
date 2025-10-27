<?php /* dynamiske-funksjoner */
/*
/* denne filen inneholder følgende dynamiske funksjoner:
/* listeboksStudiumkode ()
/* listeboksEmnekode ()
*/
function listeboksStudiumkode ()
{
include("db-tilkobling.php"); /* tilkobling til database-server og valg av database utført */
$sqlSetning="SELECT * FROM studium ORDER BY studiumkode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$studiumkode=$rad["studiumkode"];
$studiumnavn=$rad["studiumnavn"];
print("<option value='$studiumkode'>$studiumkode $studiumnavn </option>"); /* ny verdi i listeboksen
laget */
}
}
function listeboksKlassekode ()
{
include("db-tilkobling.php"); /* tilkobling til database-server og valg av database utført */
$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$klassekode=$rad["klassekode"];
$klassenavn=$rad["klassenavn"];
$studiumkode=$rad["studiumkode"];
print("<option value='$klassekode'>$klassekode $klassenavn </option>"); /* ny verdi i listeboksen laget
*/
}
}
function listeboksstudent ()
{
include("db-tilkobling.php"); /* tilkobling til database-server og valg av database utført */
$sqlSetning="SELECT * FROM klasse ORDER BY brukernavn;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$brukernavn=$rad["brukernavn"];
$fornavn=$rad["fornavn"];
$etternavn=$rad["etternavn"];
$klassekode=$rad["klassekode"];
print("<option value='$brukernavn'>($brukernavn, ($klassekode)) $fornavn $etternavn  </option>"); /* ny verdi i listeboksen laget
*/
}
}
?>
