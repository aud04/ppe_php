
<?php

/**
 * suppression utilisateur
 * 
 * Appel de la méthode pour supprimer un utilisateur.
 * 
 * @author { Audrey Stephan } [ <aud.stephan@gmail.com> ]
 */
 
?>
<h2>Gestion des utilisateurs</h4><br />
<table class="gestionu">
	<thead>
		<th>Id</th>
		<th>Login</th>
                <th>Mail</th>
		
		
	</thead>
	<tbody>
            <?php
            $req = $bdd->query('SELECT * FROM ppe_utilisateur WHERE id_utilisateur !=1');
            while($data = $req->fetch()):
		$NM= new Utilisateur($data['login'], $data['mdp'], $data['email']);
		$NM->afficherUtilisateurs($data['id_utilisateur'], $data['login'], $data['email']);
            endwhile;
            ?>
        </tbody>
</table>
