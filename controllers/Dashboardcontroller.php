<?php

class Dashboardcontroller extends Controller{

	public function __construct(){

		$this->contrat = new dashboardModel();
	}

	public function InfosEvent(){

		return $this->contrat->getInfosEvent();

	}
	public function NbrParticipants(){
		
		$id_event = $this->contrat->getIdEvent();

		$IdEventTabs = [];
	
		for ($i=0; $i < count($id_event) ; $i++) { 
			array_push($IdEventTabs, $id_event[$i]->id);
		}

		$nbrTabs = [];

		foreach ($IdEventTabs as  $value) {
			$nbrPart = $this->contrat->getNbrPart($value);
			$nbrPart = $nbrPart['nbrPart'];
			array_push($nbrTabs, $nbrPart);
		}

		return $nbrTabs;

	}
	public function infosClient(){
		
		$data = $this->contrat->getIdAndTypeOrga();
		
		
		$dataClient =[];

		for ($i=0; $i < count($data); $i++) { 

			if ($data[$i]['type_Orga'] == "entreprise") {

				$infosEntreprise =$this->contrat->getInfosClientEntreprise($data[$i]['IdOrga']);
				
				foreach ($infosEntreprise as $array) {
					array_push($dataClient, $array);
				}

			}
			if ($data[$i]['type_Orga'] == "ecole"){

				$infosEcole = $this->contrat->getInfosClientEcole($data[$i]['IdOrga']);
				
				foreach ($infosEcole as $array) {
					array_push($dataClient, $array);
				}

			}
			if ($data[$i]['type_Orga'] == "particulier"){

				$infosParticulier = $this->contrat->getInfosClientParticulier($data[$i]['IdOrga']);
				
				foreach ($infosParticulier as $array) {
					array_push($dataClient, $array);
				}
			}
			
		}
		
		return $dataClient;
		var_dump($dataClient);
		die();

	}
	public function updateEtatTodo($idContrat){
		$this->contrat->updateEtatTodo($idContrat);

		header("location:dashboard");
	}

	public function index(){

		$infosClient = $this->infosClient();
		$nbrPart = $this->NbrParticipants();
		$InfosEvent = $this->InfosEvent();
		
        $this->render('dashboard', compact('InfosEvent', 'nbrPart', 'infosClient' ));

	} 

}

