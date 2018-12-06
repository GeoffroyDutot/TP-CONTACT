<?php

$host = '172.0.0.1';
$port = 3306;
$database = 'annuaire';
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database",'root','');

class contact {
	private $prenom; 
	private $nom;
	private $tel;
	private $email; 
	private $id;

	public function __construct(string $pPrenom, string $pNom, int $pTel, $pEmail, int $pId) {
		$this->Prenon = $pPrenom;
		$this->Nom = $pNom;
		$this->Tel = $pTel;
		$this->Email = $pEmail;
		$this->Id = $pId;
	}
}

