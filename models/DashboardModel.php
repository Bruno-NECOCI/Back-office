<?php 

class DashboardModel extends Database{

    private $db;

	public function __construct()
	{
		$this->db=new Database();
		
	}



// --------------- Information des events (devis) --------------- 

public function getInfosEvent()
	{
		return $this->db->query("SELECT 

		evenement.id as idEvent,
		evenement.date, 
		etat, 
		message, 
		types_formations.nom as formation, 
 
		organisateur.nom as nomAdmin, 
		organisateur.prenom as prenomAdmin, 
		organisateur.type_client as typeClient
		
		FROM evenement 
		
		INNER JOIN types_formations ON evenement.id_formation = types_formations.id
		INNER JOIN organisateur ON evenement.id_client = organisateur.id
		
		WHERE etat='todo' ORDER BY evenement.id")->fetchAll();
	}

	// --------------- nbr paticipant --------------- 

	public function getNbrPart($id_event)
	{
		return $this->db->query("SELECT 

			count('participants.id') as nbrPart 
			
			FROM participants
			
			WHERE id_event = ?
		
		", [$id_event])->fetch(PDO::FETCH_ASSOC);
	}
	// --------------- id_Event (new)--------------- 

	public function getIdEvent()
	{
		return $this->db->query("SELECT 

			id 
			
			FROM evenement
			
			WHERE etat='todo' ")->fetchAll();
	}
	// --------------- id_orga + type_client--------------- 

	public function getIdAndTypeOrga()
	{
		return $this->db->query("SELECT 

			organisateur.id as IdOrga,
			organisateur.type_client as type_Orga
			
			FROM evenement

			INNER JOIN organisateur ON evenement.id_client = organisateur.id
				
			WHERE etat='todo'")->fetchAll(PDO::FETCH_ASSOC);

	}
	// --------------- info_client_entreprise --------------- 

	public function getInfosClientEntreprise($id)
	{
		return $this->db->query("SELECT 

			infos_entreprises.nom as nomCorp,
			adresse,
			tel,
			mail,
			siret
			
			FROM organisateur

			INNER JOIN infos_entreprises ON organisateur.id = infos_entreprises.id_orga
				
			WHERE organisateur.id=?", [$id])->fetchAll(PDO::FETCH_ASSOC);

	}

	// --------------- info_client_ecole --------------- 

	public function getInfosClientEcole($id)
	{
		return $this->db->query("SELECT 

			infos_ecole.nom as nomEcole,
			adresse,
			tel,
			mail
			
			FROM organisateur

			INNER JOIN infos_ecole ON organisateur.id = infos_ecole.id_orga
				
			WHERE organisateur.id=?", [$id])->fetchAll(PDO::FETCH_ASSOC);

	}
	// --------------- info_client_ecole --------------- 

	public function getInfosClientParticulier($id)
	{
		return $this->db->query("SELECT 

			adresse,
			tel,
			mail
			
			FROM organisateur

			INNER JOIN infos_particulier ON organisateur.id = infos_particulier.id_orga
				
			WHERE organisateur.id=?", [$id])->fetchAll(PDO::FETCH_ASSOC);

	}
	// --------------- update etat event : devis => progress --------------- 

	public function updateEtatTodo($id)
	{
		$this->db->query("UPDATE evenement SET etat = 'done' WHERE id = ?", [$id]);

	}

}