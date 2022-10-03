<?php 

$url=($_GET['url'])??null;

$url=explode("-",filter_var($url,FILTER_SANITIZE_URL));

$ctrl_url=$url[0]??null;
$param1_url=($url[1])??null;
$param2_url=($url[2])??null;


if($ctrl_url == 'connexion'){
	$controller = new Logincontroller();
	$controller->verifIdentidiants();
}

$login = new Logincontroller();
$login->stayCo();
$verif = $login->connected();

if ($verif == true) {

	if($ctrl_url=="archives"){
		
		$controller= new Archivescontroller();
		$controller->index();
	}
	else if($ctrl_url=="contenu"){
	
		$controller= new Contenucontroller();
	
		if($param1_url=='addImgAcc'){
			$controller->ajouterImage();
		}else if($param1_url=='suppAcc'){
			$controller->supprimerImg();
		}else if ($param1_url=="updateAcc") {
			$controller->updateSwap();
		}else if($param1_url=='updateSpeachAcc'){
			$controller->updateSpeach();
		}else if($param1_url=='updateReasonAcc'){
			$controller->updateReason();
		}
		else if($param1_url=='updateFc'){
			$controller->updateFc($param2_url);
		}else{
			$controller->index();
		}
	}
	else if($ctrl_url=="gestionContrat"){
	
		$controller= new GestionContratcontroller();
		if ($param1_url == 'validationContrat') {
			$controller->updateEtatProgress($param2_url);
		}else{
		$controller->index();
		}
	}
	else if($ctrl_url=="modifContrat"){
	
		$controller= new ModifContratcontroller();
			$controller->index();
		
	}
	else if($ctrl_url=="deconnexion"){
	
		$controller= new Deconnexioncontroller();
			$controller->logout();
	}
	else if($ctrl_url=="new"){
	
		$controller= new Newcontroller();
	
		if ($param1_url == 'updateEtatDevis') {
			$controller->updateEtatDevis($param2_url);
	
		}else{
			$controller->index();
		}
	}else if ($ctrl_url == "login") {
		$controller = new Dashboardcontroller();
		$controller->index();
	}
	else{
		$controller= new Dashboardcontroller();
		$controller->index();
	}
}else{
	$login->index();
}


?>