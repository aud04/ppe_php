 <center><div id="connexion">
       <h4>Modification du mot de passe</h4>
         <form method="post" action="controleur/editPassword.php">
             <table class="account">
			 <tr>
				<td><label>Ancien mot de passe :</label></td><td><input type="password" name="password" autocomplete="off"/></td></tr>
				<tr><td><label>Nouveau mot de passe :</label></td><td><input type="password" name="newPassword" autocomplete="off"/></td></tr>
				<tr><td><label>Vérification du nouveau mot de passe : </label></td><td><input type="password" name="newPassword2" autocomplete="off"/></td></tr>
				<tr><td><input type="submit" value="Modifier"></td></tr>
			</table>
                     </form>
                     <?php 
                     if(isset($_SESSION['result'])){
                                echo $_SESSION['result'];
                                    $_SESSION['result']="";
                     }?>
             </div></center>