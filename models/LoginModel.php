<?php 

class LoginModel extends Database{

    private $db;

	public function __construct()
	{
		$this->db=new Database();
		
	}
	public function checkAdminExist($admin)
	{
		return $this->db->query("SELECT count(id) as result FROM admin WHERE identifiant=?",[$admin])->fetch()->result;
    }
	public function getIdentifiant($admin)
	{
		return $this->db->query("SELECT identifiant, mdp FROM admin WHERE identifiant=?",[$admin])->fetch();
    }

}