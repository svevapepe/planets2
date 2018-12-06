<?php
session_start();

$db_host='localhost';
$db_user='root';
$db_pass='Spsasc1997';
$db_name='cosmoproject';

$nome=$_SESSION['nome'];
$cognome=$_SESSION['cognome'];
$email=$_SESSION['email'];
$biglietti=$_SESSION['biglietti'];
$datapar=$_SESSION['datapart'];
$dataarr=$_SESSION['dataarr'];
$spapar=$_SESSION['spar'];
$spaar=$_SESSION['spaarr'];

$link = mysqli_connect('localhost', 'root', 'Spsasc1997');
if ($link->connect_errno) {
    echo ('Could not connect: ' . mysqli_error());
}


mysqli_select_db($link,$db_name) or die("Impossibile connettersi al database");

$query = "SELECT SUM(nbiglietti) FROM biglietto WHERE datapartenza = '$datapar' and dataarrivo='$dataarr' and partenza='$spapar' and arrivo='$spaar' GROUP BY nbiglietti";
$result = mysqli_query($link,$query) or die("Impossibile  fare query");
if($row=mysqli_fetch_assoc($result)){
  if($row["SUM(nbiglietti)"]<10){
      //printf("%d\n",$row["SUM(nbiglietti)"]);
      $sql="INSERT INTO biglietto(nome,cognome,email,nbiglietti,datapartenza,dataarrivo,partenza,arrivo) VALUES ('$nome', '$cognome', '$email','$biglietti','$datapar','$dataarr','$spapar','$spaar')";
      if (!mysqli_query($link, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
      }
      printf("Pagamento confermato!");
  }
  else{
      echo "Biglietti non disponibili per questa meta e questa data,ti invitiamo a prenotare per un'altra data!";

  }

}

mysqli_close($link);

?>
