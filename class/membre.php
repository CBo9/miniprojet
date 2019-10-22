<?php

class Membre{

    private $id;
    private $pseudo;
    private $email;
    private $password;
    private $img;

    function __construct(array $donnees = null){
        if($donnees){
            $this->hydrate($donnees);
        }
    }

    function hydrate(array $donnees){
        foreach($donnees as $key=>$value){
            $method = 'set'.ucFirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }


    /*-------- GETTERS AND SETTERS --------*/
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getPseudo() {
		return $this->pseudo;
	}

	public function setPseudo($pseudo) {
		$this->pseudo = $pseudo;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getImage() {
		return $this->image;
	}

	public function setImage($image) {
		$this->image = $image;
	}

}