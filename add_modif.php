<?php

$host = 'lacalhost';
$port = 3306;
$database = 'annuaire';


class Contact {
	private $contact_prenom; 
	private $contact_nom;
	private $contact_tel;
	private $contact_email; 
	private $contact_id;

	public function __construct(string $pContact_Prenom, string $pContact_Nom, int $pContact_Tel, string $pContact_Email, int $pContact_Id) {
		$this->contact_prenom = $pContact_Prenom;
		$this->contact_nom = $pContact_Nom;
		$this->contact_tel = $pContact_Tel;
		$this->contact_email = $pContact_Email;
		$this->contact_id = $pContact_Id;
	}
}


try {

    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database",'root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    var_dump($e->getMessage());
//    var_dump("Bad credentials");
} finally {
    $pdo = null;
}  

