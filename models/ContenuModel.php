<?php 

class ContenuModel extends Database{

    private $db;

	public function __construct()
	{
		$this->db=new Database();
		
	}

	// --------------- gestion de l'image de la page d'accueil --------------- 

	public function getImgAccueil()
	{
		return $this->db->query("SELECT id, nom, alt FROM images WHERE page = 'accueil' AND active in (1, 0) ORDER BY active DESC, id ASC ")->fetchAll();
        
	}
	public function getImgActive()
	{
		return $this->db->query("SELECT id, nom, alt, active FROM images WHERE page = 'accueil' AND active = '1'")->fetch();
        
	}
	public function getImgNull()
	{
		return $this->db->query("SELECT id, nom, alt FROM images WHERE page = 'accueil' AND active = '0' ")->fetchAll();
        
	}
	public function getImgDefault()
	{
		return $this->db->query("SELECT id, nom, alt FROM images WHERE page = 'accueil' AND active = '2' ")->fetch();
        
	}
	public function addNewImg($name, $alt)
	{
		return $this->db->query("INSERT INTO images SET page = 'accueil', active=0, nom=?, alt=?",  [$name, $alt]);
        
	}
	public function addfirstImg($name, $alt)
	{
		return $this->db->query("INSERT INTO images SET page = 'accueil', active=1, nom=?, alt=?", [$name, $alt]);
        
	}
	public function supprImg($id_img)
	{
		return $this->db->query("DELETE FROM images WHERE id=?", [$id_img]);
        
	}
	
	public function updateSwap($idAct, $id_img)

	{
		
		return $this->db->query(
	
		"UPDATE 
		images AS img1
		JOIN accueil_img AS img2
		ON (img1.id = ? AND img2.id =?)
		SET 
		img1.active = img2.active,
		img2.active = img1.active",
		[$idAct, $id_img]);
		
	}

	// --------------- gestion du contenu du speach --------------- 

	public function updateSpeach($contenu)

	{
		return $this->db->query("UPDATE text SET contenu = ? WHERE sujet ='speach' ", [$contenu]);
	}

	public function getSpeach()
	{
		return $this->db->query("SELECT id, contenu FROM text WHERE sujet = 'speach'")->fetch()->contenu;
        
	}

	// --------------- gestion du contenu du reason --------------- 

	public function updateReason($contenu)

	{
		return $this->db->query("UPDATE text SET contenu = ? WHERE sujet ='explication'", [$contenu]);
	}

	public function getReason()
	{
		return $this->db->query("SELECT id, contenu FROM text WHERE sujet = 'explication'")->fetch()->contenu;
        
	}
	// --------------- gestion du contenu de la Flip Card --------------- 

	public function updateFc($num, $contenu, $id)

	{
		return $this->db->query("UPDATE flip_card SET chiffre = ?, contenu = ? WHERE id = ?", [$num, $contenu,$id]);
	}

	public function getFlipCard()
	{
		return $this->db->query("SELECT id, contenu, chiffre FROM flip_card")->fetchAll();
        
	}

}