<?php










class contact {
	private $firstname; 
	private $lastname;
	private $tel;
	private $email; 

	public function __construct(string $pFirstname, string $pLastname, int $pTel, $pEmail) {
		$this->Firstname = $pFirstname;
		$this->Lastname = $pLastname;
		$this->Tel = $pTel;
		$this->Email = $pEmail;
	}
}

