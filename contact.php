<?php

class Contact {
	private $contact_prenom; 
	private $contact_nom;
	private $contact_tel;
	private $contact_email; 
	private $contact_id;

	public function __construct(string $contact_prenom, string $contact_nom, int $contact_tel, string $contact_email, int $contact_id) {
		$this->contact_prenom = $contact_prenom;
		$this->contact_nom = $contact_nom;
		$this->contact_tel = $contact_tel;
		$this->contact_email = $contact_email;
		$this->contact_id = $contact_id;
	}


    /**
     * @return string
     */
    public function getContact_Prenom(): string
    {
        return $this->contact_prenom;
    }
    /**
     * @param string $contact_prenom
     */
    public function setContact_Prenom(string $contact_prenom): void
    {
        $this->contact_prenom = $contact_prenom;
    }


   /**
     * @return string
     */
    public function getContact_Nom(): string
    {
        return $this->contact_nom;
    }
    /**
     * @param string $contact_nom
     */
    public function setContact_Nom(string $contact_nom): void
    {
        $this->contact_nom = $contact_nom;
    }


    /**
     * @return int
     */
    public function getContact_Tel(): int
    {
        return $this->contact_tel;
    }
    /**
     * @param int $contact_tel
     */
    public function setContact_Tel(int $contact_tel): void
    {
        $this->contact_tel = $contact_tel;
    }


   /**
     * @return string
     */
    public function getContact_Email(): string
    {
        return $this->contact_email;
    }
    /**
     * @param string $contact_nom
     */
    public function setContact_Email(string $contact_email1): void
    {
        $this->contact_email = $contact_email;
    }


    /**
     * @return int
     */
    public function getContact_Id(): int
    {
        return $this->contact_id;
    }
    /**
     * @param int $contact_id
     */
    public function setContact_Id(int $contact_id): void
    {
        $this->contact_id = $contact_id;
    }
}

