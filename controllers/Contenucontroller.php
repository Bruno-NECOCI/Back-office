<?php

class Contenucontroller extends Controller{


	public function __construct(){

		$this->contenu = new ContenuModel();
	}

	public function ImgAccueil(){
		
		return $this->contenu->getImgAccueil();
	}
	public function ImgDefault(){
		
		return $this->contenu->getImgDefault();
	}
	public function ImgActive(){
		
		return $this->contenu->getImgActive();
	}
	public function ajouterImage(){
		
		var_dump($_FILES);

		$from = $_FILES['photo']['tmp_name'];
		$name = $_FILES['photo']['name'];
		$to ='../public/img/'.$name;

		$ext = pathinfo($name,PATHINFO_EXTENSION);

		$alt = strip_tags($_POST['alt']);
		$regex = "/^\w{1,20}$/";

		if($ext == 'jpg' || $ext=='png'){

			if (preg_match($regex, $alt)) {
			
				move_uploaded_file($from, $to);
		
				$Imgs = $this->contenu->getImgNull();
		
				if (empty($Imgs)) {
					$this->contenu->addfirstImg($name, $alt);
					
				}else{
					$this->contenu->addNewImg($name, $alt);
		
				}
			}

		 }

		header("location:contenu");

	}

	public function supprimerImg(){
	

		$id_img = intval($_POST['supp']);

		$active = $this->contenu->getImgActive();
		$idAct = $active->id;
		
		$Imgs = $this->contenu->getImgNull();
		$tabIds = [];
		foreach ($Imgs as $Img) {
			$IdImg = $Img->id;
			$tabIds [] = $IdImg;
		}
		
		if (empty($tabIds)) {
			$this->contenu->supprImg($id_img);
			$this->ImgDefault();
		}else{
			$Idmin = min($tabIds);
		}
		
		if($id_img == $idAct){
			$this->contenu->updateSwap($idAct, $Idmin);
			$this->contenu->supprImg($id_img);

		}else{
			$this->contenu->supprImg($id_img);
		}
		header("location:contenu");
}

	public function updateSwap(){

		$id_img = intval($_POST['update']);
		

		$active = $this->contenu->getImgActive();
		$idAct = $active->id;

		if ($id_img != $idAct) {
			$this->contenu->updateSwap($idAct,$id_img);
		}

		header('location:contenu');

	}

	public function updateSpeach(){
		
		$contenu = strip_tags($_POST['speach']);
		$regex = "/[0-9a-zA-Z\s àâäãçéèêëìîïòôöõùûüñ'-(),;]{20,255}$/";
		if (preg_match($regex, $contenu)) {
			$this->contenu->updateSpeach($contenu);
		}

		header('location:contenu');
	}
	public function currentSpeach(){
		
		return $this->contenu->getSpeach();
	}

	public function updateReason(){
	
		$contenu = strip_tags($_POST['reason']);
		
		$this->contenu->updateReason($contenu);

		header('location:contenu');
	}
	public function currentReason(){
		
		return $this->contenu->getReason();
	}

	public function updateFc($id){
		
		$num = strip_tags($_POST['num'.$id]);
		$contenu = strip_tags($_POST['fc'.$id]);

		$regexNbr = "/^[0-9]{1,3}$/";
		$regexCtn = "/[0-9a-zA-Z\s àâäãçéèêëìîïòôöõùûüñ'-(),;.]{5,200}$/";

		if (preg_match($regexNbr, $num) && (preg_match($regexCtn, $contenu))) {
			
			$this->contenu->updateFc($num, $contenu, $id);

		}

		header('location:contenu');
	}
	public function currentFlipCard(){
		
		return $this->contenu->getFlipCard();
	}

	public function index()

	{
		$flipCards = $this->currentFlipCard();
		$speach = $this->currentSpeach();
		$reason = $this->currentReason();
		$imageDefault = $this->ImgDefault();
		$imageActive = $this->ImgActive();
		$imagesAccueil = $this->ImgAccueil();
        $this->render('contenu', compact('imagesAccueil', 'imageActive', 'imageDefault', 'speach', 'reason', 'flipCards'));
	} 

}