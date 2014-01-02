<center><h2>Texte page d'accueil</h2></center>
<form method="post" action="controleur/edit_homepage.php">
<textarea name="texte" id="texte">
	<?php 
	$req=$bdd->query('SELECT * FROM ppe_article WHERE id_article=1');
	$data=$req->fetch();
        
	if(isset($data["contenu_article"])):
            echo stripslashes($data["contenu_article"]);
        endif;?>
</textarea>
<input type="submit" value="Modifier">
</form>