<?php 
//Résout les problèmes de caractères.
$bdd->exec('SET NAMES utf8');

if(isset($_SESSION["result_form"])){
    echo $_SESSION["result_form"];
    //Faire disparaitre les messages d'erreurs.
    $_SESSION["result_form"]=null;
}?>


<hr>
<hr>
<p>Date choisie : <?php $_SESSION["date"]=$_GET["date"]; echo $_SESSION["date"];?> 
    
<u><p>Choisissez vôtre option:</p></u>

<form method="post" action="controleur/reserver.php" name="reservation">
<?php
	$req = $bdd->query('SELECT * FROM ppe_logement');
	$i=2;
	while($data = $req->fetch()):
	$i++;
?>
	<input type= "radio" name="option" value="<?php echo $data['categorie'];?>" id="<?php echo $i;?>"> <label for="<?php echo $i;?>"><?php echo $data['description'];?></label><br />
	<?php endwhile;?>
	<br />
<u><p>Choisissez vôtre forfait:</p></u>
<input type= "radio" name="forfait" value="Pension complète" id="0"> <label for="0">Pension complète</label><br />
<input type= "radio" name="forfait" value="Demi-pension" id="1" > <label for="1">Demi-pension</label><br />
<input type= "checkbox" name="forfait2" value="" id="2"> <label for="2">Ménage fin de séjour(optionnel)</label><br />
<p style="text-align:right;">
		<input type="submit" value="Réserver">
</p>
</form>
