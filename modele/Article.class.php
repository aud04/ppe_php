<?php

class Article{

 private $id;
 private $contenu;
 
 public function __construct($id, $contenu)
  {
	$this->id=$id;
	$this->contenu=$contenu;
  }
  //Cette fonction permet de modifier un article
  public function modifierUnArticle($contenu){
	include "conn_sql.php";
	$bdd->exec('UPDATE ppe_article SET date_article = NOW(), contenu_article = "'.$contenu.'" WHERE id_article = 1');
        $req=$bdd->query('SELECT * FROM ppe_article WHERE id_article=1');
	$data=$req->fetch();
	$_SESSION['contenu']=$data['contenu_article'];
	header("location:../compte.php?p=administration");
  }
}
?>