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
echo 'Connected successfully';

mysqli_select_db($link,$db_name) or die("Impossibile connettersi al database");

$sql="INSERT INTO biglietto(nome,cognome,email,nbiglietti,datapartenza,dataarrivo,partenza,arrivo) VALUES ('$nome', '$cognome', '$email','$biglietti','$datapar','$dataarr','$spapar','$spaar')";
if (mysqli_query($link, $sql)) {
    echo "Inserimento avvenuto correttamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
mysqli_close($link);
?>
