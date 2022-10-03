<?php

class Logincontroller extends Controller{


	public function __construct(){

		$this->login = new LoginModel();
	}

 	public function connected(){
		if(!empty($_SESSION['connected'])){
			return true;
		}else{
			return false;
		}
	}

	public function verifIdentidiants(){

		// var_dump($_POST);echo'<br>';

		$admin = $_POST['login'] ?? null; 
		//striptags

		// var_dump($admin);echo'<br>';
		$mdp = $_POST['mdp'] ?? null;

		$check = $this->login->checkAdminExist($admin);
		
		// var_dump($check);echo'<br>';
		$error = null; 

		if($check == 1 ){
			$identifiants = $this->login->getIdentifiant($admin);
			// var_dump($identifiants);echo'<br>';
			if($identifiants->identifiant === $admin && password_verify($mdp, $identifiants->mdp) == true){
				$_SESSION['connected'] = 1;
				// var_dump($_SESSION);
			}
		}else if($admin =='' || $mdp =''){
			return $error = "Veuillez remplir tous les champs ";
		}else {
			return $error = "Ce ne sont pas les bons identifiants";
		}

		if (isset($_POST['remember'])) {
			setcookie('authId', $identifiants->identifiant, time() + 3600 * 24 * 30, '/', 'localhost', false, true); 
			setcookie('authMdp', $identifiants->mdp, time() + 3600 * 24 * 30, '/', 'localhost', false, true);
		}
	}
		
	public function stayCo(){

			if (!isset($_SESSION['connected']) && empty($_SESSION['connected']) && isset($_COOKIE['authId'], $_COOKIE['authMdp']) && !empty($_COOKIE['authId']) && !empty($_COOKIE['authMdp'])){
				$identifiants = $this->login->getIdentifiant($_COOKIE['authId']);
				if($identifiants->identifiant === $_COOKIE['authId'] && $identifiants->mdp =='$2y$12$P58TsXx7600sBKSxOe3bt.t0v5snHaFCU7E./5aAIv6QUGdZ8qDo2'){
					$_SESSION['connected'] = 1;
				}
			}
		}

	public function index()
	{
        $this->render('login');
	} 

}