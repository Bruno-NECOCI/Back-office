<?php

abstract class Controller{

	private $chemin="../views/";

	protected function render($view, $variables=[]){

		if ($view == 'login') {
			
			extract($variables);

			require($this->chemin.$view.'.php');

		}else{
			ob_start();
	
			extract($variables);
	
			require($this->chemin.$view.'.php');
	
			$contenu = ob_get_clean();
	
			require($this->chemin."/template/default.php");
		}

	}

}