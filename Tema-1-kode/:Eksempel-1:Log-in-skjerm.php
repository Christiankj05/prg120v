<?php    /* Eksempel 1 */
/*
/*    Programmet mottar fra et HTML-skjema et fornavn og et etternavn ved POST-metoden
/*    Programmet skriver ut en "god dag"-melding med personens navn 
*/
<h2>Ha en god dag</h2>
  $fornavn=$_POST ["fornavn"];
  $etternavn=$_POST ["etternavn"];  
	
  print ("God dag $fornavn $etternavn, ha en god dag! <br />");  
?>
