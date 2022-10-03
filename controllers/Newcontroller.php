<?php

class Newcontroller extends Controller{

	public function __construct(){

		$this->contrat = new NewModel();
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
		// echo "<pre>"; var_dump($data); echo "</pre>"; 
		

		$dataClient =[];

		// var_dump($data[0]);
		// echo "<br>";
		// var_dump($data[1]);
		// echo "<br>";
		// var_dump($data[2]);
		// echo "<br>";
		// echo count($data);
		// echo "<br>";

		// echo $data[0]['type_Orga'];
		// echo "<br>";

		// echo $data[1]['type_Orga'];
		// echo "<br>";

		// echo $data[2]['type_Orga'];
		// echo "<br>";


		for ($i=0; $i < count($data); $i++) { 

			if ($data[$i]['type_Orga'] == "entreprise") {
				// $test = $data[$i]['type_Orga'];
				// echo $test;
				// echo "<br>";

				$infosEntreprise =$this->contrat->getInfosClientEntreprise($data[$i]['IdOrga']);
				// var_dump($infosEntreprise);
				// echo "<br>";
				foreach ($infosEntreprise as $array) {
					array_push($dataClient, $array);
				}

			}
			if ($data[$i]['type_Orga'] == "ecole"){
				// $test1 = $data[$i]['type_Orga'];
				// echo $test1;
				// echo "<br>";

				$infosEcole = $this->contrat->getInfosClientEcole($data[$i]['IdOrga']);
				// var_dump($infosEcole);
				// echo "<br>";
				foreach ($infosEcole as $array) {
					array_push($dataClient, $array);
				}
				// array_push($dataClient, $infosEcole);

			}
			if ($data[$i]['type_Orga'] == "particulier"){
				// $test2 = $data[$i]['type_Orga'];
				// echo $test2;
				// echo "<br>";

				$infosParticulier = $this->contrat->getInfosClientParticulier($data[$i]['IdOrga']);
				// var_dump($infosParticulier);
				// echo "<br>";
				foreach ($infosParticulier as $array) {
					array_push($dataClient, $array);
				}
				// array_push($dataClient, $infosParticulier);

			}
			
		}
		
		return $dataClient;
		var_dump($dataClient);
		die();

	}
	public function updateEtatDevis($idContrat){
		$this->contrat->updateEtatDevis($idContrat);

		header("location:new");
	}

	public function index(){

		$infosClient = $this->infosClient();
		// echo "<pre>"; var_dump($infosClient); echo "</pre>";

		$nbrPart = $this->NbrParticipants();
		// echo "<pre>"; var_dump($nbrPart); echo "</pre>";

		$InfosEvent = $this->InfosEvent();
		// echo "<pre>"; var_dump($InfosEvent); echo "</pre>";

		
        $this->render('new', compact('InfosEvent', 'nbrPart', 'infosClient' ));

	} 

}

