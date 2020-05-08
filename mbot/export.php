<?php
									//connexion bdd
$host="localhost";
$user="root";
$password="";
$db="test";

$link = mysqli_connect($host,$user,$password,$db);

if (!$link) {
	echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
}

//requete 
$result = mysqli_query($link, "SELECT * FROM coordonnees");
$coordonnees =mysqli_fetch_assoc($result);

 function export($datas,$filename,$result){
	header("Content-type: text/csv");       
	header('Content-Disposition: attachment; filename="'.$filename.'.csv"');
	$i=0;

	while ($datas =mysqli_fetch_assoc($result)){
      if($i==0){
        echo '"'.implode('";"',array_keys($datas)).'"'."\n";
      }
      echo '"'.implode('";"',$datas).'"'."\n";


      $i++;
    }     
}

export($coordonnees,'relevé',$result);
?>