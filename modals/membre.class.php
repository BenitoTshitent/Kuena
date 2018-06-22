<?php


class membre
{
    private $id=0;
    private $nom="";
    private $pseudo="";
    private $telephone="";
    private $password="";
    private $code="";
    private $breaked=0;
    private $activited=0;
    private $created_at="";

    /**
     * membre constructor.
     * @param string $nom
     * @param string $pseudo
     * @param string $telephone
     * @param string $password
     * @param string $breaked
     * @param string $created_at
     */
    public function __construct($nom, $pseudo, $telephone, $password,$code, $breaked,$activited, $created_at)
    {
        $this->nom = $nom;
        $this->pseudo = $pseudo;
        $this->telephone = $telephone;
        $this->password = $password;
        $this->code = $code;
        $this->breaked = $breaked;
        $this->activited=$activited;
        $this->created_at = $created_at;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode( $code)
    {
        $this->code = $code;
    }


    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getBreaked()
    {
        return $this->breaked;
    }

    /**
     * @param int $breaked
     */
    public function setBreaked($breaked)
    {
        $this->breaked = $breaked;
    }

    /**
     * @return int
     */
    public function getActivited()
    {
        return $this->activited;
    }

    /**
     * @param int $activited
     */
    public function setActivited($activited)
    {
        $this->activited = $activited;
    }


    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }



}