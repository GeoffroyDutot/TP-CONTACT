<?php

$host = '172.0.0.1';
$port = 3306;
$database = 'test';
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database",'','');

class contact {
	private $prenom; 
	private $nom;
	private $tel;
	private $email; 

	public function __construct(string $pPrenom, string $pNom, int $pTel, $pEmail) {
		$this->Prenon = $pPrenom;
		$this->Nom = $pNom;
		$this->Tel = $pTel;
		$this->Email = $pEmail;
	}
}

