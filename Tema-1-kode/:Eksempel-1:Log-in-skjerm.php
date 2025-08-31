<?php    /* Eksempel 1 */
/*
/*    Programmet mottar fra et HTML-skjema et fornavn og et etternavn ved POST-metoden
/*    Programmet skriver ut en "god dag"-melding med personens navn 
*/

  $fornavn=$_POST ["fornavn"];
  $etternavn=$_POST ["etternavn"];  
  print ("Velkommen! <br />");
  print ("God dag $fornavn $etternavn, ha en god dag! <br />");  
?>
