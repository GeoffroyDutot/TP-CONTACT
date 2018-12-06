<?php










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

