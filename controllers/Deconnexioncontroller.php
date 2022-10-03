<?php

class Deconnexioncontroller extends Controller{

 	public function logout(){
		setcookie('authId', "", -3600, "/");
		setcookie('authMdp', "", -3600, "/");
		// unset($_SESSION['connected']);
		session_destroy();
		header('location:login');
	}

}